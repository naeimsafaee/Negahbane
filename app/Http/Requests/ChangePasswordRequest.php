<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
{
    public function rules(){
        return [
            'reset_link' => ['required'],
            'password' => ['required', 'min:8'],
            'password2' => ['required', 'same:password'],
        ];
    }

    public function messages()
    {
        return [
            'password.required' => "لطفا رمز خود را وارد کنید",
            'password.min' => "رمز عبور حداقل باید هشت حرف باشد ",
            'password2.required' => "لطفا تکرار رمز خود را وارد کنید",
            'password2.same' => "تکرار رمز عبور و رمز عبور با یک دیگر مطابقت ندارد ",
        ];
    }
}
