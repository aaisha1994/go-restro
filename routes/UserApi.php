<?php

use App\Http\Controllers\UserApi\LoginController;
use App\Http\Controllers\UserApi\MoreController;
use App\Http\Controllers\UserApi\OtherController;
use App\Http\Controllers\UserApi\PassportController;
use Illuminate\Support\Facades\Route;

Route::post('register', [LoginController::class, 'Register']);
Route::post('login', [LoginController::class, 'Login']);
Route::post('otp-verify', [LoginController::class, 'OtpVerify']);

Route::get("terms-condition", [MoreController::class, "terms"]);
Route::get("privacy-policy", [MoreController::class, "policy"]);
Route::get("refund-policy", [MoreController::class, "refund"]);
Route::get("faq", [MoreController::class, "faq"]);

Route::get('category', [OtherController::class, 'category']);
Route::get('facility', [OtherController::class, 'Facility']);
Route::get('contact-us', [OtherController::class, 'ContactUs']);

Route::group(['middleware' => ['userApi'], 'as' => 'user'], function (){
    Route::get("profile", [LoginController::class, "Profile"]);
    Route::post("logout", [LoginController::class, "Logout"]);
    Route::post("profile", [LoginController::class, "UpdateProfile"]);
    Route::post("profile-image", [LoginController::class, "UpdateImage"]);

    Route::post("dashboard", [OtherController::class, "dashboard"]);
    Route::get("advertisement", [OtherController::class, "Advertisement"]);
    Route::post("restro", [OtherController::class, "restro"]);
    Route::post("nearby", [OtherController::class, "nearby"]);
    Route::get("all-restro", [OtherController::class, "AllRestro"]);
    Route::get("restro/{id}", [OtherController::class, "restroview"]);
    Route::delete("delete-account", [OtherController::class, "DeleteAccount"]);
    Route::get("wallet", [OtherController::class, "wallet"]);
    Route::get("earning-list", [OtherController::class, "earningList"]);

    Route::get("support", [MoreController::class, "Support"]);
    Route::post("support", [MoreController::class, "SupportStore"]);
    Route::get("notification", [MoreController::class, "Notification"]);
    Route::post("notification", [MoreController::class, "NotificationStore"]);
    Route::delete("notification/{id}", [MoreController::class, "NotificationDelete"]);

    Route::get("subscription", [MoreController::class, "subscriptionlist"]);
    Route::post("check-offer", [MoreController::class, "ChkOffer"]);
    Route::post("generate-orderno", [MoreController::class, "generateOrderNo"]);
    Route::post("subscribe", [MoreController::class, "subscribe"]);
    Route::post("purchase-restro", [MoreController::class, "purrestro"]);
    Route::get("history", [MoreController::class, "history"]);
    Route::get("my-subscription", [MoreController::class, "MySubscription"]);

    Route::post("add-passport", [PassportController::class, "AddMyPassport"]);
    Route::get("my-passport", [PassportController::class, "MyPassport"]);
    Route::get("my-passport/{id}", [PassportController::class, "MyPassportCoupon"]);
    Route::post("redeem", [PassportController::class, "RedeemCoupon"]);
    Route::get("redeem-history", [PassportController::class, "RedeemHistory"]);
    Route::post("send-gift", [PassportController::class, "sendGift"]);
    Route::get("favorite", [PassportController::class, "favorite"]);
    Route::post("favorite", [PassportController::class, "favoriteStore"]);
    Route::get("discount", [PassportController::class, "discount"]);
});
