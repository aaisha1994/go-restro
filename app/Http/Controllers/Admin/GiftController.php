<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Complementary;
use App\Models\Coupon;
use App\Models\Gift;
use App\Models\GiftCoupon;
use App\Models\Passport;
use App\Models\Restaurant;
use App\Models\User;
use App\Models\UserCoupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class GiftController extends Controller
{
    public function index()
    {
        if(Auth::guard('admin')->user()->is_admin == 1 || in_array('Send Gift', Auth::guard('admin')->user()->role_details)) {
            $admin = Auth::guard('admin')->user();
            $Restro = Restaurant::where('status', 1)->select('id', 'name')->orderBy('id', 'desc')->get();
            $Gifts = Gift::where('admin_id', $admin->id)->orderBy('id', 'desc')->get();
            return view('Admin.gift.index', compact('Gifts','Restro'));
        } else{
            return redirect()->back()->with('error', 'Permission denied');
        }
    }

    public function store(Request $request)
    {
        $admin = Auth::guard('admin')->user();
        $validator = Validator::make($request->all(),[
            'restro_id' => ['required'],
            'mobile' => ['required'],
        ]);
        if($validator->fails()){
            $messages = $validator->getMessageBag();
            return redirect(route('admin.gift.index'))->with('error', $messages);
        }
        $Complementry = Complementary::where('account_type', 'Admin')->where('status', 1)->first();
        if(!$Complementry) {
            return redirect(route('admin.gift.index'))->with('error', 'You are not eligible to send gift');
        }

        $User = User::where('mobile', $request->mobile)->first();

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
        $Gift->restro_id = $request->restro_id;
        $Gift->admin_id = $admin->id;
        $Gift->start_date = $startdate;
        $Gift->end_date = $enddate;
        $Gift->status = $User ? 1 : 0;
        $Gift->gift_type = 1;
        $Gift->save();

        $Coupon = Coupon::where('restro_id', $request->restro_id)->get();
        foreach($Coupon as $key => $val) {
            $GiftCoupon = new GiftCoupon();
            $GiftCoupon->gift_id = $Gift->id;
            $GiftCoupon->coupon_id = $val->id;
            $GiftCoupon->quantity = $val->quantity;
            $GiftCoupon->status = $User ? 1 : 0;
            $GiftCoupon->save();

            if($User) {
                $UserCoupon = new UserCoupon();
                $UserCoupon->coupon_id = $val->id;
                $UserCoupon->gift_id = $Gift->id;
                $UserCoupon->user_id = $User->id;
                $UserCoupon->passport_id = $Passport->id;
                $UserCoupon->quantity = $val->quantity;
                $UserCoupon->pending = 0;
                $UserCoupon->start_date = $startdate;
                $UserCoupon->end_date = $enddate;
                $UserCoupon->save();
            }
        }
        return redirect(route('admin.gift.index'))->with('success', 'Gift Send successfully');
    }
}
