<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RestroSubcription;
use App\Models\Transaction;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RestroSubscriptionController extends Controller
{
    public function index()
    {
        if(Auth::guard('admin')->user()->is_admin == 1 || in_array('Restro Subscription', Auth::guard('admin')->user()->role_details)) {
            $Subscriptions = RestroSubcription::orderBy('id', 'desc')->get();
            return view('Admin.subscription.restro.index', compact('Subscriptions'));
        } else{
            return redirect()->back()->with('error', 'Permission denied');
        }
    }

    public function create()
    {
        if(Auth::guard('admin')->user()->is_admin == 1 || in_array('Restro Subscription', Auth::guard('admin')->user()->role_details)) {
            return view('Admin.subscription.restro.create');
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

        $Subscription = new RestroSubcription();
        $Subscription->name = $request->name;
        $Subscription->amount = $request->amount;
        $Subscription->benefits = $request->benefits;
        $Subscription->gift_send = $request->gift_send ?? 0;
        $Subscription->event_details = $request->event_details ?? 0;
        $Subscription->compliment_coin = $request->compliment_coin ?? 0;
        $Subscription->staff_allocation = $request->staff_allocation ?? 0;
        $Subscription->gr_coin = $request->compliment_coin ? $request->gr_coin : 0;
        $Subscription->status = 1;
        $Subscription->save();

        return redirect(route('admin.restrosubscription.index'))->with('success', 'Subscription created successfully');
    }

    public function edit($id)
    {
        if(Auth::guard('admin')->user()->is_admin == 1 || in_array('Restro Subscription', Auth::guard('admin')->user()->role_details)) {
            $Subscription = RestroSubcription::findOrFail($id);
            return view('Admin.subscription.restro.edit', compact('Subscription'));
        } else{
            return redirect()->back()->with('error', 'Permission denied');
        }
    }

    public function update(Request $request, $id)
    {
        $Subscription = RestroSubcription::findOrFail($id);
        $Subscription->name = $request->name;
        $Subscription->amount = $request->amount;
        $Subscription->benefits = $request->benefits;
        $Subscription->gift_send = $request->gift_send ?? 0;
        $Subscription->event_details = $request->event_details ?? 0;
        $Subscription->compliment_coin = $request->compliment_coin ?? 0;
        $Subscription->staff_allocation = $request->staff_allocation ?? 0;
        $Subscription->gr_coin = $request->compliment_coin ? $request->gr_coin : 0;
        $Subscription->save();

        return redirect(route('admin.restrosubscription.index'))->with('success', 'Subscription Updated successfully');
    }

    public function destroy($id)
    {
        $Subscription = RestroSubcription::findOrFail($id);
        if ($Subscription) {
            $Subscription->delete();
            return response(['status' => true, 'message' => 'Subscription deleted successfully']);
        } else {
            return response(['status' => false, 'message' => 'somthing went wrong please try again letter']);
        }
    }

    public function history()
    {
        if(Auth::guard('admin')->user()->is_admin == 1 || in_array('Restro Subscription', Auth::guard('admin')->user()->role_details)) {
            $Transactions = Transaction::where('tr_type', 3)->where('status', 1)->orderBy('id', 'desc')->get();
            return view('Admin.subscription.restro.history', compact('Transactions'));
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

        $pdf = Pdf::loadView('invoice.user', $data);
        $filename = date('dmYhis', strtotime($Transactions->created_at)) . $Transactions->order_no.'.pdf';
        return $pdf->download($filename);
    }
}
