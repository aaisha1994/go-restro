<?php

namespace App\Http\Controllers\Affiliate;

use App\Http\Controllers\Controller;
use App\Mail\Invite;
use App\Models\ApproveReject;
use App\Models\Category;
use App\Models\City;
use App\Models\Facility;
use App\Models\Restaurant;
use App\Models\Restro;
use App\Models\RestroCategory;
use App\Models\RestroFacility;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class RestroController extends Controller
{
    public function index()
    {
        $Affiliate = Auth::guard('affiliate')->user();
        $Restros = Restaurant::where('affiliate_id', $Affiliate->id)->orderBy('id', 'desc')->get();
        return view('Affiliate.restro.index', compact('Restros'));
    }

    public function create()
    {
        $State = State::where('country_id', 106)->get();
        $Category = Category::where('status', 1)->get();
        $Facility = Facility::where('status', 1)->get();
        return view('Affiliate.restro.create', compact('State','Category','Facility'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'name' => 'required',
            'mobile' => 'required|digits:10',
        ],[
            'name' => 'Name field is required.',
            'mobile' => 'Mobile field is required.',
            'email.required' => 'Email field is required.',
        ]);
        $Affiliate = Auth::guard('affiliate')->user();
        $Restaurant = new Restaurant();
        $Restaurant->affiliate_id = $Affiliate->id;
        $Restaurant->name = $request->name;
        $Restaurant->mobile = $request->mobile;
        $Restaurant->mobile2 = $request->mobile2;
        $Restaurant->price_per_person = $request->price_per_person;
        $Restaurant->country_id = $request->country_id ?? 106;
        $Restaurant->state_id = $request->state_id;
        $Restaurant->city_id = $request->city_id;
        $Restaurant->address = $request->address;
        $Restaurant->zip_code = $request->zip_code;
        $Restaurant->passport_price = 0;
        $Restaurant->latitude = $request->latitude;
        $Restaurant->longitude = $request->longitude;
        $Restaurant->meal_preference = implode(',',$request->meal_preference);

        if($request->hasFile('logo')){
            $file = $request->file('logo');
            $filename = date('ymdHis').'.'.$file->getClientOriginalExtension();
            $file->storeAs('public/logo', $filename);
            $Restaurant->logo = $filename;
        }
        $Restaurant->details_status = 1;
        $Restaurant->save();

        $Restro = new Restro();
        $Restro->restro_id = $Restaurant->id;
        $Restro->name = $request->person_name;
        $Restro->email = $request->email;
        $Restro->mobile = $request->mobile;
        $Restro->password = Hash::make($request->password);
        if($request->hasFile('logo')){
            $file = $request->file('logo');
            $filename = date('ymdHis').'.'.$file->getClientOriginalExtension();
            $file->storeAs('public/staff', $filename);
            $Restro->image = $filename;
        }
        $Restro->role = 'Admin';
        $Restro->is_admin = 1;
        $Restro->status = 0;
        $Restro->save();

        foreach ($request->category_id as $key => $value) {
            RestroCategory::create([
                'restro_id' => $Restaurant->id,
                'category_id' => $value
            ]);
        }

        foreach ($request->facility_id as $key => $value) {
            RestroFacility::create([
                'restro_id' => $Restaurant->id,
                'facility_id' => $value
            ]);
        }
        $hashid = Crypt::encryptString($Restro->id);
        $url = route('email.varify',[$hashid]);

        $details = [
            'title' => 'Confirm your email address to get started on Go-Restro',
            'url' => $url,
            'email' => $request->email
        ];

        Mail::to($request->email)->send(new Invite($details));

        $details = [
            'details' => 'admin'
        ];
        $ApproveReject = new ApproveReject();
        $ApproveReject->restro_id = $Restaurant->id;
        $ApproveReject->details = $details;
        $ApproveReject->type = 0;
        $ApproveReject->status = 0;
        $ApproveReject->save();
        return redirect(route('affiliate.restro.index'))->with('success', 'Restro created successfully');
    }

    public function edit($id)
    {
        $Affiliate = Auth::guard('affiliate')->user();
        $Restaurant = Restaurant::where('id',$id)->where('affiliate_id', $Affiliate->id)->first();
        if($Restaurant){
            $State = State::where('country_id', $Restaurant->country_id)->get();
            $City = City::where('state_id', $Restaurant->state_id)->get();

            $Category = Category::where('status', 1)->get();
            $Facility = Facility::where('status', 1)->get();
            $category_id = RestroCategory::where('restro_id', $id)->pluck('category_id')->toArray();
            $facility_id = RestroFacility::where('restro_id', $id)->pluck('facility_id')->toArray();
            return view('Affiliate.restro.edit', compact('Restaurant','Category','Facility','State','City', 'category_id', 'facility_id'));
        } else {
            return redirect()->back()->with('error', 'Permission Denied');
        }
    }

    public function update(Request $request, $id)
    {
        $Restaurant = Restaurant::findOrFail($id);
        $Restro = Restro::where('restro_id', $id)->where('is_admin', 1)->first();
        $request->validate([
            'name' => 'required',
            'email'   => 'required|email|unique:restros,email,' . $Restro->id,
            'mobile'  => 'required|unique:restros,mobile,' . $Restro->id
        ],[
            'name' => 'Name field is required.',
            'email' => 'Email field is required.',
            'mobile' => 'Mobile field is required.',
        ]);

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
        $Restaurant->price_per_person = $request->price_per_person;
        $Restaurant->country_id = $request->country_id ?? 106;
        $Restaurant->state_id = $request->state_id;
        $Restaurant->city_id = $request->city_id;
        $Restaurant->address = $request->address;
        $Restaurant->zip_code = $request->zip_code;
        $Restaurant->latitude = $request->latitude;
        $Restaurant->longitude = $request->longitude;
        $Restaurant->meal_preference = implode(',',$request->meal_preference);
        if($request->hasFile('logo')){
            $file = $request->file('logo');
            $filename = date('ymdHis').'.'.$file->getClientOriginalExtension();
            $file->storeAs('public/logo', $filename);
            $file->storeAs('public/staff', $filename);
            $details['logo'] = ['old' => $Restaurant->logo, 'new' => $filename, 'type' => 1];
            $Restaurant->logo = $filename;
            $Restro->image = $filename;
        }
        $Restaurant->save();

        if($Restro->name != $request->person_name) { $details['person_name'] = ['old' => $Restro->name, 'new' => $request->person_name]; }
        if($Restro->email != $request->email) { $details['email'] = ['old' => $Restro->email, 'new' => $request->email]; }
        if($Restro->mobile != $request->mobile) { $details['mobile'] = ['old' => $Restro->mobile, 'new' => $request->mobile]; }

        if(count($details) > 0) {
            $ApproveReject = new ApproveReject();
            $ApproveReject->restro_id = $Restaurant->id;
            $ApproveReject->details = $details;
            $ApproveReject->type = 1;
            $ApproveReject->status = 0;
            $ApproveReject->save();
        }
        $Restro->name = $request->person_name;
        $Restro->email = $request->email;
        $Restro->mobile = $request->mobile;
        $Restro->save();

        RestroCategory::where('restro_id', $Restaurant->id)->forceDelete();
        foreach ($request->category_id as $key => $value) {
            RestroCategory::create([
                'restro_id' => $Restaurant->id,
                'category_id' => $value
            ]);
        }

        RestroFacility::where('restro_id', $Restaurant->id)->forceDelete();
        foreach ($request->facility_id as $key => $value) {
            RestroFacility::create([
                'restro_id' => $Restaurant->id,
                'facility_id' => $value
            ]);
        }
        return redirect(route('affiliate.restro.index'))->with('success', 'Restro Updated successfully');
    }

    public function destroy($id)
    {
        $Restaurant = Restaurant::findOrFail($id);
        if ($Restaurant) {
            $Restaurant->delete();
            return response(['status' => true, 'message' => 'Restaurant deleted successfully']);
        } else {
            return response(['status' => false, 'message' => 'somthing went wrong please try again letter']);
        }
    }
}
