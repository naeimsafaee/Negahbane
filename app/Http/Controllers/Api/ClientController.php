<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\VerifyEmail;
use App\Models\Client;
use App\Notifications\SendSMS;
use Carbon\Carbon;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class ClientController extends Controller{

    public function index(){

        $client_id = auth()->guard('api')->user()->id;

        $client = Client::query()->findOrFail($client_id);

        return _response($client);
    }

    public function update(Request $request, $id){
        Validator::make($request->all(), [
            'email' => ['string', 'email:rfc,dns'],
            'phone' => ['string', 'iran_mobile'],
            'old_password' => ['string', 'min:8'],
            'password' => ['string', 'min:8'],
            'notif_sms' => ['bool'],
            'notif_email' => ['bool'],
        ])->validate();

        $client = auth()->guard('api')->user();

        $code = 0;

        if($request->email){

            $code = $this->generateRandomString();
            Mail::to(["email" => $request->email])->send(new VerifyEmail($code));
            $client->email = $request->email;
            $client->email_code = $code;
            $client->email_verified_at = null;
        }

        if($request->phone){
            $code = rand(1000, 9999);

            $client->phone = $request->phone;
            $client->is_verify = 0;
            $client->code = $code;
            $client->notify(new SendSMS($request->phone, $code));
        }

        if($request->password && $request->old_password){

            if(password_verify($request->old_password, $client->password)){
                $client->password = Hash::make($request->password);
            } else {
                throw ValidationException::withMessages(['old_password' => 'اطلاعات وارد شده صحیح نمی باشد ']);
            }
        }

        if($request->has("notif_sms")){
            $client->notif_sms = $request->notif_sms;
            if($request->notif_sms == 1){
                try {

                    $g_client = new \GuzzleHttp\Client();
                    $response = $g_client->request('POST', config('constants.NODE_API') . '/client/notify', [
                        'form_params' => [
                            "type" => "Sms",
                            "send_to" => $client->phone,
                            "client_id" => $client->id,
                        ],
                    ]);

                } catch(RequestException $e){
                    //                return abort(500);
                }
            }
        }

        if($request->has("notif_email")){
            $client->notif_email = $request->notif_email;

            if($request->notif_email == 1){
                try {

                    $g_client = new \GuzzleHttp\Client();
                    $response = $g_client->request('POST', config('constants.NODE_API') . '/client/notify', [
                        'form_params' => [
                            "type" => "Email",
                            "send_to" => $client->email,
                            "client_id" => $client->id,
                        ],
                    ]);

                } catch(RequestException $e){
                    //                return abort(500);
                }
            }

        }

        $client->save();

        return _response([
            "verify_code" => $code
        ], "ok");
    }

    public function telegram(Request $request){
        Validator::make($request->all(), [
            'code' => ['string', 'required'],
        ])->validate();

        try {

            $client = new \GuzzleHttp\Client();
            $response = $client->request('POST', config('constants.NODE_API') . 'client/notify', [
                'form_params' => [
                    "type" => "Telegram",
                    "code" => $request->code,
                    "client_id" => auth()->guard('api')->user()->id,
                ],
            ]);

            return _response("" , "ok");

        } catch(RequestException $e){
            return _response($e->getMessage() ,"" ,false, $e->getCode());
        }

    }

    public function active_email(Request $request){
        Validator::make($request->all(), [
            'code' => ['string' , 'exists:clients,email_code'],
        ])->validate();

        $client = auth()->guard('api')->user();
        if($client->email_code != $request->code)
            throw ValidationException::withMessages(['code' => 'کد تایید صحیح نمی باشد']);

        $client->email_verified_at = Carbon::now();
        $client->save();

        return _response("ok");
    }

    public function active_phone(Request $request){
        Validator::make($request->all(), [
            'code' => ['string' , 'exists:clients,code'],
        ])->validate();

        $client = auth()->guard('api')->user();
        if($client->code != $request->code)
            throw ValidationException::withMessages(['code' => 'کد تایید صحیح نمی باشد']);

        $client->is_verify = true;
        $client->save();

        return _response("ok");
    }

    function generateRandomString($length = 10){
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for($i = 0; $i < $length; $i++){
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }



}





