<?php

namespace App\Http\Controllers\Admin;

use App\Exports\RestroExport;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\City;
use App\Models\Coupon;
use App\Models\Facility;
use App\Models\Restaurant;
use App\Models\Restro;
use App\Models\RestroCategory;
use App\Models\RestroFacility;
use App\Models\RestroImage;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class RestroController extends Controller
{
    public function index()
    {
        if(Auth::guard('admin')->user()->is_admin == 1 || in_array('Restros', Auth::guard('admin')->user()->role_details)) {
            $Restros = Restaurant::orderBy('id', 'desc')->get();
            return view('Admin.restro.index', compact('Restros'));
        } else{
            return redirect()->back()->with('error', 'Permission denied');
        }
    }

    public function create()
    {
        if(Auth::guard('admin')->user()->is_admin == 1 || in_array('Restros', Auth::guard('admin')->user()->role_details)) {
            $State = State::where('country_id', 106)->get();
            $Category = Category::where('status', 1)->get();
            $Facility = Facility::where('status', 1)->get();
            return view('Admin.restro.create', compact('State','Category','Facility'));
        } else{
            return redirect()->back()->with('error', 'Permission denied');
        }
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

        $Restaurant = new Restaurant();
        $Restaurant->name = $request->name;
        $Restaurant->mobile = $request->mobile;
        $Restaurant->mobile2 = $request->mobile2;
        $Restaurant->price_per_person = $request->price_per_person;
        $Restaurant->country_id = $request->country_id ?? 106;
        $Restaurant->state_id = $request->state_id;
        $Restaurant->city_id = $request->city_id;
        $Restaurant->address = $request->address;
        $Restaurant->zip_code = $request->zip_code;
        $Restaurant->passport_price = $request->passport_price;
        $Restaurant->latitude = $request->latitude;
        $Restaurant->longitude = $request->longitude;
        $Restaurant->meal_preference = implode(',',$request->meal_preference);


        if($request->hasFile('logo')){
            $file = $request->file('logo');
            $filename = date('ymdHis').'.'.$file->getClientOriginalExtension();
            $file->storeAs('public/logo', $filename);
            $Restaurant->logo = $filename;
        }

        $Restaurant->status = 1;
        $Restaurant->admin_status = 0;
        $Restaurant->details_status = 0;
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
        $Restro->status = 1;
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
        return redirect(route('admin.restro.index'))->with('success', 'Restro created successfully');
    }

    public function edit($id)
    {
        if(Auth::guard('admin')->user()->is_admin == 1 || in_array('Restros', Auth::guard('admin')->user()->role_details)) {
            $Restaurant = Restaurant::findOrFail($id);
            $State = State::where('country_id', $Restaurant->country_id)->get();
            $City = City::where('state_id', $Restaurant->state_id)->get();

            $Category = Category::where('status', 1)->get();
            $Facility = Facility::where('status', 1)->get();
            $category_id = RestroCategory::where('restro_id', $id)->pluck('category_id')->toArray();
            $facility_id = RestroFacility::where('restro_id', $id)->pluck('facility_id')->toArray();
            return view('Admin.restro.edit', compact('Restaurant','Category','Facility','State','City', 'category_id', 'facility_id'));
        } else{
            return redirect()->back()->with('error', 'Permission denied');
        }
    }

    public function view($id)
    {
        if(Auth::guard('admin')->user()->is_admin == 1 || in_array('Restros', Auth::guard('admin')->user()->role_details)) {
            $Restro = Restaurant::findOrFail($id);
            $RestroImage = RestroImage::where('restro_id', $id)->where('status', 1)->where('image_type', 1)->get();
            $RestroMenu = RestroImage::where('restro_id', $id)->where('status', 1)->where('image_type', 2)->get();
            $Coupons = Coupon::where('restro_id', $id)->where('status', 1)->get();
            return view('Admin.restro.view', compact('Restro','RestroImage','RestroMenu','Coupons'));
        } else{
            return redirect()->back()->with('error', 'Permission denied');
        }
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
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
        $Restaurant->name = $request->name;
        $Restaurant->mobile = $request->mobile;
        $Restaurant->mobile2 = $request->mobile2;
        $Restaurant->price_per_person = $request->price_per_person;
        $Restaurant->country_id = $request->country_id ?? 106;
        $Restaurant->state_id = $request->state_id;
        $Restaurant->city_id = $request->city_id;
        $Restaurant->address = $request->address;
        $Restaurant->zip_code = $request->zip_code;
        $Restaurant->passport_price = $request->passport_price;
        $Restaurant->latitude = $request->latitude;
        $Restaurant->longitude = $request->longitude;
        $Restaurant->meal_preference = implode(',',$request->meal_preference);
        if($request->hasFile('logo')){
            $file = $request->file('logo');
            $filename = date('ymdHis').'.'.$file->getClientOriginalExtension();
            $file->storeAs('public/logo', $filename);
            $file->storeAs('public/staff', $filename);
            $Restaurant->logo = $filename;
            $Restro->image = $filename;
        }
        $Restaurant->save();


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
        return redirect(route('admin.restro.index'))->with('success', 'Restro Updated successfully');
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

    public function status($id)
    {
        $Restaurant = Restaurant::findOrFail($id);
        if ($Restaurant) {
            if($Restaurant->status == 1){
                $Restaurant->update(['status'=> 2]);
                $status = 'Deactive';
            } else{
                $Restaurant->update(['status'=> 1]);
                $status = 'Active';
            }
            return response(['status' => true, 'message' => 'Status '.$status.' successfully']);
        }
        return response(['status' => false, 'message' => 'somthing went wrong please try again letter']);
    }

    public function top($id)
    {
        $Restaurant = Restaurant::findOrFail($id);
        if ($Restaurant) {
            if($Restaurant->top_restro == 1){
                $Restaurant->update(['top_restro'=> 0]);
                $status = 'Deactive';
            } else{
                $Restaurant->update(['top_restro'=> 1]);
                $status = 'Active';
            }
            return response(['status' => true, 'message' => 'Status '.$status.' successfully']);
        }
        return response(['status' => false, 'message' => 'somthing went wrong please try again letter']);
    }

    public function login(Request $request, $id)
    {
        $Restaurant = Restaurant::findOrFail($id);
        $Restro = Restro::where('restro_id', $Restaurant->id)->where('is_admin', 1)->first();
        Auth::guard('restro')->login($Restro);
        if (Auth::guard('restro')->check()) {
            return redirect()->route('restro.dashboard')->with('success', 'Login successfully');
        } else {
            return redirect()->back()->with('error', 'Login Error');
        }
        // if(Auth::guard('restro')->login($Restro)){
        //     $request->session()->regenerate();
        //     return redirect()->route('restro.dashboard')->with('success', 'Login successfully');
        // }else{
        //     return redirect()->back()->with('error', 'Login Error');
        // }
    }

    public function image(Request $request,$id)
    {
        $Restaurant = Restaurant::findOrFail($id);
        $image = $request->file('image');
        if($request->hasFile('image')){
            foreach ($image as $key => $file) {
                $filename = str_replace(' ', '', date('ymdHis-0'). $key .'.'.$file->getClientOriginalExtension());
                $file->storeAs('public/image', $filename);
                RestroImage::create([
                    'restro_id' => $Restaurant->id,
                    'image' => $filename,
                    'image_type' => $request->image_type
                ]);
            }
        }
        return redirect()->back()->with('success', 'Restaurant image store successfully');
    }

    public function terms(Request $request,$id)
    {
        $Restaurant = Restaurant::findOrFail($id);
        $Restaurant->terms = $request->terms;
        $Restaurant->save();
        return redirect()->back()->with('success', 'Restaurant Terms updated successfully');
    }

    public function Approve()
    {
        if(Auth::guard('admin')->user()->is_admin == 1 || in_array('Restros', Auth::guard('admin')->user()->role_details)) {
            $Restros = Restaurant::orderBy('id', 'desc')->get();
            return view('Admin.restro.index', compact('Restros'));
        } else{
            return redirect()->back()->with('error', 'Permission denied');
        }
    }

    public function export() {
        return Excel::download(new RestroExport, 'restaurant.xlsx');
    }
}
