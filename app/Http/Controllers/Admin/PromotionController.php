<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\Promotion;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PromotionController extends Controller
{
    public function index()
    {
        if(Auth::guard('admin')->user()->is_admin == 1 || in_array('Promotion', Auth::guard('admin')->user()->role_details)) {
            $Promotions = Promotion::orderBy('id', 'desc')->get();
            return view('Admin.master.promotion.index', compact('Promotions'));
        } else{
            return redirect()->back()->with('error', 'Permission denied');
        }
    }

    public function create()
    {
        if(Auth::guard('admin')->user()->is_admin == 1 || in_array('Promotion', Auth::guard('admin')->user()->role_details)) {
            $Restros = Restaurant::where('status' ,1)->select('id','name')->get();
            return view('Admin.master.promotion.create', compact('Restros'));
        } else{
            return redirect()->back()->with('error', 'Permission denied');
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required',
        ],[
            'name' => 'Name field is required.',
            'image' => 'Image field is required.',
        ]);

        $Promotion = new Promotion();
        $Promotion->name = $request->name;
        $Promotion->restro_id = $request->restro_id;
        $Promotion->coupon_id = $request->coupon_id;
        $Promotion->start_date = date('Y-m-d', strtotime($request->start_date));
        $Promotion->end_date = date('Y-m-d', strtotime($request->end_date));
        $Promotion->status = 1;
        if($request->hasFile('image')){
            $file = $request->file('image');
            $filename = date('ymdHis').'.'.$file->getClientOriginalExtension();
            $file->storeAs('public/promotion', $filename);
            $Promotion->image = $filename;
        }
        $Promotion->save();
        return redirect(route('admin.promotion.index'))->with('success', 'Promotion created successfully');
    }

    public function edit($id)
    {
        if(Auth::guard('admin')->user()->is_admin == 1 || in_array('Promotion', Auth::guard('admin')->user()->role_details)) {
            $Promotion = Promotion::findOrFail($id);
            $Restros = Restaurant::where('status' ,1)->select('id','name')->get();
            $Coupons = Coupon::where('restro_id', $Promotion->restro_id)->select('id','name')->get();
            return view('Admin.master.promotion.edit', compact('Promotion','Restros','Coupons'));
        } else{
            return redirect()->back()->with('error', 'Permission denied');
        }
    }

    public function update(Request $request, $id)
    {
        $Promotion = Promotion::findOrFail($id);
        $Promotion->name = $request->name;
        $Promotion->restro_id = $request->restro_id;
        $Promotion->coupon_id = $request->coupon_id;
        $Promotion->start_date = date('Y-m-d', strtotime($request->start_date));
        $Promotion->end_date = date('Y-m-d', strtotime($request->end_date));
        if($request->hasFile('image')){
            $file = $request->file('image');
            $filename = date('ymdHis').'.'.$file->getClientOriginalExtension();
            $file->storeAs('public/promotion', $filename);
            $Promotion->image = $filename;
        }
        $Promotion->save();
        return redirect(route('admin.promotion.index'))->with('success', 'Promotion Updated successfully');
    }

    public function destroy($id)
    {
        $Promotion = Promotion::findOrFail($id);
        if ($Promotion) {
            $Promotion->delete();
            return response(['status' => true, 'message' => 'Promotion deleted successfully']);
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
