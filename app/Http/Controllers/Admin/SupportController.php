<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Support;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SupportController extends Controller
{
    public function index()
    {
        if(Auth::guard('admin')->user()->is_admin == 1 || in_array('Customer Support', Auth::guard('admin')->user()->role_details)) {
            $Supports = Support::orderBy('id', 'desc')->get();
            return view('Admin.support.index', compact('Supports'));
        } else{
            return redirect()->back()->with('error', 'Permission denied');
        }
    }

    public function view($id)
    {
        if(Auth::guard('admin')->user()->is_admin == 1 || in_array('Customer Support', Auth::guard('admin')->user()->role_details)) {
            $Support = Support::find($id);
            return view('Admin.support.view', compact('Support'));
        } else{
            return redirect()->back()->with('error', 'Permission denied');
        }
    }

    public function store(Request $request, $id)
    {
        $Support = Support::find($id);
        $Support->reply = $request->reply;
        $Support->reply_by = Auth::guard('admin')->user()->id;
        $Support->status = 1;
        $Support->save();
        return redirect(route('admin.support.index'))->with('success', 'Support created successfully');
    }
}
