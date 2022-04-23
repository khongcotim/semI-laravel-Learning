<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Models\admin\Banner;
use App\Models\admin\Feedback;
use App\Models\admin\TourGuide;
use App\Models\admin\TourGuild;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class BecomeController extends Controller
{
    public function become(){
        $become_banner = Banner::where('page','=','become')->first();
        $feedback = Feedback::where('admin_id','!=','null')->get();
        return view('customer.pages.become_employee',compact('become_banner','feedback'));
    }
    public function post_feedback(Request $request)
    {
        $post_feedback = Feedback::create([
            'solution'=>$request->message,
            'customer_id'=>Auth::guard('customer')->user()->id
        ]);
        if ($post_feedback) {
            return redirect()->back()->with('add_success',"We receive your feedback. Our feedback will be explain and contact for you earliest");
        }else{
            return redirect()->back()->with('error',"Can't post your feedback. Please try again later");
        }
    }
    public function post_register_employee(Request $request)
    {
        $find_name_tour_guild = TourGuide::where('name','=',$request->name)->first('name');
        $find_email_tour_guild = TourGuide::where('email','=',$request->email)->first('email');
        $find_phone_tour_guild = TourGuide::where('phone','=',$request->phone)->first('phone');
        if (strlen($find_name_tour_guild)>0 || strlen($find_email_tour_guild || strlen($find_phone_tour_guild)>0)>0) {
            if (strlen($find_name_tour_guild)>0) {
                return redirect()->back()->with('error',"Sorry, This name is already used. Please type again.");
            }elseif(strlen($find_email_tour_guild)>0){
                return redirect()->back()->with('error',"Sorry, This email is already used. Please type again.");
            }
            elseif(strlen($find_phone_tour_guild)>0){
                return redirect()->back()->with('error',"Sorry, This phone is already used. Please type again.");
            }
        }else{
            if ($request->has('avatar')) {
                $file = $request->avatar;
                $ext = $file->extension();
                $avatar = trim(trim($file->getClientOriginalName(),$ext),'.').time().'.'.$ext;
                $file->move(public_path('customers/images'),$avatar);
            }else{
                $avatar = '';
            }
            if ($avatar != '') {
                $create_new_employee = TourGuide::create([
                    'name'=>$request->name,
                    'avatar'=>$avatar,
                    'email'=>$request->email,
                    'phone'=>$request->phone,
                    'price'=>$request->price,
                    'gender'=>$request->gender,
                ]);
            }else{
                $create_new_employee = TourGuide::create([
                    'name'=>$request->name,
                    'email'=>$request->email,
                    'phone'=>$request->phone,
                    'price'=>$request->price,
                    'gender'=>$request->gender,
                ]);
            }
            if ($create_new_employee) {
                return redirect()->back()->with('edit_success',"Congratulations !!! You're our Tour Guild!!!");
            }else{
                return redirect()->back()->with('error',"OOP !!! Get error when create account. Please try again");
            }
        }
    }
}
