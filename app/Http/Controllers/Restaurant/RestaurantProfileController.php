<?php

namespace App\Http\Controllers\Restaurant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RestaurantProfileController extends Controller
{
    public function AccountOverview(){
        return view('restaurant_admin.account.overview');
    }

    public function AccountSettings(){
        return view('restaurant_admin.account.settings');
    }

    public function UserAllocation(){
        return view('restaurant_admin.account.user_allocation');
    }

    public function ChangePassword(){
        return view('restaurant_admin.account.change_password');
    }

    public function Contactus(){
        return view('restaurant_admin.account.contactus');
    }

    public function Support(){
        return view('restaurant_admin.account.support');
    }

    public function Faqs(){
        return view('restaurant_admin.account.faqs');
    }

    public function PrivacyPolicy(){
        return view('restaurant_admin.account.privacy_policy');
    }

    public function TermsConditions(){
        return view('restaurant_admin.account.terms_conditions');
    }
}
