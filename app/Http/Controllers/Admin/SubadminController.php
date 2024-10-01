<?php

namespace App\Http\Controllers\Admin;

use App\Exports\AdminExport;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class SubadminController extends Controller
{
    public function index(){
        if(Auth::guard('admin')->user()->is_admin == 1 || in_array('Sub Admin', Auth::guard('admin')->user()->role_details)) {
            $Admins = Admin::where('is_admin', 0)->orderBy('id', 'desc')->get();
            return view('Admin.subadmin.index', compact('Admins'));
        } else{
            return redirect()->back()->with('error', 'Permission denied');
        }
    }

    public function create(){
        if(Auth::guard('admin')->user()->is_admin == 1 || in_array('Sub Admin', Auth::guard('admin')->user()->role_details)) {
            return view('Admin.subadmin.create');
        } else{
            return redirect()->back()->with('error', 'Permission denied');
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ],[
            'name' => 'Name is required.',
            'email' => 'Email is required.',
        ]);

        $Admin = new Admin();
        $Admin->name = $request->name;
        $Admin->email = $request->email;
        $Admin->mobile = $request->mobile;
        $Admin->role = $request->role;
        $Admin->password = Hash::make($request->password);
        $Admin->status = 1;
        $Admin->is_admin = 0;
        $Admin->role_details = $request->role_details;
        $Admin->save();
        return redirect(route('admin.subadmin.index'))->with('success', 'Sub Admin created successfully');
    }

    public function edit($id){
        if(Auth::guard('admin')->user()->is_admin == 1 || in_array('Sub Admin', Auth::guard('admin')->user()->role_details)) {
            $Admin = Admin::find($id);
            return view('Admin.subadmin.edit', compact('Admin'));
        } else{
            return redirect()->back()->with('error', 'Permission denied');
        }
    }

    public function update(Request $request, $id)
    {
        $Admin = Admin::findOrFail($id);
        $Admin->name = $request->name;
        $Admin->email = $request->email;
        $Admin->mobile = $request->mobile;
        $Admin->role = $request->role;
        $Admin->role_details = $request->role_details;
        $Admin->save();
        return redirect(route('admin.subadmin.index'))->with('success', 'Sub Admin Updated successfully');
    }

    public function view($id){
        if(Auth::guard('admin')->user()->is_admin == 1 || in_array('Sub Admin', Auth::guard('admin')->user()->role_details)) {
            $Admin = Admin::find($id);
            return view('Admin.subadmin.view', compact('Admin'));
        } else{
            return redirect()->back()->with('error', 'Permission denied');
        }
    }

    public function destroy($id)
    {
        $Admin = Admin::findOrFail($id);
        if ($Admin) {
            $Admin->delete();
            return response(['status' => true, 'message' => 'Admin deleted successfully']);
        } else {
            return response(['status' => false, 'message' => 'somthing went wrong please try again letter']);
        }
    }

    public function export() {
        return Excel::download(new AdminExport, 'subadmin.xlsx');
    }
}
