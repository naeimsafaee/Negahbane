<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\GuardController;
use App\Http\Controllers\LicenceController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::middleware(['throttle:10,1'])->group(function() {
    Auth::routes();
});

Route::get('/forget', ForgotPasswordController::class)->name('forget');
Route::post('/forget', [ForgotPasswordController::class, 'submit'])->middleware(['throttle:10,1'])->name('forget');
Route::get('/forget_password/{reset_link}', [ForgotPasswordController::class, 'change_password'])->name('forget_password');
Route::post('/forget_password', [ForgotPasswordController::class, 'change_password_submit'])->middleware(['throttle:10,1'])->name('forget_password');

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware(['login'])->group(function() {

    Route::resource('/guard', GuardController::class)->only([
        'index', 'create', 'store',
    ]);

    Route::apiResource('/licence', LicenceController::class);

    Route::apiResource('/contact_us', ContactUsController::class)->only([
        'index', 'store'
    ]);

    Route::prefix('setting')->group(function() {
        Route::get('', [ClientController::class, 'index'])->name('setting');

        Route::get('/notification', [ClientController::class, 'notification'])->name('notification');
        Route::post('/notification', [ClientController::class, 'updateNotification'])->middleware(['throttle:10,1'])->name('notification.update');

        Route::get('/phone', [ClientController::class, 'phone'])->name('phone');
        Route::post('/phone', [ClientController::class, 'phoneStore'])->middleware(['throttle:10,1'])->name('phone.store');

        Route::get('/verify', [ClientController::class, 'verify'])->name('verify');
        Route::post('/verify', [ClientController::class, 'verifyStore'])->middleware(['throttle:10,1'])->name('verify.store');

        Route::get('/email', [ClientController::class, 'email'])->name('email');
        Route::post('/email', [ClientController::class, 'submit_email'])->middleware(['throttle:10,1'])->name('email.store');
        Route::get('/email/verify', [ClientController::class, 'email_verify'])->name('email_verify');
        Route::post('/email/verify/submit', [ClientController::class, 'email_verify_submit'])->middleware(['throttle:10,1'])->name('email_verify_submit');

        Route::get('/change_password', [ClientController::class, 'change_password'])->name('change_password');
        Route::post('/change_password', [ClientController::class, 'change_password_submit'])->middleware(['throttle:10,1'])->name('change_password.store');

        Route::get('/telegram', [ClientController::class, 'telegram'])->name('telegram');

    });

    Route::get('/delete_guard/{id}', [GuardController::class, 'destroy'])->name('delete_guard');

    Route::get('/logout', [LoginController::class, 'logout'])->name('logout_client');
});

Route::get('/guard/{id?}', [GuardController::class, 'show'])->name('guard');

Route::post('/unlock', [GuardController::class, 'unlock'])->middleware(['throttle:10,1'])->name('unlock');
Route::post('/set_password', [GuardController::class, 'set_password'])->middleware(['throttle:10,1'])->name('set_password');
Route::get('/remove_password/{monitor_id?}', [GuardController::class, 'remove_password'])->name('remove_password');

Route::get('/pay/callback', [PaymentController::class, 'verify'])->name('callback');
Route::get('/pay/callback/api', [PaymentController::class, 'verify_api'])->name('callback_api');
Route::get('/payment/{id}', [PaymentController::class, 'pay'])->name('pay');

Route::group(['prefix' => 'admin'], function() {
    Voyager::routes();
});
