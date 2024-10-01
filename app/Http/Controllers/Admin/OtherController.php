<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AffiliateCommission;
use App\Models\Inquiry;
use App\Models\ReferEarn;
use App\Models\Restaurant;
use App\Models\Utm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class OtherController extends Controller
{
    public function commission()
    {
        if(Auth::guard('admin')->user()->is_admin == 1 || in_array('Affiliate Commission', Auth::guard('admin')->user()->role_details)) {
            $AffiliateCommission = AffiliateCommission::where('status', 1)->orderBy('id', 'desc')->get();
            return view('Admin.master.affiliate_commission.index', compact('AffiliateCommission'));
        } else{
            return redirect()->back()->with('error', 'Permission denied');
        }
    }

    public function commissionstore(Request $request)
    {
        foreach ($request->type as $key => $value) {
            $Commission = AffiliateCommission::find($request->id[$key]);
            $Commission->type = $value;
            $Commission->per_download = $request->per_download[$key];
            $Commission->per_purchase = $request->per_purchase[$key];
            $Commission->save();
        }
        return redirect(route('admin.commission.index'))->with('success', 'Refer and Earn Updated successfully');
    }

    public function refer()
    {
        if(Auth::guard('admin')->user()->is_admin == 1 || in_array('Refer & Earn', Auth::guard('admin')->user()->role_details)) {
            $ReferEarn = ReferEarn::where('status', 1)->first();
            return view('Admin.master.referrean.index', compact('ReferEarn'));
        } else{
            return redirect()->back()->with('error', 'Permission denied');
        }
    }

    public function referstore(Request $request)
    {
        $ReferEarn = ReferEarn::where('status', 1)->first();
        $ReferEarn->coin_per_ref = $request->coin_per_ref;
        $ReferEarn->value_of_coin = $request->value_of_coin;
        $ReferEarn->terms = $request->terms;
        $ReferEarn->save();
        return redirect(route('admin.refer.index'))->with('success', 'Refer and Earn Updated successfully');
    }

    public function LeaderBoard()
    {
        if(Auth::guard('admin')->user()->is_admin == 1 || in_array('Leader Board', Auth::guard('admin')->user()->role_details)) {
            $Restros = Restaurant::where('status', 1)->orderBy('rank', 'asc')->select('id','name','rank')->get();
            return view('Admin.leader_board.index', compact('Restros'));
        } else{
            return redirect()->back()->with('error', 'Permission denied');
        }
    }

    // UTM
    public function UtmCampaign()
    {
        if(Auth::guard('admin')->user()->is_admin == 1 || in_array('UTM Campaign', Auth::guard('admin')->user()->role_details)) {
            $Utms = Utm::where('status', 1)->orderBy('id', 'desc')->get();
            return view('Admin.utm_campaign.index', compact('Utms'));
        } else{
            return redirect()->back()->with('error', 'Permission denied');
        }
    }

    public function UtmCampaignCreate()
    {
        if(Auth::guard('admin')->user()->is_admin == 1 || in_array('UTM Campaign', Auth::guard('admin')->user()->role_details)) {
            $Restros = Restaurant::where('status', 1)->select('id', 'name')->get();
            return view('Admin.utm_campaign.create', compact('Restros'));
        } else{
            return redirect()->back()->with('error', 'Permission denied');
        }
    }

    public function UtmCampaignStore(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'restro_id' => 'required',
        ],[
            'name' => 'Name field is required.',
            'restro_id' => 'Restaurant field is required.',
        ]);
        $randomString = Str::random(7);
        $ref_code = strtoupper('GR'. $randomString);
        $Utm = new Utm();
        $Utm->name = $request->name;
        $Utm->restro_id = $request->restro_id;
        $Utm->ref_code = $ref_code;
        $Utm->status = 1;
        $Utm->save();
        return redirect(route('admin.utmcampaign.index'))->with('success', 'UTM Campaign Updated successfully');
    }

    public function UtmCampaignDelete($id)
    {
        $Utm = Utm::findOrFail($id);
        if ($Utm) {
            $Utm->delete();
            return response(['status' => true, 'message' => 'Utm deleted successfully']);
        } else {
            return response(['status' => false, 'message' => 'somthing went wrong please try again letter']);
        }
    }

    public function UserSegment()
    {
        if(Auth::guard('admin')->user()->is_admin == 1 || in_array('User Segment', Auth::guard('admin')->user()->role_details)) {
            $Users = DB::select("SELECT
                u.id, u.name, u.email, u.mobile, u.created_at,
                case when u.subscription_status=1 then 'Yes' else 'No' end as subscription,
                ifnull((select count(id) from transactions t where t.user_id=u.id),0) as purchse,
                ifnull((select count(id) from user_coupons c where c.pending > 0 and c.user_id=u.id),0) as cn
                from users u");

            return view('Admin.user_segment.index', compact('Users'));
        } else{
            return redirect()->back()->with('error', 'Permission denied');
        }
    }

    public function inquiry()
    {
        $Inquiries = Inquiry::orderBy('id', 'desc')->get();
        return view('Admin.inlquiry.index', compact('Inquiries'));
    }
}
