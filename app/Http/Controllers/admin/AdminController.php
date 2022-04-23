<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Slides;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
//Request
use App\Http\Requests\admin\login\LoginAdminstratorRequest;
use App\Models\admin\Admin;
use App\Models\admin\Payments;
use App\Models\admin\Service;
use App\Models\admin\Tour;
use App\Models\admin\TourGuide;
use App\Models\customer\Comments;
use App\Models\customer\Customer;
use App\Models\customer\Order_detail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules\Password;

class AdminController extends Controller
{

    public function index(Request $request)
    {
        //Service earn this month
        $all_service = Service::all();
        $service_earned = [];
        $count_service_used =[];
        $money_earn_this_month_for_service = 0;
        foreach ($all_service as $key => $value) {
            $count_price = Order_detail::where('id_service','like',"%$value->id%")->count();
            $count_service_used[$value->id] = $count_price;
            $service_earned_by_id =number_format($count_price*$value->price);
            $money_earn_this_month_for_service += $count_price*$value->price;
            $service_earned[$value->id] = $service_earned_by_id;
        }
        //Customer Account
        $customer_account = Customer::all();

        //Tour Guild
        $tour_guild = TourGuide::all();
        //Total Booking
        $total_booking = Order_detail::all();

        //New reviews
        $new_reviews = Comments::where('created_at','>=',Carbon::yesterday('Asia/Ho_Chi_Minh'))->where('created_at','<=',Carbon::now('Asia/Ho_Chi_Minh'))->get();

        //Chart Income
        // filter by all
        $total_price_in_dec = (Payments::where('created_at','>=','2021-12-01 00:00:00')->where('created_at','<=','2021-12-31 00:00:00')->sum('amount'));
        $total_price_in_nov = (Payments::where('created_at','>=','2021-11-01 00:00:00')->where('created_at','<=','2021-11-31 00:00:00')->sum('amount'));
        $total_price_in_oct = (Payments::where('created_at','>=','2021-10-01 00:00:00')->where('created_at','<=','2021-10-31 00:00:00')->sum('amount'));
        $total_price_in_sep = (Payments::where('created_at','>=','2021-09-01 00:00:00')->where('created_at','<=','2021-09-31 00:00:00')->sum('amount'));
        $total_price_in_aug = (Payments::where('created_at','>=','2021-08-01 00:00:00')->where('created_at','<=','2021-08-31 00:00:00')->sum('amount'));
        $total_price_in_jul = (Payments::where('created_at','>=','2021-07-01 00:00:00')->where('created_at','<=','2021-07-31 00:00:00')->sum('amount'));
        $total_price_in_jun = (Payments::where('created_at','>=','2021-06-01 00:00:00')->where('created_at','<=','2021-06-31 00:00:00')->sum('amount'));
        $total_price_in_may = (Payments::where('created_at','>=','2021-05-01 00:00:00')->where('created_at','<=','2021-05-31 00:00:00')->sum('amount'));
        $total_price_in_april = (Payments::where('created_at','>=','2021-04-01 00:00:00')->where('created_at','<=','2021-04-31 00:00:00')->sum('amount'));
        $total_price_in_march = (Payments::where('created_at','>=','2021-03-01 00:00:00')->where('created_at','<=','2021-03-31 00:00:00')->sum('amount'));
        $total_price_in_feb = (Payments::where('created_at','>=','2021-02-01 00:00:00')->where('created_at','<=','2021-02-31 00:00:00')->sum('amount'));
        $total_price_in_jan = (Payments::where('created_at','>=','2021-01-01 00:00:00')->where('created_at','<=','2021-01-31 00:00:00')->sum('amount'));

        //Filter by month selected
        if ($request->month_income_selected != '') {
            $month_selected = $request->month_income_selected;

            if ($month_selected != 'All') {
                //Get first day
                $first_day = new \DateTime('first day of '.$month_selected.' '.Carbon::now('y').''); // <== instance from another API
                $carbon = Carbon::instance($first_day);
                $first_day_of_month =$carbon->toDateTimeString();

                //Get last day
                $last_day = new \DateTime('last day of '.$month_selected.' '.Carbon::now('y').''); // <== instance from another API
                $last_days = Carbon::instance($last_day);
                $last_day_of_month =$last_days->toDateTimeString();

                //Query income by month
                $week_one =Carbon::parse($first_day)->addWeeks(1)->toDateTimeString();
                $week_two =Carbon::parse($week_one)->addWeeks(1)->toDateTimeString();
                $week_three =Carbon::parse($week_two)->addWeeks(1)->toDateTimeString();
                $week_four =Carbon::parse($week_three)->addWeeks(1)->toDateTimeString();

                $result = [];
                $income_in_week_one = (Payments::where('created_at','>=',$first_day)->where('created_at','<=',$week_one)->sum('amount'));
                array_push($result,$income_in_week_one);
                $income_in_week_two = (Payments::where('created_at','>=',$week_one)->where('created_at','<=',$week_two)->sum('amount'));
                array_push($result,$income_in_week_two);
                $income_in_week_three = (Payments::where('created_at','>=',$week_two)->where('created_at','<=',$week_three)->sum('amount'));
                array_push($result,$income_in_week_three);
                $income_in_week_four = (Payments::where('created_at','>=',$week_three)->where('created_at','<=',$week_four)->sum('amount'));
                array_push($result,$income_in_week_four);
                return $result;
            }else{
                return 'all';
            }
        }

        //Tour earn this month
        $current_month =Carbon::now()->format('m');
        $money_earn_this_month_for_tour = (Payments::where('created_at','>=',"2021-$current_month-01 00:00:00")->where('created_at','<=',"2021-$current_month-31 00:00:00")->sum('amount'));


        //Total Orders
        $total_order_in_dec = Order_detail::where('created_at','>=','2021-12-01 00:00:00')->where('created_at','<=','2021-12-31 00:00:00')->count();
        $total_order_in_nov = Order_detail::where('created_at','>=','2021-11-01 00:00:00')->where('created_at','<=','2021-11-31 00:00:00')->count();
        $total_order_in_oct = Order_detail::where('created_at','>=','2021-10-01 00:00:00')->where('created_at','<=','2021-10-31 00:00:00')->count();
        $total_order_in_sep = Order_detail::where('created_at','>=','2021-09-01 00:00:00')->where('created_at','<=','2021-09-31 00:00:00')->count();
        $total_order_in_aug = Order_detail::where('created_at','>=','2021-08-01 00:00:00')->where('created_at','<=','2021-08-31 00:00:00')->count();
        $total_order_in_jul = Order_detail::where('created_at','>=','2021-07-01 00:00:00')->where('created_at','<=','2021-07-31 00:00:00')->count();
        $total_order_in_jun = Order_detail::where('created_at','>=','2021-06-01 00:00:00')->where('created_at','<=','2021-06-31 00:00:00')->count();
        $total_order_in_may = Order_detail::where('created_at','>=','2021-05-01 00:00:00')->where('created_at','<=','2021-05-31 00:00:00')->count();
        $total_order_in_april = Order_detail::where('created_at','>=','2021-04-01 00:00:00')->where('created_at','<=','2021-04-31 00:00:00')->count();
        $total_order_in_march = Order_detail::where('created_at','>=','2021-03-01 00:00:00')->where('created_at','<=','2021-03-31 00:00:00')->count();
        $total_order_in_feb = Order_detail::where('created_at','>=','2021-02-01 00:00:00')->where('created_at','<=','2021-02-31 00:00:00')->count();
        $total_order_in_jan = Order_detail::where('created_at','>=','2021-01-01 00:00:00')->where('created_at','<=','2021-01-31 00:00:00')->count();

        //Total Tour Guild
        $total_tour_guild_in_dec = TourGuide::where('created_at','>=','2021-12-01 00:00:00')->where('created_at','<=','2021-12-31 00:00:00')->count();
        $total_tour_guild_in_nov = TourGuide::where('created_at','>=','2021-11-01 00:00:00')->where('created_at','<=','2021-11-31 00:00:00')->count();
        $total_tour_guild_in_oct = TourGuide::where('created_at','>=','2021-10-01 00:00:00')->where('created_at','<=','2021-10-31 00:00:00')->count();
        $total_tour_guild_in_sep = TourGuide::where('created_at','>=','2021-09-01 00:00:00')->where('created_at','<=','2021-09-31 00:00:00')->count();
        $total_tour_guild_in_aug = TourGuide::where('created_at','>=','2021-08-01 00:00:00')->where('created_at','<=','2021-08-31 00:00:00')->count();
        $total_tour_guild_in_jul = TourGuide::where('created_at','>=','2021-07-01 00:00:00')->where('created_at','<=','2021-07-31 00:00:00')->count();
        $total_tour_guild_in_jun = TourGuide::where('created_at','>=','2021-06-01 00:00:00')->where('created_at','<=','2021-06-31 00:00:00')->count();
        $total_tour_guild_in_may = TourGuide::where('created_at','>=','2021-05-01 00:00:00')->where('created_at','<=','2021-05-31 00:00:00')->count();
        $total_tour_guild_in_april = TourGuide::where('created_at','>=','2021-04-01 00:00:00')->where('created_at','<=','2021-04-31 00:00:00')->count();
        $total_tour_guild_in_march = TourGuide::where('created_at','>=','2021-03-01 00:00:00')->where('created_at','<=','2021-03-31 00:00:00')->count();
        $total_tour_guild_in_feb = TourGuide::where('created_at','>=','2021-02-01 00:00:00')->where('created_at','<=','2021-02-31 00:00:00')->count();
        $total_tour_guild_in_jan = TourGuide::where('created_at','>=','2021-01-01 00:00:00')->where('created_at','<=','2021-01-31 00:00:00')->count();

        return view('admin.pages.main',
                compact(
                    'total_price_in_dec','total_price_in_nov','total_price_in_oct','total_price_in_sep','total_price_in_aug','total_price_in_jul','total_price_in_jun','total_price_in_may','total_price_in_april','total_price_in_march','total_price_in_feb','total_price_in_jan',
                    'customer_account','tour_guild','total_booking','new_reviews','money_earn_this_month_for_tour','money_earn_this_month_for_service','all_service','service_earned','count_service_used',
                     'total_order_in_dec','total_order_in_nov','total_order_in_oct','total_order_in_sep','total_order_in_aug','total_order_in_jul','total_order_in_jun','total_order_in_may','total_order_in_april','total_order_in_march','total_order_in_feb','total_order_in_jan',
                     'total_tour_guild_in_dec','total_tour_guild_in_nov','total_tour_guild_in_oct','total_tour_guild_in_sep','total_tour_guild_in_aug','total_tour_guild_in_jul','total_tour_guild_in_jun','total_tour_guild_in_may','total_tour_guild_in_april','total_tour_guild_in_march','total_tour_guild_in_feb','total_tour_guild_in_jan',
                ));
    }
    public function reviews()
    {
        $comment=Comments::leftjoin('Customer','Comments.id_customer','=','Customer.id')
                            ->leftjoin('Tour','Comments.id_tour','=','Tour.id')
                            ->leftjoin('Ratings','Ratings.id_customer','=','Customer.id')
                            ->select('Customer.name as customer_name','Customer.avatar as avatar','Tour.name as tour_name','Ratings.rating_star as star','Comments.*')
                            ->where('comments.created_at','>=',Carbon::yesterday('Asia/Ho_Chi_Minh'))->where('comments.created_at','<=',Carbon::now('Asia/Ho_Chi_Minh'))
                            ->orderBy('created_at','desc')
                            ->paginate(4);
        return view('admin.pages.reviews.admin-dashboard-reviews',compact('comment'));
    }
    public function update_slide_status(Request $request)
    {
        $id_slide = $request->id_slide;
        $status = $request->status;
        $slide_found = Slides::find($id_slide);
        $slide_found->update([
            'status' => $status
        ]);
        return redirect()->back()->with('edit_success', "Update Status Successfully");
    }
    //Tour
    public function destroyByCheck(Request $request)
    {

        if ($request->has('tourChecked')) {
            $arr = $request->tourChecked;
            for ($i = 0; $i < count($arr); $i++) {

                if (Auth::user()->role == 'admin' || Auth::user()->role == 'manager') {
                    $delete = Tour::find($arr[$i]);
                    $delete->update([
                        "status" => 2
                    ]);
                }
            }
            return redirect()->route('tour.index')->with('delete_success', 'Delete Successfully');
        } else {
            return redirect()->route('tour.index')->with('error', 'Can not delete this tour');
        }
    }
    public function restoreByCheck(Request $request)
    {
        if ($request->has('tourChecked')) {

            $arr = $request->tourChecked;
            for ($i = 0; $i < count($arr); $i++) {

                if (Auth::user()->role == 'admin' || Auth::user()->role == 'manager') {
                    $delete = Tour::find($arr[$i]);
                    $delete->update([
                        "status" => 0
                    ]);
                }
            }
            return redirect()->route('trash.index')->with('add_success', 'Restore successfully');
        } else {
            return redirect()->route('trash.index')->with('error', 'Sorry, Get error while delete');
        }
    }
    public function update_tour_status(Request $request, $id)
    {
        $tour_found = Tour::find($id);
        $tour_found->update([
            'status' => $request->status
        ]);
        return redirect()->back()->with('edit_success', 'Update Tour Status successfull');
    }

