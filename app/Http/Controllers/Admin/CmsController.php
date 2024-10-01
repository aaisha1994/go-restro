<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cms;
use App\Models\ContactUs;
use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CmsController extends Controller
{
    public function terms()
    {
        if(Auth::guard('admin')->user()->is_admin == 1 || in_array('Terms Condition', Auth::guard('admin')->user()->role_details)) {
            $cms = Cms::where('type', 1)->first();
            return view('Admin.cms.terms', compact('cms'));
        } else{
            return redirect()->back()->with('error', 'Permission denied');
        }
    }

    public function termsstore(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ],[
            'title' => 'Title field is required.',
            'description' => 'Description field is required.',
        ]);

        $Cms = Cms::where('type', 1)->first();
        $Cms->title = $request->title;
        $Cms->description = $request->description;
        $Cms->save();
        return redirect(route('admin.cms.terms.index'))->with('success', 'Terms Updated successfully');
    }

    public function privacy()
    {
        if(Auth::guard('admin')->user()->is_admin == 1 || in_array('Privacy Policy', Auth::guard('admin')->user()->role_details)) {
            $cms = Cms::where('type', 2)->first();
            return view('Admin.cms.policy', compact('cms'));
        } else{
            return redirect()->back()->with('error', 'Permission denied');
        }
    }

    public function privacyStore(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ],[
            'title' => 'Title field is required.',
            'description' => 'Description field is required.',
        ]);

        $Cms = Cms::where('type', 2)->first();
        $Cms->title = $request->title;
        $Cms->description = $request->description;
        $Cms->save();
        return redirect(route('admin.cms.privacy.index'))->with('success', 'Privacy Updated successfully');
    }

    public function refund()
    {
        if(Auth::guard('admin')->user()->is_admin == 1 || in_array('Refund Policy', Auth::guard('admin')->user()->role_details)) {
            $cms = Cms::where('type', 3)->first();
            return view('Admin.cms.refund', compact('cms'));
        } else{
            return redirect()->back()->with('error', 'Permission denied');
        }
    }

    public function refundStore(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ],[
            'title' => 'Title field is required.',
            'description' => 'Description field is required.',
        ]);

        $Cms = Cms::where('type', 3)->first();
        $Cms->title = $request->title;
        $Cms->description = $request->description;
        $Cms->save();
        return redirect(route('admin.cms.refund.index'))->with('success', 'Refund Updated successfully');
    }

    public function contact()
    {
        if(Auth::guard('admin')->user()->is_admin == 1 || in_array('Contact Us', Auth::guard('admin')->user()->role_details)) {
            $cms = ContactUs::first();
            if(!$cms) {
                ContactUs::create([
                    'mobile' => ''
                ]);
                $cms = ContactUs::first();
            }
            return view('Admin.cms.contact', compact('cms'));
        } else{
            return redirect()->back()->with('error', 'Permission denied');
        }
    }

    public function contactStore(Request $request)
    {
        $request->validate([
            'mobile' => 'required',
            'email' => 'required',
        ],[
            'mobile' => 'Mobile field is required.',
            'email' => 'Email field is required.',
        ]);

        $Cms = ContactUs::first();
        $Cms->mobile = $request->mobile;
        $Cms->email = $request->email;
        $Cms->address = $request->address;
        $Cms->latitude = $request->latitude;
        $Cms->longitude = $request->longitude;
        $Cms->facebook = $request->facebook;
        $Cms->instagram = $request->instagram;
        $Cms->linkedin = $request->linkedin;
        $Cms->save();
        return redirect(route('admin.cms.contact.index'))->with('success', 'Contact Us Updated successfully');
    }

    // FAQ
    public function index()
    {
        if(Auth::guard('admin')->user()->is_admin == 1 || in_array('FAQs', Auth::guard('admin')->user()->role_details)) {
            $Faqs = Faq::orderBy('id', 'desc')->get();
            return view('Admin.cms.faqs.index', compact('Faqs'));
        } else{
            return redirect()->back()->with('error', 'Permission denied');
        }
    }

    public function create()
    {
        if(Auth::guard('admin')->user()->is_admin == 1 || in_array('FAQs', Auth::guard('admin')->user()->role_details)) {
            return view('Admin.cms.faqs.create');
        } else{
            return redirect()->back()->with('error', 'Permission denied');
        }
    }

    public function store(Request $request)
    {
        $Faq = new Faq();
        $Faq->question = $request->question;
        $Faq->type = $request->type;
        $Faq->answer = $request->answer;
        $Faq->save();
        return redirect(route('admin.faq.index'))->with('success', 'Faq created successfully');
    }

    public function edit($id)
    {
        if(Auth::guard('admin')->user()->is_admin == 1 || in_array('FAQs', Auth::guard('admin')->user()->role_details)) {
            $Faq = Faq::findOrFail($id);
            return view('Admin.cms.faqs.edit', compact('Faq'));
        } else{
            return redirect()->back()->with('error', 'Permission denied');
        }
    }

    public function update(Request $request, $id)
    {
        $Faq = Faq::findOrFail($id);
        $Faq->question = $request->question;
        $Faq->type = $request->type;
        $Faq->answer = $request->answer;
        $Faq->save();
        return redirect(route('admin.faq.index'))->with('success', 'Faq Updated successfully');
    }

    public function destroy($id)
    {
        $Faq = Faq::findOrFail($id);
        if ($Faq) {
            $Faq->delete();
            return response(['status' => true, 'message' => 'Faq deleted successfully']);
        } else {
            return response(['status' => false, 'message' => 'somthing went wrong please try again letter']);
        }
    }
}
