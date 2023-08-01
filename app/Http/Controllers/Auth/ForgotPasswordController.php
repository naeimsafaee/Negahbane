<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\ForgetRequest;
use App\Mail\ForgetPassword;
use App\Models\Client;
use http\Env\Request;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordController extends Controller {

    public function __invoke() {
        return view('auth.passwords.email');
    }

    public function submit(ForgetRequest $request) {

        $client = Client::query()->where('email', $request->email)->firstOrFail();
        $reset_link = substr(sha1(time()), 0, 12);
        $client->reset_link = $reset_link;
        $client->save();

        Mail::to(["email" => $client->email])->send(new ForgetPassword($reset_link));
        return redirect()->back()->with('success', 'لینک بازیابی برای شما ارسال شد');
    }

    public function change_password($reset_link) {
        return view('auth.passwords.reset', compact('reset_link'));
    }

    public function change_password_submit(ChangePasswordRequest $request) {
        $admin = Client::query()->where('reset_link', $request->reset_link)->first();

        if ($admin) {
            $admin->password = Hash::make($request->password);
            $admin->reset_link = null;
            $admin->save();
        } else {
            return redirect()->back()->with('error', 'کد شما منقضی شده است ');
        }

        return redirect()->back()->with('success', 'رمز شما با موفقیت تغییر پیدا کرد');

    }

}
