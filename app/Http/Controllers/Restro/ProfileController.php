<?php

namespace App\Http\Controllers\Restro;

use App\Http\Controllers\Controller;
use App\Models\ApproveReject;
use App\Models\Category;
use App\Models\City;
use App\Models\ContactUs;
use App\Models\Facility;
use App\Models\Faq;
use App\Models\ReferEarn;
use App\Models\Restaurant;
use App\Models\Restro;
use App\Models\RestroCategory;
use App\Models\RestroFacility;
use App\Models\RestroImage;
use App\Models\RestroSubcription;
use App\Models\State;
use App\Models\Support;
use App\Models\Transaction;
use App\Models\Wallet;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Razorpay\Api\Api;

class ProfileController extends Controller
{
    public function index()
    {
        $Restro = Auth::guard('restro')->user();
        $Restaurant = Restaurant::find($Restro->restro_id);
        $category_id = RestroCategory::where('restro_id', $Restro->restro_id)->pluck('category_id')->toArray();
        $facility_id = RestroFacility::where('restro_id', $Restro->restro_id)->pluck('facility_id')->toArray();
        $Images = RestroImage::where('restro_id', $Restro->restro_id)->where('status', 1)->get();
        $Category = Category::whereIn('id', $category_id)->where('status', 1)->pluck('name')->toArray();
        $Facility = Facility::whereIn('id', $facility_id)->where('status', 1)->pluck('name')->toArray();
        return view('Restro.profile.index', compact('Restro','Restaurant','Category','Facility','Images'));
    }

    public function edit()
    {
        $Restro = Auth::guard('restro')->user();
        $Restaurant = Restaurant::find($Restro->restro_id);
        $State = State::where('country_id', 106)->get();
        $City = City::where('state_id', $Restaurant->state_id)->get();
        $Category = Category::where('status', 1)->get();
        $Facility = Facility::where('status', 1)->get();
        $category_id = RestroCategory::where('restro_id', $Restro->restro_id)->pluck('category_id')->toArray();
        $facility_id = RestroFacility::where('restro_id', $Restro->restro_id)->pluck('facility_id')->toArray();
        $RestroImage = RestroImage::where('restro_id', $Restro->restro_id)->where('image_type', 1)->select('id','image')->get();
        $RestroMenu = RestroImage::where('restro_id', $Restro->restro_id)->where('image_type', 2)->select('id','image')->get();
        return view('Restro.profile.edit', compact('Restaurant','Category','Facility','State','City', 'category_id', 'facility_id','RestroImage','RestroMenu'));
    }

    public function updateprofile(Request $request)
    {
        $Restro = Auth::guard('restro')->user();
        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:restros,email,' . $Restro->id,
            'mobile' => 'required|unique:restros,mobile,' . $Restro->id
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $messages = $validator->getMessageBag();
            return redirect(route('restro.profile.edit'))->with('error', $messages);
        }

        $Restros = Restro::find($Restro->id);
        $Restaurant = Restaurant::find($Restro->restro_id);
        $details = [];
        if($Restaurant->name != $request->name) { $details['name'] = ['old' => $Restaurant->name, 'new' => $request->name, 'type' => 1]; }
        if($Restaurant->mobile != $request->mobile) { $details['mobile'] = ['old' => $Restaurant->mobile, 'new' => $request->mobile, 'type' => 1]; }
        if($Restaurant->mobile2 != $request->mobile2) { $details['mobile2'] = ['old' => $Restaurant->mobile2, 'new' => $request->mobile2, 'type' => 1]; }
        if($Restaurant->address != $request->address) { $details['address'] = ['old' => $Restaurant->address, 'new' => $request->address, 'type' => 1]; }
        if($Restaurant->state_id != $request->state_id) { $details['state_id'] = ['old' => $Restaurant->state_id, 'new' => $request->state_id, 'type' => 1]; }
        if($Restaurant->city_id != $request->city_id) { $details['city_id'] = ['old' => $Restaurant->city_id, 'new' => $request->city_id, 'type' => 1]; }
        if($Restaurant->zip_code != $request->zip_code) { $details['zip_code'] = ['old' => $Restaurant->zip_code, 'new' => $request->zip_code, 'type' => 1]; }
        if($Restaurant->latitude != $request->latitude) { $details['latitude'] = ['old' => $Restaurant->latitude, 'new' => $request->latitude, 'type' => 1]; }
        if($Restaurant->longitude != $request->longitude) { $details['longitude'] = ['old' => $Restaurant->longitude, 'new' => $request->longitude, 'type' => 1]; }
        if($Restaurant->price_per_person != $request->price_per_person) { $details['price_per_person'] = ['old' => $Restaurant->price_per_person, 'new' => $request->price_per_person, 'type' => 1]; }
        if($Restaurant->meal_preference != $request->meal_preference) { $details['meal_preference'] = ['old' => $Restaurant->meal_preference, 'new' => $request->meal_preference, 'type' => 1]; }

