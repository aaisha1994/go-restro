<?php

namespace App\Http\Controllers\RestroApi;

use App\Http\Controllers\Controller;
use App\Models\ApproveReject;
use App\Models\Complementary;
use App\Models\Coupon;
use App\Models\Gift;
use App\Models\GiftCoupon;
use App\Models\Passport;
use App\Models\Restaurant;
use App\Models\User;
use App\Models\UserCoupon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PassportController extends Controller
{
    public function index()
    {
        try {
            $Restro = Auth::guard('restroapi')->user();
            $Coupon = Coupon::where('restro_id', $Restro->restro_id)->orderBy('id','desc')->get();
            return response()->json(['success' => true, 'data' => ['result' => $Coupon, 'message' => 'success.']], 200);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => $e->getMessage()]], 422);
        }
    }

    public function store(Request $request)
    {
        try {
            $Restro = Auth::guard('restroapi')->user();
            $validator = Validator::make($request->all(),[
                'name' => ['required'],
            ]);
            if($validator->fails()){
                $messages = $validator->getMessageBag();
                return response()->json(['success' => false, 'error' => ['message' => 'Validation Error', 'error_message' => $messages]], 422);
            }

            $Restaurant = Restaurant::find($Restro->restro_id);
            $Coupon = new Coupon();
            $Coupon->restro_id = $Restro->restro_id;
            $Coupon->name = $request->name;
            $Coupon->details = $request->details;
            $Coupon->quantity = $request->quantity;
            $Coupon->validity = $Restaurant->validity;
            $Coupon->terms = $request->terms;
            $Coupon->status = 0;

            $details = [];
            $details['name'] = ['old' => '', 'new' => $request->name, 'type' => 0];
            $details['details'] = ['old' => '', 'new' => $request->details, 'type' => 0];
            $details['quantity'] = ['old' => '', 'new' => $request->quantity, 'type' => 0];
            $details['terms'] = ['old' => '', 'new' => $request->terms, 'type' => 0];


            if($request->hasFile('image')){
                $file = $request->file('image');
                $filename = date('ymdHis').'.'.$file->getClientOriginalExtension();
                $file->storeAs('public/coupon', $filename);
                $Coupon->image = $filename;
                $details['image'] = ['old' => '', 'new' => $filename, 'type' => 0];
            }
            $Coupon->save();
            $details['id'] = ['old' => '', 'new' => $Coupon->id, 'type' => 0];

            $ApproveReject = new ApproveReject();
            $ApproveReject->restro_id = $Restro->restro_id;
            $ApproveReject->details = $details;
            $ApproveReject->type = 2;
            $ApproveReject->status = 0;
            $ApproveReject->save();

            return response()->json(['success' => true, 'data' => ['result' => $Coupon, 'message' => 'success.']], 200);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => $e->getMessage()]], 422);
        }
    }

    public function view($id)
    {
        try {
            $Coupon = Coupon::findOrFail($id);
            return response()->json(['success' => true, 'data' => ['result' => $Coupon, 'message' => 'success.']], 200);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => $e->getMessage()]], 422);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $Coupon = Coupon::findOrFail($id);
            $validator = Validator::make($request->all(),[
                'name' => ['required'],
            ]);
            if($validator->fails()){
                $messages = $validator->getMessageBag();
                return response()->json(['success' => false, 'error' => ['message' => 'Validation Error', 'error_message' => $messages]], 422);
            }
            $details = [];
            if($Coupon->name != $request->name) { $details['name'] = ['old' => $Coupon->name, 'new' => $request->name, 'type' => 1]; }
            if($Coupon->details != $request->details) { $details['details'] = ['old' => $Coupon->details, 'new' => $request->details, 'type' => 1]; }
            if($Coupon->quantity != $request->quantity) { $details['quantity'] = ['old' => $Coupon->quantity, 'new' => $request->quantity, 'type' => 1]; }
            if($Coupon->terms != $request->terms) { $details['terms'] = ['old' => $Coupon->terms, 'new' => $request->terms, 'type' => 1]; }

            $Coupon->name = $request->name;
            $Coupon->details = $request->details;
            $Coupon->quantity = $request->quantity;
            // $Coupon->validity = $request->validity ?? 0;
            $Coupon->terms = $request->terms;
            $Coupon->status = 0;

            if($request->hasFile('image')){
                $file = $request->file('image');
                $filename = date('ymdHis').'.'.$file->getClientOriginalExtension();
                $file->storeAs('public/coupon', $filename);
                $details['image'] = ['old' => $Coupon->image, 'new' => $filename, 'type' => 1];
                $Coupon->image = $filename;
            }
            $Coupon->save();

            if(count($details) > 0) {
                $details['id'] = ['old' => '', 'new' => $Coupon->id, 'type' => 1];
                $ApproveReject = new ApproveReject();
                $ApproveReject->restro_id = $Coupon->restro_id;
                $ApproveReject->details = $details;
                $ApproveReject->type = 2;
                $ApproveReject->status = 0;
                $ApproveReject->save();
            }
            return response()->json(['success' => true, 'data' => ['result' => $Coupon, 'message' => 'success.']], 200);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => $e->getMessage()]], 422);
        }
    }

    public function destroy($id)
    {
        $Coupon = Coupon::findOrFail($id);
        if ($Coupon) {
            $details['id'] = ['old' => '', 'new' => $Coupon->id, 'type' => 2];
            $details['coupon'] = ['old' => '', 'new' => '', 'type' => 2];

            $ApproveReject = new ApproveReject();
            $ApproveReject->restro_id = $Coupon->restro_id;
            $ApproveReject->details = $details;
            $ApproveReject->type = 2;
            $ApproveReject->status = 0;
            $ApproveReject->save();

            $Coupon->delete();
            return response()->json(['success' => true, 'data' => ['result' => [], 'message' => 'Coupon Deleted successfully.']], 200);
        } else {
            return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => 'Coupon not found']], 422);
        }
    }

    public function SendGift(Request $request) {
        try {
            $Restro = Auth::guard('restroapi')->user();
            $validator = Validator::make($request->all(),[
                'coupon_id' => ['required'],
                'quantity' => ['required'],
                'mobile' => ['required'],
            ]);
            if($validator->fails()){
                $messages = $validator->getMessageBag();
                return response()->json(['success' => false, 'error' => ['message' => 'Validation Error', 'error_message' => $messages]], 422);
            }

            $User = User::where('mobile', $request->mobile)->first();
            $Complementry = Complementary::where('account_type', 'Restro')->where('status', 1)->first();
            if(!$Complementry) {
                return response()->json(['success' => false, 'error' => ['message' => 'Validation Error', 'error_message' => 'You are not eligible to send gift']], 422);
            }

            $startdate = date('y-m-d');
            $enddate = date('Y-m-d', strtotime("+". $Complementry->validity ." day", strtotime($startdate)));

            if($User) {
                $gs = 0;
                $ps = Passport::where('restro_id', $Restro->restro_id)->where('user_id', $User->id)->first();
                if($ps) {
                    $gs = 1;
                }
                $Passport = Passport::where('restro_id', $Restro->restro_id)->where('user_id', $User->id)->where('status', 1)->first();
                if(!$Passport) {
                    $Passport = Passport::create([
                        'restro_id' => $Restro->restro_id,
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
            $Gift->restro_id = $Restro->restro_id;
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

            $image = $Restro->Restaurant->image_path;
            // $image = 'https://go-restro.com/web/img/logos/logo.png';

            $to = $request->mobile;
            $recipient_type = "individual";
            $template_name = "gift_by_restro";
            $language_code = "en";
            $parameters = [
                [
                    "type" => "header",
                    "parameters" => [
                        ["type" => "image", "image" => [
                            'link' => $image
                        ]]
                    ]
                ],
                [
                    "type" => "body",
                    "parameters" => [
                        ["type" => "text", "text" => $Restro->Restaurant->name],
                        ["type" => "text", "text" => $Restro->Restaurant->name],
                        ["type" => "text", "text" => date('d M, Y', strtotime($enddate))],
                    ]
                ],
                [
                    "type" => "button",
                    "sub_type" => "url",
                    "index" => 0,
                    "parameters" => [
                        [
                            "type" => "text",
                            "text" => '1'
                        ]
                    ]
                ]
            ];
            sendWhatsapp($to, $recipient_type, $template_name, $language_code, $parameters);

            return response()->json(['success' => true, 'data' => ['result' => [], 'message' => 'success.']], 200);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => $e->getMessage()]], 422);
        }
    }

    public function RedeemHistory()
    {
        try {
            $User = Auth::guard('restroapi')->user();

            $UserCoupon = DB::select("SELECT r.id, c.name as coupon_name, u.name as user_name, r.quantity, r.created_at
            from redeems r
            join user_coupons uc ON uc.id=r.user_coupon_id
            join passports p ON p.id=uc.passport_id
            join coupons c ON c.id=uc.coupon_id
            join users u ON u.id=p.user_id
            where r.restro_id = $User->restro_id
            ");
            return response()->json(['success' => true, 'data' => ['result' => $UserCoupon, 'message' => 'success.']], 200);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => $e->getMessage()]], 422);
        }
    }
}
