<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdvertisementController extends Controller
{
    public function index()
    {
        if(Auth::guard('admin')->user()->is_admin == 1 || in_array('Advertisement', Auth::guard('admin')->user()->role_details)) {
            $Advertisements = Advertisement::orderBy('id', 'desc')->get();
            return view('Admin.master.advertisement.index', compact('Advertisements'));
        } else{
            return redirect()->back()->with('error', 'Permission denied');
        }
    }

    public function create()
    {
        if(Auth::guard('admin')->user()->is_admin == 1 || in_array('Advertisement', Auth::guard('admin')->user()->role_details)) {
            return view('Admin.master.advertisement.create');
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

        $Advertisement = new Advertisement();
        $Advertisement->name = $request->name;
        $Advertisement->status = 1;
        if($request->hasFile('image')){
            $file = $request->file('image');
            $filename = date('ymdHis').'.'.$file->getClientOriginalExtension();
            $file->storeAs('public/advertisement', $filename);
            $Advertisement->image = $filename;
        }
        $Advertisement->save();
        return redirect(route('admin.advertisement.index'))->with('success', 'Advertisement created successfully');
    }

    public function edit($id)
    {
        if(Auth::guard('admin')->user()->is_admin == 1 || in_array('Advertisement', Auth::guard('admin')->user()->role_details)) {
            $Advertisement = Advertisement::findOrFail($id);
            return view('Admin.master.advertisement.edit', compact('Advertisement'));
        } else{
            return redirect()->back()->with('error', 'Permission denied');
        }
    }

    public function update(Request $request, $id)
    {
        $Advertisement = Advertisement::findOrFail($id);
        $Advertisement->name = $request->name;
        if($request->hasFile('image')){
            $file = $request->file('image');
            $filename = date('ymdHis').'.'.$file->getClientOriginalExtension();
            $file->storeAs('public/advertisement', $filename);
            $Advertisement->image = $filename;
        }
        $Advertisement->save();
        return redirect(route('admin.advertisement.index'))->with('success', 'Advertisement Updated successfully');
    }

    public function destroy($id)
    {
        $Advertisement = Advertisement::findOrFail($id);
        if ($Advertisement) {
            $Advertisement->delete();
            return response(['status' => true, 'message' => 'Advertisement deleted successfully']);
        } else {
            return response(['status' => false, 'message' => 'somthing went wrong please try again letter']);
        }
    }
}
