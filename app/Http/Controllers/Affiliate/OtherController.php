<?php

namespace App\Http\Controllers\Affiliate;

use App\Http\Controllers\Controller;
use App\Models\Affiliate;
use App\Models\QrGenerate;
use App\Models\Restaurant;
use App\Models\Wallet;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class OtherController extends Controller
{

    public function payment() {
        $Affiliate = Auth::guard('affiliate')->user();
        $Credits = Wallet::where('affiliate_id', $Affiliate->id)->orderBy('id', 'desc')->get();
        return view('Affiliate.payment.index', compact('Affiliate', 'Credits'));
    }

    public function paymentstore(Request $request) {
        $request->validate([
            'amount' => 'required',
        ],[
            'amount' => 'Withdrawal Amount is required.',
        ]);
        $Affiliate = Auth::guard('affiliate')->user();
        $Wallet = $Affiliate->wallet - $request->amount;
        if($Wallet >= 0) {
            $Users = Affiliate::find($Affiliate->id);
            Wallet::create([
                'affiliate_id' => $Affiliate->id,
                'amount'  => $request->amount,
                'status' => 0,
                'type' => 2
            ]);
            $Users->Wallet = $Wallet;
            $Users->save();
            return redirect()->back()->with('success', 'Withdrawal Request send successfully');
        } else{
            return redirect()->back()->with('error', 'Please check Amount');
        }
    }

    public function sales() {
        $Affiliate = Auth::guard('affiliate')->user();
        // Week
        $lastSevenDays = CarbonPeriod::create(Carbon::now()->subDays(6), Carbon::now());
        $visits= Wallet::select([DB::raw('DATE(created_at) AS date'), DB::raw('sum(amount) AS count')])
        ->whereBetween('created_at', [Carbon::now()->subDays(7), Carbon::now()])
        ->where('affiliate_id', $Affiliate->id)->groupBy('date')->orderBy('date','DESC')->get()->toArray();
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
        $visitsmonth= Wallet::select([DB::raw('DATE(created_at) AS date'), DB::raw('sum(amount) AS count')])
        ->whereBetween('created_at', [Carbon::now()->subMonths(1), Carbon::now()])
        ->where('affiliate_id', $Affiliate->id)->groupBy('date')->orderBy('date','DESC')->get()->toArray();
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
        $visitsYear= Wallet::select([DB::raw('concat(Year(created_at),"-",month(created_at),"-01") AS date'), DB::raw('sum(amount) AS count')])
        ->whereBetween('created_at', [Carbon::now()->subYears(1), Carbon::now()])
        ->where('affiliate_id', $Affiliate->id)->groupBy('date')->orderBy('date','DESC')->get()->toArray();
        $ChartYear= array();
        foreach ($visitsYear as $data) {
            foreach ($lastYears as $date) {
                $dateString = $date->format('M-y');
                if (!isset($ChartYear[$dateString])) {
                    $ChartYear[$dateString] = 0;
                }
            }
            if (isset($ChartYear[$dateString])) {
                $date = date('M-y', strtotime($data['date']));
                $ChartYear[$date] = (int)$data['count'];
            }
        }
        return view('Affiliate.sales.index', compact('ChartWeek','ChartMonth','ChartYear'));
    }
    public function sales1() {
        $Affiliate = Auth::guard('affiliate')->user();
        // Week
        $lastSevenDays = CarbonPeriod::create(Carbon::now()->subDays(6), Carbon::now());
        $visits= Wallet::select([DB::raw('DATE(created_at) AS date'), DB::raw('sum(amount) AS count')])
        ->whereBetween('created_at', [Carbon::now()->subDays(7), Carbon::now()])
        ->where('affiliate_id', $Affiliate->id)->groupBy('date')->orderBy('date','DESC')->get()->toArray();
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
        $visitsmonth= Wallet::select([DB::raw('DATE(created_at) AS date'), DB::raw('sum(amount) AS count')])
        ->whereBetween('created_at', [Carbon::now()->subMonths(1), Carbon::now()])
        ->where('affiliate_id', $Affiliate->id)->groupBy('date')->orderBy('date','DESC')->get()->toArray();
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
        $visitsYear= Wallet::select([DB::raw('Month(created_at) AS date'), DB::raw('sum(amount) AS count')])
        ->whereBetween('created_at', [Carbon::now()->subYears(1), Carbon::now()])
        ->where('affiliate_id', $Affiliate->id)->groupBy('date')->orderBy('date','DESC')->get()->toArray();
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
        return view('Affiliate.sales.index1', compact('ChartWeek','ChartMonth','ChartYear'));
    }

    public function qrmanagement() {
        $Affiliate = Auth::guard('affiliate')->user();
        $Restaurant = Restaurant::where('status',1)->select('id', 'name')->get();
        $QrGenerate = QrGenerate::where('affiliate_id' ,$Affiliate->id)->where('type', 2)->where('status', 1)->first();
        $path = public_path('assets/images/logo-sm-dark.png');

        $from = [66, 89, 105];
        $to = [237, 109, 85];

        return view('Affiliate.qr.index', compact('Restaurant','QrGenerate','path','from','to'));
    }

    public function qrlink(Request $request)
    {
        $Affiliate = Auth::guard('affiliate')->user();
        $validator = Validator::make($request->all(),[
            'qr_code' => ['required'],
        ]);
        if($validator->fails()){
            return redirect()->back()->with('error', 'QR Code is required');
        }

        $QrGenerate = QrGenerate::where('qr_code', $request->qr_code)->first();
        if($QrGenerate) {
            if($QrGenerate->status == 1) {
                return redirect()->back()->with('error', 'This QR already link');
            } else {
                QrGenerate::where('affiliate_id', $Affiliate->id)->where('type', $request->type)->update(['status' => 2]);
                $QrGenerate->affiliate_id = $Affiliate->id;
                $QrGenerate->type = 2;
                $QrGenerate->status = 1;
                $QrGenerate->save();
                Affiliate::find($Affiliate->id)->update(['ref_code' => $request->ref_code]);
            }

            return redirect()->back()->with('success', 'QR Code link successfully');
        } else {
            return redirect()->back()->with('error', 'Invalid QR Code');
        }
    }

    public function restrolink($id)
    {
        $Restaurant = Restaurant::findOrFail($id);
        if ($Restaurant) {
            $Auth = Auth::guard('affiliate')->user();
            Affiliate::find($Auth->id)->update(['restro_id' => $id]);
            return response(['status' => true, 'message' => 'Restaurant Link successfully']);
        }
        return response(['status' => false, 'message' => 'somthing went wrong please try again letter']);
    }

}
