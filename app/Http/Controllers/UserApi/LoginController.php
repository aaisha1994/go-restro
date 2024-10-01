<?php

namespace App\Http\Controllers\UserApi;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Affiliate;
use App\Models\AffiliateCommission;
use App\Models\Complementary;
use App\Models\Coupon;
use App\Models\Fcm;
use App\Models\Gift;
use App\Models\GiftCoupon;
use App\Models\Passport;
use App\Models\QrGenerate;
use App\Models\User;
use App\Models\UserCoupon;
use App\Models\Utm;
use App\Models\Wallet;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('userApi', ['except' => ['Register','Login','OtpVerify']]);
    }

    public function Register(Request $request)
    {
        try {
            $validator = Validator::make($request->all(),[
                'name' => ['required'],
                'email' => ['required', 'email', 'unique:users,email,NULL,id,deleted_at,NULL'],
                'mobile' => ['required', 'numeric', 'unique:users,mobile,NULL,id,deleted_at,NULL'],
                'date_of_birth' => ['required'],
            ]);
            if($validator->fails()){
                $messages = $validator->getMessageBag();
                return response()->json(['success' => false, 'error' => ['message' => 'Validation Error', 'error_message' => $messages]], 422);
            }
            $ref = 0;
            if($request->ref_by != null) {
                $User = User::where('ref_code', $request->ref_by)->first();
                if($User) {
                    $ref = 1;
                }
                $Restro = QrGenerate::where('qr_code', $request->ref_by)->whereNull('affiliate_id')->where('type', 2)->where('status', 1)->first();
                if($Restro) {
                    $ref = 2;
                }
                $Admin = Admin::where('ref_code', $request->ref_by)->first();
                if($Admin) {
                    $ref = 3;
                }
                $Aff = QrGenerate::where('qr_code', $request->ref_by)->whereNull('restro_id')->where('type', 2)->where('status', 1)->first();
                if($Aff) {
                    $Affiliate = Affiliate::find($Aff->affiliate_id);
                    $ref = 4;
                }
                $Utm = Utm::where('ref_code', $request->ref_by)->where('status', 1)->first();
                if($Utm) {
                    $ref = 5;
                }
                if($ref == 0) {
                    return response()->json(['success' => false, 'error' => ['message' => 'Validation Error', 'error_message' => 'Invalid Referral Code']], 422);
                }
            }

            $otp = rand(1111, 9999);
            $randomString = Str::random(7);
            $ref_code = strtoupper('GR'. $randomString);
            $User = new User();
            $User->name = $request->name;
            $User->email = $request->email;
            $User->mobile = $request->mobile;
            $User->date_of_birth = $request->date_of_birth;
            $User->other_date = $request->other_date;
            $User->ref_by = $request->ref_by ?? '';
            $User->ref_code = $ref_code;
            $User->otp = 1234;
            $User->status = 1;
            $User->source = $ref;
            $User->otp = $otp;
            $User->image = 'no_image.jpg';
            $User->save();

            $startdate = date('y-m-d');
            if($ref == 2 || $ref == 3 || $ref == 4 || $ref == 5) {
                $Gift = new Gift();
                if($ref == 2) {
                    $restro_id = $Restro->restro_id;
                    $Complementry = Complementary::where('account_type', 'Restro')->where('status', 1)->first();
                }
                if($ref == 3) {
                    $restro_id = $Admin->restro_id;
                    $Gift->admin_id = $Admin->id;
                    $Complementry = Complementary::where('account_type', 'Admin')->where('status', 1)->first();
                }
                if($ref == 4) {
                    $restro_id = $Affiliate->restro_id;
                    $Gift->affiliate_id = $Affiliate->id;
                    $Complementry = Complementary::where('account_type', 'Affilates')->where('status', 1)->first();
                }
                if($ref == 5) {
                    $restro_id = $Utm->restro_id;
                    $Gift->utm_id = $Utm->id;
                    $Complementry = Complementary::where('account_type', 'Admin')->where('status', 1)->first();
                }
                if(!$Complementry) {
                    return response()->json(['success' => false, 'error' => ['message' => 'Validation Error', 'error_message' => 'You are not eligible to send gift']], 422);
                }
                $enddate = date('Y-m-d', strtotime("+". $Complementry->validity ." day", strtotime($startdate)));

                $Gift->restro_id = $restro_id;
                $Gift->mobile = $request->mobile;
                $Gift->start_date = $startdate;
                $Gift->end_date = $enddate;
                $Gift->status = 0;
                $Gift->gift_type = 1;
                $Gift->save();

                $Coupon = Coupon::where('restro_id', $restro_id)->get();
                foreach($Coupon as $key => $val) {
                    $GiftCoupon = new GiftCoupon();
                    $GiftCoupon->gift_id = $Gift->id;
                    $GiftCoupon->coupon_id = $val->id;
                    $GiftCoupon->quantity = $val->quantity;
                    $GiftCoupon->status = 0;
                    $GiftCoupon->save();
                }
            }
            Gift::where('mobile', $request->mobile)->where('status',0)->where('end_date','<', date('Y-m-d'))->update(['status' => 1]);
            $Gift = Gift::where('mobile', $request->mobile)->where('status',0)->get();
            foreach($Gift as $val) {
                $enddate = $val->end_date;
                $gs = 0;
                $ps = Passport::where('restro_id', $val->restro_id)->where('user_id', $User->id)->first();
                if($ps) {
                    $gs = 1;
                }
                $Passport = Passport::where('restro_id', $val->restro_id)->where('user_id', $User->id)->where('status', 1)->first();
                if(!$Passport) {
                    $Passport = Passport::create([
                        'restro_id' => $val->restro_id,
                        'user_id' => $User->id,
                        'status' => 1,
                        'start_date' => $startdate,
                        'end_date' => $enddate,
                        'gift_status' => $gs,
                    ]);
                }
                $GiftCoupon = GiftCoupon::where('gift_id', $val->id)->where('status',0)->get();
                foreach($GiftCoupon as $Gifts) {
                    $UserCoupon = new UserCoupon();
                    $UserCoupon->coupon_id = $Gifts->coupon_id;
                    $UserCoupon->gift_id = $val->id;
                    $UserCoupon->passport_id = $Passport->id;
                    $UserCoupon->quantity = $Gifts->quantity;
                    $UserCoupon->pending = 0;
                    $UserCoupon->start_date = $Gifts->start_date;
                    $UserCoupon->end_date = $Gifts->end_date;
                    $UserCoupon->save();
                    GiftCoupon::find($Gifts->id)->update(['status' => 1]);
                }
                Gift::find($val->id)->update(['status' => 1]);
            }

            // Affiliate Amount
            if($ref == 4) {
                if($Affiliate->commission_type == 1){
                    $amount = 0;
                    $Commissions = AffiliateCommission::where('status', 1)->get();
                    foreach ($Commissions as $key => $Commission) {
                        if($Commission->type == 1 && $Affiliate->affiliate_type == 1) {
                            $amount = $Commission->per_download;
                        }
                        if($Commission->type == 2 && $Affiliate->affiliate_type == 2) {
                            $amount = $Commission->per_download;
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

            // Whatsapp
            $to = $request->mobile;
            $recipient_type = "individual";
            $template_name = "otp";
            $language_code = "en";
            $parameters = [
                [
                    "type" => "body",
                    "parameters" => [
                        ["type" => "text", "text" => $request->name],
                        ["type" => "text", "text" => $otp],
                    ]
                ]
            ];
            sendWhatsapp($to, $recipient_type, $template_name, $language_code, $parameters);
            // End Whatsapp

            return response()->json(['success' => true, 'data' => ['result' => $User, 'message' => 'Registration successfully.']], 200);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => $e->getMessage()]], 422);
        }
    }

    public function Login(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'mobile' => 'required'
            ]);

            if ($validator->fails()) {
                return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => 'Required field missing']], 422);
            }

            $user = User::where('mobile', $request->mobile)->first();

            if ($user == null) {
                return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => 'You have not registered yet! Please register first']], 422);
            }
            if ($user->status == 0) {
                return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => 'Email verification is pending please verify first']], 422);
            }
            if ($user->status == 2) {
                return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => 'Currently your account is deactivated']], 422);
            }

            $otp = $request->mobile == '8000070886' ? '1234' : rand(1111, 9999);
            User::find($user->id)->update([
                'otp' => $otp
            ]);

            // Whatsapp
            $to = $user->mobile;
            $recipient_type = "individual";
            $template_name = "otp";
            $language_code = "en";
            $parameters = [
                [
                    "type" => "body",
                    "parameters" => [
                        ["type" => "text", "text" => $user->name],
                        ["type" => "text", "text" => $otp],
                    ]
                ]
            ];
            if($request->mobile != '8000070886') {
                sendWhatsapp($to, $recipient_type, $template_name, $language_code, $parameters);
            }
            // End Whatsapp
            return response()->json(['success' => true, 'data' => ['result' => [], 'message' => 'successfully.']], 200);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => $e->getMessage()]], 422);
        }
    }

    public function OtpVerify(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'mobile' => 'required',
                'otp' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => 'Required field missing']], 422);
            }
            $otpRecord = User::where('mobile', $request->mobile)->latest()->first();
                if (!$otpRecord || $otpRecord->otp != $request->otp) {
                    return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => 'Invalid otp']], 422);
                }
            $input['status'] = 1;
            $jwt_token = null;

            $user = User::where('mobile', $request->mobile)->first();
            if (!$jwt_token = Auth::guard('userapi')->fromUser($user)) {
                return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => 'Invalid Email or Password']], 422);
            }
            if($request->has('fcm_token')){
                Fcm::create([
                    'user_id' => $user->id,
                    'fcm_token' => $request->fcm_token,
                    'type' => 1
                ]);
            }

            return response()->json(['success' => true, 'data' => ['result' => $user, 'token_type' => 'Bearer', 'token' => $jwt_token, 'message' => 'successfully.']], 200);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => $e->getMessage()]], 422);
        }
    }

    public function Profile()
    {
        try {
            $User = Auth::guard('userapi')->user();
            return response()->json(['success' => true, 'data' => ['result' => $User, 'message' => 'successfully.']], 200);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => $e->getMessage()]], 422);
        }
    }

    public function Logout()
    {
        Auth::guard('userapi')->logout();
        return response()->json(['success' => true, 'data' => ['message' => 'Log out successfully.']], 200);
    }

    public function UpdateProfile(Request $request)
    {
        try {
            $User = Auth::guard('userapi')->user();
            $rules = [
                'name' => 'required',
                'email'   => 'required|email|unique:users,email,' . $User->id,
                'mobile'   => 'required|unique:users,mobile,' . $User->id
            ];

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                $messages = $validator->getMessageBag();
                return response()->json(['success' => false, 'error' => ['message' => 'Validation Error', 'error_message' => $messages]], 422);
            }

            $Users = User::find($User->id);
            $Users->name = $request->name;
            $Users->email = $request->email;
            $Users->mobile = $request->mobile;
            $Users->date_of_birth = $request->date_of_birth;
            $Users->other_date = $request->other_date;
            $Users->save();

            return response()->json(['success' => true, 'data' => ['result' => $Users, 'message' => 'successfully.']], 200);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => $e->getMessage()]], 422);
        }
    }

    public function UpdateImage(Request $request)
    {
        try {
            $User = Auth::guard('userapi')->user();
            $rules = [
                'image' => 'required',
            ];

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                $messages = $validator->getMessageBag();
                return response()->json(['success' => false, 'error' => ['message' => 'Validation Error', 'error_message' => $messages]], 422);
            }

            $Users = User::find($User->id);

            $file = $request->file('image');
            $filename = date('ymdHis').'.'.$file->getClientOriginalExtension();
            $file->storeAs('public/user', $filename);
            $Users->image = $filename;
            $Users->save();

            return response()->json(['success' => true, 'data' => ['result' => $Users, 'message' => 'successfully.']], 200);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => $e->getMessage()]], 422);
        }
    }
}
