<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Models\admin\Banner;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contact(){
        $contact_banner = Banner::where('page','=','contact')->first();
        return view('customer.pages.contact_us',compact('contact_banner'));
    }
}
