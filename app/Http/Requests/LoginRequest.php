<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email' => 'required|email|exists:clients',
            'password' => 'required|min:8',
        ];
    }
    public function messages()
    {
        return [
            'email.required' => 'فیلد ایمیل خالی است.',
            'email.exists' => 'با این ایمیل ثبت نامی نشده است.',
            'email.email' => 'ایمیل شما معتبر نیست.',
            'password.min' => 'حداقل تعداد کاراکتر پسورد 8 است.',
            'password.required' => 'فیلد پسورد خالی است.',
        ];
    }
}
