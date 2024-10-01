<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use App\Models\SubscriptionPromo;
use App\Models\Transaction;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// use PDF;

class SubscriptionController extends Controller
{
    public function index()
    {
        if(Auth::guard('admin')->user()->is_admin == 1 || in_array('Users Subscription', Auth::guard('admin')->user()->role_details)) {
            $Subscriptions = Subscription::orderBy('id', 'desc')->get();
            return view('Admin.subscription.index', compact('Subscriptions'));
        } else{
            return redirect()->back()->with('error', 'Permission denied');
        }
    }

    public function create()
    {
        if(Auth::guard('admin')->user()->is_admin == 1 || in_array('Users Subscription', Auth::guard('admin')->user()->role_details)) {
            return view('Admin.subscription.create');
        } else{
            return redirect()->back()->with('error', 'Permission denied');
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'amount' => 'required',
        ],[
            'name' => 'Name is required.',
            'amount' => 'Amount is required.',
        ]);

        $Subscription = new Subscription();
        $Subscription->name = $request->name;
        $Subscription->tenure = $request->tenure;
        $Subscription->tenure_day = $request->tenure_day;
        $Subscription->amount = $request->amount;
        $Subscription->benefits = $request->benefits;
        $Subscription->status = 1;
        $Subscription->save();

        foreach($request->promo_code as $key => $promo_code) {
            $SubscriptionPromo = new SubscriptionPromo();
            $SubscriptionPromo->subscription_id = $Subscription->id;
            $SubscriptionPromo->promo_code = $request->promo_code[$key];
            $SubscriptionPromo->redeemed = $request->redeemed[$key];
            $SubscriptionPromo->validity = $request->validity[$key];
            $SubscriptionPromo->discount = $request->discount[$key];
            $SubscriptionPromo->status = 1;
            $SubscriptionPromo->save();
        }

        return redirect(route('admin.subscription.index'))->with('success', 'Subscription created successfully');
    }

    public function edit($id)
    {
        if(Auth::guard('admin')->user()->is_admin == 1 || in_array('Users Subscription', Auth::guard('admin')->user()->role_details)) {
            $Subscription = Subscription::findOrFail($id);
            $SubscriptionPromo = SubscriptionPromo::where('subscription_id', $Subscription->id)->get();
            return view('Admin.subscription.edit', compact('Subscription','SubscriptionPromo'));
        } else{
            return redirect()->back()->with('error', 'Permission denied');
        }
    }

    public function update(Request $request, $id)
    {
        $Subscription = Subscription::findOrFail($id);
        $Subscription->name = $request->name;
        $Subscription->tenure = $request->tenure;
        $Subscription->tenure_day = $request->tenure_day;
        $Subscription->amount = $request->amount;
        $Subscription->benefits = $request->benefits;
        $Subscription->save();

        foreach($request->promo_code as $key => $promo_code) {
            if($request->promo_id[$key] == 0) {
                $SubscriptionPromo = new SubscriptionPromo();
            } else {
                $SubscriptionPromo = SubscriptionPromo::find($request->promo_id[$key]);
            }
            $SubscriptionPromo->subscription_id = $Subscription->id;
            $SubscriptionPromo->promo_code = $request->promo_code[$key];
            $SubscriptionPromo->redeemed = $request->redeemed[$key];
            $SubscriptionPromo->validity = $request->validity[$key];
            $SubscriptionPromo->discount = $request->discount[$key];
            $SubscriptionPromo->status = 1;
            $SubscriptionPromo->save();
        }
        return redirect(route('admin.subscription.index'))->with('success', 'Subscription Updated successfully');
    }

    public function destroy($id)
    {
        $Subscription = Subscription::findOrFail($id);
        if ($Subscription) {
            $Subscription->delete();
            return response(['status' => true, 'message' => 'Subscription deleted successfully']);
        } else {
            return response(['status' => false, 'message' => 'somthing went wrong please try again letter']);
        }
    }

    public function history()
    {
        if(Auth::guard('admin')->user()->is_admin == 1 || in_array('Users Subscription', Auth::guard('admin')->user()->role_details)) {
            $Transactions = Transaction::where('tr_type', 2)->where('status', 1)->orderBy('id', 'desc')->get();
            return view('Admin.subscription.history', compact('Transactions'));
        } else{
            return redirect()->back()->with('error', 'Permission denied');
        }
    }
    public function invoice($id)
    {
        $Transactions = Transaction::find($id);
        $data = [
            'title' => 'Welcome to GO-Restro',
            'date' => date('m/d/Y')
        ];

        $pdf = Pdf::loadView('invoice.subscription', $data);
        $filename = date('dmYhis', strtotime($Transactions->created_at)) . $Transactions->order_no.'.pdf';
        return $pdf->download($filename);
    }

    public function passporthistory()
    {
        $Transactions = Transaction::where('tr_type', 1)->where('status', 1)->orderBy('id', 'desc')->get();
        return view('Admin.subscription.user-history', compact('Transactions'));
    }

    public function passportinvoice($id)
    {
        $Transactions = Transaction::find($id);
        $data = [
            'title' => 'Welcome to GO-Restro',
            'date' => date('m/d/Y')
        ];

        $pdf = Pdf::loadView('invoice.user', $data);
        $filename = date('dmYhis', strtotime($Transactions->created_at)) . $Transactions->order_no.'.pdf';
        return $pdf->download($filename);
    }


    public function subdelete($id)
    {
        $SubscriptionPromo = SubscriptionPromo::findOrFail($id);
        if ($SubscriptionPromo) {
            $SubscriptionPromo->delete();
            return response(['status' => true, 'message' => 'Promo Code deleted successfully']);
        } else {
            return response(['status' => false, 'message' => 'somthing went wrong please try again letter']);
        }
    }
}
