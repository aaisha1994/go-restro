<?php

namespace App\Http\Controllers\RestroApi;

use App\Http\Controllers\Controller;
use App\Mail\ForgotPassword;
use App\Mail\Invite;
use App\Models\ApproveReject;
use App\Models\Fcm;
use App\Models\Restaurant;
use App\Models\Restro;
use App\Models\RestroCategory;
use App\Models\RestroFacility;
use App\Models\RestroImage;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('restroApi', ['except' => ['Register','Login','ForgotPassword']]);
    }

    public function Register(Request $request)
    {
        try {
            $validator = Validator::make($request->all(),[
                'name' => ['required'],
                'person_name' => ['required'],
                'email' => ['required', 'email', 'unique:restros,email,NULL,id,deleted_at,NULL'],
                'mobile' => ['required', 'numeric', 'unique:restros,mobile,NULL,id,deleted_at,NULL'],
                'mobile2' => ['required', 'numeric'],
                'address' => ['required'],
                'state_id' => ['required'],
                'city_id' => ['required'],
                'zip_code' => ['required'],
                'logo' => ['required'],
            ]);
            if($validator->fails()){
                $messages = $validator->getMessageBag();
                return response()->json(['success' => false, 'error' => ['message' => 'Validation Error', 'error_message' => $messages]], 422);
            }

            $filename = '';
            $Restaurant = new Restaurant();
            $Restaurant->name = $request->name;
            $Restaurant->mobile = $request->mobile;
            $Restaurant->mobile2 = $request->mobile2;
            $Restaurant->address = $request->address;
            $Restaurant->state_id = $request->state_id;
            $Restaurant->city_id = $request->city_id;
            $Restaurant->country_id = $request->country_id ?? 106;
            $Restaurant->zip_code = $request->zip_code;
            $Restaurant->latitude = $request->latitude;
            $Restaurant->longitude = $request->longitude;
            if($request->hasFile('logo')){
                $file = $request->file('logo');
                $filename = date('ymdHis').'.'.$file->getClientOriginalExtension();
                $file->storeAs('public/logo', $filename);
                $Restaurant->logo = $filename;
            }
            $Restaurant->save();

            $Restro = new Restro();
            $Restro->restro_id = $Restaurant->id;
            $Restro->name = $request->person_name;
            $Restro->email = $request->email;
            $Restro->mobile = $request->mobile;
            if($request->hasFile('logo')){
                $file = $request->file('logo');
                $filename = date('ymdHis').'.'.$file->getClientOriginalExtension();
                $file->storeAs('public/staff', $filename);
                $Restro->image = $filename;
            }
            $Restro->role = 'Admin';
            $Restro->is_admin = 1;
            $Restro->status = 0;
            $Restro->password = Hash::make($request->password);
            $Restro->save();

            $hashid = Crypt::encryptString($Restro->id);
            $url = route('email.varify',[$hashid]);

            $details = [
                'title' => 'Confirm your email address to get started on Go-Restro',
                'url' => $url,
                'email' => $request->email
            ];

            Mail::to($request->email)->send(new Invite($details));

            // Whatsapp
            $to = $request->mobile;
            $recipient_type = "individual";

            $template_name = "web_restro_sine_up";
            $language_code = "en_GB";
            $parameters = [];
            sendWhatsapp($to, $recipient_type, $template_name, $language_code, $parameters);


            $template_name = "sine_up_web_restro";
            $language_code = "en_US";
            $parameters = [
                [
                    "type" => "body",
                    "parameters" => [
                        ["type" => "text", "text" => $request->name],
                        ["type" => "text", "text" => $request->email],
                    ]
                ]
            ];
            sendWhatsapp($to, $recipient_type, $template_name, $language_code, $parameters);
            // End Whatsapp

            return response()->json(['success' => true, 'data' => ['result' => $Restro, 'message' => 'Registration successfully.']], 200);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => $e->getMessage()]], 422);
        }
    }

    public function Login(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'email' => 'required|email',
                'password' => 'required|string',
            ]);

            if ($validator->fails()) {
                return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => 'Required field missing']], 422);
            }
            $input = $request->only('email', 'password');
            $input['status'] = 1;
            $jwt_token = null;

            $user = Restro::where('email', $request->email)->first();


            if ($user == null) {
                return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => 'Invalid Email or Password']], 422);
            }
            if ($user->status == 0) {
                return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => 'Email verification is pending please verify first']], 422);
            }
            if ($user->status == 2) {
                return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => 'Currently your account is deactivated']], 422);
            }
            if (!$jwt_token = Auth::guard('restroapi')->attempt($input)) {
                return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => 'Invalid Email or Password']], 422);
            }

            $user = Auth::guard('restroapi')->user();
            if($request->has('fcm_token')){
                Fcm::create([
                    'restro_id' => $user->restro_id,
                    'fcm_token' => $request->fcm_token,
                    'type' => 1
                ]);
            }
            $Restaurant = Restaurant::find($user->restro_id);
            return response()->json(['success' => true, 'data' => ['result' => $user, 'Restaurant'=> $Restaurant, 'token_type' => 'Bearer', 'token' => $jwt_token, 'message' => 'successfully.']], 200);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => $e->getMessage()]], 422);
        }
    }

    public function OtherInfo(Request $request)
    {
        // dd($request->all());
        try {
            $validator = Validator::make($request->all(), [
                'price_per_person' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => 'Required field missing']], 422);
            }

            $Restro = Auth::guard('restroapi')->user();
            $Restaurant = Restaurant::find($Restro->restro_id);
            $Restaurant->price_per_person = $request->price_per_person;
            $Restaurant->meal_preference = $request->meal_preference;
            $Restaurant->details_status = 1;

            $Restaurant->must_try = $request->must_try;
            $Restaurant->establishment_type = $request->establishment_type;
            $Restaurant->open_time = $request->open_time;
            $Restaurant->save();
            foreach (explode(',', $request->category) as $key => $value) {
                RestroCategory::create([
                    'restro_id' => $Restro->restro_id,
                    'category_id' => $value
                ]);
            }
            foreach (explode(',', $request->facility) as $key => $value) {
                RestroFacility::create([
                    'restro_id' => $Restro->restro_id,
                    'facility_id' => $value
                ]);
            }

            $image = $request->file('image');
            foreach ($image as $key => $file) {
                $filename = str_replace(' ', '', date('ymdHis-0'). $key .'.'.$file->getClientOriginalExtension());
                $file->storeAs('public/image', $filename);
                RestroImage::create([
                    'restro_id' => $Restro->restro_id,
                    'image' => $filename,
                    'image_type' => 1
                ]);
            }
            $menus=$request->file('menu');
            foreach ($menus as $key => $file) {
                $filename = str_replace(' ', '', date('ymdHis-1 '). $key .'.'.$file->getClientOriginalExtension());
                $file->storeAs('public/image', $filename);
                RestroImage::create([
                    'restro_id' => $Restro->restro_id,
                    'image' => $filename,
                    'image_type' => 2
                ]);
            }
            $details = [
                'details' => 'admin'
            ];
            $ApproveReject = new ApproveReject();
            $ApproveReject->restro_id = $Restaurant->id;
            $ApproveReject->details = $details;
            $ApproveReject->type = 0;
            $ApproveReject->status = 0;
            $ApproveReject->save();

            return response()->json(['success' => true, 'data' => ['result' => [], 'message' => 'successfully.']], 200);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => $e->getMessage()]], 422);
        }
    }

    public function ForgotPassword(Request $request)
    {
        try {
            $Restro = Restro::where('email', $request->email)->first();
            if ($Restro) {
                $token = Str::random(64);
                DB::table('password_reset_tokens')->updateOrInsert(
                    ['email' => $request->email],
                    [
                        'email' => $request->email,
                        'token' => $token,
                        'created_at' => Carbon::now()
                    ]
                );

                $url = route('restro.resetPassword',[$token]);
                $details = [
                    'title' => 'Forgot your email address to set new password',
                    'url' => $url,
                    'email' => $request->email
                ];
                Mail::to($request->email)->send(new ForgotPassword($details));
                $message = 'Reset password link hasbeen sent to your registered email address...!!';
                return response()->json(['success' => true, 'data' => ['message' => $message]], 200);
            } else {
                $message = 'Your email is not in our system please register.';
                return response()->json(['success' => false, 'error' => ['message' => $message]], 422);
            }
        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => $e->getMessage()]], 422);
        }
    }

    public function Profile()
    {
        try {
            $User = Auth::guard('restroapi')->user();
            $Restro = Restro::find($User->id);
            $Restaurant = Restaurant::with(['RestroCategory','RestroFacility','RestroImage'])->find($User->restro_id);
            return response()->json(['success' => true, 'data' => ['result' => $Restro, 'Restaurant' => $Restaurant, 'message' => 'successfully.']], 200);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => $e->getMessage()]], 422);
        }
    }

    public function Logout()
    {
        Auth::guard('restroapi')->logout();
        return response()->json(['success' => true, 'data' => ['message' => 'Log out successfully.']], 200);
    }

    public function UpdateProfile(Request $request)
    {
        try {
            $Restro = Auth::guard('restroapi')->user();
            $rules = [
                'name' => 'required',
                'email'   => 'required|email|unique:restros,email,' . $Restro->id,
                'mobile'   => 'required|unique:restros,mobile,' . $Restro->id
            ];

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                $messages = $validator->getMessageBag();
                return response()->json(['success' => false, 'error' => ['message' => 'Validation Error', 'error_message' => $messages]], 422);
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
            $Restaurant->country_id = $request->country_id ?? 106;
            $Restaurant->zip_code = $request->zip_code;
            $Restaurant->latitude = $request->latitude;
            $Restaurant->longitude = $request->longitude;
            $Restaurant->price_per_person = $request->price_per_person;
            $Restaurant->meal_preference = $request->meal_preference;
            $Restaurant->must_try = $request->must_try;
            $Restaurant->establishment_type = $request->establishment_type;
            $Restaurant->open_time = $request->open_time;
            if($request->hasFile('logo')){
                $file = $request->file('logo');
                $filename = date('ymdHis').'.'.$file->getClientOriginalExtension();
                $file->storeAs('public/logo', $filename);
                $file->storeAs('public/staff', $filename);

                $details['logo'] = ['old' => $Restaurant->logo, 'new' => $filename, 'type' => 1];
                $Restaurant->logo = $filename;
                $Restros->image = $filename;
            }
            $Restaurant->save();

            RestroCategory::where('restro_id', $Restro->restro_id)->forceDelete();
            foreach (explode(',', $request->category) as $key => $value) {
                RestroCategory::create([
                    'restro_id' => $Restro->restro_id,
                    'category_id' => $value
                ]);
            }

            RestroFacility::where('restro_id', $Restro->restro_id)->forceDelete();
            foreach (explode(',', $request->facility) as $key => $value) {
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

            if($Restros->name != $request->person_name) { $details['person_name'] = ['old' => $Restros->name, 'new' => $request->person_name]; }
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

            return response()->json(['success' => true, 'data' => ['result' => $Restros, 'message' => 'successfully.']], 200);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => $e->getMessage()]], 422);
        }
    }

    public function ImageRemove($id)
    {
        try {
            $Restro = Auth::guard('restroapi')->user();
            // dd($Restro);
            $RestroImage = RestroImage::where('restro_id',$Restro->restro_id)->where('id', $id)->first();
            if($RestroImage) {
                $RestroImage->delete();
                return response()->json(['success' => true, 'data' => ['result' => $RestroImage, 'message' => 'image deleted successfully']], 200);
            } else {
                return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'Restro image not found']], 422);
            }
        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => $e->getMessage()]], 422);
        }
    }

    public function changePassword(Request $request)
    {
        try {
            $Restro = Auth::guard('restroapi')->user();
            if(!Hash::check($request->old_password, $Restro->password)){
                return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => "Old Password Doesn't match!"]], 422);
            }
            Restro::whereId($Restro->id)->update([
                'password' => Hash::make($request->new_password)
            ]);
            return response()->json(['success' => true, 'data' => ['result' => $Restro, 'message' => 'successfully.']], 200);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => $e->getMessage()]], 422);
        }
    }
}
