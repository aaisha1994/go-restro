<?php

namespace App\Http\Controllers\USerApi;

use App\Http\Controllers\Controller;
use App\Models\Affiliate;
use App\Models\AffiliateCommission;
use App\Models\Cms;
use App\Models\Coupon;
use App\Models\Faq;
use App\Models\Notification;
use App\Models\NotificationList;
use App\Models\Passport;
use App\Models\QrGenerate;
use App\Models\ReferEarn;
use App\Models\Restaurant;
use App\Models\Subscription;
use App\Models\SubscriptionPromo;
use App\Models\Support;
use App\Models\Transaction;
use App\Models\User;
use App\Models\UserCoupon;
use App\Models\Wallet;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class MoreController extends Controller
{
    public function Support()
    {
        try {
            $User = Auth::guard('userapi')->user();
            $Support = Support::where('user_id', $User->id)->where('account_type', 1)->orderBy('id','desc')->get();
            return response()->json(['success' => true, 'data' => ['result' => $Support, 'message' => 'success.']], 200);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => $e->getMessage()]], 422);
        }
    }

    public function SupportStore(Request $request)
    {
        try {
            $User = Auth::guard('userapi')->user();
            $validator = Validator::make($request->all(),[
                'subject' => ['required'],
                'message' => ['required'],
            ]);
            if($validator->fails()){
                $messages = $validator->getMessageBag();
                return response()->json(['success' => false, 'error' => ['message' => 'Validation Error', 'error_message' => $messages]], 422);
            }

            $Support = Support::create([
                'subject' => $request->subject,
                'message' => $request->message,
                'account_type' => 1,
                'user_id' => $User->id,
                'status' => 0
            ]);
            return response()->json(['success' => true, 'data' => ['result' => $Support, 'message' => 'success.']], 200);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => $e->getMessage()]], 422);
        }
    }

    public function terms()
    {
        try {
            $User = Cms::where('type',1)->first();
            return response()->json(['success' => true, 'data' => ['result' => $User, 'message' => 'success.']], 200);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => $e->getMessage()]], 422);
        }
    }

    public function policy()
    {
        try {
            $User = Cms::where('type',2)->first();
            return response()->json(['success' => true, 'data' => ['result' => $User, 'message' => 'success.']], 200);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => $e->getMessage()]], 422);
        }
    }

    public function refund()
    {
        try {
            $User = Cms::where('type',3)->first();
            return response()->json(['success' => true, 'data' => ['result' => $User, 'message' => 'success.']], 200);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => $e->getMessage()]], 422);
        }
    }

    public function faq()
    {
        try {
            $User = Faq::where('type',1)->get();
            return response()->json(['success' => true, 'data' => ['result' => $User, 'message' => 'success.']], 200);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => $e->getMessage()]], 422);
        }
    }

    public function Notification()
    {
        try {
            $User = Auth::guard('userapi')->user();
            $NotificationList = NotificationList::where('user_id',$User->id)->orderBy('id', 'desc')->get();
            return response()->json(['success' => true, 'data' => ['result' => $NotificationList, 'message' => 'success.']], 200);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => $e->getMessage()]], 422);
        }
    }

    public function NotificationStore(Request $request)
    {
        try {
            $validator = Validator::make($request->all(),[
                'notification_id' => ['required'],
            ]);
            if($validator->fails()){
                $messages = $validator->getMessageBag();
                return response()->json(['success' => false, 'error' => ['message' => 'Validation Error', 'error_message' => $messages]], 422);
            }

            NotificationList::find($request->notification_id)->update([
                'status' => 1
            ]);
            return response()->json(['success' => true, 'data' => ['result' => [], 'message' => 'success.']], 200);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => $e->getMessage()]], 422);
        }
    }

    public function NotificationDelete($id)
    {
        try {
            Notification::find($id)->delete();
            return response()->json(['success' => true, 'data' => ['result' => [], 'message' => 'success.']], 200);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => $e->getMessage()]], 422);
        }
    }

    public function subscriptionlist()
    {
        try {
            $Subscription = Subscription::where('status', 1)->orderBy('id', 'desc')->get();
            return response()->json(['success' => true, 'data' => ['result' => $Subscription, 'message' => 'success.']], 200);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => $e->getMessage()]], 422);
        }
    }

    public function ChkOffer(Request $request)
    {
        try {
            $validator = Validator::make($request->all(),[
                'promo_code' => ['required'],
                'subscription_id' => ['required'],
            ]);
            if($validator->fails()){
                $messages = $validator->getMessageBag();
                return response()->json(['success' => false, 'error' => ['message' => 'Validation Error', 'error_message' => $messages]], 422);
            }

            $SubscriptionPromo = SubscriptionPromo::where('subscription_id', $request->subscription_id)->where('promo_code',$request->promo_code)->first();
            if($SubscriptionPromo) {
                $Subscription = Subscription::find($request->subscription_id);
                $Amount = $Subscription->amount;
                $subAmount = $Amount - (($Amount * $SubscriptionPromo->discount)/100);
                return response()->json(['success' => true, 'data' => ['result' => $SubscriptionPromo, 'Amount'=> $subAmount, 'message' => 'success.']], 200);
            } else {
                return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => 'Promo Code not available']], 422);
            }
        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => $e->getMessage()]], 422);
        }
    }

    public function generateOrderNo(Request $request)
    {
        try {
            $User = Auth::guard('userapi')->user();
            $type = $request->tr_type;
            $v_GroupCode = 'GR'. date('y');

            $v_StartNo1 = DB::select("SELECT
                CONCAT('$v_GroupCode', LPAD(CAST(MAX(RIGHT(order_no, 3)) + 1 AS CHAR), 3, '0')) AS MaxNumber
                FROM transactions where order_no LIKE '$v_GroupCode%'");
            $OrderNo = $v_StartNo1[0]->MaxNumber != null ? $v_StartNo1[0]->MaxNumber : 0;
            if($v_StartNo1[0]->MaxNumber == null){
                $OrderNo = $v_GroupCode.'0001';
            }
            // $OrderNo = 'GR240001';
            $Transaction = Transaction::create([
                'user_id' => $User->id,
                'order_no' => $OrderNo,
                'amount' => $request->amount,
                'tr_type' => $type,
                'status' => 0,
            ]);
            return response()->json(['success' => true, 'data' => ['result' => $Transaction, 'message' => 'success.']], 200);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => $e->getMessage()]], 422);
        }
    }

    public function subscribe(Request $request)
    {
        try {
            $User = Auth::guard('userapi')->user();
            if($User->ref_by != null) {

                $Aff = QrGenerate::where('qr_code', $User->ref_by)->whereNull('restro_id')->where('type', 2)->where('status', 1)->first();
                if($Aff) {
                    $Affiliate = Affiliate::find($Aff->affiliate_id);
                    if($Affiliate->commission_type == 2){
                        $amount = 0;
                        $Commissions = AffiliateCommission::where('status', 1)->get();
                        $Wallets = Wallet::where('user_id', $User->id)->where('affiliate_id', $Affiliate->id)->first();
                        if(!$Wallets) {
                            foreach ($Commissions as $key => $Commission) {
                                if($Commission->type == 1 && $Affiliate->affiliate_type == 1) {
                                    $amount = $Commission->per_purchase;
                                }
                                if($Commission->type == 2 && $Affiliate->affiliate_type == 2) {
                                    $amount = $Commission->per_purchase;
                                }
                            }
                        }
                        if($Affiliate->affiliate_type == 3) {
                            if(!$Wallets || $Affiliate->commission == 2) {
                                $amount = round(($request->amount * $Affiliate->amount) / 100, 0);
                            }
                        }
                        if($amount > 0) {
                            $Wallet = $Affiliate->wallet + $amount;
                            $Users = Affiliate::find($Affiliate->id);
                            Wallet::create([
                                'affiliate_id' => $Affiliate->id,
                                'user_id'  => $User->id,
                                'amount'  => $amount,
                                'status' => 1,
                                'type' => 1
                            ]);
                            $Users->Wallet = $Wallet;
                            $Users->save();
                        }
                    }
                }
            }

            $validator = Validator::make($request->all(),[
                'subscription_id' => ['required'],
                'order_no' => ['required'],
                'amount' => ['required'],
            ]);
            if($validator->fails()){
                $messages = $validator->getMessageBag();
                return response()->json(['success' => false, 'error' => ['message' => 'Validation Error', 'error_message' => $messages]], 422);
            }
            $Subscription = Subscription::find($request->subscription_id);
            Transaction::find($request->id)->update([
                'user_id' => $User->id,
                'subscription_id' => $request->subscription_id,
                'transaction_id' => $request->transaction_id ?? null,
                'order_no' => $request->order_no,
                'amount' => $request->amount,
                'ref_amount' => $request->ref_amount,
                'ref_code' => $request->promo_code,
                'tr_type' => 2,
                'status' => $request->status,
            ]);
            if($request->status == 1){
                $startdate = date('y-m-d');
                $enddate = date('Y-m-d', strtotime("+". $Subscription->tenure_day ." day", strtotime($startdate)));

                if($User->ref_by != null) {
                    $Users = User::where('ref_code', $User->ref_by)->first();
                    if($Users) {
                        $Wallets = Wallet::where('user_id', $Users->id)->where('ref_id', $User->id)->first();
                        if(!$Wallets){
                            $Wallet = $Users->wallet;
                            $ReferEarn = ReferEarn::find(1);
                            $Wallet = $Wallet + $ReferEarn->coin_per_ref;

                            Wallet::create([
                                'user_id' => $Users->id,
                                'ref_id'  => $User->id,
                                'amount'  => $ReferEarn->coin_per_ref,
                                'status' => 1,
                                'type' => 1
                            ]);
                            $Users->Wallet = $Wallet;
                            $Users->save();
                        }
                    }
                }
                User::find($User->id)->update([
                    'subscription_status' => 1,
                    'expire_date' => $enddate,
                ]);
                $MyPassport = Passport::where('user_id', $User->id)->where('status',1)->get();
                foreach ($MyPassport as $key => $Passport) {
                    $UserCoupon = UserCoupon::where('passport_id', $Passport->id)->where('user_id', $User->id)->whereNull('gift_id')->update([
                        'status' => 2,
                        'end_date' => $startdate
                    ]);
                    $Coupon = Coupon::where('restro_id', $Passport->restro_id)->where('status' ,1)->get();
                    foreach($Coupon as $key => $val) {
                        if($User) {
                            $UserCoupon = new UserCoupon();
                            $UserCoupon->coupon_id = $val->id;
                            $UserCoupon->user_id = $User->id;
                            $UserCoupon->passport_id = $Passport->id;
                            $UserCoupon->quantity = $val->quantity;
                            $UserCoupon->pending = 0;
                            $UserCoupon->start_date = $startdate;
                            $UserCoupon->end_date = $enddate;
                            $UserCoupon->save();
                        }
                    }
                }
            }
            $User = User::find($User->id);

            // Affiliate Amount
            if($User->ref_by != null) {
                $Aff = QrGenerate::where('qr_code', $request->ref_by)->whereNull('restro_id')->where('type', 2)->where('status', 1)->first();
                if($Aff) {
                    $Affiliate = Affiliate::find($Aff->affiliate_id);
                    if($Affiliate->commission_type == 1){
                        $amount = 0;
                        $Commissions = AffiliateCommission::where('status', 1)->get();
                        foreach ($Commissions as $key => $Commission) {
                            if($Commission->type == 1 && $Affiliate->affiliate_type == 1) {
                                $amount = $Commission->per_purchase;
                            }
                            if($Commission->type == 2 && $Affiliate->affiliate_type == 2) {
                                $amount = $Commission->per_purchase;
                            }
                            if($Commission->type == 2 && $Affiliate->affiliate_type == 3) {
                                $amount = round(($request->amount * $Affiliate->amount)/100);
                            }
                        }
                        if($amount > 0) {
                            $Wallet = $Affiliate->wallet + $amount;
                            $Users = Affiliate::find($Affiliate->id);
                            Wallet::create([
                                'affiliate_id' => $Affiliate->id,
                                'user_id'  => $User->id,
                                'amount'  => $amount,
                                'status' => 1,
                                'type' => 1
                            ]);
                            $Users->Wallet = $Wallet;
                            $Users->save();
                        }
                    }
                }
            }

            // Whatsapp
            if($request->status == 1){
                $to = $User->mobile;
                $recipient_type = "individual";
                $template_name = "membership";
                $language_code = "en_US";
                $parameters = [
                    [
                        "type" => "body",
                        "parameters" => [
                            ["type" => "text", "text" => $User->name],
                            ["type" => "text", "text" => $Subscription->name],
                        ]
                    ]
                ];
                sendWhatsapp($to, $recipient_type, $template_name, $language_code, $parameters);
            }
            // End Whatsapp

            return response()->json(['success' => true, 'data' => ['result' => $User, 'message' => 'success.']], 200);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => $e->getMessage()]], 422);
        }
    }

    public function purrestro(Request $request)
    {
        try {
            $User = Auth::guard('userapi')->user();
            $validator = Validator::make($request->all(),[
                'restro_id' => ['required'],
                'order_no' => ['required'],
                'amount' => ['required'],
            ]);

            if($validator->fails()){
                $messages = $validator->getMessageBag();
                return response()->json(['success' => false, 'error' => ['message' => 'Validation Error', 'error_message' => $messages]], 422);
            }

            $Restro = Restaurant::find($request->restro_id);
            $startdate = date('y-m-d');
            $enddate = date('Y-m-d', strtotime("+". $Restro->validity ." day", strtotime($startdate)));

            $gr_coin = $request->gr_coin ?? 0;
            Transaction::find($request->id)->update([
                'user_id' => $User->id,
                'restro_id' => $Restro->id,
                'transaction_id' => $request->transaction_id ?? null,
                'order_no' => $request->order_no,
                'amount' => $request->amount,
                'gr_coin' => $gr_coin,
                'tr_type' => 1,
                'status' => $request->status,
                'start_date' => $startdate,
                'end_date' => $enddate
            ]);
            if($request->status == 1){
                if($User->ref_by != null) {
                    $Users = User::where('ref_code', $User->ref_by)->first();
                    if($Users) {
                        $Wallets = Wallet::where('user_id', $Users->id)->where('ref_id', $User->id)->first();
                        if(!$Wallets){
                            $Wallet = $Users->wallet;
                            $ReferEarn = ReferEarn::find(1);
                            $Wallet = $Wallet + $ReferEarn->coin_per_ref;

                            Wallet::create([
                                'user_id' => $Users->id,
                                'ref_id'  => $User->id,
                                'amount'  => $ReferEarn->coin_per_ref,
                                'status' => 1,
                                'type' => 1
                            ]);
                            $Users->Wallet = $Wallet;
                            $Users->save();
                        }
                    }
                }
                if($gr_coin > 0) {
                    $Us = User::find($User->id);
                    $Wallet = $Us->wallet;
                    $ReferEarn = ReferEarn::find(1);
                    $Wallet = $Wallet - $gr_coin;

                    Wallet::create([
                        'user_id' => $Us->id,
                        'amount'  => $gr_coin,
                        'status' => 1,
                        'type' => 2
                    ]);
                    $Us->Wallet = $Wallet;
                    $Us->save();
                }

                $gs = 0;
                $ps = Passport::where('restro_id', $Restro->id)->where('user_id', $User->id)->first();
                if($ps) {
                    $gs = 1;
                }
                $Passport = Passport::where('restro_id', $Restro->id)->where('user_id', $User->id)->where('status', 1)->first();
                if(!$Passport) {
                    $Passport = Passport::create([
                        'restro_id' => $Restro->id,
                        'user_id' => $User->id,
                        'status' => 1,
                        'start_date' => $startdate,
                        'end_date' => $enddate,
                        'gift_status' => $gs,
                    ]);
                }
                $UserCoupon = UserCoupon::where('passport_id', $Passport->id)->where('user_id', $User->id)->whereNull('gift_id')->update([
                    'status' => 2,
                    'end_date' => $startdate
                ]);
                $Coupon = Coupon::where('restro_id', $Restro->id)->where('status' ,1)->get();
                foreach($Coupon as $key => $val) {
                    if($User) {
                        $UserCoupon = new UserCoupon();
                        $UserCoupon->coupon_id = $val->id;
                        $UserCoupon->user_id = $User->id;
                        $UserCoupon->passport_id = $Passport->id;
                        $UserCoupon->quantity = $val->quantity;
                        $UserCoupon->pending = 0;
                        $UserCoupon->start_date = $startdate;
                        $UserCoupon->end_date = $enddate;
                        $UserCoupon->save();
                    }
                }
            }

            // Whatsapp
            $to = $User->mobile;
            $recipient_type = "individual";
            $template_name = "purchesed";
            $language_code = "en_GB";
            $parameters = [
                [
                    "type" => "body",
                    "parameters" => [
                        ["type" => "text", "text" => $Restro->name],
                        ["type" => "text", "text" => $Restro->name],
                        ["type" => "text", "text" => date('d M, Y', strtotime($enddate))],
                    ]
                ]
            ];
            sendWhatsapp($to, $recipient_type, $template_name, $language_code, $parameters);
            // End Whatsapp

            return response()->json(['success' => true, 'data' => ['result' => $User, 'message' => 'success.']], 200);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => $e->getMessage()]], 422);
        }
    }

    public function history() {
        try {
            $User = Auth::guard('userapi')->user();
            $result = Transaction::with(['Subscription','Restro:id,name'])->where('status','<>', 0)->where('user_id', $User->id)->orderBy('id', 'desc')->get();
            return response()->json(['success' => true, 'data' => ['result' => $result, 'message' => 'success.']], 200);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => $e->getMessage()]], 422);
        }
    }

    public function MySubscription() {
        try {
            $User = Auth::guard('userapi')->user();
            $result = Transaction::with(['Subscription','User:id,expire_date,subscription_status'])->where('user_id', $User->id)->where('status', 1)->where('tr_type', 2)->orderBy('id', 'desc')->first();
            return response()->json(['success' => true, 'data' => ['result' => $result, 'message' => 'success.']], 200);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => $e->getMessage()]], 422);
        }
    }
}
