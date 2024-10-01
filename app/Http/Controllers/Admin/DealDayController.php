<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\DealDay;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DealDayController extends Controller
{
    public function index()
    {
        if(Auth::guard('admin')->user()->is_admin == 1 || in_array('Deal Of The Day', Auth::guard('admin')->user()->role_details)) {
            $DealDays = DealDay::orderBy('id', 'desc')->get();
            return view('Admin.master.dealday.index', compact('DealDays'));
        } else{
            return redirect()->back()->with('error', 'Permission denied');
        }
    }

    public function create()
    {
        if(Auth::guard('admin')->user()->is_admin == 1 || in_array('Deal Of The Day', Auth::guard('admin')->user()->role_details)) {
            $Restros = Restaurant::where('status' ,1)->select('id','name')->get();
            return view('Admin.master.dealday.create', compact('Restros'));
        } else{
            return redirect()->back()->with('error', 'Permission denied');
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'restro_id' => 'required',
            'image' => 'required',
        ],[
            'restro_id' => 'Restro field is required.',
            'image' => 'Image field is required.',
        ]);

        $DealDay = new DealDay();
        $DealDay->restro_id = $request->restro_id;
        $DealDay->coupon_id = $request->coupon_id;
        $DealDay->date = date('Y-m-d', strtotime($request->date));
        $DealDay->status = 1;
        if($request->hasFile('image')){
            $file = $request->file('image');
            $filename = date('ymdHis').'.'.$file->getClientOriginalExtension();
            $file->storeAs('public/dealday', $filename);
            $DealDay->image = $filename;
        }
        $DealDay->save();
        return redirect(route('admin.dealday.index'))->with('success', 'DealDay created successfully');
    }

    public function edit($id)
    {
        if(Auth::guard('admin')->user()->is_admin == 1 || in_array('Deal Of The Day', Auth::guard('admin')->user()->role_details)) {
            $DealDay = DealDay::findOrFail($id);
            $Restros = Restaurant::where('status' ,1)->select('id','name')->get();
            $Coupons = Coupon::where('restro_id', $DealDay->restro_id)->select('id','name')->get();
            return view('Admin.master.dealday.edit', compact('DealDay','Restros','Coupons'));
        } else{
            return redirect()->back()->with('error', 'Permission denied');
        }
    }

    public function update(Request $request, $id)
    {
        $DealDay = DealDay::findOrFail($id);
        $DealDay->restro_id = $request->restro_id;
        $DealDay->coupon_id = $request->coupon_id;
        $DealDay->date = date('Y-m-d', strtotime($request->date));
        if($request->hasFile('image')){
            $file = $request->file('image');
            $filename = date('ymdHis').'.'.$file->getClientOriginalExtension();
            $file->storeAs('public/dealday', $filename);
            $DealDay->image = $filename;
        }
        $DealDay->save();
        return redirect(route('admin.dealday.index'))->with('success', 'DealDay Updated successfully');
    }

    public function destroy($id)
    {
        $DealDay = DealDay::findOrFail($id);
        if ($DealDay) {
            $DealDay->delete();
            return response(['status' => true, 'message' => 'DealDay deleted successfully']);
        } else {
            return response(['status' => false, 'message' => 'somthing went wrong please try again letter']);
        }
    }

    public function coupon($id)
    {
        $Coupon = Coupon::where('restro_id', $id)->get();
        return response(['status' => false, 'data' => $Coupon,'message' => 'somthing went wrong please try again letter']);
    }
}
