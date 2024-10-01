<?php

namespace App\Http\Controllers\Restro;

use App\Http\Controllers\Controller;
use App\Models\ApproveReject;
use App\Models\Complementary;
use App\Models\Coupon;
use App\Models\Gift;
use App\Models\GiftCoupon;
use App\Models\Passport;
use App\Models\Redeem;
use App\Models\Restaurant;
use App\Models\RestroCategory;
use App\Models\RestroFacility;
use App\Models\RestroImage;
use App\Models\User;
use App\Models\UserCoupon;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $Restro = Auth::guard('restro')->user();
        $User = Passport::where('restro_id', $Restro->restro_id)->select('user_id')->groupBy('user_id')->get()->pluck('user_id')->toArray();
        $Users = User::whereIn('id', $User)->select('id','name','mobile', 'date_of_birth', 'other_date')->get();
        $event = [];
        $cdate = date('m');
        foreach ($Users as $key => $value) {
            if(date('m', strtotime($value->date_of_birth)) == $cdate) {
                $dd = [];
                $dd['id'] = $value->id;
                $dd['title'] = $value->name;
                $dd['location'] = $value->mobile;
                $dd['description'] = "Date Of Birth";
                $dd['start'] = date('Y'). date('-m-d', strtotime($value->date_of_birth));
                $dd['end'] = date('Y'). date('-m-d', strtotime($value->date_of_birth));
                array_push($event, $dd);
            }
            foreach (explode(',',str_replace(array( '[', ']','{','}' ), '', json_encode($value->other_date))) as $k => $v) {
                $date = str_replace(array( '"',  ), '', explode(':', $v)[1]);
                // dd($date, $cdate);
                if(date('m', strtotime($date)) == $cdate) {
                    $dd = [];
                    $dd['id'] = $value->id;
                    $dd['title'] = $value->name;
                    $dd['location'] = $value->mobile;
                    $dd['description'] = str_replace(array( '"',  ), '', explode(':', $v)[0]);
                    $dd['start'] = date('Y'). date('-m-d', strtotime($date));
                    $dd['end'] = date('Y'). date('-m-d', strtotime($date));
                    array_push($event, $dd);
                }
            }
        }
        $event = json_encode($event);

        $data['customer'] = count($User);
        $Passport = Passport::where('restro_id', $Restro->restro_id)->pluck('id')->toArray();
        $data['redeem'] = UserCoupon::whereIn('passport_id', $Passport)->sum('pending');
        $data['offer'] = Coupon::where('restro_id', $Restro->restro_id)->count();

        $data['complementry'] = UserCoupon::whereIn('passport_id', $Passport)->whereNotNull('gift_id')->sum('pending');
        $data['todaycustomer'] = Redeem::whereDate('created_at', Carbon::today())->where('restro_id', $Restro->restro_id)->count('id');
        $data['sendgift'] = Gift::where('restro_id', $Restro->restro_id)->whereNull('admin_id')->whereNull('user_id')->whereNull('affiliate_id')->whereNull('utm_id')->count();

        // Week
        $lastSevenDays = CarbonPeriod::create(Carbon::now()->subDays(6), Carbon::now());
        $visits= Passport::select([DB::raw('DATE(created_at) AS date'), DB::raw('count(id) AS count')])
        ->whereBetween('created_at', [Carbon::now()->subDays(7), Carbon::now()])
        ->where('restro_id', $Restro->restro_id)->where('gift_status', 0)->groupBy('date')->orderBy('date','DESC')->get()->toArray();
        $ChartWeek= array();
        foreach ($visits as $data1) {
            foreach ($lastSevenDays as $date) {
                $dateString = $date->format('M d');
                if (!isset($ChartWeek[$dateString])) {
                    $ChartWeek[$dateString] = 0;
                }
            }
            if (isset($ChartWeek[$dateString])) {
                $date = date('M d', strtotime($data1['date']));
                $ChartWeek[$date] = (int)$data1['count'];
            }
        }
        // month
        $lastMonths = CarbonPeriod::create(Carbon::now()->subMonths(1), Carbon::now());
        $visitsmonth= Passport::select([DB::raw('DATE(created_at) AS date'), DB::raw('count(id) AS count')])
        ->whereBetween('created_at', [Carbon::now()->subMonths(1), Carbon::now()])
        ->where('restro_id', $Restro->restro_id)->where('gift_status', 0)->groupBy('date')->orderBy('date','DESC')->get()->toArray();
        $ChartMonth= array();
        foreach ($visitsmonth as $data1) {
            foreach ($lastMonths as $date) {
                $dateString = $date->format('M d');
                if (!isset($ChartMonth[$dateString])) {
                    $ChartMonth[$dateString] = 0;
                }
            }
            if (isset($ChartMonth[$dateString])) {
                $date = date('M d', strtotime($data1['date']));
                $ChartMonth[$date] = (int)$data1['count'];
            }
        }
        // year
        $lastYears = CarbonPeriod::create(Carbon::now()->subYears(1), Carbon::now());
        $visitsYear= Passport::select([DB::raw('concat(Year(created_at),"-",month(created_at),"-01") AS date'), DB::raw('count(id) AS count')])
        ->whereBetween('created_at', [Carbon::now()->subYears(1), Carbon::now()])
        ->where('restro_id', $Restro->restro_id)->where('gift_status', 0)->groupBy('date')->orderBy('date','DESC')->get()->toArray();
        $ChartYear= array();
        foreach ($visitsYear as $data1) {
            foreach ($lastYears as $date) {
                $dateString = $date->format('M-y');
                if (!isset($ChartYear[$dateString])) {
                    $ChartYear[$dateString] = 0;
                }
            }
            $date = date('M-y', strtotime($data1['date']));
            $ChartYear[$date] = $data1['count'];
        }

        $Restaurant = Restaurant::find($Restro->restro_id);
        $grleaders = DB::select("SELECT r.id, r.name, r.logo, r.rank as ranks,
        (SELECT COUNT(DISTINCT user_id) FROM passports p WHERE p.restro_id = r.id) AS user
        FROM restaurants r
        where r.status = 1 and r.deleted_at is null and (r.rank IN (1,2,3,4,5) or id=?) order by r.rank asc", [$Restro->restro_id]);

        $Coupons = Coupon::where('restro_id', $Restro->restro_id)->orderBy('id','desc')->get();
        return view('Restro.dashboard.index', compact('data','ChartWeek','ChartMonth','ChartYear','grleaders','Restaurant','Coupons','event'));
    }

    public function logout(Request $request)
    {
        Auth::guard('restro')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('restro.login');
    }

    public function sendgift()
    {
        $Restro = Auth::guard('restro')->user();
        $Restaurant = Restaurant::find($Restro->restro_id);
        $Coupons = Coupon::where('restro_id', $Restro->restro_id)->orderBy('id','desc')->get();
        $Gifts = Gift::orderBy('id','desc')->get();

        $coupon_id = Coupon::where('restro_id', $Restro->restro_id)->pluck('id')->toArray();
        // dd($coupon_id);
        // Week
        $lastSevenDays = CarbonPeriod::create(Carbon::now()->subDays(6), Carbon::now());
        $visits= GiftCoupon::whereIn('coupon_id', $coupon_id)->select([DB::raw('DATE(created_at) AS date'), DB::raw('count(coupon_id) AS count')])
        ->whereBetween('created_at', [Carbon::now()->subDays(7), Carbon::now()])
        ->groupBy('date')->orderBy('date','DESC')->get()->toArray();
        $ChartWeek= array();
        foreach ($visits as $data) {
            foreach ($lastSevenDays as $date) {
                $dateString = $date->format('M d');
                if (!isset($ChartWeek[$dateString])) {
                    $ChartWeek[$dateString] = 0;
                }
            }
            if (isset($ChartWeek[$dateString])) {
                $date = date('M d', strtotime($data['date']));
                $ChartWeek[$date] = (int)$data['count'];
            }
        }
        // month
        $lastMonths = CarbonPeriod::create(Carbon::now()->subMonths(1), Carbon::now());
        $visitsmonth= GiftCoupon::whereIn('coupon_id', $coupon_id)->select([DB::raw('DATE(created_at) AS date'), DB::raw('count(coupon_id) AS count')])
        ->whereBetween('created_at', [Carbon::now()->subMonths(1), Carbon::now()])
        ->groupBy('date')->orderBy('date','DESC')->get()->toArray();
        $ChartMonth= array();
        foreach ($visitsmonth as $data) {
            foreach ($lastMonths as $date) {
                $dateString = $date->format('M d');
                if (!isset($ChartMonth[$dateString])) {
                    $ChartMonth[$dateString] = 0;
                }
            }
            if (isset($ChartMonth[$dateString])) {
                $date = date('M d', strtotime($data['date']));
                $ChartMonth[$date] = (int)$data['count'];
            }
        }
        // year
        $lastYears = CarbonPeriod::create(Carbon::now()->subYears(1), Carbon::now());
        $visitsYear= GiftCoupon::whereIn('coupon_id', $coupon_id)->select([DB::raw('Month(created_at) AS date'), DB::raw('count(coupon_id) AS count')])
        ->whereBetween('created_at', [Carbon::now()->subYears(1), Carbon::now()])
        ->groupBy('date')->orderBy('date','DESC')->get()->toArray();
        $ChartYear= array();
        foreach ($visitsYear as $data) {
            foreach ($lastYears as $date) {
                $dateString = $date->format('M');
                if (!isset($ChartYear[$dateString])) {
                    $ChartYear[$dateString] = 0;
                }
            }
            if (isset($ChartYear[$dateString])) {
                $date = date('M', strtotime($data['date']));
                $ChartYear[$date] = (int)$data['count'];
            }
        }

        return view('Restro.dashboard.sendgift',compact('Restaurant','Coupons','Gifts','ChartWeek','ChartMonth','ChartYear'));
    }

    public function sendgiftstore(Request $request)
    {
        $Restro = Auth::guard('restro')->user();
        if($Restro->Restaurant->subscription_status == 1 && $Restro->Restaurant->gift_send == 1) {
            if($request->mobile == null) {
                return redirect()->back()->with('error', 'The Mobile field is required.');
            }
            if(!$request->has('sendgift')) {
                return redirect()->back()->with('error', 'The Send Gift field is required.');
            }
            $Complementry = Complementary::where('account_type', 'Restro')->where('status', 1)->first();
            if(!$Complementry) {
                return redirect()->back()->with('error', 'You are not eligible to send gift');
            }

            $User = User::where('mobile', $request->mobile)->first();
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
                    Passport::create([
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
            foreach($request->sendgift as $key => $val) {
                $qty = 'qty_'.$val;
                $GiftCoupon = new GiftCoupon();
                $GiftCoupon->gift_id = $Gift->id;
                $GiftCoupon->coupon_id = $val;
                $GiftCoupon->quantity = $request->$qty;
                $GiftCoupon->status = $User ? 1 : 0;
                $GiftCoupon->save();
                if($User) {
                    $UserCoupon = new UserCoupon();
                    $UserCoupon->coupon_id = $val;
                    $UserCoupon->user_id = $User->id;
                    $UserCoupon->passport_id = $Passport->id;
                    $UserCoupon->gift_id = $Gift->id;
                    $UserCoupon->quantity = $request->$qty;
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

            return redirect()->back()->with('success', 'Gift Send successfully');
        } else {
            return redirect()->back()->with('error', 'You can not use this features without subscription, Please subscribe your restaurant');
        }
    }

    public function sendgiftlist($id)
    {
        $GiftCoupons = GiftCoupon::where('gift_id', $id)->orderBy('id','desc')->get();
        // dd($GiftCoupons);
        return view('Restro.dashboard.giftlist',compact('GiftCoupons'));
    }

    public function other(Request $request) {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'price_per_person' => 'required',
            'establishment_type' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', 'Required field missing');
        }

        $Restro = Auth::guard('restro')->user();
        $Restaurant = Restaurant::find($Restro->restro_id);
        $Restaurant->price_per_person = $request->price_per_person;
        $Restaurant->meal_preference = implode(',',$request->meal_preference);
        $Restaurant->details_status = 1;

        $Restaurant->must_try = $request->must_try;
        $Restaurant->establishment_type = $request->establishment_type;
        $Restaurant->open_time = $request->open_time;
        $Restaurant->save();
        foreach ($request->category_id as $key => $value) {
            RestroCategory::create([
                'restro_id' => $Restro->restro_id,
                'category_id' => $value
            ]);
        }
        foreach ($request->facility_id as $key => $value) {
            RestroFacility::create([
                'restro_id' => $Restro->restro_id,
                'facility_id' => $value
            ]);
        }

        if($request->hasFile('image')) {
            $image = $request->file('image');
            foreach ($image as $key => $file) {
                $filename = str_replace(' ', '', date('ymdHis-0'). $key .'.'.$file->getClientOriginalExtension());
                $file->storeAs('public/image', $filename);
                RestroImage::create([
                    'restro_id' => $Restro->restro_id,
                    'image' => $filename,
                    'image_type' => 1
                ]);
            }
        }
        if($request->hasFile('menu')) {
            $menus=$request->file('menu');
            foreach ($menus as $key => $file) {
                $filename = str_replace(' ', '', date('ymdHis-1 '). $key .'.'.$file->getClientOriginalExtension());
                $file->storeAs('public/image', $filename);
                RestroImage::create([
                    'restro_id' => $Restro->restro_id,
                    'image' => $filename,
                    'image_type' => 2
                ]);
            }
        }
        $details = ['details' => 'admin'];
        $ApproveReject = new ApproveReject();
        $ApproveReject->restro_id = $Restaurant->id;
        $ApproveReject->details = $details;
        $ApproveReject->type = 0;
        $ApproveReject->status = 0;
        $ApproveReject->save();
        return redirect()->back()->with('success', 'Details store successfully');
    }

    public function sendwhatsapp(Request $request) {
        $Restro = Auth::guard('restro')->user();
        if($Restro->Restaurant->subscription_status == 1 && $Restro->Restaurant->event_details == 1) {
            $id = $request->id;
            $template = $request->template;
            $User = User::find($id);
            $to = $User->mobile;
            $recipient_type = "individual";
            $template_name = $template;
            if($template == 'anniversary') {
                $language_code = "en";
                $parameters = [
                    [
                        "type" => "body",
                        "parameters" => [
                            ["type" => "text", "text" => $Restro->Restaurant->name]
                        ]
                    ]
                ];
            }
            if($template == 'anniversary_2') {
                $language_code = "en";
                $parameters = [
                    [
                        "type" => "body",
                        "parameters" => [
                            ["type" => "text", "text" => $Restro->Restaurant->name],
                            ["type" => "text", "text" => $User->name]
                        ]
                    ]
                ];
            }
            if($template == 'birthday') {
                $language_code = "en_US";
                $parameters = [
                    [
                        "type" => "body",
                        "parameters" => [
                            ["type" => "text", "text" => $User->name],
                            ["type" => "text", "text" => $Restro->Restaurant->name]
                        ]
                    ]
                ];
            }
            if($template == 'birathday_3') {
                $language_code = "en";
                $parameters = [
                    [
                        "type" => "body",
                        "parameters" => [
                            ["type" => "text", "text" => $User->name],
                            ["type" => "text", "text" => $Restro->Restaurant->name]
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
            }
            if($template == 'birthday_week') {
                $language_code = "en_GB";
                $parameters = [
                    [
                        "type" => "body",
                        "parameters" => [
                            ["type" => "text", "text" => $User->name],
                            ["type" => "text", "text" => $Restro->Restaurant->name]
                        ]
                    ]
                ];
            }
            sendWhatsapp($to, $recipient_type, $template_name, $language_code, $parameters);
            $Restaurant = Restaurant::find($Restro->restro_id);
            $Restaurant->gr_coin = $Restaurant->gr_coin - 1;
            $Restaurant->save();
            return redirect()->back()->with('success', 'SMS send successfully');
        } else {
            return redirect()->back()->with('error', 'You can not use this features without subscription, Please subscribe your restaurant');
        }
    }
}
