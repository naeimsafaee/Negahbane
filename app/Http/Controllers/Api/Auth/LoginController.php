<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller{

    public function store(Request $request){
        Validator::make($request->all(), [
            'email' => ['required', 'string' , 'email:rfc,dns' , 'exists:clients,email'],
            'password' => ['required', 'string'],
        ])->validate();


        $client = Client::query()->where('email' , $request->email)->firstOrFail();

        if(!password_verify($request->password , $client->password)){
            throw ValidationException::withMessages(['password' => 'اطلاعات کاربری اشتباه است.']);
        }

        $token = $client->createToken('TokenForNaeim')->accessToken;

        return _response($token);
    }

}
