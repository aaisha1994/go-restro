<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;
use Exception;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Wallet;
use App\Models\ReferEarn;
use App\Models\Passport;
use App\Models\Restaurant;
use App\Models\UserCoupon;
use App\Models\Coupon;
use App\Models\QrGenerate;
use App\Models\Affiliate;
use App\Models\AffiliateCommission;
use App\Models\Subscription;
use App\Models\RestroSubcription;

class RazorpayController extends Controller
{
    public function razorpayment(Request $request)
    {
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
        $razorkey = env('RAZORPAY_KEY');
        $id = $request->id;
        $amount = $request->amount;
        $grcoin = $request->grcoin;
        $subscriptionid = $request->subscription_id;
        $transaction_type = $request->transaction_type;
        $restro_id = $request->restro_id;

        if ($amount > 0) {

            if ($transaction_type == 1 || $transaction_type == 2) {
                $transaction = Transaction::Join('users', 'users.id', '=', 'transactions.user_id')
                    ->select('transactions.*', 'users.name', 'users.email')
                    ->where('transactions.id', $id)
                    ->first();
            } else {
                $transaction = Transaction::Join('restaurants', 'restaurants.id', '=', 'transactions.restro_id')
                    ->select('transactions.*', 'restaurants.name', 'restaurants.mobile as email')
                    ->where('transactions.id', $id)
                    ->first();
            }

            if ($transaction_type == 1) {
                if ($grcoin) {
                    $data['gr_coin'] = $grcoin;
                }
                $data['amount'] = $amount;
                Transaction::where('id', $id)->update($data);
            } elseif ($transaction_type == 2) {
                if($request->ref_amount){
                    $data['ref_amount'] = $request->ref_amount;
                }

                if($request->promo_code){
                    $data['ref_code'] = $request->promo_code;
                }

                $data['amount'] = $amount;
                $data['subscription_id'] = $subscriptionid;
                Transaction::where('id', $id)->update($data);
            } elseif ($transaction_type == 3) {
                $data['amount'] = $amount;
                $data['restro_subcription_id'] = $subscriptionid;
                Transaction::where('id', $id)->update($data);
            } elseif ($transaction_type == 4) {
                $data['amount'] = $amount;
                Transaction::where('id', $id)->update($data);
            }

            $invoice_no = $transaction->order_no;
            $alltotal = $amount * 100;

            $oid = $api->order->create(array('receipt' => $invoice_no, 'amount' => $alltotal, 'currency' => 'INR'));
            $orderid =  $oid->id;

            return view('web.razor', compact('transaction', 'razorkey', 'orderid', 'subscriptionid','restro_id'));
        }
    }

