<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\ForgotPassword;
use App\Models\Admin;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function login()
    {
        if(Auth::guard('admin')->user()) {
            return redirect()->route('admin.dashboard');
        } else {
            return view('Admin.auth.login');
        }
    }

    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required | email',
            'password' => 'required',
        ]);

        $credentials = request(['email', 'password']);
        $credentials['status'] = 1;

        $user = Admin::where('email', $request->email)->first();
        if ($user == null) {
            return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => 'Invalid Email or Password']], 422);
        }
        if ($user->status == 0) {
            return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => 'Email verification is pending please verify first']], 422);
        }
        if ($user->status == 2) {
            return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => 'Currently your account is deactivated']], 422);
        }
        if(Auth::guard('admin')->attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard');
        }else{
            return back()->with('error', 'Invalid Credentials')->onlyInput('email');
        }
    }


    public function forgotPassword()
    {
        if(Auth::guard('affiliate')->user()) {
            return redirect()->route('affiliate.dashboard');
        } else {
            return view('Admin.auth.forgot-password');
        }
    }

    public function forgotsend(Request $request)
    {
        try {
            $validator = Validator::make($request->all(),[
                'email' => ['required'],
            ]);

            if ($validator->fails()) {
                return response()->json(['success' => false, 'message' => 'The email field is required.'], 200);
            }

            $Admin = Admin::where('email', $request->email)->first();
            if($Admin) {
                $hashid = Crypt::encryptString($Admin->id);
                $url = route('admin.resetPassword',[$hashid]);

                $details = [
                    'title' => 'Forgot Password on Go-Restro',
                    'url' => $url,
                    'email' => $request->email
                ];

                Mail::to($request->email)->send(new ForgotPassword($details));
                return response()->json(['success' => true, 'message' => 'Mail send to your register email'], 200);
            } else {
                return response()->json(['success' => false, 'message' => 'Invalid Email Address'], 200);
            }
        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 200);
        }
    }

    public function resetPassword($token) {
        $hashid1 = Crypt::decryptString($token);
        $Admin = Admin::find($hashid1);
        return view('Admin.auth.reset-password', compact('Admin','token'));
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
                return response()->json(['success' => false, 'message' => $messages], 200);
            }

            $hashid = Crypt::decryptString($token);
            $Admin = Admin::find($hashid);
            if($Admin) {
                $Admin->password = Hash::make($request->password);
                $Admin->save();
                return response()->json(['success' => true, 'message' => 'Your Pasword change successfully.'], 200);
            } else {
                return response()->json(['success' => false, 'message' => 'Invalid token'], 200);
            }
        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 200);
        }
    }
}
