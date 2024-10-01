<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function index()
    {
        if(Auth::guard('admin')->user()->is_admin == 1 || in_array('Notification', Auth::guard('admin')->user()->role_details)) {
            $Notifications = Notification::orderBy('id', 'desc')->get();
            return view('Admin.master.notification.index', compact('Notifications'));
        } else{
            return redirect()->back()->with('error', 'Permission denied');
        }
    }

    public function create()
    {
        if(Auth::guard('admin')->user()->is_admin == 1 || in_array('Notification', Auth::guard('admin')->user()->role_details)) {
            $Category = Notification::$Category;
            return view('Admin.master.notification.create', compact('Category'));
        } else{
            return redirect()->back()->with('error', 'Permission denied');
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'image' => 'required',
            'message' => 'required',
        ],[
            'title' => 'Name field is required.',
            'category' => 'Category field is required.',
            'image' => 'Image field is required.',
            'message' => 'Message field is required.',
        ]);

        $Notification = new Notification();
        $Notification->title = $request->title;
        $Notification->category = $request->category;
        $Notification->message = $request->message;
        $Notification->status = 1;
        if($request->hasFile('image')){
            $file = $request->file('image');
            $filename = date('ymdHis').'.'.$file->getClientOriginalExtension();
            $file->storeAs('public/notification', $filename);
            $Notification->image = $filename;
        }
        $Notification->save();
        return redirect(route('admin.notification.index'))->with('success', 'Notification created successfully');
    }

    public function destroy($id)
    {
        $Notification = Notification::findOrFail($id);
        if ($Notification) {
            $Notification->delete();
            return response(['status' => true, 'message' => 'Notification deleted successfully']);
        } else {
            return response(['status' => false, 'message' => 'somthing went wrong please try again letter']);
        }
    }
}
