<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\Restaurant;
use App\Models\Restro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CouponController extends Controller
{
    public function index()
    {
        if(Auth::guard('admin')->user()->is_admin == 1 || in_array('Restro Coupon Offer', Auth::guard('admin')->user()->role_details)) {
            $Coupons = Coupon::orderBy('id', 'desc')->get();
            return view('Admin.coupon.index', compact('Coupons'));
        } else{
            return redirect()->back()->with('error', 'Permission denied');
        }
    }

    public function create()
    {
        if(Auth::guard('admin')->user()->is_admin == 1 || in_array('Restro Coupon Offer', Auth::guard('admin')->user()->role_details)) {
            $Restro = Restaurant::where('status', 1)->get();
            return view('Admin.coupon.create', compact('Restro'));
        } else{
            return redirect()->back()->with('error', 'Permission denied');
        }
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

        if($request->hasFile('image')){
            $file = $request->file('image');
            $filename = date('ymdHis').'.'.$file->getClientOriginalExtension();
            $file->storeAs('public/coupon', $filename);
            $Coupon->image = $filename;
        }
        $Coupon->status = 1;
        $Coupon->save();
        return redirect(route('admin.coupon.index'))->with('success', 'Coupon created successfully');
    }

    public function edit($id)
    {
        if(Auth::guard('admin')->user()->is_admin == 1 || in_array('Restro Coupon Offer', Auth::guard('admin')->user()->role_details)) {
            $Coupon = Coupon::findOrFail($id);
            $Restro = Restaurant::where('status', 1)->get();
            return view('Admin.coupon.edit', compact('Coupon','Restro'));
        } else{
            return redirect()->back()->with('error', 'Permission denied');
        }
    }

    public function view($id)
    {
        if(Auth::guard('admin')->user()->is_admin == 1 || in_array('Restro Coupon Offer', Auth::guard('admin')->user()->role_details)) {
            $Coupon = Coupon::findOrFail($id);
            return view('Admin.coupon.view', compact('Coupon'));
        } else{
            return redirect()->back()->with('error', 'Permission denied');
        }
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

        $Coupon->restro_id = $Restro->id;
        $Coupon->name = $request->name;
        $Coupon->details = $request->details;
        $Coupon->quantity = $request->quantity;
        $Coupon->validity = $Restro->validity;
        $Coupon->terms = $request->terms;

        if($request->hasFile('image')){
            $file = $request->file('image');
            $filename = date('ymdHis').'.'.$file->getClientOriginalExtension();
            $file->storeAs('public/coupon', $filename);
            $Coupon->image = $filename;
        }
        $Coupon->save();
        return redirect(route('admin.coupon.index'))->with('success', 'Coupon Updated successfully');
    }

    public function destroy($id)
    {
        $Coupon = Coupon::findOrFail($id);
        if ($Coupon) {
            $Coupon->delete();
            return response(['status' => true, 'message' => 'Coupon deleted successfully']);
        } else {
            return response(['status' => false, 'message' => 'somthing went wrong please try again letter']);
        }
    }
}
