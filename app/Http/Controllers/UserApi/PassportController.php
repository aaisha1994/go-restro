<?php

namespace App\Http\Controllers\UserApi;

use App\Http\Controllers\Controller;
use App\Models\Complementary;
use App\Models\Coupon;
use App\Models\Discount;
use App\Models\Favorite;
use App\Models\Gift;
use App\Models\GiftCoupon;
use App\Models\Passport;
use App\Models\QrGenerate;
use App\Models\Redeem;
use App\Models\Restaurant;
use App\Models\Transaction;
use App\Models\User;
use App\Models\UserCoupon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PassportController extends Controller
{
    public function MyPassport()
    {
        try {
            $User = Auth::guard('userapi')->user();
            $MyPassport = Passport::with('Restaurant')->where('user_id',$User->id)->where('status', 1)->orderBy('id', 'desc')->get();
            return response()->json(['success' => true, 'data' => ['result' => $MyPassport, 'message' => 'success.']], 200);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => $e->getMessage()]], 422);
        }
    }

    public function AddMyPassport(Request $request)
    {
        try {
            $User = Auth::guard('userapi')->user();
            $validator = Validator::make($request->all(),[
                'restro_id' => ['required'],
            ]);
            if($validator->fails()){
                $messages = $validator->getMessageBag();
                return response()->json(['success' => false, 'error' => ['message' => 'Validation Error', 'error_message' => $messages]], 422);
            }
            if($User->subscription_status == 1) {
                $startdate = date('Y-m-d');
                $enddate = $User->expire_date;
                $gs = 0;
                $ps = Passport::where('restro_id', $request->restro_id)->where('user_id', $User->id)->first();
                if($ps) {
                    $gs = 1;
                }
                $MyPassport = Passport::create([
                    'restro_id' => $request->restro_id,
                    'user_id' => $User->id,
                    'status' => 1,
                    'start_date' => $startdate,
                    'end_date' => $enddate,
                    'gift_status' => $gs,
                ]);
                $Passport = Coupon::where('restro_id', $request->restro_id)->get();
                foreach ($Passport as $key => $value) {
                    $UserCoupon = new UserCoupon();
                    $UserCoupon->coupon_id = $value->id;
                    $UserCoupon->user_id = $User->id;
                    $UserCoupon->passport_id = $MyPassport->id;
                    $UserCoupon->quantity = $value->quantity;
                    $UserCoupon->pending = 0;
                    $UserCoupon->start_date = $startdate;
                    $UserCoupon->end_date = $enddate;
                    $UserCoupon->save();
                }
                return response()->json(['success' => true, 'data' => ['result' => $MyPassport, 'message' => 'success.']], 200);
            } else {
                return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => 'User Not Subscribe to add my passport']], 422);
            }
        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => $e->getMessage()]], 422);
        }
    }

    public function MyPassportCoupon($id)
    {
        try {
            $User = Auth::guard('userapi')->user();
            $UserCoupon = UserCoupon::with('Coupon')->where('user_id', $User->id)->where('passport_id', $id)->where('status','<>',2)->get();
            return response()->json(['success' => true, 'data' => ['result' => $UserCoupon, 'message' => 'success.']], 200);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => $e->getMessage()]], 422);
        }
    }

    public function RedeemCoupon(Request $request)
    {
        try {
            $User = Auth::guard('userapi')->user();
            $validator = Validator::make($request->all(),[
                'coupon_id' => ['required'],
                'quantity' => ['required'],
                'qr_code' => ['required'],
            ]);
            if($validator->fails()){
                $messages = $validator->getMessageBag();
                return response()->json(['success' => false, 'error' => ['message' => 'Validation Error', 'error_message' => $messages]], 422);
            }
            $QrGenerate = QrGenerate::where('qr_code', $request->qr_code)->where('type', 1)->where('status', 1)->first();
            if(!$QrGenerate){
                $messages = "QR Code not valid, Please try again";
                return response()->json(['success' => false, 'error' => ['message' => 'Validation Error', 'error_message' => $messages]], 422);
            }

            $Coupon = Coupon::where('restro_id', $QrGenerate->restro_id)->where('id', $request->coupon_id)->first();
            if(!$Coupon){
                $messages = "Restaurant not found";
                return response()->json(['success' => false, 'error' => ['message' => 'Validation Error', 'error_message' => $messages]], 422);
            }
            $Quantity = $request->quantity;
            $UserCoupon = UserCoupon::where('user_id', $User->id)->where('coupon_id', $request->coupon_id)->where('status',0)->get();
            $total_qty = $UserCoupon->sum('quantity') - $UserCoupon->sum('pending');
            if($total_qty >= $Quantity) {
                foreach ($UserCoupon as $key => $Uc) {
                    $Pending = $Uc->quantity - $Uc->pending;
                    $q = $Quantity;
                    if($Quantity > 0) {
                        $Quantity = $Quantity - $Pending;
                        if($Quantity < 0 ){
                            UserCoupon::find($Uc->id)->update([
                                'pending' => $Uc->quantity - abs($Quantity)
                            ]);
                            $qty = abs($q);
                        } else {
                            UserCoupon::find($Uc->id)->update([
                                'pending' => $Uc->quantity,
                                'status' => 1
                            ]);
                            $qty = abs($Quantity - $q);
                        }
                        Redeem::create([
                            'user_coupon_id' => $Uc->id,
                            'restro_id' => $QrGenerate->restro_id,
                            'quantity' => $qty,
                            'status' => 1
                        ]);
                    }
                }

                // Whatsapp
                $Restaurant = Restaurant::find($QrGenerate->restro_id);
                $to = $request->mobile;
                $recipient_type = "individual";
                $template_name = "on_redeem";
                $language_code = "en";
                $parameters = [
                    [
                        "type" => "body",
                        "parameters" => [
                            ["type" => "text", "text" => $Restaurant->name],
                            ["type" => "text", "text" => $Coupon->name],
                            ["type" => "text", "text" => $request->quantity],
                        ]
                    ]
                ];
                sendWhatsapp($to, $recipient_type, $template_name, $language_code, $parameters);
                // End Whatsapp
            } else {
                return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => 'there was not sufficient quantity to update']], 422);
            }
            return response()->json(['success' => true, 'data' => ['result' => $UserCoupon, 'message' => 'success.']], 200);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => $e->getMessage()]], 422);
        }
    }

    public function RedeemHistory()
    {
        try {
            $User = Auth::guard('userapi')->user();
            $UserCoupon = DB::select("SELECT r.id, c.name as coupon_name, re.name as restro_name, r.quantity, r.created_at
            from redeems r
            join user_coupons uc ON uc.id=r.user_coupon_id
            join passports p ON p.id=uc.passport_id
            join coupons c ON c.id=uc.coupon_id
            join restaurants re ON re.id=r.restro_id
            where p.user_id = $User->id
            ");
            return response()->json(['success' => true, 'data' => ['result' => $UserCoupon, 'message' => 'success.']], 200);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => $e->getMessage()]], 422);
        }
    }

    public function sendGift(Request $request)
    {
        try {
            $Users = Auth::guard('userapi')->user();
            $validator = Validator::make($request->all(),[
                'coupon_id' => ['required'],
                'quantity' => ['required'],
                'mobile' => ['required'],
                'restro_id' => ['required'],
            ]);
            if($validator->fails()){
                $messages = $validator->getMessageBag();
                return response()->json(['success' => false, 'error' => ['message' => 'Validation Error', 'error_message' => $messages]], 422);
            }

            $User = User::where('mobile', $request->mobile)->first();
            $Complementry = Complementary::where('account_type', 'Users')->where('status', 1)->first();
            if(!$Complementry) {
                return response()->json(['success' => false, 'error' => ['message' => 'Validation Error', 'error_message' => 'You are not eligible to send gift']], 422);
            }

            $Transaction = Transaction::where('user_id', $Users->id)->where('gift_status', 0)->first();
            if($Transaction) {
                $Transaction->gift_status = 1;
                $Transaction->save();
            } else {
                return response()->json(['success' => false, 'error' => ['message' => 'Validation Error', 'error_message' => 'You are not eligible to send gift']], 422);
            }

            $startdate = date('y-m-d');
            $enddate = date('Y-m-d', strtotime("+". $Complementry->validity ." day", strtotime($startdate)));

            if($User) {
                $gs = 0;
                $ps = Passport::where('restro_id', $request->restro_id)->where('user_id', $User->id)->first();
                if($ps) {
                    $gs = 1;
                }
                $Passport = Passport::where('restro_id', $request->restro_id)->where('user_id', $User->id)->where('status', 1)->first();
                if(!$Passport) {
                    $Passport = Passport::create([
                        'restro_id' => $request->restro_id,
                        'user_id' => $User->id,
                        'status' => 1,
                        'start_date' => $startdate,
                        'end_date' => $enddate,
                        'gift_status' => $gs,
                    ]);
                }
            }

            $Gift = new Gift();
            $Gift->mobile = $request->mobile;
            $Gift->user_id = $Users->id;
            $Gift->start_date = $startdate;
            $Gift->end_date = $enddate;
            $Gift->status = $User ? 1 : 0;
            $Gift->gift_type = 1;
            $Gift->save();
            $coupon_id = explode(',', $request->coupon_id);
            $quantity = explode(',', $request->quantity);

            foreach($coupon_id as $key => $val) {
                $GiftCoupon = new GiftCoupon();
                $GiftCoupon->gift_id = $Gift->id;
                $GiftCoupon->coupon_id = $coupon_id[$key];
                $GiftCoupon->quantity = $quantity[$key];
                $GiftCoupon->status = $User ? 1 : 0;
                $GiftCoupon->save();
                if($User) {
                    $UserCoupon = new UserCoupon();
                    $UserCoupon->coupon_id = $coupon_id[$key];
                    $UserCoupon->user_id = $User->id;
                    $UserCoupon->gift_id = $Gift->id;
                    $UserCoupon->passport_id = $Passport->id;
                    $UserCoupon->quantity = $quantity[$key];
                    $UserCoupon->pending = 0;
                    $UserCoupon->start_date = $startdate;
                    $UserCoupon->end_date = $enddate;
                    $UserCoupon->save();
                }
            }

            return response()->json(['success' => true, 'data' => ['result' => [], 'message' => 'success.']], 200);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => $e->getMessage()]], 422);
        }
    }

    public function favorite()
    {
        try {
            $User = Auth::guard('userapi')->user();
            $Favorite = Favorite::with('Restaurant')->where('user_id', $User->id)->get();
            return response()->json(['success' => true, 'data' => ['result' => $Favorite, 'message' => 'success.']], 200);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => $e->getMessage()]], 422);
        }
    }

    public function favoriteStore(Request $request)
    {
        try {
            $User = Auth::guard('userapi')->user();
            $validator = Validator::make($request->all(),[
                'restro_id' => ['required'],
            ]);
            if($validator->fails()){
                $messages = $validator->getMessageBag();
                return response()->json(['success' => false, 'error' => ['message' => 'Validation Error', 'error_message' => $messages]], 422);
            }
            $Favorite = Favorite::where('user_id', $User->id)->where('restro_id', $request->restro_id)->first();
            if($Favorite) {
                $Favorite->delete();
            } else {
                Favorite::create([
                    'user_id' => $User->id,
                    'restro_id' => $request->restro_id
                ]);
            }
            return response()->json(['success' => true, 'data' => ['result' => [], 'message' => 'success.']], 200);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => $e->getMessage()]], 422);
        }
    }
    public function discount()
    {
        try {
            $discount = Discount::where('start_date', '<=', date('Y-m-d'))->where('end_date', '>=', date('Y-m-d'))->orderBy('id', 'desc')->first();
            return response()->json(['success' => true, 'data' => ['result' => $discount, 'message' => 'success.']], 200);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => $e->getMessage()]], 422);
        }
    }
}