        $Restaurant->name = $request->name;
        $Restaurant->mobile = $request->mobile;
        $Restaurant->mobile2 = $request->mobile2;
        $Restaurant->address = $request->address;
        $Restaurant->state_id = $request->state_id;
        $Restaurant->city_id = $request->city_id;
        $Restaurant->zip_code = $request->zip_code;
        $Restaurant->latitude = $request->latitude;
        $Restaurant->longitude = $request->longitude;
        $Restaurant->price_per_person = $request->price_per_person;

        $Restaurant->meal_preference = implode(',',$request->meal_preference);
        $Restaurant->must_try = $request->must_try;
        $Restaurant->establishment_type = $request->establishment_type;
        $Restaurant->open_time = $request->open_time;

        if($request->hasFile('logo')){
            $file = $request->file('logo');
            $filename = date('ymdHis').'.'.$file->getClientOriginalExtension();
            $file->storeAs('public/logo', $filename);

            $details['logo'] = ['old' => $Restaurant->logo, 'new' => $filename, 'type' => 1];
            $Restaurant->logo = $filename;
            $Restros->image = $filename;
        }
        $Restaurant->save();

        RestroCategory::where('restro_id', $Restro->restro_id)->forceDelete();
        foreach ($request->category_id as $key => $value) {
            RestroCategory::create([
                'restro_id' => $Restro->restro_id,
                'category_id' => $value
            ]);
        }

        RestroFacility::where('restro_id', $Restro->restro_id)->forceDelete();
        foreach ($request->facility_id as $key => $value) {
            RestroFacility::create([
                'restro_id' => $Restro->restro_id,
                'facility_id' => $value
            ]);
        }

        $image = $request->file('image');
        if($request->hasFile('image')){
            foreach ($image as $key => $file) {
                $filename = str_replace(' ', '', date('ymdHis-0'). $key .'.'.$file->getClientOriginalExtension());
                $file->storeAs('public/image', $filename);
                RestroImage::create([
                    'restro_id' => $Restro->restro_id,
                    'image' => $filename,
                    'image_type' => 1,
                    'status' => 0
                ]);
                $details['image'][$key] = ['old' => '', 'new' => $filename, 'type' => 0];
            }
        }
        $menus=$request->file('menu');
        if($request->hasFile('menu')){
            foreach ($menus as $key => $file) {
                $filename = str_replace(' ', '', date('ymdHis-1 '). $key .'.'.$file->getClientOriginalExtension());
                $file->storeAs('public/image', $filename);
                RestroImage::create([
                    'restro_id' => $Restro->restro_id,
                    'image' => $filename,
                    'image_type' => 2,
                    'status' => 0
                ]);
                $details['menu'][$key] = ['old' => '', 'new' => $filename, 'type' => 0];
            }
        }

        if($Restros->email != $request->email) { $details['email'] = ['old' => $Restros->email, 'new' => $request->email]; }
        if($Restros->mobile != $request->mobile) { $details['mobile'] = ['old' => $Restros->mobile, 'new' => $request->mobile]; }

