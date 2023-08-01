<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class LoginCheck{

    public function handle(Request $request, Closure $next){

        if(auth()->guard("client")->check())
            return $next($request);

        return redirect()->route('login');

    }
}
