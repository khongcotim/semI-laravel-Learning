<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Models\admin\Banner;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function about(){
        $about_blog = Banner::where('page','=','about')->first();
        return view('customer.pages.about',compact('about_blog'));
    }
}