        if(count($details) > 0) {
            $ApproveReject = new ApproveReject();
            $ApproveReject->restro_id = $Restaurant->id;
            $ApproveReject->details = $details;
            $ApproveReject->type = 1;
            $ApproveReject->status = 0;
            $ApproveReject->save();
        }
        $Restros->name = $request->person_name;
        $Restros->email = $request->email;
        $Restros->mobile = $request->mobile;
        $Restros->save();
        return redirect(route('restro.profile.edit'))->with('success', 'Profile updated successfully');
    }

    public function uploadimage(Request $request) {
        $Restro = Auth::guard('restro')->user();
        if($request->hasFile('image')){
            $file = $request->file('image');
            $filename = str_replace(' ', '', date('ymdHis-0') .'.'.$file->getClientOriginalExtension());
            $file->storeAs('public/image', $filename);
            $RestroImage = RestroImage::create([
                'restro_id' => $Restro->restro_id,
                'image' => $filename,
                'image_type' => 1,
                'status' => 0
            ]);
            return $RestroImage->id;
        }
        if($request->hasFile('menu')){
            $file=$request->file('menu');
            $filename = str_replace(' ', '', date('ymdHis-1 ') .'.'.$file->getClientOriginalExtension());
            $file->storeAs('public/image', $filename);
            $RestroImage = RestroImage::create([
                'restro_id' => $Restro->restro_id,
                'image' => $filename,
                'image_type' => 2,
                'status' => 0
            ]);
            return $RestroImage->id;
        }
    }

    public function removeimage(Request $request) {
        RestroImage::find($request->id)->delete();
        return response(['status' => true, 'message' => 'Image deleted successfully']);
    }

    public function password()
    {
        $Restro = Auth::guard('restro')->user();
        return view('Restro.profile.password', compact('Restro'));
    }

    public function changepassword(Request $request)
    {
        try {
            $Restro = Auth::guard('restro')->user();
            // dd($Restro);
            if(!Hash::check($request->old_password, $Restro->password)){
                return redirect(route('restro.profile.password'))->with('error', "Old Password Doesn't match!");
            }
            Restro::find($Restro->id)->update([
                'password' => Hash::make($request->new_password)
            ]);
            return redirect(route('restro.profile.password'))->with('success', 'Password change successfully');
        } catch (Exception $e) {
            return redirect(route('restro.profile.password'))->with('error', $e->getMessage());
        }
    }

    public function terms()
    {
        $Restro = Auth::guard('restro')->user();
        return view('Restro.profile.terms', compact('Restro'));
    }

    public function termsstore(Request $request)
    {
        $request->validate([
            'terms' => 'required',
        ],[
            'terms' => 'Terms is required.',
        ]);
        $Restro = Auth::guard('restro')->user();

        $Support = Restaurant::find($Restro->restro_id);
        $Support->terms = $request->terms;
        $Support->save();

        return redirect(route('restro.profile.terms'))->with('success', 'Terms Updated successfully');
    }

    public function support()
    {
        $Restro = Auth::guard('restro')->user();
        $Supports = Support::where('user_id', $Restro->restro_id)->where('account_type', 2)->orderBy('id','desc')->get();

        return view('Restro.profile.support', compact('Supports'));
    }

    public function supportstore(Request $request)
    {
        $request->validate([
            'subject' => 'required',
            'message' => 'required',
        ],[
            'subject' => 'Subject is required.',
            'message' => 'Description is required.',
        ]);
        $Restro = Auth::guard('restro')->user();

        $Support = new Support();
        $Support->subject = $request->subject;
        $Support->message = $request->message;
        $Support->account_type = 2;
        $Support->user_id = $Restro->restro_id;
        $Support->status = 0;
        $Support->save();

        return redirect(route('restro.profile.support'))->with('success', 'Support Ticket created successfully');
    }

    public function supportedit($id)
    {
        $Support = Support::find($id);
        return response(['status' => true, 'data'=> $Support, 'message' => 'success']);
    }

    public function faq()
    {
        $FAQs = Faq::where('type',2)->get();
        return view('Restro.profile.faq', compact('FAQs'));
    }

    public function contact()
    {
        $ContactUs = ContactUs::first();
        return view('Restro.profile.contact', compact('ContactUs'));
    }

    public function subscription()
    {
        $Restro = Auth::guard('restro')->user();
        $RSubcriptions = RestroSubcription::where('status', 1)->get();
        $Transaction = Transaction::where('status', 1)->where('tr_type', 3)->where('restro_id', $Restro->restro_id)->orderBy('id', 'desc')->first();
        return view('Restro.profile.subscription', compact('Restro', 'RSubcriptions', 'Restro','Transaction'));
    }

    public function subpay(Request $request)
    {
        $amount = $request->amount;
        $Restro = Auth::guard('restro')->user();
        return view('Restro.profile.subpay', compact('amount', 'Restro'));
    }

    public function substore(Request $request) {
        $input = $request->all();
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
        $payment = $api->payment->fetch($input['razorpay_payment_id']);

        if(count($input) && !empty($input['razorpay_payment_id'])) {
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount'=>$payment['amount']));
                $Restro = Auth::guard('restro')->user();

                $amount = ($response->amount / 100 );
                $v_GroupCode = 'GR'. date('y');
                $v_StartNo1 = DB::select("SELECT
                    CONCAT('$v_GroupCode', LPAD(CAST(MAX(RIGHT(order_no, 3)) + 1 AS CHAR), 3, '0')) AS MaxNumber
                    FROM transactions where order_no LIKE '$v_GroupCode%'");
                $OrderNo = $v_StartNo1[0]->MaxNumber != null ? $v_StartNo1[0]->MaxNumber : 0;
                if($v_StartNo1[0]->MaxNumber == null){
                    $OrderNo = $v_GroupCode.'0001';
                }
                $Subscription = RestroSubcription::where('amount', $amount)->first();
                $startdate = date('y-m-d');
                $enddate = date('Y-m-d', strtotime("+365 day", strtotime($startdate)));
                Transaction::create([
                    'restro_id' => $Restro->restro_id,
                    'restro_subcription_id' => $Subscription->id,
                    'order_no' => $OrderNo,
                    'transaction_id' => $response->id,
                    'amount' => ($response->amount / 100 ),
                    'tr_type' => 3,
                    'status' => 1,
                    'start_date' => $startdate,
                    'end_date' => $enddate
                ]);
                $Restaurant = Restaurant::find($Restro->restro_id);
                if($Subscription->compliment_coin == 1) {
                    $Restaurant->gr_coin = $Restaurant->gr_coin + $Subscription->gr_coin;
                }
                $Restaurant->subscription_status = 1;
                $Restaurant->expire_date = $enddate;
                $Restaurant->gift_send = $Subscription->gift_send;
                $Restaurant->event_details = $Subscription->event_details;
                $Restaurant->compliment_coin = $Subscription->compliment_coin;
                $Restaurant->staff_allocation = $Subscription->staff_allocation;
                $Restaurant->save();

                Wallet::create([
                    'restro_id' => $Restro->restro_id,
                    'amount'  => $Subscription->gr_coin,
                    'status' => 1,
                    'type' => 1
                ]);

                // Whatsapp
                $Restaurant = Restaurant::find($Restro->restro_id);
                $to = $Restaurant->mobile;
                $recipient_type = "individual";
                $template_name = "membership";
                $language_code = "en_US";
                $parameters = [
                    [
                        "type" => "body",
                        "parameters" => [
                            ["type" => "text", "text" => $Restaurant->name],
                            ["type" => "text", "text" => $Subscription->name],
                        ]
                    ]
                ];
                sendWhatsapp($to, $recipient_type, $template_name, $language_code, $parameters);
                // End Whatsapp

            } catch (Exception $e) {
                return  $e->getMessage();
                return redirect()->back()->with('error', $e->getMessage());
            }
        }
        return redirect()->back()->with('success', 'Payment successful');
    }

    // Wallet
    public function wallet()
    {
        $Restro = Auth::guard('restro')->user();
        $Refer = ReferEarn::first();
        $Wallets = Wallet::where('restro_id', $Restro->restro_id)->where('type', 1)->where('status', 1)->orderBy('id', 'desc')->get();
        return view('Restro.profile.wallet', compact('Wallets','Refer'));
    }

    public function walletpurchse(Request $request)
    {
        $Refer = ReferEarn::first();
        $amount = $request->coin * $Refer->value_of_coin;
        $Restro = Auth::guard('restro')->user();
        return view('Restro.profile.pay', compact('amount', 'Restro'));
    }

    public function walletstore(Request $request)
    {
        $input = $request->all();
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
        $payment = $api->payment->fetch($input['razorpay_payment_id']);

        if(count($input) && !empty($input['razorpay_payment_id'])) {
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount'=>$payment['amount']));
                $Restro = Auth::guard('restro')->user();
                $Refer = ReferEarn::first();

                $coin = ($response->amount / 100 ) * $Refer->value_of_coin;
                $v_GroupCode = 'GR'. date('y');
                $v_StartNo1 = DB::select("SELECT
                    CONCAT('$v_GroupCode', LPAD(CAST(MAX(RIGHT(order_no, 3)) + 1 AS CHAR), 3, '0')) AS MaxNumber
                    FROM transactions where order_no LIKE '$v_GroupCode%'");
                $OrderNo = $v_StartNo1[0]->MaxNumber != null ? $v_StartNo1[0]->MaxNumber : 0;
                if($v_StartNo1[0]->MaxNumber == null){
                    $OrderNo = $v_GroupCode.'0001';
                }
                Transaction::create([
                    'restro_id' => $Restro->restro_id,
                    'order_no' => $OrderNo,
                    'transaction_id' => $response->id,
                    'amount' => ($response->amount / 100 ),
                    'tr_type' => 4,
                    'gr_coin' => $coin,
                    'status' => 1,
                ]);
                $Us = Restaurant::find($Restro->restro_id);
                $Wallet = $Us->gr_coin;
                $Wallet = $Wallet + $coin;

                Wallet::create([
                    'restro_id' => $Us->id,
                    'amount'  => $coin,
                    'status' => 1,
                    'coin' => $coin,
                    'type' => 1
                ]);
                $Us->gr_coin = $Wallet;
                $Us->save();
            } catch (Exception $e) {
                return  $e->getMessage();
                return redirect()->back()->with('error', $e->getMessage());
            }
        }
        return redirect()->back()->with('success', 'Payment successful');
    }

    public function subscriptionHistory(){
        $Restro = Auth::guard('restro')->user();
        $result = Transaction::where('status','<>', 0)->where('tr_type', 3)->where('restro_id', $Restro->restro_id)->orderBy('id', 'desc')->get();
        return view('Restro.profile.history', compact('result'));
    }

}
