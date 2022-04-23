<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Models\admin\Banner;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function check_out(){
        $checkout_banner = Banner::where('page','=','checkout')->first();
        return view('customer.pages.check_out',compact('checkout_banner'));
    }
}
