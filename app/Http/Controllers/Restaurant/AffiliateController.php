<?php

namespace App\Http\Controllers\Restaurant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AffiliateController extends Controller
{
    public function login(){
        
        return view('affiliate_admin.auth.login');
    }

    public function Register(){
        
        return view('affiliate_admin.auth.sign-up');
    }

    public function forgotPassword(){
        
        return view('affiliate_admin.auth.password-reset');
    }

     public function AffiliateProfile(){
        
        return view('affiliate_admin.auth.profile');
    }

    public function dashboard(){
        
        return view('affiliate_admin.dashboard.index');
    }

    public function RestrosList(){
        
        return view('affiliate_admin.restros-create.index');
    }

    public function RestroCreate(){
        
        return view('affiliate_admin.restros-create.create');
    }

    public function RestroEdit(){
        
        return view('affiliate_admin.restros-create.edit');
    }

    public function AffiliateOffer(){
        
        return view('affiliate_admin.offer-create.index');
    }

    public function AffiliateOfferCreate(){
        
        return view('affiliate_admin.offer-create.create');
    }

    public function AffiliateOfferEdit(){
        
        return view('affiliate_admin.offer-create.edit');
    }

    public function PaymentDetails(){
        
        return view('affiliate_admin.payment-details.index');
    }

    public function QrManagement(){
        
        return view('affiliate_admin.qr-management.index');
    }

    public function AffiliateSales(){
        
        return view('affiliate_admin.sales.index');
    }

}
