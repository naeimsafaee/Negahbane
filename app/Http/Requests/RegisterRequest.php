<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest{

    public function authorize(){
        return true;
    }

    public function rules(){
        return [
            'email' => 'required|email|unique:clients',
            'password' => 'required|confirmed|min:8',
        ];
    }

    public function messages(){
        return [
            'email.required' => 'فیلد ایمیل خالی است.',
            'email.email' => 'ایمیل شما معتبر نیست.',
            'email.unique' => 'با این ایمیل قبلا ثبت نام انجام شده است.',
            'password.confirmed' => 'دو پسورد شما یکسان نیستند.',
            'password.min' => 'حداقل تعداد کاراکتر پسورد 8 است.',
            'password.required' => 'فیلد پسورد خالی است.',
        ];
    }
}
