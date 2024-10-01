<?php

namespace App\Http\Controllers\RestroApi;

use App\Http\Controllers\Controller;
use App\Models\Cms;
use App\Models\Coupon;
use App\Models\Faq;
use App\Models\Gift;
use App\Models\NotificationList;
use App\Models\Passport;
use App\Models\Redeem;
use App\Models\Restaurant;
use App\Models\Support;
use App\Models\User;
use App\Models\UserCoupon;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class MoreController extends Controller
{
    public function Dashboard()
    {
        try {
            $Restro = Auth::guard('restroapi')->user();

            $User = Passport::where('restro_id', $Restro->restro_id)->select('user_id')->groupBy('user_id')->get()->pluck('user_id')->toArray();
            $Users = User::whereIn('id', $User)->select('id','name','mobile', 'date_of_birth', 'other_date')->get();
            $event = [];
            $cdate = date('m');
            foreach ($Users as $key => $value) {
                foreach (explode(',',str_replace(array( '[', ']','{','}' ), '', json_encode($value->other_date))) as $k => $v) {
                    $date = str_replace(array( '"',  ), '', explode(':', $v)[1]);
                    if(date('m', strtotime($date)) == $cdate) {
                        $dd = [];
                        $dd['id'] = $value->id;
                        $dd['name'] = $value->name;
                        $dd['mobile'] = $value->mobile;
                        $dd['event_name'] = str_replace(array( '"',  ), '', explode(':', $v)[0]);
                        $dd['event_date'] = date('Y'). date('-m-d', strtotime($date));
                        array_push($event, $dd);
                    }
                }
            }

            $data['customer'] = count($User);
            $Passport = Passport::where('restro_id', $Restro->restro_id)->pluck('id')->toArray();
            $data['redeem'] = UserCoupon::whereIn('passport_id', $Passport)->sum('pending');
            $data['offer'] = Coupon::where('restro_id', $Restro->restro_id)->count();

            $data['complementry'] = UserCoupon::whereIn('passport_id', $Passport)->whereNotNull('gift_id')->sum('pending');
            $data['todaycustomer'] = Redeem::whereDate('created_at', Carbon::today())->where('restro_id', $Restro->restro_id)->count('id');
            $data['sendgift'] = Gift::where('restro_id', $Restro->restro_id)->whereNull('admin_id')->whereNull('user_id')->whereNull('affiliate_id')->whereNull('utm_id')->count();

            $data['event'] = $event;
            // Week
            $lastSevenDays = CarbonPeriod::create(Carbon::now()->subDays(6), Carbon::now());
            $visits= Passport::select([DB::raw('DATE(created_at) AS date'), DB::raw('count(id) AS count')])
            ->whereBetween('created_at', [Carbon::now()->subDays(7), Carbon::now()])
            ->where('restro_id', $Restro->restro_id)->where('gift_status', 0)->groupBy('date')->orderBy('date','DESC')->get()->toArray();
            $ChartWeek= array();
            foreach ($lastSevenDays as $date) {
                $dateString = $date->format('M d');
                if (!isset($ChartWeek[$dateString])) {
                    $ChartWeek[$dateString] = 0;
                }
            }
            foreach ($visits as $data1) {
                $date = date('M d', strtotime($data1['date']));
                $ChartWeek[$date] = (int)$data1['count'];
            }
            // month
            $lastMonths = CarbonPeriod::create(Carbon::now()->subMonths(1), Carbon::now());
            $visitsmonth= Passport::select([DB::raw('DATE(created_at) AS date'), DB::raw('count(id) AS count')])
            ->whereBetween('created_at', [Carbon::now()->subMonths(1), Carbon::now()])
            ->where('restro_id', $Restro->restro_id)->where('gift_status', 0)->groupBy('date')->orderBy('date','DESC')->get()->toArray();
            $ChartMonth= array();
            foreach ($lastMonths as $date) {
                $dateString = $date->format('M d');
                if (!isset($ChartMonth[$dateString])) {
                    $ChartMonth[$dateString] = 0;
                }
            }
            foreach ($visitsmonth as $data1) {
                $date = date('M d', strtotime($data1['date']));
                $ChartMonth[$date] = (int)$data1['count'];
            }
            // year
            $lastYears = CarbonPeriod::create(Carbon::now()->subYears(1), Carbon::now());
            $visitsYear= Passport::select([DB::raw('concat(Year(created_at),"-",month(created_at),"-01") AS date'), DB::raw('count(id) AS count')])
            ->whereBetween('created_at', [Carbon::now()->subYears(1), Carbon::now()])
            ->where('restro_id', $Restro->restro_id)->where('gift_status', 0)->groupBy('date')->orderBy('date','DESC')->get()->toArray();
            $ChartYear= array();
            foreach ($lastYears as $date) {
                $dateString = $date->format('M-y');
                if (!isset($ChartYear[$dateString])) {
                    $ChartYear[$dateString] = 0;
                }
            }
            foreach ($visitsYear as $data1) {
                $date = date('M-y', strtotime($data1['date']));
                $ChartYear[$date] = (int)$data1['count'];
            }


            $data['ChartWeek'] = $ChartWeek;
            $data['ChartMonth'] = $ChartMonth;
            $data['ChartYear'] = $ChartYear;
            $grleaders = DB::select("SELECT r.id, r.name, r.logo, r.rank as ranks,
            (SELECT COUNT(DISTINCT user_id) FROM passports p WHERE p.restro_id = r.id) AS user
            FROM restaurants r
            where r.status = 1 and r.deleted_at is null and (r.rank IN (1,2,3,4,5) or id=?) order by r.rank asc", [$Restro->restro_id]);

            return response()->json(['success' => true, 'data' => ['result' => $data, 'grleaders' => $grleaders, 'message' => 'success.']], 200);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => $e->getMessage()]], 422);
        }
    }

    public function Support()
    {
        try {
            $Restro = Auth::guard('restroapi')->user();
            $Support = Support::where('user_id', $Restro->id)->where('account_type', 2)->orderBy('id','desc')->get();
            return response()->json(['success' => true, 'data' => ['result' => $Support, 'message' => 'success.']], 200);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => $e->getMessage()]], 422);
        }
    }

    public function SupportStore(Request $request)
    {
        try {
            $Restro = Auth::guard('restroapi')->user();
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
                'account_type' => 2,
                'user_id' => $Restro->id,
                'status' => 0
            ]);
            return response()->json(['success' => true, 'data' => ['result' => $Support, 'message' => 'success.']], 200);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => $e->getMessage()]], 422);
        }
    }

    public function temsStore(Request $request)
    {
        try {
            $Restro = Auth::guard('restroapi')->user();
            $validator = Validator::make($request->all(),[
                'terms' => ['required'],
            ]);
            if($validator->fails()){
                $messages = $validator->getMessageBag();
                return response()->json(['success' => false, 'error' => ['message' => 'Validation Error', 'error_message' => $messages]], 422);
            }

            Restaurant::find($Restro->restro_id)->update([
                'terms' => $request->terms
            ]);
            return response()->json(['success' => true, 'data' => ['result' => [], 'message' => 'success.']], 200);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => $e->getMessage()]], 422);
        }
    }

    public function restroterms()
    {
        try {
            $Restro = Auth::guard('restroapi')->user();
            $Restaurant = Restaurant::find($Restro->restro_id);
            return response()->json(['success' => true, 'data' => ['result' => $Restaurant, 'message' => 'success.']], 200);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => $e->getMessage()]], 422);
        }
    }

    public function validityStore(Request $request)
    {
        try {
            $Restro = Auth::guard('restroapi')->user();
            $Restaurant = Restaurant::find($Restro->restro_id);
            Restaurant::find($Restro->restro_id)->update([
                'validity' => $request->validity
            ]);

            Coupon::where('restro_id', $Restro->restro_id)->update([
                'validity' => $request->validity
            ]);

            return response()->json(['success' => true, 'data' => ['result' => $Restaurant, 'message' => 'success.']], 200);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => $e->getMessage()]], 422);
        }
    }

    public function terms()
    {
        try {
            $Restro = Cms::where('type',1)->first();
            return response()->json(['success' => true, 'data' => ['result' => $Restro, 'message' => 'success.']], 200);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => $e->getMessage()]], 422);
        }
    }

    public function policy()
    {
        try {
            $Restro = Cms::where('type',2)->first();
            return response()->json(['success' => true, 'data' => ['result' => $Restro, 'message' => 'success.']], 200);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => $e->getMessage()]], 422);
        }
    }

    public function refund()
    {
        try {
            $Restro = Cms::where('type',3)->first();
            return response()->json(['success' => true, 'data' => ['result' => $Restro, 'message' => 'success.']], 200);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => $e->getMessage()]], 422);
        }
    }

    public function faq()
    {
        try {
            $Restro = Faq::where('type',2)->get();
            return response()->json(['success' => true, 'data' => ['result' => $Restro, 'message' => 'success.']], 200);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => $e->getMessage()]], 422);
        }
    }

    public function Notification()
    {
        try {
            $Restro = Auth::guard('restroapi')->user();
            $NotificationList = NotificationList::where('restro_id',$Restro->id)->orderBy('id', 'desc')->get();
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

    public function User()
    {
        try {
            $Restro = Auth::guard('restroapi')->user();
            $Url = url('storage/user/');
            $User = DB::select("SELECT u.id, u.name, u.email, u.mobile, u.expire_date,
            (select t.start_date from transactions t where t.user_id=u.id and t.restro_id=$Restro->restro_id and t.status=1 and t.tr_type=1 order by t.id desc limit 1) as purchase_date
            from users u
            where u.id in(
                select p.user_id from passports p where p.restro_id=$Restro->restro_id group by p.user_id
            )");
            // $User = User::orderBy('id', 'desc')->get();
            return response()->json(['success' => true, 'data' => ['result' => $User, 'message' => 'success.']], 200);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => $e->getMessage()]], 422);
        }
    }

    public function templatelist()
    {
        $Arr = [
            [
            'name' => 'anniversary',
            'msg' => 'Happy anniversary to the most amazing couple! ... \nDining with {{1}}. for Exclusive offers\nRegards , Go-Restro'
            ],
            [
            'name' => 'anniversary_2',
            'msg' => '{{2}} Happy Anniversary ,\nCheers to love and good food!\nwith {{1}} ,\nPrivilege offer using Go-Restro app'
            ],
            [
            'name' => 'birthday',
            'msg' => 'Dear {{1}} , \n*Wishing you the best on your birthday,*\nPlan for Party or Dinner ?\nYou have Passport of {{2}},\nGrab Your Special Discount 🏃\nTeam , Go-Restro'
            ],
            [
            'name' => 'birathday_3',
            'msg' => 'Hey {{1}},\nSending you lots of love on your special day !\nPlan for dine-out ,\nspecial discount at {{2}}\nTeam Go-Restro'
            ],
            [
            'name' => 'birthday_week',
            'msg' => 'Hi {{1}},\nIt`s Your birthday week ! Celebrating and plan party with {{2}} ,\nGet *Exclusive Deals On Meals*\nTeam Go-Restro'
            ],
        ];
        return response()->json(['success' => true, 'data' => ['result' => $Arr, 'message' => 'success.']], 200);
    }

    public function sendwhatsapp(Request $request)
    {
        $Restro = Auth::guard('restroapi')->user();
        $template = $request->template;
        $User = User::find($request->user_id);
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
        return response()->json(['success' => true, 'data' => ['result' => [], 'message' => 'success.']], 200);
    }
}
