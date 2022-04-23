<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function faq(){
        return view('customer.pages.faq');
    }
}
