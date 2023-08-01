<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\Client;
use App\Models\Client_licence;
use App\Models\Licence;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller{


    use RegistersUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct(){
//        $this->middleware('guest');
    }


    protected function validator(array $data){
        return Validator::make($data, [
            //  'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:clients'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }


    protected function create(array $data){
        return Client::query()->create([
            // 'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'licence_id' => Licence::query()->first()->id,
        ]);
    }

    public function register(RegisterRequest $request){
        $this->validator($request->all())->validate();
        $client = $this->create($request->all());

        auth()->guard('client')->login($client, true);

        return redirect()->route('guard.index');
    }

    public function showRegistrationForm(){
        if(auth()->guard('client')->check()){
            return redirect()->route('guard.index');
        } else {
            return view('auth.register');
        }
    }

}
