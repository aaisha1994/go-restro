<?php

namespace App\Http\Controllers\Affiliate;

use App\Http\Controllers\Controller;
use App\Mail\Reffer;
use App\Models\AffiliateCommission;
use App\Models\City;
use App\Models\ContactUs;
use App\Models\Faq;
use App\Models\InvitePeople;
use App\Models\Restaurant;
use App\Models\State;
use App\Models\Support;
use App\Models\Wallet;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $Affiliate = Auth::guard('affiliate')->user();
        $Credit = Wallet::where('affiliate_id', $Affiliate->id)->where('type', 1)->sum('amount');
        $Restros = Restaurant::where('affiliate_id', $Affiliate->id)->orderBy('id', 'desc')->take(5)->get();
        $Wallets = Wallet::where('affiliate_id', $Affiliate->id)->orderBy('id', 'desc')->take(5)->get();
        $InvitePeoples = InvitePeople::where('affiliate_id', $Affiliate->id)->orderBy('id', 'desc')->take(5)->get();

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
        return view('Affiliate.dashboard.index', compact('Affiliate','Credit','Restros','Wallets','InvitePeoples','ChartWeek','ChartMonth','ChartYear'));
    }

    public function logout(Request $request)
    {
        Auth::guard('affiliate')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('affiliate.login');
    }

    public function invitePeoplelist() {
        $Affiliate = Auth::guard('affiliate')->user();
        $InvitePeoples = InvitePeople::where('affiliate_id', $Affiliate->id)->orderBy('id', 'desc')->get();
        return view('Affiliate.dashboard.invite', compact('Affiliate','InvitePeoples'));
    }

    public function profile() {
        $Affiliate = Auth::guard('affiliate')->user();
        $State = State::where('country_id', 106)->get();
        $Commission = AffiliateCommission::where('status', 1)->get();
        $City = City::where('state_id', $Affiliate->state_id)->get();

        $Supports = Support::where('user_id', $Affiliate->id)->where('account_type', 3)->orderBy('id','desc')->get();
        $FAQs = Faq::where('type', 3)->get();
        $ContactUs = ContactUs::first();
        return view('Affiliate.dashboard.profile', compact('Affiliate','State','Commission','City','Supports','FAQs','ContactUs'));
    }

    public function profileupdate(Request $request, $type) {
        $Affiliate = Auth::guard('affiliate')->user();
        if($type == 1) {
            $Affiliate->first_name = $request->first_name;
            $Affiliate->last_name = $request->last_name;
            $Affiliate->email = $request->email;
            $Affiliate->mobile = $request->mobile;
            $Affiliate->state_id = $request->state_id;
            $Affiliate->city = $request->city;
            $Affiliate->zip_code = $request->zip_code;
            $Affiliate->vehicle_number = $request->vehicle_number ?? null;
            $Affiliate->agency_name = $request->agency_name ?? null;
            $Affiliate->gst_no = $request->gst_no ?? null;
        }
        if($type == 2) {
            $Affiliate->bank_name = $request->bank_name;
            $Affiliate->holder_name = $request->holder_name;
            $Affiliate->account_number = $request->account_number;
            $Affiliate->ifsc_code = $request->ifsc_code;
        }
        if($type == 3) {
            if(!Hash::check($request->old_password, $Affiliate->password)){
                return redirect()->back()->with('error', 'Old Password does not match');
            }
            $Affiliate->password = Hash::make($request->new_password);
        }
        $Affiliate->save();
        return redirect()->route('affiliate.profile')->with('success', 'Profile update successfully');
    }

    public function supportstore(Request $request)
    {
        $request->validate([
            'subject' => 'required',
            'message' => 'required',
        ],[
            'subject' => 'Subject is required.',
            'message' => 'Description is required.',
        ]);
        $Affiliate = Auth::guard('affiliate')->user();

        $Support = new Support();
        $Support->subject = $request->subject;
        $Support->message = $request->message;
        $Support->account_type = 3;
        $Support->user_id = $Affiliate->id;
        $Support->status = 0;
        $Support->save();

        return redirect(route('affiliate.profile'))->with('success', 'Support Ticket created successfully');
    }

    public function supportedit($id) {
        $Support = Support::find($id);
        return response(['status' => true, 'data'=> $Support, 'message' => 'success']);
    }

    public function invitePeople(Request $request)
    {
        try {
            $Affiliate = Auth::guard('affiliate')->user();
            $validator = Validator::make($request->all(),[
                'email' => ['required']
            ]);

            if ($validator->fails()) {
                $messages = $validator->getMessageBag();
                return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => $messages]], 422);
            }

            $InvitePeople = new InvitePeople();
            $InvitePeople->affiliate_id = $Affiliate->id;
            $InvitePeople->email = $request->email;
            $InvitePeople->status = 0;
            $InvitePeople->save();

            $url = 'https://go-restro.com/?ref='. $Affiliate->ref_code;

            $details = [
                'title' => 'Confirm your email address to get started on Go-Affiliate',
                'url' => $url,
                'email' => $request->email
            ];

            Mail::to($request->email)->send(new Reffer($details));
            return response(['status' => true, 'message' => 'Email send successfully']);
        } catch (Exception $e) {
            return response(['status' => false, 'message' => 'somthing went wrong please try again letter']);
        }
    }
}
