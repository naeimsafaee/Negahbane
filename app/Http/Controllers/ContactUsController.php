<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactUsController extends Controller{

    public function index(){
        return view('layouts.contact_us');
    }

    public function store(Request $request){
        Validator::make($request->all(), [
            'name' => ['required'],
            'description' => ['required'],
            'email' => ['required'  ],
        ], [
            'name.required' => "لطفا نام خود را وارد کنید",
            'description.required' => "لطفا توضیحات خود را وارد کنید",
            'email.required' => "لطفا ایمیل خود را وارد کنید ",
        ])->validate();


        ContactUs::query()->create([
            'name' =>$request->name ,
            'email' =>$request->email ,
            'description' =>$request->description ,
        ]);

        return redirect()->route('home');
    }

    public function show($id){
        //
    }

    public function update(Request $request, $id){
        //
    }

    public function destroy($id){
        //
    }
}
