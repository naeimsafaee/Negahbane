<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Client_licence;
use Illuminate\Http\Request;

class HomeController extends Controller{

    public function __construct(){
        //  $this->middleware('auth');
    }


    public function index(){

        if(auth()->guard('client')->check()){
            return redirect()->route('guard.index');
        }

        $clients = count(Client::all());
        //dd($clients);
        return view('home', compact('clients'));
    }

}
