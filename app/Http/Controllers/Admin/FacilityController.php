<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Facility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FacilityController extends Controller
{
    public function index()
    {
        if(Auth::guard('admin')->user()->is_admin == 1 || in_array('Facility', Auth::guard('admin')->user()->role_details)) {
            $Facilities = Facility::orderBy('id', 'desc')->get();
            return view('Admin.master.facility.index', compact('Facilities'));
        } else{
            return redirect()->back()->with('error', 'Permission denied');
        }
    }

    public function create()
    {
        if(Auth::guard('admin')->user()->is_admin == 1 || in_array('Facility', Auth::guard('admin')->user()->role_details)) {
            return view('Admin.master.facility.create');
        } else{
            return redirect()->back()->with('error', 'Permission denied');
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ],[
            'name' => 'Name field is required.',
        ]);

        $Facility = new Facility();
        $Facility->name = $request->name;
        $Facility->status = 1;
        $Facility->save();
        return redirect(route('admin.facility.index'))->with('success', 'Facility created successfully');
    }

    public function edit($id)
    {
        if(Auth::guard('admin')->user()->is_admin == 1 || in_array('Facility', Auth::guard('admin')->user()->role_details)) {
            $Facility = Facility::findOrFail($id);
            return view('Admin.master.facility.edit', compact('Facility'));
        } else{
            return redirect()->back()->with('error', 'Permission denied');
        }
    }

    public function update(Request $request, $id)
    {
        $Facility = Facility::findOrFail($id);
        $Facility->name = $request->name;
        $Facility->save();
        return redirect(route('admin.facility.index'))->with('success', 'Facility Updated successfully');
    }

    public function destroy($id)
    {
        $Facility = Facility::findOrFail($id);
        if ($Facility) {
            $Facility->delete();
            return response(['status' => true, 'message' => 'Facility deleted successfully']);
        } else {
            return response(['status' => false, 'message' => 'somthing went wrong please try again letter']);
        }
    }
}
