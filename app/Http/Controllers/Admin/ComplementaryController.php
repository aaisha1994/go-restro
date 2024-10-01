<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Complementary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComplementaryController extends Controller
{
    public function index()
    {
        if(Auth::guard('admin')->user()->is_admin == 1 || in_array('Complementary', Auth::guard('admin')->user()->role_details)) {
            $Complementaries = Complementary::orderBy('id', 'desc')->get();
            return view('Admin.master.complementary.index', compact('Complementaries'));
        } else{
            return redirect()->back()->with('error', 'Permission denied');
        }
    }

    public function create()
    {
        if(Auth::guard('admin')->user()->is_admin == 1 || in_array('Complementary', Auth::guard('admin')->user()->role_details)) {
            return view('Admin.master.complementary.create');
        } else{
            return redirect()->back()->with('error', 'Permission denied');
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'account_type' => 'required',
            'validity' => 'required',
        ],[
            'account_type' => 'Name field is required.',
            'validity' => 'Validity field is required.',
        ]);

        $Complementary = new Complementary();
        $Complementary->account_type = $request->account_type;
        $Complementary->validity = $request->validity;
        $Complementary->status = 1;
        $Complementary->save();
        return redirect(route('admin.complementary.index'))->with('success', 'Complementary created successfully');
    }

    public function edit($id)
    {
        if(Auth::guard('admin')->user()->is_admin == 1 || in_array('Complementary', Auth::guard('admin')->user()->role_details)) {
            $Complementary = Complementary::findOrFail($id);
            return view('Admin.master.complementary.edit', compact('Complementary'));
        } else{
            return redirect()->back()->with('error', 'Permission denied');
        }
    }

    public function update(Request $request, $id)
    {
        $Complementary = Complementary::findOrFail($id);
        $Complementary->account_type = $request->account_type;
        $Complementary->validity = $request->validity;
        $Complementary->save();
        return redirect(route('admin.complementary.index'))->with('success', 'Complementary Updated successfully');
    }

    public function destroy($id)
    {
        $Complementary = Complementary::findOrFail($id);
        if ($Complementary) {
            $Complementary->delete();
            return response(['status' => true, 'message' => 'Complementary deleted successfully']);
        } else {
            return response(['status' => false, 'message' => 'somthing went wrong please try again letter']);
        }
    }
}