    public function webpaymentstore(Request $request)
    {
        $input = $request->all();
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
        $payment = $api->payment->fetch($input['razorpay_payment_id']);

        if (count($input) && !empty($input['razorpay_payment_id'])) {
            try {
                $paymentdata =  $api->payment->fetch($input['razorpay_payment_id']);
                $email = $paymentdata['email'];
                $pstatus = $paymentdata['status'];
                $orderno = $input['orderno'];
                $amount = $paymentdata['amount'] / 100;
                $payment_id = $paymentdata['id'];

                $transaction = Transaction::where('order_no', $orderno)->first();

                if ($pstatus == 'captured') {
                    if ($transaction) {
                        $tdata['status'] = 1;
                        $tdata['transaction_id'] = $payment_id;
                        Transaction::where('id', $transaction->id)->update($tdata);

                        if ($transaction->tr_type == 1) {
                            $gr_coin = $transaction->gr_coin;
                            $User = User::where('id', $transaction->user_id)->first();
                            $Restro = Restaurant::find($request->restro_id);

                            $startdate = date('y-m-d');
                            $enddate = date('Y-m-d', strtotime("+" . $Restro->validity . " day", strtotime($startdate)));

                            if ($User->ref_by != null) {
                                $Users = User::where('ref_code', $User->ref_by)->first();
                                if ($Users) {
                                    $Wallets = Wallet::where('user_id', $Users->id)->where('ref_id', $User->id)->first();
                                    if (!$Wallets) {
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
                            if ($gr_coin > 0) {
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
                            if ($ps) {
                                $gs = 1;
                            }
                            $Passport = Passport::where('restro_id', $Restro->id)->where('user_id', $User->id)->where('status', 1)->first();
                            if (!$Passport) {
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
                            $Coupon = Coupon::where('restro_id', $Restro->id)->where('status', 1)->get();
                            foreach ($Coupon as $key => $val) {
                                if ($User) {
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
                        } elseif ($transaction->tr_type == 2) {
                            $User = User::where('id', $transaction->user_id)->first();
                            $Aff = QrGenerate::where('qr_code', $User->ref_by)->whereNull('restro_id')->where('type', 2)->where('status', 1)->first();
                            $Subscription = Subscription::find($request->subscriptionid);
                            if ($Aff) {
                                $Affiliate = Affiliate::find($Aff->affiliate_id);
                                if ($Affiliate->commission_type == 2) {
                                    $amount = 0;
                                    $Commissions = AffiliateCommission::where('status', 1)->get();
                                    $Wallets = Wallet::where('user_id', $User->id)->where('affiliate_id', $Affiliate->id)->first();
                                    if (!$Wallets) {
                                        foreach ($Commissions as $key => $Commission) {
                                            if ($Commission->type == 1 && $Affiliate->affiliate_type == 1) {
                                                $amount = $Commission->per_purchase;
                                            }
                                            if ($Commission->type == 2 && $Affiliate->affiliate_type == 2) {
                                                $amount = $Commission->per_purchase;
                                            }
                                        }
                                    }
                                    if ($Affiliate->affiliate_type == 3) {
                                        if (!$Wallets || $Affiliate->commission == 2) {
                                            $amount = round(($request->amount * $Affiliate->amount) / 100, 0);
                                        }
                                    }
                                    if ($amount > 0) {
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

                            $startdate = date('y-m-d');
                            $enddate = date('Y-m-d', strtotime("+" . $Subscription->tenure_day . " day", strtotime($startdate)));

                            if ($User->ref_by != null) {
                                $Users = User::where('ref_code', $User->ref_by)->first();
                                if ($Users) {
                                    $Wallets = Wallet::where('user_id', $Users->id)->where('ref_id', $User->id)->first();
                                    if (!$Wallets) {
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

                            $MyPassport = Passport::where('user_id', $User->id)->where('status', 1)->get();
                            foreach ($MyPassport as $key => $Passport) {
                                $UserCoupon = UserCoupon::where('passport_id', $Passport->id)->where('user_id', $User->id)->whereNull('gift_id')->update([
                                    'status' => 2,
                                    'end_date' => $startdate
                                ]);
                                $Coupon = Coupon::where('restro_id', $Passport->restro_id)->where('status', 1)->get();
                                foreach ($Coupon as $key => $val) {
                                    if ($User) {
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

                            // Affiliate Amount
                            if ($User->ref_by != null) {
                                $Aff = QrGenerate::where('qr_code', $User->ref_by)->whereNull('restro_id')->where('type', 2)->where('status', 1)->first();
                                if ($Aff) {
                                    $Affiliate = Affiliate::find($Aff->affiliate_id);
                                    if ($Affiliate->commission_type == 1) {
                                        $amount = 0;
                                        $Commissions = AffiliateCommission::where('status', 1)->get();
                                        foreach ($Commissions as $key => $Commission) {
                                            if ($Commission->type == 1 && $Affiliate->affiliate_type == 1) {
                                                $amount = $Commission->per_purchase;
                                            }
                                            if ($Commission->type == 2 && $Affiliate->affiliate_type == 2) {
                                                $amount = $Commission->per_purchase;
                                            }
                                            if ($Commission->type == 2 && $Affiliate->affiliate_type == 3) {
                                                $amount = round(($transaction->amount * $Affiliate->amount) / 100);
                                            }
                                        }
                                        if ($amount > 0) {
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
                        } elseif ($transaction->tr_type == 3) {

                            $Subscription = RestroSubcription::find($request->subscriptionid);
                            $startdate = date('y-m-d');
                            $enddate = date('Y-m-d', strtotime("+365 day", strtotime($startdate)));
                            $Restaurant = Restaurant::find($transaction->restro_id);

                                if ($Subscription->compliment_coin == 1) {
                                    $Restaurant->gr_coin = $Restaurant->gr_coin + $Subscription->gr_coin;
                                }
                                $Restaurant->subscription_status = 1;
                                $Restaurant->expire_date = $enddate;
                                $Restaurant->gift_send = $Subscription->gift_send;
                                $Restaurant->event_details = $Subscription->event_details;
                                $Restaurant->compliment_coin = $Subscription->compliment_coin;
                                $Restaurant->staff_allocation = $Subscription->staff_allocation;
                                $Restaurant->save();

                                Wallet::create([
                                    'restro_id' => $transaction->restro_id,
                                    'amount'  => $Subscription->gr_coin,
                                    'status' => 1,
                                    'type' => 1
                                ]);
                        } elseif ($transaction->tr_type == 4) {
                                $Refer = ReferEarn::first();
                                $coin = round($transaction->amount / $Refer->value_of_coin);
                                $Us = Restaurant::find($transaction->restro_id);
                                $Wallet = $Us->gr_coin;
                                $Wallet = $Wallet + $coin;

                                Wallet::create([
                                    'restro_id' => $Us->id,
                                    'amount'  => $transaction->amount,
                                    'status' => 1,
                                    'coin' => $coin,
                                    'type' => 1
                                ]);
                                $Us->gr_coin = $Wallet;
                                $Us->save();
                        }
                    }
                }
                return redirect()->route('payment-thank-you', [$transaction->id]);
            } catch (Exception $e) {
                return  $e->getMessage();
                return redirect()->back()->with('error', $e->getMessage());
            }
        }
    }

    public function ThankYou($id)
    {
        $transaction = Transaction::where('id', $id)->first();
        if ($transaction->status == 1) {
            return view('web.paymentthankyou', compact('transaction'));
        }else{
            return view('web.payment-failed', compact('transaction'));
        }
    }
}
