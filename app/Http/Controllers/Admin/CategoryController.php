<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index()
    {
        if(Auth::guard('admin')->user()->is_admin == 1 || in_array('Category', Auth::guard('admin')->user()->role_details)) {
            $Categories = Category::orderBy('id', 'desc')->get();
            return view('Admin.master.category.index', compact('Categories'));
        } else{
            return redirect()->back()->with('error', 'Permission denied');
        }
    }

    public function create()
    {
        if(Auth::guard('admin')->user()->is_admin == 1 || in_array('Category', Auth::guard('admin')->user()->role_details)) {
            return view('Admin.master.category.create');
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

        $Category = new Category();
        $Category->name = $request->name;
        $Category->status = 1;
        if($request->hasFile('image')){
            $file = $request->file('image');
            $filename = date('ymdHis').'.'.$file->getClientOriginalExtension();
            $file->storeAs('public/category', $filename);
            $Category->image = $filename;
        }
        $Category->save();
        return redirect(route('admin.category.index'))->with('success', 'Category created successfully');
    }

    public function edit($id)
    {
        if(Auth::guard('admin')->user()->is_admin == 1 || in_array('Category', Auth::guard('admin')->user()->role_details)) {
            $Category = Category::findOrFail($id);
            return view('Admin.master.category.edit', compact('Category'));
        } else{
            return redirect()->back()->with('error', 'Permission denied');
        }
    }

    public function update(Request $request, $id)
    {
        $Category = Category::findOrFail($id);
        $Category->name = $request->name;
        if($request->hasFile('image')){
            $file = $request->file('image');
            $filename = date('ymdHis').'.'.$file->getClientOriginalExtension();
            $file->storeAs('public/category', $filename);
            $Category->image = $filename;
        }
        $Category->save();
        return redirect(route('admin.category.index'))->with('success', 'Category Updated successfully');
    }

    public function destroy($id)
    {
        $Category = Category::findOrFail($id);
        if ($Category) {
            $Category->delete();
            return response(['status' => true, 'message' => 'Category deleted successfully']);
        } else {
            return response(['status' => false, 'message' => 'somthing went wrong please try again letter']);
        }
    }
}
