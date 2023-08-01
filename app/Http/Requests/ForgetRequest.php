<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ForgetRequest extends FormRequest
{
    public function rules()
    {
        return [
            'email' => 'required|email|exists:clients',
        ];
    }
    public function messages()
    {
        return [
            'email.required' => 'فیلد ایمیل خالی است.',
            'email.exists' => 'با این ایمیل ثبت نامی نشده است.',
            'email.email' => 'ایمیل شما معتبر نیست.',

        ];
    }
}
