<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Affiliate;
use App\Models\ApproveReject;
use App\Models\Discount;
use App\Models\Fcm;
use App\Models\Restaurant;
use App\Models\Transaction;
use App\Models\User;
use App\Models\UserCoupon;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function dashboard()
    {
        // Count
        $Months1 = Carbon::now()->subMonths(1);
        $Months2 = Carbon::now()->subMonths(2);
        $data['User'] = User::count();
        $data['UserCount'] = User::where('created_at', '>=', $Months1)->count() - User::where('created_at', '>=', $Months2)->where('created_at', '<', $Months1)->count();
        $data['Restro'] = Restaurant::count();
        $data['RestroCount'] = Restaurant::where('created_at', '>=', $Months1)->count() - Restaurant::where('created_at', '>=', $Months2)->where('created_at', '<', $Months1)->count();
        $data['Affiliate'] = Affiliate::count();
        $data['AffiliateCount'] = Affiliate::where('created_at', '>=', $Months1)->count() - Affiliate::where('created_at', '>=', $Months2)->where('created_at', '<', $Months1)->count();
        $data['RestroList'] = Restaurant::where('status', 1)->select('id', 'name')->get();

        // Discount
        $discount = Discount::where('start_date', '<=', date('Y-m-d'))->where('end_date', '>=', date('Y-m-d'))->orderBy('id', 'desc')->first();
        $data['discount'] = $discount->discount ?? 0;

        // Approve / Pie Chart
        $data['approve'] = ApproveReject::where('status', 0)->orderBy('id', 'desc')->take(4)->get();
        $data1[0] = User::where('subscription_status', 1)->count();
        $data1[1] = User::where('subscription_status', 0)->count();
        $sub = Transaction::where('status', 1)->where('tr_type', 1)->groupBy('user_id')->count();
        $data1[2] = $sub;
        $data1[3] = $data['User'] - $sub;
        $UserCoupon = UserCoupon::where('pending', '>' , 0)->whereNotNull('gift_id')->groupBy('gift_id')->count();
        $data1[4] = $UserCoupon;
        $data1[5] = $data['User'] - $UserCoupon;

        $lastYears = CarbonPeriod::create(Carbon::now()->subMonths(12), Carbon::now());
        $visitsYear= Transaction::select([DB::raw('concat(Year(created_at),"-",month(created_at),"-01") AS date'), DB::raw('sum(amount) AS count')])
        ->whereBetween('created_at', [Carbon::now()->subMonths(12), Carbon::now()])
        ->where('status', 1)->groupBy('date')->orderBy('date','DESC')->get()->toArray();
        // dd($visitsYear);

        $visitsYear1= Transaction::select([DB::raw('concat(Year(created_at),"-",month(created_at),"-01") AS date'), DB::raw('sum(amount) AS count')])
        ->whereBetween('created_at', [Carbon::now()->subMonths(24), Carbon::now()->subMonths(12)])
        ->where('status', 1)->groupBy('date')->orderBy('date','DESC')->get()->toArray();
        $visitsMonth = Transaction::whereBetween('created_at', [Carbon::now()->subMonths(1), Carbon::now()])->where('status', 1)->sum('amount');
        $ChartYear= array();
        $ChartYear1= array();

        foreach ($visitsYear as $datas) {
            foreach ($lastYears as $date) {
                $dateString = $date->format('M');
                if (!isset($ChartYear[$dateString])) {
                    $ChartYear[$dateString] = 0;
                    $ChartYear1[$dateString] = 0;
                }
            }
            $date = date('M', strtotime($datas['date']));
            $ChartYear[$date] = (int)$datas['count'];
        }

        foreach ($visitsYear1 as $datas) {
            $date = date('M', strtotime($datas['date']));
            $ChartYear1[$date] = (int)$datas['count'];
        }
        return view('Admin.dashboard.index', compact('data','data1','ChartYear','ChartYear1','visitsMonth'));
    }

    public function updateToken(Request $request){
        try{
            $Admin = Auth::guard('admin')->user();
            Fcm::create([
                'admin_id' => $Admin->id,
                'fcm_token' => $request->token,
                'type' => 0
            ]);
            return response()->json([
                'success'=>true
            ]);
        }catch(\Exception $e){
            report($e);
            return response()->json([
                'success'=>false
            ],500);
        }
    }

    public function profile() {
        $Admins = Auth::guard('admin')->user();
        $Restros = Restaurant::where('status', 1)->select('id', 'name')->get();
        return view('Admin.dashboard.profile', compact('Admins','Restros'));
    }

    public function profileupdate(Request $request) {
        $Admins = Auth::guard('admin')->user();
        $admin = Admin::find($Admins->id);
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->mobile = $request->mobile;
        $admin->save();
        return redirect()->back()->with('success', 'Profile update successfully');
    }

    public function restrolink($id)
    {
        $Restaurant = Restaurant::findOrFail($id);
        if ($Restaurant) {
            $Auth = Auth::guard('admin')->user();
            Admin::find($Auth->id)->update(['restro_id' => $id]);
            return response(['status' => true, 'message' => 'Restaurant Link successfully']);
        }
        return response(['status' => false, 'message' => 'somthing went wrong please try again letter']);
    }

    public function restrosales($id) {
        $lastMonths = CarbonPeriod::create(Carbon::now()->subMonths(1), Carbon::now());
        $visitsmonth= Transaction::select([DB::raw('DATE(created_at) AS date'), DB::raw('sum(amount) AS count')])
        ->whereBetween('created_at', [Carbon::now()->subMonths(1), Carbon::now()])
        ->where('restro_id', $id)->whereIn('tr_type', [1,2])->where('status', 1)->groupBy('date')->orderBy('date','DESC')->get()->toArray();
        $ChartMonth= array();
        foreach ($lastMonths as $date) {
            $dateString = $date->format('Y-m-d');
            if (!isset($ChartMonth[$dateString])) {
                $ChartMonth[$dateString] = 0;
            }
        }
        foreach ($visitsmonth as $data) {
            $date = date('Y-m-d', strtotime($data['date']));
            $ChartMonth[$date] = (int)$data['count'];
        }

        // dd($ChartMonth);
        return response(['status' => true, 'data' => $ChartMonth,'message' => 'Restaurant chart successfully']);
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }
}
