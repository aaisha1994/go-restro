<?php

use App\Http\Controllers\Affiliate\DashboardController;
use App\Http\Controllers\Affiliate\LoginController;
use App\Http\Controllers\Affiliate\OfferController;
use App\Http\Controllers\Affiliate\OtherController;
use App\Http\Controllers\Affiliate\RestroController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [LoginController::class, 'login'])->name('affiliate.login');
Route::post('/login', [LoginController::class, 'postLogin'])->name('affiliate.postLogin');
Route::get('/register', [LoginController::class, 'register'])->name('affiliate.register');
Route::post('/register', [LoginController::class, 'postRegister'])->name('affiliate.postRegister');
Route::get('/forgot-password', [LoginController::class, 'forgotPassword'])->name('affiliate.forgotPassword');
Route::post('/forgot-password', [LoginController::class, 'forgotsend'])->name('affiliate.forgotsend');
Route::get('/reset-password/{token}', [LoginController::class, 'resetPassword'])->name('affiliate.resetPassword');
Route::post('/reset-password/{token}', [LoginController::class, 'resetsend'])->name('affiliate.resetsend');

Route::group(['middleware' => ['affiliateAuth'], 'as' => 'affiliate.'], function ()
{
    Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/invite-people', [DashboardController::class, 'invitePeoplelist'])->name('invitePeople.list');
    Route::post('/invite-people', [DashboardController::class, 'invitePeople'])->name('invitePeople');
    Route::get('/profile', [DashboardController::class, 'profile'])->name('profile');
    Route::post('/profile/{type}', [DashboardController::class, 'profileupdate'])->name('profileupdate');
    Route::get('logout', [DashboardController::class, 'logout'])->name('logout');
    Route::post('/support', [DashboardController::class, 'supportstore'])->name('supportstore');
    Route::get('/support/{id}', [DashboardController::class, 'supportedit'])->name('supportedit');

    Route::group(['prefix' => 'restro', 'as' => 'restro.'], function () {
        Route::get('/', [RestroController::class, 'index'])->name('index');
        Route::get('/create', [RestroController::class, 'create'])->name('create');
        Route::post('/store', [RestroController::class, 'store'])->name('store');
        Route::get('/{id}', [RestroController::class, 'view'])->name('view');
        Route::get('/edit/{id}', [RestroController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [RestroController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [RestroController::class, 'destroy'])->name('delete');

    });
    Route::group(['prefix' => 'offer', 'as' => 'offer.'], function () {
        Route::get('/', [OfferController::class, 'index'])->name('index');
        Route::get('/create', [OfferController::class, 'create'])->name('create');
        Route::post('/store', [OfferController::class, 'store'])->name('store');
        Route::get('/{id}', [OfferController::class, 'view'])->name('view');
        Route::get('/edit/{id}', [OfferController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [OfferController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [OfferController::class, 'destroy'])->name('delete');
    });

    Route::get('payment-details', [OtherController::class, 'payment'])->name('payment');
    Route::post('payment-details', [OtherController::class, 'paymentstore'])->name('payment.store');
    Route::get('sales', [OtherController::class, 'sales'])->name('sales');
    Route::get('sales1', [OtherController::class, 'sales1'])->name('sales1');
    Route::get('qr-management', [OtherController::class, 'qrmanagement'])->name('qr.management');
    // Route::get('qr-management', [OtherController::class, 'qrmanagement'])->name('qr.management');
    Route::post('qr-link', [OtherController::class, 'qrlink'])->name('qr.link');
    Route::post('restro-link/{id}', [OtherController::class, 'restrolink'])->name('restrolink');
});
