<?php

namespace App\Http\Controllers\Affiliate;

use App\Http\Controllers\Controller;
use App\Mail\ForgotPassword;
use App\Mail\Invite;
use App\Models\Affiliate;
use App\Models\AffiliateCommission;
use App\Models\State;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function register()
    {
        if(Auth::guard('affiliate')->user()) {
            return redirect()->route('affiliate.dashboard');
        } else {
            $State = State::where('country_id', 106)->get();
            $Commission = AffiliateCommission::where('status', 1)->get();
            return view('Affiliate.auth.sign-up', compact('State','Commission'));
        }
    }

    public function postRegister(Request $request)
    {
        try {
            $validator = Validator::make($request->all(),[
                'first_name' => ['required'],
                'last_name' => ['required'],
                'email' => ['required', 'email', 'unique:affiliates,email'],
                'mobile' => ['required', 'numeric', 'unique:affiliates,mobile'],
                'address' => ['required'],
                'state_id' => ['required'],
                'city' => ['required'],
                'zip_code' => ['required'],
            ]);

            if ($validator->fails()) {
                $messages = $validator->getMessageBag();
                return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => $messages]], 422);
            }


            $randomString = Str::random(7);
            $ref_code = strtoupper('GR'. $randomString);
            $Affiliate = new Affiliate();
            $Affiliate->first_name = $request->first_name;
            $Affiliate->last_name = $request->last_name;
            $Affiliate->email = $request->email;
            $Affiliate->mobile = $request->mobile;
            $Affiliate->address = $request->address;
            $Affiliate->state_id = $request->state_id;
            $Affiliate->city = $request->city;
            $Affiliate->country_id = $request->country_id ?? 106;
            $Affiliate->zip_code = $request->zip_code;
            $Affiliate->password = Hash::make($request->password);
            $Affiliate->affiliate_type = $request->affiliate_type;
            $Affiliate->vehicle_number = $request->vehicle_number ?? null;
            $Affiliate->agency_name = $request->agency_name ?? null;
            $Affiliate->commission_type = $request->commission_type;
            $Affiliate->ref_code = $ref_code;
            $Affiliate->status = 0;
            $Affiliate->save();

            $hashid = Crypt::encryptString($Affiliate->id);
            $url = route('email.varifies',[$hashid]);

            $details = [
                'title' => 'Confirm your email address to get started on Go-Affiliate',
                'url' => $url,
                'email' => $request->email
            ];

            Mail::to($request->email)->send(new Invite($details));
            return response()->json(['success' => true, 'data' => ['result' => [], 'message' => 'successfully.']], 200);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => $e->getMessage()]], 422);
        }
    }

    public function login()
    {
        if(Auth::guard('affiliate')->user()) {
            return redirect()->route('affiliate.dashboard');
        } else {
            return view('Affiliate.auth.login');
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

        $user = Affiliate::where('email', $request->email)->first();
        if ($user == null) {
            return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => 'Invalid Email or Password']], 422);
        }
        if ($user->status == 0) {
            return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => 'Email verification is pending please verify first']], 422);
        }
        if ($user->status == 2) {
            return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => 'Currently your account is deactivated']], 422);
        }
        if(Auth::guard('affiliate')->attempt($credentials)){
            $request->session()->regenerate();
            return response()->json(['success' => true, 'data' => ['result' => [], 'message' => 'successfully.']], 200);
        }else{
            return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => 'Invalid Email or Password']], 422);
        }
    }

    public function forgotPassword()
    {
        if(Auth::guard('affiliate')->user()) {
            return redirect()->route('affiliate.dashboard');
        } else {
            return view('Affiliate.auth.forgot-password');
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

            $Affiliate = Affiliate::where('email', $request->email)->first();
            if($Affiliate) {
                $hashid = Crypt::encryptString($Affiliate->id);
                $url = route('affiliate.resetPassword',[$hashid]);

                $details = [
                    'title' => 'Forgot Password on Go-Affiliate',
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
        $Affiliate = Affiliate::find($hashid1);
        return view('Affiliate.auth.password-reset', compact('Affiliate','token'));
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
            $Affiliate = Affiliate::find($hashid);
            if($Affiliate) {
                $Affiliate->password = Hash::make($request->password);
                $Affiliate->save();
                return response()->json(['success' => true, 'data' => ['result' => [], 'message' => 'successfully.']], 200);
            } else {
                return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => 'Invalid token']], 422);
            }
        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => $e->getMessage()]], 422);
        }
    }
}
