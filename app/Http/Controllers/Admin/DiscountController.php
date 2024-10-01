<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Discount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DiscountController extends Controller
{
    public function index()
    {
        if(Auth::guard('admin')->user()->is_admin == 1 || in_array('Dynamic Discount', Auth::guard('admin')->user()->role_details)) {
            $Discounts = Discount::orderBy('id', 'desc')->get();
            return view('Admin.master.discount.index', compact('Discounts'));
        } else{
            return redirect()->back()->with('error', 'Permission denied');
        }
    }

    public function create()
    {
        if(Auth::guard('admin')->user()->is_admin == 1 || in_array('Dynamic Discount', Auth::guard('admin')->user()->role_details)) {
            return view('Admin.master.discount.create');
        } else{
            return redirect()->back()->with('error', 'Permission denied');
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'discount' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ],[
            'name' => 'Name field is required.',
            'discount' => 'Discount field is required.',
            'start_date' => 'Start Date field is required.',
            'end_date' => 'End Date field is required.',
        ]);

        $Discount = new Discount();
        $Discount->name = $request->name;
        $Discount->discount = $request->discount;
        $Discount->start_date = date('Y-m-d', strtotime($request->start_date));
        $Discount->end_date = date('Y-m-d', strtotime($request->end_date));
        $Discount->status = 1;
        $Discount->save();
        return redirect(route('admin.discount.index'))->with('success', 'Discount created successfully');
    }

    public function edit($id)
    {
        if(Auth::guard('admin')->user()->is_admin == 1 || in_array('Dynamic Discount', Auth::guard('admin')->user()->role_details)) {
            $Discount = Discount::findOrFail($id);
            return view('Admin.master.discount.edit', compact('Discount'));
        } else{
            return redirect()->back()->with('error', 'Permission denied');
        }
    }

    public function update(Request $request, $id)
    {
        $Discount = Discount::findOrFail($id);
        $Discount->name = $request->name;
        $Discount->discount = $request->discount;
        $Discount->start_date = date('Y-m-d', strtotime($request->start_date));
        $Discount->end_date = date('Y-m-d', strtotime($request->end_date));
        $Discount->save();
        return redirect(route('admin.discount.index'))->with('success', 'Discount Updated successfully');
    }

    public function destroy($id)
    {
        $Discount = Discount::findOrFail($id);
        if ($Discount) {
            $Discount->delete();
            return response(['status' => true, 'message' => 'Discount deleted successfully']);
        } else {
            return response(['status' => false, 'message' => 'somthing went wrong please try again letter']);
        }
    }
}
