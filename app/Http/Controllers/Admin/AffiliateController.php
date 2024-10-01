<?php

namespace App\Http\Controllers\Admin;

use App\Exports\AffiliateExport;
use App\Http\Controllers\Controller;
use App\Models\Affiliate;
use App\Models\AffiliateCommission;
use App\Models\State;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class AffiliateController extends Controller
{
    public function index()
    {
        if(Auth::guard('admin')->user()->is_admin == 1 || in_array('Affiliates', Auth::guard('admin')->user()->role_details)) {
            $Affiliates = Affiliate::orderBy('id', 'desc')->get();
            return view('Admin.affiliate.index', compact('Affiliates'));
        } else{
            return redirect()->back()->with('error', 'Permission denied');
        }
    }

    public function create()
    {
        if(Auth::guard('admin')->user()->is_admin == 1 || in_array('Affiliates', Auth::guard('admin')->user()->role_details)) {
            $State = State::where('country_id', 106)->get();
            $Commission = AffiliateCommission::where('status', 1)->get();
            return view('Admin.affiliate.create', compact('State', 'Commission'));
        } else{
            return redirect()->back()->with('error', 'Permission denied');
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'first_name' => 'required',
            'mobile' => 'required|digits:10',
        ],[
            'first_name' => 'First Name field is required.',
            'mobile' => 'Mobile field is required.',
            'email.required' => 'Email field is required.',
        ]);


        // $randomString = Str::random(7);
        // $ref_code = strtoupper('GR'. $randomString);
        $Affiliate = new Affiliate();
        $Affiliate->first_name = $request->first_name;
        $Affiliate->last_name = $request->last_name;
        $Affiliate->email = $request->email;
        $Affiliate->mobile = $request->mobile;
        $Affiliate->affiliate_type = $request->affiliate_type;
        $Affiliate->country_id = $request->country_id ?? 106;
        $Affiliate->state_id = $request->state_id;
        $Affiliate->city = $request->city;
        $Affiliate->address = $request->address;
        $Affiliate->zip_code = $request->zip_code;
        $Affiliate->password = Hash::make($request->password);
        $Affiliate->vehicle_number = $request->vehicle_number ?? null;
        $Affiliate->agency_name = $request->agency_name ?? null;
        $Affiliate->commission_type = $request->commission_type;
        $Affiliate->gst_no = $request->gst_no ?? null;
        $Affiliate->commission = $request->commission ?? 0;
        $Affiliate->bank_name = $request->bank_name;
        $Affiliate->holder_name = $request->holder_name;
        $Affiliate->account_number = $request->account_number;
        $Affiliate->ifsc_code = $request->ifsc_code;
        $Affiliate->amount = $request->amount;
        // $Affiliate->ref_code = $ref_code;
        $Affiliate->status = 1;
        $Affiliate->save();

        return redirect(route('admin.affiliate.index'))->with('success', 'Affiliate created successfully');
    }

    public function edit($id)
    {
        if(Auth::guard('admin')->user()->is_admin == 1 || in_array('Affiliates', Auth::guard('admin')->user()->role_details)) {
            $Affiliate = Affiliate::findOrFail($id);
            $State = State::where('country_id', $Affiliate->country_id)->get();
            $Commission = AffiliateCommission::where('status', 1)->get();
            return view('Admin.affiliate.edit', compact('Affiliate', 'State', 'Commission'));
        } else{
            return redirect()->back()->with('error', 'Permission denied');
        }
    }

    public function view($id)
    {
        if(Auth::guard('admin')->user()->is_admin == 1 || in_array('Affiliates', Auth::guard('admin')->user()->role_details)) {
            $Affiliate = Affiliate::findOrFail($id);
            $Credit = Wallet::where('affiliate_id', $id)->where('type', 1)->sum('amount');
            $Debit = Wallet::where('affiliate_id', $id)->where('type', 2)->sum('amount');
            $Transactions = Wallet::where('affiliate_id', $id)->orderBy('id', 'desc')->get();
            return view('Admin.affiliate.view', compact('Affiliate','Credit','Debit','Transactions'));
        } else{
            return redirect()->back()->with('error', 'Permission denied');
        }
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $Affiliate = Affiliate::findOrFail($id);
        $request->validate([
            'first_name' => 'required',
            'email'   => 'required|email|unique:affiliates,email,' . $Affiliate->id,
            'mobile'  => 'required|unique:affiliates,mobile,' . $Affiliate->id
        ],[
            'first_name' => 'First Name field is required.',
            'email' => 'Email field is required.',
            'mobile' => 'Mobile field is required.',
        ]);
        $Affiliate->first_name = $request->first_name;
        $Affiliate->last_name = $request->last_name;
        $Affiliate->email = $request->email;
        $Affiliate->mobile = $request->mobile;
        // $Affiliate->affiliate_type = $request->affiliate_type;
        $Affiliate->country_id = $request->country_id ?? 106;
        $Affiliate->state_id = $request->state_id;
        $Affiliate->city = $request->city;
        $Affiliate->address = $request->address;
        $Affiliate->zip_code = $request->zip_code;
        $Affiliate->vehicle_number = $request->vehicle_number ?? null;
        $Affiliate->agency_name = $request->agency_name ?? null;
        $Affiliate->commission_type = $request->commission_type;
        $Affiliate->gst_no = $request->gst_no ?? null;
        $Affiliate->commission = $request->commission ?? 0;
        $Affiliate->bank_name = $request->bank_name;
        $Affiliate->holder_name = $request->holder_name;
        $Affiliate->account_number = $request->account_number;
        $Affiliate->ifsc_code = $request->ifsc_code;
        $Affiliate->amount = $request->amount;
        $Affiliate->save();

        return redirect(route('admin.affiliate.index'))->with('success', 'Affiliate Updated successfully');
    }

    public function destroy($id)
    {
        $Affiliate = Affiliate::findOrFail($id);
        if ($Affiliate) {
            $Affiliate->delete();
            return response(['status' => true, 'message' => 'Affiliate deleted successfully']);
        } else {
            return response(['status' => false, 'message' => 'somthing went wrong please try again letter']);
        }
    }

    public function status($id)
    {
        $Affiliate = Affiliate::findOrFail($id);
        if ($Affiliate) {
            if($Affiliate->status == 1){
                $Affiliate->update(['status'=> 2]);
                $status = 'Deactive';
            } else{
                $Affiliate->update(['status'=> 1]);
                $status = 'Active';
            }
            return response(['status' => true, 'message' => 'Status '.$status.' successfully']);
        }
        return response(['status' => false, 'message' => 'somthing went wrong please try again letter']);
    }

    public function payment() {
        if(Auth::guard('admin')->user()->is_admin == 1 || in_array('Affiliates', Auth::guard('admin')->user()->role_details)) {
            $Affiliates = Affiliate::orderBy('id', 'desc')->get();
            $Pending = Wallet::whereNotNull('affiliate_id')->where('type', 2)->where('status', 0)->sum('amount');
            $InProgress = Wallet::whereNotNull('affiliate_id')->where('type', 2)->where('status', 3)->sum('amount');
            $Wallets = Wallet::whereNotNull('affiliate_id')->where('type', 2)->get();
            return view('Admin.affiliate.payment', compact('Affiliates', 'Pending', 'InProgress', 'Wallets'));
        } else{
            return redirect()->back()->with('error', 'Permission denied');
        }
    }

    public function paymentchange(Request $request, $id)
    {
        $Wallet = Wallet::findOrFail($id);
        $request->validate([
            'status' => 'required',
        ],[
            'status' => 'Status field is required.',
        ]);
        $Wallet->status = $request->status;
        if($request->status == 2) {
            $Affiliate = Affiliate::find($Wallet->affiliate_id);
            $Amount = $Affiliate->wallet + $Wallet->amount;
            $Affiliate->wallet = $Amount;
            $Affiliate->save();
        }
        $Wallet->save();

        return response(['status' => true, 'message' => 'Status change successfully']);
    }

    public function export() {
        return Excel::download(new AffiliateExport, 'affiliate.xlsx');
    }
}
