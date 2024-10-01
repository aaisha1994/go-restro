<?php

namespace App\Http\Controllers\Restro;

use App\Http\Controllers\Controller;
use App\Models\ApproveReject;
use App\Models\Coupon;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PassportController extends Controller
{
    public function index()
    {
        $Restro = Auth::guard('restro')->user();
        $Restaurant = Restaurant::find($Restro->restro_id);
        $Coupons = Coupon::where('restro_id', $Restro->restro_id)->orderBy('id','desc')->get();
        return view('Restro.passport.index', compact('Coupons','Restaurant'));
    }

    public function store(Request $request)
    {
        $Restro = Auth::guard('restro')->user();
        $validator = Validator::make($request->all(),[
            'name' => ['required'],
        ]);
        if($validator->fails()){
            $messages = $validator->getMessageBag();
            return response()->json(['success' => false, 'error' => ['message' => 'Validation Error', 'error_message' => $messages]], 422);
        }

        $Restaurant = Restaurant::find($Restro->restro_id);
        $Coupon = new Coupon();
        $Coupon->restro_id = $Restro->restro_id;
        $Coupon->name = $request->name;
        $Coupon->details = $request->details;
        $Coupon->quantity = $request->quantity;
        $Coupon->validity = $Restaurant->validity;
        $Coupon->terms = $request->terms;
        $Coupon->status = 0;

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
        $ApproveReject->restro_id = $Restro->restro_id;
        $ApproveReject->details = $details;
        $ApproveReject->type = 2;
        $ApproveReject->status = 0;
        $ApproveReject->save();

        return redirect(route('restro.passport.index'))->with('success', 'Passport created successfully');
    }

    public function edit($id) {
        $Coupon = Coupon::find($id);
        return response(['status' => true, 'data'=> $Coupon, 'message' => 'success']);
    }

    public function update(Request $request, $id)
    {
        $Coupon = Coupon::findOrFail($id);
        $validator = Validator::make($request->all(),[
            'name' => ['required'],
        ]);
        if($validator->fails()){
            $messages = $validator->getMessageBag();
            return response()->json(['success' => false, 'error' => ['message' => 'Validation Error', 'error_message' => $messages]], 422);
        }
        $details = [];
        if($Coupon->name != $request->name) { $details['name'] = ['old' => $Coupon->name, 'new' => $request->name, 'type' => 1]; }
        if($Coupon->details != $request->details) { $details['details'] = ['old' => $Coupon->details, 'new' => $request->details, 'type' => 1]; }
        if($Coupon->quantity != $request->quantity) { $details['quantity'] = ['old' => $Coupon->quantity, 'new' => $request->quantity, 'type' => 1]; }
        if($Coupon->terms != $request->terms) { $details['terms'] = ['old' => $Coupon->terms, 'new' => $request->terms, 'type' => 1]; }

        $Coupon->name = $request->name;
        $Coupon->details = $request->details;
        $Coupon->quantity = $request->quantity;
        $Coupon->validity = $request->validity ?? 0;
        $Coupon->terms = $request->terms;


        if($request->hasFile('image')){
            $file = $request->file('image');
            $filename = date('ymdHis').'.'.$file->getClientOriginalExtension();
            $file->storeAs('public/coupon', $filename);
            $details['image'] = ['old' => $Coupon->image, 'new' => $filename, 'type' => 1];
            $Coupon->image = $filename;
        }

        if(count($details) > 0) {
            $Coupon->status = 0;
            $details['id'] = ['old' => '', 'new' => $Coupon->id, 'type' => 1];
            $ApproveReject = new ApproveReject();
            $ApproveReject->restro_id = $Coupon->restro_id;
            $ApproveReject->details = $details;
            $ApproveReject->type = 2;
            $ApproveReject->status = 0;
            $ApproveReject->save();
        }

        $Coupon->save();

        return redirect(route('restro.passport.index'))->with('success', 'Passport updated successfully');
    }

    public function validityUpdate(Request $request)
    {
        $Restro = Auth::guard('restro')->user();
        $Restaurant = Restaurant::find($Restro->restro_id);
        $Restaurant->validity = $request->validity;
        $Restaurant->save();

        return redirect(route('restro.passport.index'))->with('success', 'Passport validity updated successfully');
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
            return response(['status' => true, 'message' => 'Discount deleted successfully']);
        } else {
            return response(['status' => false, 'message' => 'somthing went wrong please try again letter']);
        }
    }
}
