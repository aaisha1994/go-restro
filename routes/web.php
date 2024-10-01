<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\WebController;
use App\Http\Controllers\Web\RazorpayController;

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

Route::get('invite/{token}', [WebController::class, 'verifyemail'])->name('email.varify');
Route::get('invites/{token}', [WebController::class, 'verifyemails'])->name('email.varifies');


Route::get('/user-terms', [WebController::class, 'terms'])->name('user.terms');
Route::get('/user-policy', [WebController::class, 'privacy'])->name('user.privacy');



Route::get('/razorpayment', [RazorpayController::class, 'razorpayment'])->name('razorpayment');
Route::post('/webpaymentstore', [RazorpayController::class, 'webpaymentstore'])->name('user.webpaymentstore');
Route::get('/payment-thank-you/{id}', [RazorpayController::class, 'ThankYou'])->name('payment-thank-you');

// Website
Route::controller(WebController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/partner-with-us', 'AddRestaurant')->name('add.restaurant');
    Route::get('/contact-us', 'contactus')->name('contact-us');
    Route::get('/contact-support', 'contactSupport')->name('contact-support');
    Route::get('/privacy-policy', 'PrivacyPolicy')->name('privacy-policy');
    Route::get('/terms-condition', 'TermsCondition')->name('terms-condition');
    Route::get('/refund-cancellation', 'RefundCancellation')->name('refund-cancellation');
    Route::post('/inquiry', 'SendInquiry')->name('inquiry');
    Route::post('/support', 'sendSupport')->name('support');
});




// Route::get('login', [MasterAdminController::class, 'login'])->name('login');
// Route::get('reset-password', [MasterAdminController::class, 'ResetPassword'])->name('reset-password');
// Route::get('profile', [MasterAdminController::class, 'Profile'])->name('profile');

// Route::get('/', [MasterAdminController::class, 'index'])->name('index');
// Route::get('/admin-giftsend', [MasterAdminController::class, 'AdminGiftsend'])->name('admin-giftsend');

// Admin User Segment Chart
// Route::get('user-segment', [MasterAdminController::class, 'UserSegment'])->name('user-segment');

//users
// Route::get('/users', [MasterAdminController::class, 'Users'])->name('users');
// Route::get('/create', [MasterAdminController::class, 'create'])->name('create');
// Route::get('/view-details', [MasterAdminController::class, 'ViewDetails'])->name('view-details');
// Route::get('/edit', [MasterAdminController::class, 'Edit'])->name('edit');

//restros
// Route::get('/restros-list', [MasterAdminController::class, 'RestrosList'])->name('restros-list');
// Route::get('/restros-create', [MasterAdminController::class, 'RestrosCreate'])->name('restros-create');
// Route::get('/restros-details', [MasterAdminController::class, 'RestrosDetails'])->name('restros-details');
// Route::get('/restros-edit', [MasterAdminController::class, 'RestrosEdit'])->name('restros-edit');

//affiliate
// Route::get('/affiliate-list', [MasterAdminController::class, 'AffiliateList'])->name('affiliate-list');
// Route::get('/affiliate-create', [MasterAdminController::class, 'AffiliateCreate'])->name('affiliate-create');
// Route::get('/affiliate-details', [MasterAdminController::class, 'AffiliatDetails'])->name('affiliate-details');
// Route::get('/affiliate-edit', [MasterAdminController::class, 'AffiliatEdit'])->name('affiliate-edit');

//Sub Admin
// Route::get('/subadmin-list', [MasterAdminController::class, 'SubAdminList'])->name('subadmin-list');

// Restro coupon Offer
// Route::get('/restro-offer-list', [RestroCouponOfferController::class, 'index'])->name('restro-offer-list');
// Route::get('/restro-offer-create', [RestroCouponOfferController::class, 'Create'])->name('restro-offer-create');
// Route::get('/restro-offer-details', [RestroCouponOfferController::class, 'ViewDetails'])->name('restro-offer-details');
// Route::get('/restro-offer-edit', [RestroCouponOfferController::class, 'Edit'])->name('restro-offer-edit');

//Approve & Reject Restro

// Route::get('/approve-reject-post', [ApproveRejectRestroController::class, 'index'])->name('approve-reject-post');
// Route::get('/approve-reject-details', [ApproveRejectRestroController::class, 'ViewDetails'])->name('approve-reject-details');

// QR Management

// Route::get('/qr-management', [QrManagementController::class, 'index'])->name('qr-management');
// Route::get('/qr-create', [QrManagementController::class, 'Create'])->name('qr-create');
// Route::get('/qr-details', [QrManagementController::class, 'ViewDetails'])->name('qr-details');

// Subscription

// Route::get('/subscription', [SubscriptionController::class, 'index'])->name('subscription');
// Route::get('/subscription-create', [SubscriptionController::class, 'Create'])->name('subscription-create');
// Route::get('/subscription-edit', [SubscriptionController::class, 'Edit'])->name('subscription-edit');
// Route::get('/subscription-history', [SubscriptionController::class, 'SubscriptionHistory'])->name('subscription-history');
// Route::get('/user-passport-history', [SubscriptionController::class, 'UserPassportHistory'])->name('user-passport-history');

