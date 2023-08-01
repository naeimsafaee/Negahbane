<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VerifyPhone extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'phone' => 'ir_mobile|required'
        ];
    }
    public function messages()
    {
        return [
            'phone.ir_mobile' => 'شماره شما معتبر نیست.',
            'phone.required' => 'شماره تلفن را وارد نکردید.'
        ];
    }
}
