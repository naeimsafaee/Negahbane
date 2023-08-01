<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateNotifRequest;
use App\Http\Requests\VerifyPhone;
use App\Mail\VerifyEmail;
use App\Notifications\SendSMS;
use Carbon\Carbon;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class ClientController extends Controller {

    public function index() {
        return view('client.setting');
    }

    public function notification() {
        $user = auth()->guard('client')->user();
        return view('client.notification', compact('user'));
    }

    public function updateNotification(UpdateNotifRequest $request) {
        $user = auth()->guard('client')->user();

        if (strlen($user->phone) == 0)
            return response()->json(["message" => "لطفا ابتدا شماره تلفن خود را وارد نمایید"]);

        $user->notif_sms = $request->sms;
        $user->notif_email = $request->email;
        $user->save();

        try {
            $client = new \GuzzleHttp\Client();

            if ($request->sms == 1) {

                $response = $client->request('POST', config('constants.NODE_API') . '/client/notify', [
                    'form_params' => [
                        "type" => "Sms",
                        "send_to" => $user->phone,
                        "client_id" => $user->id,
                    ],
                ]);
            } else {
                $response = $client->request('POST', config('constants.NODE_API') . '/client/notify', [
                    'form_params' => [
                        "type" => "Sms",
                        "client_id" => $user->id,
                    ],
                ]);
            }

        } catch(RequestException $e) {
            //                return abort(500);
        }

        try {

            $client = new \GuzzleHttp\Client();
            if ($request->email == 1) {

                $response = $client->request('POST', config('constants.NODE_API') . '/client/notify', [
                    'form_params' => [
                        "type" => "Email",
                        "send_to" => $user->email,
                        "client_id" => $user->id,
                    ],
                ]);
            } else {
                $response = $client->request('POST', config('constants.NODE_API') . '/client/notify', [
                    'form_params' => [
                        "type" => "Email",
                        "client_id" => $user->id,
                    ],
                ]);
            }

        } catch(RequestException $e) {
            //                return abort(500);
        }

        return response()->json(["success" => true]);
    }

    public function phone() {
        $verify = auth()->guard('client')->user()->is_verify;
        $phone = auth()->guard('client')->user()->phone;

        return view('client.phone', compact('verify', 'phone'));
    }

    public function phoneStore(VerifyPhone $request) {
        Validator::make($request->all(), [
            'phone' => ['required', 'size:11'],
        ], [
            'phone.required' => "لطفا شماره تلفن خود را وارد کنید ",
            'phone.size' => "لطفا شماره خود را به درستی وارد کنید",
        ])->validate();

        $code = rand(1000, 9999);
        $user = auth()->guard('client')->user();
        $user->phone = $request->phone;
        $user->code = $code;
        $user->is_verify = 0;
        $user->save();

        $user->notify(new SendSMS($request->phone, $code));

        return redirect()->route('verify');
    }

    public function verify() {
        $user = auth()->guard('client')->user();
        $phone = $user->phone;
        if ($user->is_verify == 0 && $phone != null)
            return view('auth.verify', compact('phone'));
        $verify = $user->is_verify;
        $phone = $user->phone;
        return view('client.phone', compact('verify', 'phone'));
    }

    public function verifyStore(Request $request) {
        Validator::make($request->all(), [
            'code' => ['required', 'size:4'],
        ])->validate();

        $user = auth()->guard('client')->user();
        if ($user->phone == null)
            return redirect()->route('phone');

        if ($user->code == $request->code) {
            $user->is_verify = 1;
            $user->save();

            try {

                $client = new \GuzzleHttp\Client();
                $response = $client->request('POST', config('constants.NODE_API') . '/client/notify', [
                    'form_params' => [
                        "type" => "Sms",
                        "send_to" => $user->phone,
                        "client_id" => $user->id,
                    ],
                ]);

                if ($response->getStatusCode() == 200) {
                    return redirect()->route('setting');
                }

            } catch(RequestException $e) {
                return abort(500);
            }
            return abort(500);
        }
        return redirect()->back()->withErrors('کد ارسال شده صحیح نمیباشد.');
    }

    public function email(Request $request) {
        $client = auth()->guard('client')->user();
        return view('client.email', compact('client'));

    }

    public function submit_email(Request $request) {
        Validator::make($request->all(), [
            'email' => ['required', 'email'],
        ], [
            'email.required' => "لطفا ایمیل  خود را وارد کنید ",
            'email.email' => "لطفا ایمیل خود را به درستی وارد کنید",
        ])->validate();

        $code = $this->generateRandomString();

        $user = auth()->guard('client')->user();
        $user->email = $request->email;
        $user->email_code = $code;
        $user->email_verified_at = null;
        $user->save();

        Mail::to(["email" => $request->email])->send(new VerifyEmail($code));

        return redirect()->route('email_verify');
    }

    public function email_verify() {
        return view('client.verify_mail');
    }

    public function email_verify_submit(Request $request) {
        Validator::make($request->all(), [
            'code' => [
                'required',
                function($attribute, $value, $fail) {

                    $client = auth()->guard('client')->user();

                    if ($value != $client->email_code)
                        return $fail('کد صحیح نیست');

                },
            ],
        ], [
            'code.required' => "لطفا کد تایید  خود را وارد کنید ",

        ])->validate();

        $client = auth()->guard('client')->user();
        $client->email_verified_at = Carbon::now();
        $client->save();
        return redirect()->route('setting');
    }

    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function change_password(Request $request) {
        return view('client.change_password');

    }

    public function change_password_submit(Request $request) {
        Validator::make($request->all(), [
            'old_password' => ['required'],
            'new_password' => ['required', 'min:8'],
            're_new_password' => ['required', 'same:new_password'],
        ], [
            'old_password.required' => "لطفا رمز فعلی خود را وارد کنبد",
            'new_password.required' => "لطفا رمز جدید را وارد کنبد",
            'new_password.min' => "رمز باید حداقل 8 رقم باشد ",
            're_new_password.required' => "لطفا تکرار رمز جدید را وارد کنید ",
            're_new_password.same' => "رمز ها با یک دیگر تطابق ندارند ",
        ])->validate();

        $user = auth()->guard('client')->user();

        if (password_verify($request->old_password, $user->password)) {
            $user->password = Hash::make($request->new_password);
            $user->save();
            return redirect()->route('setting');
        } else {
            throw ValidationException::withMessages(['old_password' => ' رمز فعلی اشتباه است']);
        }

    }

    public function telegram() {
        return view('client.telegram');
    }

}
