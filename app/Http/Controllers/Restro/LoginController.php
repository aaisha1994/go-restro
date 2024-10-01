<?php

namespace App\Http\Controllers\Restro;

use App\Http\Controllers\Controller;
use App\Mail\ForgotPassword;
use App\Mail\Invite;
use App\Models\Restaurant;
use App\Models\Restro;
use App\Models\State;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function register()
    {
        if(Auth::guard('restro')->user()) {
            return redirect()->route('restro.dashboard');
        } else {
            $States = State::where('country_id', 106)->get();
            return view('Restro.auth.sign-up', compact('States'));
        }
    }

    public function postRegister(Request $request)
    {
        try {
            $this->validate($request, [
                'name' => 'required',
                'person_name' => 'required',
                'email' => 'required'| 'email' | 'unique:restros,email,NULL,id,deleted_at,NULL',
                'mobile' => 'required' | 'unique:restros,mobile,NULL,id,deleted_at,NULL',
                'mobile2' => 'required',
                'address' => 'required',
                'state_id' => 'required',
                'city_id' => 'required',
                'zip_code' => 'required',
                'logo' => 'required',
            ]);

            $Restro = new Restro();
            $Restro->name = $request->name;
            $Restro->person_name = $request->person_name;
            $Restro->email = $request->email;
            $Restro->mobile = $request->mobile;
            $Restro->mobile2 = $request->mobile2;
            $Restro->address = $request->address;
            $Restro->latitude = $request->latitude;
            $Restro->longitude = $request->longitude;
            $Restro->state_id = $request->state_id;
            $Restro->city_id = $request->city_id;
            $Restro->country_id = $request->country_id ?? 106;
            $Restro->zip_code = $request->zip_code;
            $Restro->password = Hash::make($request->password);
            if($request->hasFile('logo')){
                $file = $request->file('logo');
                $filename = date('ymdHis').'.'.$file->getClientOriginalExtension();
                $file->storeAs('public/logo', $filename);
                $Restro->logo = $filename;
            }
            $Restro->status = 0;
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

            return redirect()->route('restro.login')->with('success','Registration successfully.');
        } catch (Exception $e) {
            return back()->withErrors($e->getMessage());
        }
    }

    public function login()
    {
        if(Auth::guard('restro')->user()) {
            return redirect()->route('restro.dashboard');
        } else {
            return view('Restro.auth.login');
        }
    }

    public function postLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string',
        ]);
        if ($validator->fails()) {
            return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => 'Required field missing']], 422);
        }
        $credentials = request(['email', 'password']);
        $credentials['status'] = 1;

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

        if(Auth::guard('restro')->attempt($credentials)){
            $request->session()->regenerate();
            return response()->json(['success' => true, 'data' => ['result' => [], 'message' => 'successfully.']], 200);
        }else{
            return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => 'Invalid Email or Password']], 422);
        }
    }

    public function forgotPassword()
    {
        if(Auth::guard('restro')->user()) {
            return redirect()->route('restro.dashboard');
        } else {
            return view('Restro.auth.forgot-password');
        }
    }

    public function forgotsend(Request $request)
    {
        try {
            $validator = Validator::make($request->all(),[
                'email' => ['required'],
            ]);

            if ($validator->fails()) {
                $messages = $validator->getMessageBag();
                return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => $messages]], 422);
            }

            $Restro = Restro::where('email', $request->email)->first();
            if($Restro) {
                $hashid = Crypt::encryptString($Restro->id);
                $url = route('restro.resetPassword',[$hashid]);

                $details = [
                    'title' => 'Forgot Password on Go-Restro',
                    'url' => $url,
                    'email' => $request->email
                ];

                Mail::to($request->email)->send(new ForgotPassword($details));
                return response()->json(['success' => true, 'data' => ['result' => [], 'message' => 'successfully.']], 200);
            } else {
                return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => 'Invalid Email Address']], 422);
            }
        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => $e->getMessage()]], 422);
        }
    }

    public function resetPassword($token) {
        $hashid1 = Crypt::decryptString($token);
        return view('Restro.auth.password-reset', compact('token'));
    }

    public function resetsend(Request $request, $token)
    {
        try {
            $validator = Validator::make($request->all(),[
                'password' => ['required'],
                'confirm_password' => ['required'],
            ]);

            if ($validator->fails()) {
                $messages = $validator->getMessageBag();
                return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => $messages]], 422);
            }

            $hashid = Crypt::decryptString($token);
            $Restro = Restro::find($hashid);
            if($Restro) {
                $Restro->password = Hash::make($request->password);
                $Restro->save();
                return response()->json(['success' => true, 'data' => ['result' => [], 'message' => 'successfully.']], 200);
            } else {
                return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => 'Invalid token']], 422);
            }
        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => $e->getMessage()]], 422);
        }
    }
}
