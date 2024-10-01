<?php

namespace App\Http\Controllers\Affiliate;

use App\Http\Controllers\Controller;
use App\Models\ApproveReject;
use App\Models\Coupon;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OfferController extends Controller
{
    public function index()
    {
        $Affiliate = Auth::guard('affiliate')->user();
        $Restros = Restaurant::where('affiliate_id', $Affiliate->id)->pluck('id')->toArray();
        $Coupons = Coupon::whereIn('restro_id', $Restros)->orderBy('id', 'desc')->get();
        return view('Affiliate.offer.index', compact('Coupons'));
    }

    public function create()
    {
        $Affiliate = Auth::guard('affiliate')->user();
        $Restros = Restaurant::where('affiliate_id', $Affiliate->id)->select('id','name')->get();
        return view('Affiliate.offer.create', compact('Restros'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'restro_id' => 'required',
            'name' => 'required',
        ],[
            'restro_id' => 'Restro field is required.',
            'name' => 'Name field is required.',
        ]);

        $Restro = Restaurant::find($request->restro_id);

        $Coupon = new Coupon();
        $Coupon->restro_id = $Restro->id;
        $Coupon->name = $request->name;
        $Coupon->details = $request->details;
        $Coupon->quantity = $request->quantity;
        $Coupon->validity = $Restro->validity;
        $Coupon->terms = $request->terms;

        $details = [];
        $details['name'] = ['old' => '', 'new' => $request->name, 'type' => 0];
        $details['details'] = ['old' => '', 'new' => $request->details, 'type' => 0];
        $details['quantity'] = ['old' => '', 'new' => $request->quantity, 'type' => 0];
        $details['terms'] = ['old' => '', 'new' => $request->terms, 'type' => 0];

        if($request->hasFile('image')){
            $file = $request->file('image');
            $filename = date('ymdHis').'.'.$file->getClientOriginalExtension();
            $file->storeAs('public/coupon', $filename);
            $Coupon->image = $filename;
            $details['image'] = ['old' => '', 'new' => $filename, 'type' => 0];
        }
        $Coupon->save();
        $details['id'] = ['old' => '', 'new' => $Coupon->id, 'type' => 0];

        $ApproveReject = new ApproveReject();
        $ApproveReject->restro_id = $Restro->id;
        $ApproveReject->details = $details;
        $ApproveReject->type = 2;
        $ApproveReject->status = 0;
        $ApproveReject->save();
        return redirect(route('affiliate.offer.index'))->with('success', 'Coupon created successfully');
    }

    public function edit($id)
    {
        $Affiliate = Auth::guard('affiliate')->user();
        $Restros = Restaurant::where('affiliate_id', $Affiliate->id)->select('id','name')->get();
        $Coupon = Coupon::findOrFail($id);
        return view('Affiliate.offer.edit', compact('Coupon','Restros'));
    }

    public function update(Request $request, $id)
    {
        $Coupon = Coupon::findOrFail($id);
        $request->validate([
            'restro_id' => 'required',
            'name' => 'required',
        ],[
            'restro_id' => 'Restro field is required.',
            'name' => 'Name field is required.',
        ]);

        $Restro = Restaurant::find($request->restro_id);

        $details = [];
        if($Coupon->name != $request->name) { $details['name'] = ['old' => $Coupon->name, 'new' => $request->name, 'type' => 1]; }
        if($Coupon->details != $request->details) { $details['details'] = ['old' => $Coupon->details, 'new' => $request->details, 'type' => 1]; }
        if($Coupon->quantity != $request->quantity) { $details['quantity'] = ['old' => $Coupon->quantity, 'new' => $request->quantity, 'type' => 1]; }
        if($Coupon->terms != $request->terms) { $details['terms'] = ['old' => $Coupon->terms, 'new' => $request->terms, 'type' => 1]; }

        $Coupon->name = $request->name;
        $Coupon->details = $request->details;
        $Coupon->quantity = $request->quantity;
        $Coupon->validity = $Restro->validity;
        $Coupon->terms = $request->terms;
        $Coupon->status = 0;

        if($request->hasFile('image')){
            $file = $request->file('image');
            $filename = date('ymdHis').'.'.$file->getClientOriginalExtension();
            $file->storeAs('public/coupon', $filename);
            $details['image'] = ['old' => $Coupon->image, 'new' => $filename, 'type' => 1];
            $Coupon->image = $filename;
        }
        $Coupon->save();

        if(count($details) > 0) {
            $details['id'] = ['old' => '', 'new' => $Coupon->id, 'type' => 1];
            $ApproveReject = new ApproveReject();
            $ApproveReject->restro_id = $Coupon->restro_id;
            $ApproveReject->details = $details;
            $ApproveReject->type = 2;
            $ApproveReject->status = 0;
            $ApproveReject->save();
        }
        return redirect(route('affiliate.offer.index'))->with('success', 'Coupon Updated successfully');
    }

    public function destroy($id)
    {
        $Coupon = Coupon::findOrFail($id);
        if ($Coupon) {
            $details['id'] = ['old' => '', 'new' => $Coupon->id, 'type' => 2];
            $details['coupon'] = ['old' => '', 'new' => '', 'type' => 2];

            $ApproveReject = new ApproveReject();
            $ApproveReject->restro_id = $Coupon->restro_id;
            $ApproveReject->details = $details;
            $ApproveReject->type = 2;
            $ApproveReject->status = 0;
            $ApproveReject->save();

            $Coupon->delete();
            return response(['status' => true, 'message' => 'Coupon deleted successfully']);
        } else {
            return response(['status' => false, 'message' => 'somthing went wrong please try again letter']);
        }
    }
}