// Payment

// Route::get('/subscription-payment', [PaymentController::class, 'SubscriptionPayment'])->name('subscription-payment');
// Route::get('/affiliate-payment', [PaymentController::class, 'AffiliatePayment'])->name('affiliate-payment');

// Dynamic Discount

// Route::get('/dynamic-discount', [PaymentController::class, 'DynamicDiscount'])->name('dynamic-discount');
// Route::get('/dynamic-discount-create', [PaymentController::class, 'DiscountCreate'])->name('dynamic-discount-create');
// Route::get('/dynamic-discount-edit', [PaymentController::class, 'DiscountEdit'])->name('dynamic-discount-edit');

// Reports

// Route::get('/reports', [MasterAdminController::class, 'Reports'])->name('reports');

// Customer Support
// Route::get('/customer-support', [CustomerSupportController::class, 'CustomerSupport'])->name('customer-support');
// Route::get('/customer-support-view', [CustomerSupportController::class, 'ViewDetails'])->name('customer-support-view');

// Masters

//category
// Route::get('/category-master', [MastersController::class, 'index'])->name('category-master');
// Route::get('/category-create', [MastersController::class, 'Create'])->name('category-create');
// Route::get('/category-edit', [MastersController::class, 'Edit'])->name('category-edit');

//promotion master
// Route::get('/promotion-master', [MastersController::class, 'PromotionList'])->name('promotion-master');
// Route::get('/promotion-create', [MastersController::class, 'PromotionCreate'])->name('promotion-create');
// Route::get('/promotion-edit', [MastersController::class, 'PromotionEdit'])->name('promotion-edit');

//Notification Master
// Route::get('/notification-master', [MastersController::class, 'NotificationList'])->name('notification-master');
// Route::get('/notification-create', [MastersController::class, 'NotificationCreate'])->name('notification-create');
// Route::get('/notification-edit', [MastersController::class, 'NotificationEdit'])->name('notification-edit');

//Deal Of the Day Master
// Route::get('/dealoftheday-master', [MastersController::class, 'DealofthedayList'])->name('dealoftheday-master');
// Route::get('/dealoftheday-create', [MastersController::class, 'DealofthedayCreate'])->name('dealoftheday-create');
// Route::get('/dealoftheday-edit', [MastersController::class, 'DealofthedayEdit'])->name('dealoftheday-edit');

//Facilities  Master
// Route::get('/facilities-master', [MastersController::class, 'FacilitiesList'])->name('facilities-master');
// Route::get('/facilities-create', [MastersController::class, 'FacilitiesCreate'])->name('facilities-create');
// Route::get('/facilities-edit', [MastersController::class, 'FacilitiesEdit'])->name('facilities-edit');

//Complementary Master
// Route::get('/complementary-master', [MastersController::class, 'ComplementaryList'])->name('complementary-master');
// Route::get('/complementary-create', [MastersController::class, 'ComplementaryCreate'])->name('complementary-create');
// Route::get('/complementary-edit', [MastersController::class, 'ComplementaryEdit'])->name('complementary-edit');

//Advertisement Master
// Route::get('/advertisement-master', [MastersController::class, 'AdvertisementList'])->name('advertisement-master');
// Route::get('/advertisement-create', [MastersController::class, 'AdvertisementCreate'])->name('advertisement-create');
// Route::get('/advertisement-edit', [MastersController::class, 'AdvertisementEdit'])->name('advertisement-edit');

//Refer and Earn Master
// Route::get('/referandearn-master', [MastersController::class, 'ReferAndEarnList'])->name('referandearn-master');
// Route::get('/referandearn-create', [MastersController::class, 'ReferAndEarnCreate'])->name('referandearn-create');
// Route::get('/referandearn-edit', [MastersController::class, 'ReferAndEarnEdit'])->name('referandearn-edit');

//Affiliate Commission Master
// Route::get('/affiliate-commission', [MastersController::class, 'AffiliateCommission'])->name('affiliate-commission');

// Leader Board
// Route::get('/leader-board', [MastersController::class, 'LeaderBoard'])->name('leader-board');

// Utm Campaign
// Route::get('/utm-campaign', [MastersController::class, 'UtmCampaign'])->name('utm-campaign');
// Route::get('/utm-create', [MastersController::class, 'UtmCreate'])->name('utm-create');

// CMS
// Route::get('/terms-condition', [CmsController::class, 'TermsCondition'])->name('terms-condition');
// Route::get('/refund-policy', [CmsController::class, 'RefundPolicy'])->name('refund-policy');

//FAQs
// Route::get('/faqs-list', [CmsController::class, 'FaqsList'])->name('faqs-list');
// Route::get('/faqs-create', [CmsController::class, 'FaqsCreate'])->name('faqs-create');
// Route::get('/faqs-edit', [CmsController::class, 'FaqsEdit'])->name('faqs-edit');
// Route::get('/contact', [CmsController::class, 'contact'])->name('contact');
