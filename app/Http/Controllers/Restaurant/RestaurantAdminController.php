<?php

namespace App\Http\Controllers\Restaurant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RestaurantAdminController extends Controller
{
    public function login(){
        
        return view('restaurant_admin.auth.sign-in');
    }

    public function SignUp(){
        
        return view('restaurant_admin.auth.sign-up');
    }

    public function PasswordReset(){
        
        return view('restaurant_admin.auth.password-reset');
    }

    public function NewPassword(){
        
        return view('restaurant_admin.auth.new-password');
    }

    // Dashboard
    public function index(){
        
        return view('restaurant_admin.index');
    }

    public function Passport(){
        
        return view('restaurant_admin.passport.index');
    }

    public function AddPassport(){
        
        return view('restaurant_admin.passport.create');
    }

    public function RestroUsers(){
        
        return view('restaurant_admin.users.index');
    }

    public function RestroQr(){
        
        return view('restaurant_admin.qr.qr-reedem');
    }

    public function RestroQrinvites(){
        
        return view('restaurant_admin.qr.qr-invites');
    }

    public function SendGift(){
        
        return view('restaurant_admin.sendgift.index');
    }

}
