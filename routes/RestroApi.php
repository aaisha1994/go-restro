<?php

use App\Http\Controllers\RestroApi\LoginController;
use App\Http\Controllers\RestroApi\MoreController;
use App\Http\Controllers\RestroApi\OtherController;
use App\Http\Controllers\RestroApi\PassportController;
use App\Http\Controllers\RestroApi\QrController;
use App\Http\Controllers\RestroApi\StaffController;
use App\Http\Controllers\RestroApi\SubscriptionController;
use Illuminate\Support\Facades\Route;


Route::get('country', [OtherController::class, 'Country'])->name('api.country');
Route::get('state/{id}', [OtherController::class, 'State'])->name('api.state');
Route::get('city/{id}', [OtherController::class, 'City'])->name('api.city');
Route::post('city', [OtherController::class, 'CityAdd'])->name('api.addcity');
Route::get('category', [OtherController::class, 'category'])->name('api.category');
Route::get('facility', [OtherController::class, 'Facility'])->name('api.facility');
Route::get('contact-us', [OtherController::class, 'ContactUs']);

Route::get("terms-condition", [MoreController::class, "terms"]);
Route::get("privacy-policy", [MoreController::class, "policy"]);
Route::get("refund-policy", [MoreController::class, "refund"]);
Route::get("faq", [MoreController::class, "faq"]);

Route::post('register', [LoginController::class, 'Register'])->name('api.register');
Route::post('resend-invitation', [LoginController::class, 'ResendInvitation']);
Route::post('login', [LoginController::class, 'Login']);
Route::post('forgot-password', [LoginController::class, 'ForgotPassword'])->name('forgotapi');

Route::group(['middleware' => ['restroApi'], 'as' => 'restro'], function (){
    Route::get("profile", [LoginController::class, "Profile"]);
    Route::post("logout", [LoginController::class, "Logout"]);
    Route::post("profile", [LoginController::class, "UpdateProfile"]);
    Route::delete("image/{id}", [LoginController::class, "ImageRemove"]);
    Route::post("other-info", [LoginController::class, "OtherInfo"]);
    Route::post("change-password", [LoginController::class, "changePassword"]);

    Route::get("dashboard", [MoreController::class, "Dashboard"]);
    Route::get("support", [MoreController::class, "Support"]);
    Route::post("support", [MoreController::class, "SupportStore"]);
    Route::get("terms", [MoreController::class, "restroterms"]);
    Route::post("terms", [MoreController::class, "temsStore"]);
    Route::post("validity", [MoreController::class, "validityStore"]);
    Route::get("notification", [MoreController::class, "Notification"]);
    Route::post("notification", [MoreController::class, "NotificationStore"]);
    Route::get("user", [MoreController::class, "User"]);

    Route::get("qr-list", [QrController::class, "QrList"]);
    Route::post("qr-link", [QrController::class, "LinkQr"]);

    Route::group(['prefix' => 'coupon', 'as' => 'coupon'], function () {
        Route::get('/', [PassportController::class, 'index']);
        Route::post('/store', [PassportController::class, 'store']);
        Route::get('/{id}', [PassportController::class, 'view']);
        Route::post('/update/{id}', [PassportController::class, 'update']);
        Route::delete('/delete/{id}', [PassportController::class, 'destroy']);
    });
    Route::post('/send-gift', [PassportController::class, 'SendGift']);

    Route::group(['prefix' => 'staff', 'as' => 'staff'], function () {
        Route::get('/', [StaffController::class, 'index']);
        Route::post('/store', [StaffController::class, 'store']);
        Route::get('/{id}', [StaffController::class, 'view']);
        Route::post('/update/{id}', [StaffController::class, 'update']);
        Route::delete('/delete/{id}', [StaffController::class, 'destroy']);
    });

    Route::get('/subscription', [SubscriptionController::class, 'subscription']);
    Route::get('/my-subscription', [SubscriptionController::class, 'mysubscription']);
    Route::get('/history', [SubscriptionController::class, 'purchasehistory']);
    Route::get('/wallet', [SubscriptionController::class, 'wallet']);
    Route::get('/wallet-history', [SubscriptionController::class, 'wallethistory']);
    Route::post("generate-orderno", [SubscriptionController::class, "generateOrderNo"]);
    Route::post("subscribe", [SubscriptionController::class, "subscribe"]);
    Route::post("add-coin", [SubscriptionController::class, "addcoin"]);

    Route::get("redeem-history", [PassportController::class, "RedeemHistory"]);
    Route::get("template-list", [MoreController::class, "templatelist"]);
    Route::post("send-whatsapp", [MoreController::class, "sendwhatsapp"]);

});
