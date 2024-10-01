<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Restaurant\RestaurantAdminController;
use App\Http\Controllers\Restaurant\RestaurantProfileController;
use App\Http\Controllers\Restaurant\AffiliateController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// Route::get('/restaurant-login', [RestaurantAdminController::class, 'login'])->name('sign-in');
// Route::get('/restaurant-registration', [RestaurantAdminController::class, 'SignUp'])->name('sign-up');
// Route::get('/restaurant-forgot-password', [RestaurantAdminController::class, 'PasswordReset'])->name('password-reset');
// Route::get('/restaurant-nsetup-new-password', [RestaurantAdminController::class, 'NewPassword'])->name('new-password');

// Route::get('/restaurant-dashboard', [RestaurantAdminController::class, 'index'])->name('dashboard');
// Route::get('/restaurant-passport', [RestaurantAdminController::class, 'Passport'])->name('passport');
// Route::get('/create-passport', [RestaurantAdminController::class, 'AddPassport'])->name('add-passport');
// Route::get('/restaurant-users', [RestaurantAdminController::class, 'RestroUsers'])->name('restro-users');
// Route::get('/send-gift', [RestaurantAdminController::class, 'SendGift'])->name('send-gift');
// Route::get('/restaurant-qr', [RestaurantAdminController::class, 'RestroQr'])->name('restro-qr');
// Route::get('/restaurant-qr-invites', [RestaurantAdminController::class, 'RestroQrinvites'])->name('restro-qr-invites');

// Route::get('/profile-overview', [RestaurantProfileController::class, 'AccountOverview'])->name('account-overview');
// Route::get('/profile-edit', [RestaurantProfileController::class, 'AccountSettings'])->name('account-settings');
// Route::get('/user-allocation', [RestaurantProfileController::class, 'UserAllocation'])->name('account-user-allocation');
// Route::get('/change-password', [RestaurantProfileController::class, 'ChangePassword'])->name('account-change-password');
// Route::get('/contact-us', [RestaurantProfileController::class, 'Contactus'])->name('account-contactus');
// Route::get('/support', [RestaurantProfileController::class, 'Support'])->name('account-support');
// Route::get('/faqs', [RestaurantProfileController::class, 'Faqs'])->name('account-faqs');
// Route::get('/privacy-policy', [RestaurantProfileController::class, 'PrivacyPolicy'])->name('account-privacy-policy');
// Route::get('/terms-conditions', [RestaurantProfileController::class, 'TermsConditions'])->name('account-terms-conditions');


// Start Affiliate Users

// Route::get('/affiliate-login', [AffiliateController::class, 'login'])->name('affiliate.login');
// Route::get('/affiliate-register', [AffiliateController::class, 'Register'])->name('affiliate.register');
// Route::get('/affiliate-forgotPassword', [AffiliateController::class, 'forgotPassword'])->name('affiliate.forgotPassword');

// Route::get('/affiliate-profile', [AffiliateController::class, 'AffiliateProfile'])->name('affiliate-profile');

// Route::get('/affiliate-dashboard', [AffiliateController::class, 'dashboard'])->name('affiliate-dashboard');
// Route::get('/affiliate-restros', [AffiliateController::class, 'RestrosList'])->name('affiliate-restros');
// Route::get('/create-restro', [AffiliateController::class, 'RestroCreate'])->name('create-restro');
// Route::get('/edit-restro', [AffiliateController::class, 'RestroEdit'])->name('edit-restro');

// // Restro coupon Offer
// Route::get('/affiliate-offer', [AffiliateController::class, 'AffiliateOffer'])->name('affiliate-offer');
// Route::get('/affiliate-offer-create', [AffiliateController::class, 'AffiliateOfferCreate'])->name('affiliate-offer-create');
// Route::get('/affiliate-offer-edit', [AffiliateController::class, 'AffiliateOfferEdit'])->name('affiliate-offer-edit');

// Route::get('/payment-details', [AffiliateController::class, 'PaymentDetails'])->name('payment-details');
// Route::get('/affiliateqr-management', [AffiliateController::class, 'QrManagement'])->name('affiliateqr-management');
// Route::get('/affiliate-sales', [AffiliateController::class, 'AffiliateSales'])->name('affiliate-sales');


// //coming soon
// Route::get('/welcome', function () {
//     return view('welcome');
// });

