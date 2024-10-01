<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ApproveReject;
use App\Models\Coupon;
use App\Models\Restaurant;
use App\Models\Restro;
use App\Models\RestroImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApproveController extends Controller
{
    public function index()
    {
        if(Auth::guard('admin')->user()->is_admin == 1 || in_array('Approve & Reject Post', Auth::guard('admin')->user()->role_details)) {
            $Approves = ApproveReject::where('status', 0)->orderBy('id', 'desc')->get();
            return view('Admin.approve.index', compact('Approves'));
        } else{
            return redirect()->back()->with('error', 'Permission denied');
        }
    }
    public function view($id)
    {
        if(Auth::guard('admin')->user()->is_admin == 1 || in_array('Approve & Reject Post', Auth::guard('admin')->user()->role_details)) {
            $Approve = ApproveReject::find($id);
            $Restaurant = Restaurant::find($Approve->restro_id);
            return view('Admin.approve.view', compact('Approve','Restaurant'));
        } else{
            return redirect()->back()->with('error', 'Permission denied');
        }
    }

    public function approve(Request $request, $id)
    {
        $Approve = ApproveReject::find($id);
        if($Approve->type == 0 || $Approve->type == 1) {
            $passport_price = $request->passport_price ?? $request->old_price;
            Restaurant::find($Approve->restro_id)->update([
                'passport_price' => $passport_price,
                'admin_status' => 1,
            ]);
            RestroImage::where('restro_id', $Approve->restro_id)->where('status', 0)->update(['status'=> 1]);
        }
        if($Approve->type == 2) {
            $details = $Approve->details;
            $ids = $details['id']['new'];
            $type = $details['id']['type'];
            if($type == 0) {
                Coupon::find($ids)->update(['status' => 1]);
            }
            if($type == 1) {
                $data = [];
                foreach ($details as $key => $value) {
                    $data[$key] = $value['new'];
                    $data['status'] = 1;
                }
                $Coupon = Coupon::find($ids)->update($data);
            }
            if($type == 2) {
                // Coupon::find($ids)->delete();
            }
        }
        $Approve->status = 1;
        $Approve->save();
        return redirect()->back()->with('success', 'Profile Approved successfully');
    }
    public function reject($id)
    {
        $Approve = ApproveReject::find($id);
        $Approve->status = 2;
        $Approve->save();

        if($Approve->type == 0) {
            Restaurant::find($Approve->restro_id)->update([
                'admin_status' => 2,
                'details_status' => 0,
            ]);
        }
        $details = $Approve->details;
        if($Approve->type == 1) {
            $data = [];
            $data1 = [];
            foreach ($details as $key => $value) {
                if($key == 'person_name' || $key == 'email' || $key == 'mobile') {
                    if($key == 'person_name') {
                        $data1['name'] = $value['old'];
                    } else{
                        $data1[$key] = $value['old'];
                    }
                } else if ($key != 'image' || $key != 'menu') {
                    if(count($details['image']) > 0) {
                        foreach ($details['image'] as $key => $value) {
                            $new = $value['new'];
                            RestroImage::where('image', $new)->delete();
                        }
                    }
                    if(count($details['menu']) > 0) {
                        foreach ($details['menu'] as $key => $value) {
                            $new = $value['new'];
                            RestroImage::where('image', $new)->delete();
                        }
                    }
                } else {
                    $data[$key] = $value['old'];
                }
            }
            if(count($data) > 0) {
                Restaurant::find($Approve->restro_id)->update($data);
            }
            if(count($data1) > 0) {
                Restro::where('restro_id', $Approve->restro_id)->where('is_admin', 1)->update($data1);
            }
        }
        if($Approve->type == 2) {
            $ids = $details['id']['new'];
            $type = $details['id']['type'];
            if($type == 0 || $type == 1) {
                Coupon::find($ids)->update(['status' => 2]);
            }
            if($type == 2) {
                Coupon::withTrashed()->find($ids)->restore();
            }
            // dd($data, $details);
        }
        return redirect()->back()->with('success', 'Profile Reject successfully');
    }
}
