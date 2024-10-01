<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Affiliate;
use App\Models\Cms;
use App\Models\CustomerSupport;
use App\Models\Faq;
use App\Models\Inquiry;
use App\Models\Restaurant;
use App\Models\Restro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class WebController extends Controller
{
    public function index()
    {
        $Faqs = Faq::where('type',1)->get();
        $Faqs = [];
        return view('web.index', compact('Faqs'));
    }

    public function pricing()
    {
        return view('web.price');
    }

    public function contactus()
    {
        return view('web.contact-us');
    }
    public function contactSupport()
    {
        return view('web.contact-support');
    }

    public function PrivacyPolicy()
    {
        return view('web.privacy-policy');
    }

    public function TermsCondition()
    {
        return view('web.terms-condition');
    }

    public function RefundCancellation()
    {
        return view('web.refund-cancellation');
    }

    public function AddRestaurant()
    {
        $Faqs = Faq::where('type',2)->get();
        return view('web.partner-with-us', compact('Faqs'));
    }

    public function verifyemail($token)
    {
        $hashid1 = Crypt::decryptString($token);
        Restro::find($hashid1)->update([
            'status' => 1
        ]);
        $Restro  = Restro::find($hashid1);
        Restaurant::find($Restro->restro_id)->update([
            'status' => 1
        ]);
        return view('other.invite', compact('Restro'));
    }

    public function verifyemails($token)
    {
        $hashid1 = Crypt::decryptString($token);
        Affiliate::find($hashid1)->update([
            'status' => 1
        ]);
        $Affiliate = Affiliate::find($hashid1);
        return view('other.invite', compact('Affiliate'));
    }

    public function terms()
    {
        $Restro = Cms::where('type',1)->first();
        return view('web.terms', compact('Restro'));
    }

    public function privacy()
    {
        $Restro = Cms::where('type',2)->first();
        return view('web.privacy', compact('Restro'));
    }

    public function SendInquiry(Request $request) {
        // dd($request->all());
        Inquiry::create([
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);
        return response(['status' => true, 'message' => 'Inquiry send successfully']);
    }
    public function sendSupport(Request $request) {
        CustomerSupport::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'dob' => $request->dob,
            'message' => $request->message,
        ]);
        return response(['status' => true, 'message' => 'Support send successfully']);
    }
}