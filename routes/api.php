<?php

use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\ClientController;
use App\Http\Controllers\Api\GuardController;
use App\Http\Controllers\LicenceController;
use App\Http\Controllers\PaymentController;
use App\Mail\ServiceBackOnline;
use App\Mail\ServiceIsOffline;
use App\Mail\VerifyEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;



Route::middleware(['throttle:9998,1'])->group(function(){


    Route::apiResource('/login' , LoginController::class);

    Route::apiResource('/register' , RegisterController::class);

    Route::middleware(['auth:api'])->group(function(){

        Route::apiResource('/licence' , LicenceController::class);
        Route::apiResource('/client' , ClientController::class);
        Route::post('/client/telegram' , [ClientController::class , 'telegram']);
        Route::apiResource('/monitor' , GuardController::class);

        Route::post('/active_email' , [ClientController::class , 'active_email']);
        Route::post('/active_phone' , [ClientController::class , 'active_phone']);

        Route::post('/unlock' , [GuardController::class , 'unlock']);
        Route::post('/set_password' , [GuardController::class , 'set_password']);
        Route::get('/remove_password/{monitor_id}' , [GuardController::class , 'remove_password']);

        Route::get('/payment/{id}', [PaymentController::class, 'pay_api']);

    });
});


Route::get('/all_monitor' , [GuardController::class , '_index']);


Route::post('/send_email' , function(Request $request){

    if($request->type == 0){
        Mail::to(["email" => $request->email])->send(new ServiceIsOffline($request->message));
    } else {
        Mail::to(["email" => $request->email])->send(new ServiceBackOnline($request->message));
    }

    return response()->json("ok");

});

Route::post('/send_sms' , function(Request $request){

    KavenegarPro($request->receptor , $request->message);
    return response()->json("ok");
});




