<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Licence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class RegisterController extends Controller{

    public function store(Request $request){
        Validator::make($request->all(), [
            'email' => ['required', 'string', 'email:rfc,dns', 'unique:clients,email'],
            'password' => ['required', 'string' , 'min:8'],
        ])->validate();


        $client = Client::query()->create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'licence_id' => Licence::query()->where('state' , "free")->firstOrFail()->id,
        ]);

        $token = $client->createToken('TokenForNaeim')->accessToken;

        return _response($token);
    }

}
