<?php

use App\Http\Controllers\Restro\DashboardController;
use App\Http\Controllers\Restro\LoginController;
use App\Http\Controllers\Restro\PassportController;
use App\Http\Controllers\Restro\ProfileController;
use App\Http\Controllers\Restro\QrController;
use App\Http\Controllers\Restro\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [LoginController::class, 'login'])->name('restro.login');
Route::post('/login', [LoginController::class, 'postLogin'])->name('restro.postLogin');
Route::get('/register', [LoginController::class, 'register'])->name('restro.register');
Route::post('/register', [LoginController::class, 'postRegister'])->name('restro.postRegister');
// Route::post('/forgot-password', [LoginController::class, 'forgotPassword'])->name('restro.forgotPassword');
Route::get('/forgot-password', [LoginController::class, 'forgotPassword'])->name('restro.forgotPassword');
Route::post('/forgot-password', [LoginController::class, 'forgotsend'])->name('restro.forgotsend');
Route::get('/reset-password/{token}', [LoginController::class, 'resetPassword'])->name('restro.resetPassword');
Route::post('/reset-password/{token}', [LoginController::class, 'resetsend'])->name('restro.resetsend');

Route::group(['middleware' => ['restroAuth'], 'as' => 'restro.'], function ()
{
    Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile', [DashboardController::class, 'profile'])->name('profile');
    Route::get('logout', [DashboardController::class, 'logout'])->name('logout');
    Route::post('other', [DashboardController::class, 'other'])->name('other');
    Route::post('sendwhatsapp', [DashboardController::class, 'sendwhatsapp'])->name('sendwhatsapp');

    Route::group(['prefix' => 'passport', 'as' => 'passport.'], function () {
        Route::get('/', [PassportController::class, 'index'])->name('index');
        Route::post('/store', [PassportController::class, 'store'])->name('store');
        Route::post('/validity', [PassportController::class, 'validityUpdate'])->name('validity');
        Route::get('/edit/{id}', [PassportController::class, 'edit'])->name('edit');
        Route::put('/edit/{id}', [PassportController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [PassportController::class, 'destroy'])->name('delete');
    });

    Route::group(['prefix' => 'profile', 'as' => 'profile.'], function () {
        Route::get('/', [ProfileController::class, 'index'])->name('index');
        Route::get('/edit', [ProfileController::class, 'edit'])->name('edit');
        Route::post('/edit', [ProfileController::class, 'updateprofile'])->name('updateprofile');
        Route::post('/uploadimage', [ProfileController::class, 'uploadimage'])->name('uploadimage');
        Route::post('/removeimage', [ProfileController::class, 'removeimage'])->name('removeimage');

        Route::get('/password', [ProfileController::class, 'password'])->name('password');
        Route::post('/password', [ProfileController::class, 'changepassword'])->name('changepassword');

        Route::get('/terms', [ProfileController::class, 'terms'])->name('terms');
        Route::post('/terms', [ProfileController::class, 'termsstore'])->name('termsstore');

        Route::get('/support', [ProfileController::class, 'support'])->name('support');
        Route::post('/support', [ProfileController::class, 'supportstore'])->name('supportstore');
        Route::get('/support/{id}', [ProfileController::class, 'supportedit'])->name('supportedit');

        Route::get('/faq', [ProfileController::class, 'faq'])->name('faq');
        Route::get('/contact', [ProfileController::class, 'contact'])->name('contact');

        Route::get('/user', [UserController::class, 'user'])->name('user');
        Route::post('/user', [UserController::class, 'userstore'])->name('userstore');
        Route::get('/user/{id}', [UserController::class, 'useredit'])->name('useredit');
        Route::put('/user/{id}', [UserController::class, 'userupdate'])->name('userupdate');
        Route::delete('/user/{id}', [UserController::class, 'userdelete'])->name('userdelete');

        Route::get('/subscription', [ProfileController::class, 'subscription'])->name('subscription');
        Route::get('/subscription-history', [ProfileController::class, 'subscriptionHistory'])->name('subscription.history');
        Route::post('/subscription', [ProfileController::class, 'subpay'])->name('sub.pay');
        Route::post('/subscription/store', [ProfileController::class, 'substore'])->name('sub.store');
        Route::get('/wallet', [ProfileController::class, 'wallet'])->name('wallet');
        Route::post('/wallet', [ProfileController::class, 'walletpurchse'])->name('wallet.purchase');
        Route::post('/store', [ProfileController::class, 'walletstore'])->name('payment.store');
    });

    Route::get('qr-reedem', [QrController::class, 'reedem'])->name('qrreedem.index');
    Route::get('qr-invite', [QrController::class, 'invite'])->name('qrinvite.index');
    Route::post('qr-link', [QrController::class, 'qrlink'])->name('qr.link');

    Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
    });


    // Route::get('/passport', [DashboardController::class, 'passport'])->name('passport');
    Route::get('/send-gift', [DashboardController::class, 'sendgift'])->name('sendgift');
    Route::post('/send-gift', [DashboardController::class, 'sendgiftstore'])->name('sendgiftstore');
    Route::get('/send-gift/{id}', [DashboardController::class, 'sendgiftlist'])->name('sendgift.list');
    // Route::get('/qr-reedem', [DashboardController::class, 'reedem'])->name('reedem');
    // Route::get('/qr-invite', [DashboardController::class, 'invite'])->name('invite');
    // Route::get('/users', [DashboardController::class, 'users'])->name('users');


});
