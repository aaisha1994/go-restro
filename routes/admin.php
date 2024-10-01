<?php

use App\Http\Controllers\Admin\AdvertisementController;
use App\Http\Controllers\Admin\AffiliateController;
use App\Http\Controllers\Admin\ApproveController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CmsController;
use App\Http\Controllers\Admin\ComplementaryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DealDayController;
use App\Http\Controllers\Admin\DiscountController;
use App\Http\Controllers\Admin\FacilityController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\GiftController;
use App\Http\Controllers\Admin\OtherController;
use App\Http\Controllers\Admin\PromotionController;
use App\Http\Controllers\Admin\QrController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\RestroController;
use App\Http\Controllers\Admin\SubscriptionController;
use App\Http\Controllers\Admin\RestroSubscriptionController;
use App\Http\Controllers\Admin\SupportController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\SubadminController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [LoginController::class, 'login'])->name('admin.login');
Route::post('/login', [LoginController::class, 'postLogin'])->name('admin.postLogin');
Route::get('/forgot-password', [LoginController::class, 'forgotPassword'])->name('admin.forgotPassword');
Route::post('/forgot-password', [LoginController::class, 'forgotsend'])->name('admin.forgotsend');
Route::get('/reset-password/{token}', [LoginController::class, 'resetPassword'])->name('admin.resetPassword');
Route::post('/reset-password/{token}', [LoginController::class, 'resetsend'])->name('admin.resetsend');

