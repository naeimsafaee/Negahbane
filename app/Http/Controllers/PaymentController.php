<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Licence;
use App\Models\Transaction;
use Illuminate\Http\Request;
use SaeedVaziry\Payir\Exceptions\SendException;
use SaeedVaziry\Payir\Exceptions\VerifyException;
use SaeedVaziry\Payir\PayirPG;

class PaymentController extends Controller{

    public function pay($id){
        $licence = Licence::query()->findOrFail($id);
        if($licence->state == "buy"){

            $code = rand(10000 , 99999);

            $payir = new PayirPG();
            $payir->amount = $licence->price * 10;
            $payir->factorNumber = $code;
            $payir->description = 'Some Description';

            $transaction = new Transaction();
            $transaction->bank_transaction_id = $code;
            $transaction->product_id = $id;
            $transaction->client_id = auth()->guard('client')->user()->id;
            $transaction->paid = 0;
            $transaction->amount = $licence->price * 10;
            $transaction->save();

            try {
                $payir->send();
                return redirect($payir->paymentUrl);
            } catch(SendException $e){
                throw $e;
            }
        }
    }

    public function pay_api($id){
        $licence = Licence::query()->findOrFail($id);
        if($licence->state == "buy"){

            $code = rand(10000 , 99999);

            $payir = new PayirPG();
            $payir->amount = $licence->price * 10;
            $payir->factorNumber = $code;
            $payir->description = 'Some Description';
            $payir->redirect = route('callback_api');

            $transaction = new Transaction();
            $transaction->bank_transaction_id = $code;
            $transaction->product_id = $id;
            $transaction->client_id = auth()->guard('api')->user()->id;
            $transaction->paid = 0;
            $transaction->amount = $licence->price * 10;
            $transaction->save();

            try {
                $payir->send();
                return _response($payir->paymentUrl);
            } catch(SendException $e){
                return _response("", $e->getMessage(), false);
            }
        }
    }

    public function verify_api(Request $request){

        $payir = new PayirPG();
        $payir->token = $request->token;
        try {
            $verify = $payir->verify();

            if($verify['status'] == 1){

                $transaction = Transaction::query()->where('bank_transaction_id' , $verify["factorNumber"])->firstOrFail();
                $transaction->paid = true;
                $transaction->save();

                $client = Client::query()->findOrFail($transaction->client_id);

                $client->licence_id = $transaction->product_id;
                $client->save();

                $success = true;
            } else {
                $success = false;
            }


        } catch(VerifyException $e){
            $success = false;
        }

        return view('pay.callback_api', compact('success'));
    }

    public function verify(Request $request){
        $payir = new PayirPG();
        $payir->token = $request->token;
        try {
            $verify = $payir->verify();
            if($verify['status'] == 1){
                $transaction = Transaction::query()->where('bank_transaction_id' , $payir->factorNumber)->firstOrFail();
                $transaction->paid = true;
                $transaction->save();

                $client = Client::query()->findOrFail(auth()->guard('client')->id());

                $client->licence_id = $transaction->product_id;
                $client->save();

                return redirect()->route('pay.callback');
            } else {
                return redirect()->route('pay.callback_error');
            }

        } catch(VerifyException $e){
            return redirect()->route('pay.callback_error');
            //            die(json_encode($e->getMessage()));
        }
    }

}
