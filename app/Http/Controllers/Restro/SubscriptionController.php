<?php

namespace App\Http\Controllers\Restro;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function subscription(){
        
        return view('Restro.subscription.index');
    }
}
