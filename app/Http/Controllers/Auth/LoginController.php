<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\Client;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;
    public function showLoginForm()
    {
        if (auth()->guard('client')->check())
            return redirect()->route('guard.index');
        return view('auth.login');
    }

    protected function validator(array $data){
        return Validator::make($data, [
            'email' => ['required','exists:clients,email'],
            'password' => ['required', 'min:8'],
        ]);
    }

    protected function create(array $data){

        $client = Client::query()->where('email', $data["email"])->firstOrFail();

        if(password_verify($data["password"], $client->password)){
            return $client;
        } else {
            throw ValidationException::withMessages(['password' => 'اطلاعات کاربری اشتباه است.']);
        }
    }

    public function login(LoginRequest $request)
    {
        $this->validator($request->all())->validate();

        $client = $this->create($request->all());

        auth()->guard('client')->login($client , true);

         return redirect()->route('guard.index');
    }

    public function logout(){
        auth()->guard('client')->logout();
        return redirect()->route('home');
    }

}