    //Authenticate
    public function login()
    {
        if (Auth::check()) {
            return redirect()->route('admin.home');
        }else{
            return view('admin.pages.login.login');
        }
    }
    public function submit_login(LoginAdminstratorRequest $request)
    {
        $request->validate([
            'email' => 'email'
        ], [
            'email.email' => 'Please enter right email format'
        ]);
        if (Auth::attempt($request->only('email', 'password'))) {
            if (Auth::user()->role == 'quit') {
                return redirect()->route('adminLogin')->with('error', 'Your account was out of access rights');
            } else {
                return redirect()->route('admin.home')->with('add_success', 'Login successfully');
            }
        } else {
            return redirect()->route('adminLogin')->with('error', 'Wrong Email or Password');
        };
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('adminLogin');
    }

    public function recovery()
    {
        return view('admin.pages.recovery.recovery');
    }
    public function post_recovery(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ], [
            'email.email' => 'Please enter right email format'
        ]);
        $email_from_form = $request->email;
        $get_email_from_db = Admin::where('email', $email_from_form)->first();
        if ($get_email_from_db != null) {
            $code_authenticate = random_int(0, 100000);
            $email = $get_email_from_db->email;
            $name = $get_email_from_db->name;
            Mail::send('email.admin.recovery_pass.recovery', [
                'code' => $code_authenticate,
                'email' => $email,
                'name' => $name,
            ], function ($message) use ($email, $name) {
                $message->from('adminstrator.tour@gmail.com', 'Admin Center');
                $message->to($email, $name);
                $message->subject('Recovery password from admin');
            });
            if (count(Mail::failures()) > 0) {
                return redirect()->back()->with('error', 'Get error when sending mail. Please try again later');
            } else {
                session(['code_authenticate' => $code_authenticate]);
                session(['mail_changed' => $get_email_from_db->email]);
                return redirect()->route('admin.reset_password');
            }
        } else {
            return redirect()->back()->with('error', "Can't not find your account. Please try again !!");
        }
    }

    public function reset_password()
    {
        if (session('code_authenticate') != null) {
            return view('admin.pages.recovery.reset_password');
        } else {
            return redirect()->route('admin.home');
        }
    }
    public function post_reset_password(Request $request)
    {
        $code_authenticate_fr_mail = session('code_authenticate');
        $request->validate([
            'code' => 'required',
            'pass' => ['required', Password::min(8)->mixedCase()],
            'cf_password' => ['required', 'same:pass', Password::min(8)->mixedCase()],
        ], [
            //required
            'code.requied' => 'Please fill your code',
            'pass.requied' => 'Please fill your password',
            'cf_password.requied' => 'Please confirm your password',
            //addition
            'cf_password.same' => 'Please confirm same password as password',
        ]);
        if ($request->code == $code_authenticate_fr_mail) {
            $mail_changed = session('mail_changed');
            $find_account = Admin::where('email', $mail_changed)->first();
            $check_pass = Hash::check($request->pass, $find_account->password);
            if ($check_pass == true) {
                return redirect()->back()->with('same','You were type old password. If you want change it. Please choose other password');
            }else{
                $new_password = Hash::make($request->pass);
                if ($find_account == null) {
                    return redirect()->back()->with('error', "Can't find your account because your mail doesn't exist. Please try again");
                } else {
                    $update_password = $find_account->update([
                        'password' => $new_password
                    ]);
                    if ($update_password) {
                        $name_admin = $find_account->name;
                        $time_changed = $find_account->updated_at;
                        Mail::send('email.admin.recovery_pass.success', [
                            'time' => $time_changed,
                            'name' => $name_admin,
                        ], function ($message) use ($mail_changed, $name_admin) {
                            $message->from('adminstrator.tour@gmail.com', 'Admin Center');
                            $message->to($mail_changed, $name_admin);
                            $message->subject('Adminstrator | Change password successfully !!!');
                        });

                        if (count(Mail::failures()) > 0) {
                            return redirect()->back()->with('error', 'Get error when sending mail. Please try again later');
                        } else {
                            session(['mail_changed'=>'']);
                            session(['code_authenticate'=>'']);
                            return redirect()->route('adminLogin')->with('add_success','Change password successfully');
                        }
                    } else {
                        return redirect()->back()->with('error', 'Get error when processing. Please try again');
                    }
                }
            }
        } else {
            return redirect()->back()->with('error', "Wrong code. Please try again");
        }
    }
}