Route::group(['middleware' => ['adminAuth'], 'as' => 'admin.'], function ()
{
    Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::post('/fcm-token', [DashboardController::class, 'updateToken'])->name('fcmToken');
    Route::get('profile', [DashboardController::class, 'profile'])->name('profile');
    Route::post('profile', [DashboardController::class, 'profileupdate'])->name('profile.update');
    Route::post('restro-link/{id}', [DashboardController::class, 'restrolink'])->name('restrolink');
    Route::get('logout', [DashboardController::class, 'logout'])->name('logout');

    Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('/create', [UserController::class, 'create'])->name('create');
        Route::post('/store', [UserController::class, 'store'])->name('store');
        Route::get('/view{id}', [UserController::class, 'view'])->name('view');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [UserController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [UserController::class, 'destroy'])->name('delete');
        Route::post('/status/{id}', [UserController::class, 'status'])->name('status');
        Route::post('/filter/{id}', [UserController::class, 'filter'])->name('filter');
        Route::get('export', [UserController::class, 'export'])->name('export');
    });

    Route::group(['prefix' => 'restro', 'as' => 'restro.'], function () {
        Route::get('/', [RestroController::class, 'index'])->name('index');
        Route::get('/create', [RestroController::class, 'create'])->name('create');
        Route::post('/store', [RestroController::class, 'store'])->name('store');
        Route::get('/view/{id}', [RestroController::class, 'view'])->name('view');
        Route::get('/edit/{id}', [RestroController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [RestroController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [RestroController::class, 'destroy'])->name('delete');
        Route::post('/status/{id}', [RestroController::class, 'status'])->name('status');
        Route::post('/top/{id}', [RestroController::class, 'top'])->name('top');
        Route::get('/login/{id}', [RestroController::class, 'login'])->name('login');
        Route::post('/image/{id}', [RestroController::class, 'image'])->name('image');
        Route::post('/terms/{id}', [RestroController::class, 'terms'])->name('terms');
        Route::get('export', [RestroController::class, 'export'])->name('export');
    });

    Route::group(['prefix' => 'affiliate', 'as' => 'affiliate.'], function () {
        Route::get('/', [AffiliateController::class, 'index'])->name('index');
        Route::get('/create', [AffiliateController::class, 'create'])->name('create');
        Route::post('/store', [AffiliateController::class, 'store'])->name('store');
        Route::get('/view/{id}', [AffiliateController::class, 'view'])->name('view');
        Route::get('/edit/{id}', [AffiliateController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [AffiliateController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [AffiliateController::class, 'destroy'])->name('delete');
        Route::post('/status/{id}', [AffiliateController::class, 'status'])->name('status');
        Route::get('export', [AffiliateController::class, 'export'])->name('export');
    });

    Route::group(['prefix' => 'subadmin', 'as' => 'subadmin.'], function () {
        Route::get('/', [SubadminController::class, 'index'])->name('index');
        Route::get('/create', [SubadminController::class, 'create'])->name('create');
        Route::post('/store', [SubadminController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [SubadminController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [SubadminController::class, 'update'])->name('update');
        Route::get('/view/{id}', [SubadminController::class, 'view'])->name('view');
        Route::delete('/delete/{id}', [SubadminController::class, 'destroy'])->name('delete');
        Route::get('export', [SubadminController::class, 'export'])->name('export');
    });

    Route::get('affiliate-payment', [AffiliateController::class, 'payment'])->name('affiliate.payment');
    Route::post('affiliate-payment/{id}', [AffiliateController::class, 'paymentchange'])->name('affiliate.payment.change');

    Route::get('leader-board', [OtherController::class, 'LeaderBoard'])->name('leaderboard.index');
    Route::get('utm-campaign', [OtherController::class, 'UtmCampaign'])->name('utmcampaign.index');
    Route::get('utm-campaign/create', [OtherController::class, 'UtmCampaignCreate'])->name('utmcampaign.create');
    Route::post('utm-campaign/create', [OtherController::class, 'UtmCampaignStore'])->name('utmcampaign.store');
    Route::delete('utm-campaign/delete/{id}', [OtherController::class, 'UtmCampaignDelete'])->name('utmcampaign.delete');
    Route::get('user-segment', [OtherController::class, 'UserSegment'])->name('usersegment.index');

    Route::group(['prefix' => 'restro-offer', 'as' => 'coupon.'], function () {
        Route::get('/', [CouponController::class, 'index'])->name('index');
        Route::get('/create', [CouponController::class, 'create'])->name('create');
        Route::post('/store', [CouponController::class, 'store'])->name('store');
        Route::get('/{id}', [CouponController::class, 'view'])->name('view');
        Route::get('/edit/{id}', [CouponController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [CouponController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [CouponController::class, 'destroy'])->name('delete');
    });

    Route::group(['prefix' => 'approve-reject', 'as' => 'approve.'], function () {
        Route::get('/', [ApproveController::class, 'index'])->name('index');
        Route::get('/{id}', [ApproveController::class, 'view'])->name('view');
        Route::post('/approve/{id}', [ApproveController::class, 'approve'])->name('approve');
        Route::get('/reject/{id}', [ApproveController::class, 'reject'])->name('reject');
    });

    Route::group(['prefix' => 'qr-management', 'as' => 'qr.'], function () {
        Route::get('/', [QrController::class, 'index'])->name('index');
        Route::get('/create', [QrController::class, 'create'])->name('create');
        Route::post('/store', [QrController::class, 'store'])->name('store');
        Route::get('/view/{id}', [QrController::class, 'view'])->name('view');
        // Route::get('/export/{id}', [QrController::class, 'export'])->name('export');
    });

    Route::group(['prefix' => 'dynamic-discount', 'as' => 'discount.'], function () {
        Route::get('/', [DiscountController::class, 'index'])->name('index');
        Route::get('/create', [DiscountController::class, 'create'])->name('create');
        Route::post('/store', [DiscountController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [DiscountController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [DiscountController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [DiscountController::class, 'destroy'])->name('delete');
    });

    Route::group(['prefix' => 'advertisement', 'as' => 'advertisement.'], function () {
        Route::get('/', [AdvertisementController::class, 'index'])->name('index');
        Route::get('/create', [AdvertisementController::class, 'create'])->name('create');
        Route::post('/store', [AdvertisementController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [AdvertisementController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [AdvertisementController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [AdvertisementController::class, 'destroy'])->name('delete');
    });

    Route::group(['prefix' => 'category', 'as' => 'category.'], function () {
        Route::get('/', [CategoryController::class, 'index'])->name('index');
        Route::get('/create', [CategoryController::class, 'create'])->name('create');
        Route::post('/store', [CategoryController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [CategoryController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [CategoryController::class, 'destroy'])->name('delete');
    });

    Route::group(['prefix' => 'promotion', 'as' => 'promotion.'], function () {
        Route::get('/', [PromotionController::class, 'index'])->name('index');
        Route::get('/create', [PromotionController::class, 'create'])->name('create');
        Route::post('/store', [PromotionController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [PromotionController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [PromotionController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [PromotionController::class, 'destroy'])->name('delete');
        Route::get('/coupon/{id}', [PromotionController::class, 'coupon'])->name('coupon');
    });

    Route::group(['prefix' => 'notification', 'as' => 'notification.'], function () { // partial
        Route::get('/', [NotificationController::class, 'index'])->name('index');
        Route::get('/create', [NotificationController::class, 'create'])->name('create');
        Route::post('/store', [NotificationController::class, 'store'])->name('store');
        Route::delete('/delete/{id}', [NotificationController::class, 'destroy'])->name('delete');
    });

    Route::group(['prefix' => 'facility', 'as' => 'facility.'], function () {
        Route::get('/', [FacilityController::class, 'index'])->name('index');
        Route::get('/create', [FacilityController::class, 'create'])->name('create');
        Route::post('/store', [FacilityController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [FacilityController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [FacilityController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [FacilityController::class, 'destroy'])->name('delete');
    });

    Route::group(['prefix' => 'complementary', 'as' => 'complementary.'], function () {
        Route::get('/', [ComplementaryController::class, 'index'])->name('index');
        Route::get('/create', [ComplementaryController::class, 'create'])->name('create');
        Route::post('/store', [ComplementaryController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [ComplementaryController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [ComplementaryController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [ComplementaryController::class, 'destroy'])->name('delete');
    });

    Route::get('/affiliate-commission', [OtherController::class, 'commission'])->name('commission.index');
    Route::post('/affiliate-commission', [OtherController::class, 'commissionstore'])->name('commission.store');
    Route::get('/refer-earn', [OtherController::class, 'refer'])->name('refer.index');
    Route::post('/refer-earn', [OtherController::class, 'referstore'])->name('refer.store');
    Route::get('/inquiry', [OtherController::class, 'inquiry'])->name('inquiry.index');

    Route::group(['prefix' => 'deal-of-the-day', 'as' => 'dealday.'], function () {
        Route::get('/', [DealDayController::class, 'index'])->name('index');
        Route::get('/create', [DealDayController::class, 'create'])->name('create');
        Route::post('/store', [DealDayController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [DealDayController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [DealDayController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [DealDayController::class, 'destroy'])->name('delete');
        Route::get('/coupon/{id}', [DealDayController::class, 'coupon'])->name('coupon');
    });

    Route::group(['prefix' => 'subscription', 'as' => 'subscription.'], function () {
        Route::get('/', [SubscriptionController::class, 'index'])->name('index');
        Route::get('/create', [SubscriptionController::class, 'create'])->name('create');
        Route::post('/store', [SubscriptionController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [SubscriptionController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [SubscriptionController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [SubscriptionController::class, 'destroy'])->name('delete');
        Route::get('/history', [SubscriptionController::class, 'history'])->name('history');
        Route::get('/invoice/{id}', [SubscriptionController::class, 'invoice'])->name('invoice');
        Route::delete('/subdelete/{id}', [SubscriptionController::class, 'subdelete'])->name('subdelete');
    });

    Route::group(['prefix' => 'user-passport-history', 'as' => 'userpassport.'], function () {
        Route::get('/', [SubscriptionController::class, 'passporthistory'])->name('passporthistory');
        Route::get('/invoice/{id}', [SubscriptionController::class, 'passportinvoice'])->name('passportinvoice');
    });
    Route::group(['prefix' => 'reports', 'as' => 'reports.'], function () {
        Route::get('/', [ReportController::class, 'index'])->name('index');
    });

    Route::group(['prefix' => 'restrosubscription', 'as' => 'restrosubscription.'], function () {
        Route::get('/', [RestroSubscriptionController::class, 'index'])->name('index');
        Route::get('/create', [RestroSubscriptionController::class, 'create'])->name('create');
        Route::post('/store', [RestroSubscriptionController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [RestroSubscriptionController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [RestroSubscriptionController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [RestroSubscriptionController::class, 'destroy'])->name('delete');
        Route::get('/history', [RestroSubscriptionController::class, 'history'])->name('history');
        Route::get('/invoice/{id}', [RestroSubscriptionController::class, 'invoice'])->name('invoice');
    });

    Route::group(['prefix' => 'send-gift', 'as' => 'gift.'], function () { //
        Route::get('/', [GiftController::class, 'index'])->name('index');
        Route::get('/create', [GiftController::class, 'create'])->name('create');
        Route::post('/store', [GiftController::class, 'store'])->name('store');
    });

    Route::group(['prefix' => 'customer-support', 'as' => 'support.'], function () {
        Route::get('/', [SupportController::class, 'index'])->name('index');
        Route::get('/{id}', [SupportController::class, 'view'])->name('view');
        Route::put('/{id}', [SupportController::class, 'store'])->name('store');
    });

    Route::group(['prefix' => 'cms', 'as' => 'cms.'], function () {
        Route::get('/terms-condition', [CmsController::class, 'terms'])->name('terms.index');
        Route::post('/terms-condition', [CmsController::class, 'termsstore'])->name('terms.store');
        Route::get('/privacy-policy', [CmsController::class, 'privacy'])->name('privacy.index');
        Route::post('/privacy-policy', [CmsController::class, 'privacystore'])->name('privacy.store');
        Route::get('/refund-policy', [CmsController::class, 'refund'])->name('refund.index');
        Route::post('/refund-policy', [CmsController::class, 'refundstore'])->name('refund.store');
        Route::get('/contact-us', [CmsController::class, 'contact'])->name('contact.index');
        Route::post('/contact-us', [CmsController::class, 'contactstore'])->name('contact.store');
    });

    Route::group(['prefix' => 'faq', 'as' => 'faq.'], function () {
        Route::get('/', [CmsController::class, 'index'])->name('index');
        Route::get('/create', [CmsController::class, 'create'])->name('create');
        Route::post('/store', [CmsController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [CmsController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [CmsController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [CmsController::class, 'destroy'])->name('delete');
    });

    Route::get('/restrosales/{id}', [DashboardController::class, 'restrosales'])->name('restrosales');

});
