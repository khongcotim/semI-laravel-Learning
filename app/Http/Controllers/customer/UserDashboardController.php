<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Models\admin\Blog;
use App\Models\admin\Discount;
use App\Models\customer\Comments;
use App\Models\customer\Customer;
use App\Models\customer\Favorites;
use App\Models\customer\Order_detail;
use App\Models\customer\Orders;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Str;

class UserDashboardController extends Controller
{
    public function my_profile($name)
    {
        if (!Auth::guard('customer')->check()) {
            return redirect()->back();
        } else {
            //Total Booking
            $total_booking = Order_detail::where('id_customer', Auth::guard('customer')->user()->id)->get();

            //Wish List
            $wish_list = Favorites::where('id_customer', Auth::guard('customer')->user()->id)->get();

            // Review
            $review = Comments::where('id_customer', Auth::guard('customer')->user()->id)->get();

            //Static Result
            $total_order_in_dec = Order_detail::where('id_customer', Auth::guard('customer')->user()->id)->where('created_at', '>=', '2021-12-01 00:00:00')->where('created_at', '<=', '2021-12-31 00:00:00')->count();
            $total_order_in_nov = Order_detail::where('id_customer', Auth::guard('customer')->user()->id)->where('created_at', '>=', '2021-11-01 00:00:00')->where('created_at', '<=', '2021-11-31 00:00:00')->count();
            $total_order_in_oct = Order_detail::where('id_customer', Auth::guard('customer')->user()->id)->where('created_at', '>=', '2021-10-01 00:00:00')->where('created_at', '<=', '2021-10-31 00:00:00')->count();
            $total_order_in_sep = Order_detail::where('id_customer', Auth::guard('customer')->user()->id)->where('created_at', '>=', '2021-09-01 00:00:00')->where('created_at', '<=', '2021-09-31 00:00:00')->count();
            $total_order_in_aug = Order_detail::where('id_customer', Auth::guard('customer')->user()->id)->where('created_at', '>=', '2021-08-01 00:00:00')->where('created_at', '<=', '2021-08-31 00:00:00')->count();
            $total_order_in_jul = Order_detail::where('id_customer', Auth::guard('customer')->user()->id)->where('created_at', '>=', '2021-07-01 00:00:00')->where('created_at', '<=', '2021-07-31 00:00:00')->count();
            $total_order_in_jun = Order_detail::where('id_customer', Auth::guard('customer')->user()->id)->where('created_at', '>=', '2021-06-01 00:00:00')->where('created_at', '<=', '2021-06-31 00:00:00')->count();
            $total_order_in_may = Order_detail::where('id_customer', Auth::guard('customer')->user()->id)->where('created_at', '>=', '2021-05-01 00:00:00')->where('created_at', '<=', '2021-05-31 00:00:00')->count();
            $total_order_in_april = Order_detail::where('id_customer', Auth::guard('customer')->user()->id)->where('created_at', '>=', '2021-04-01 00:00:00')->where('created_at', '<=', '2021-04-31 00:00:00')->count();
            $total_order_in_march = Order_detail::where('id_customer', Auth::guard('customer')->user()->id)->where('created_at', '>=', '2021-03-01 00:00:00')->where('created_at', '<=', '2021-03-31 00:00:00')->count();
            $total_order_in_feb = Order_detail::where('id_customer', Auth::guard('customer')->user()->id)->where('created_at', '>=', '2021-02-01 00:00:00')->where('created_at', '<=', '2021-02-31 00:00:00')->count();
            $total_order_in_jan = Order_detail::where('id_customer', Auth::guard('customer')->user()->id)->where('created_at', '>=', '2021-01-01 00:00:00')->where('created_at', '<=', '2021-01-31 00:00:00')->count();

            //Discount in notification
            $discount_found = Discount::join('tour', 'tour.id', 'discount_code.id_tour')
                ->select('discount_code.*', 'tour.id as tour_id', 'tour.name as tour_name')
                ->where('who', 'like', '%' . Auth::guard('customer')->user()->id . '%')->get();
            //Ordered
            $ordered = Order_detail::join('tour', 'tour.id', 'order_detail.id_tour')
                ->select('tour.name', 'order_detail.*')
                ->where('id_customer', Auth::guard('customer')->user()->id)->get();
            return view('customer.pages.my_profile', compact(
                'total_booking',
                'wish_list',
                'review',
                'discount_found',
                'ordered',
                'total_order_in_dec',
                'total_order_in_nov',
                'total_order_in_oct',
                'total_order_in_sep',
                'total_order_in_aug',
                'total_order_in_jul',
                'total_order_in_jun',
                'total_order_in_may',
                'total_order_in_april',
                'total_order_in_march',
                'total_order_in_feb',
                'total_order_in_jan',
            ));
        }
    }
    public function my_booking()
    {
        if (!Auth::guard('customer')->check()) {
            return redirect()->back();
        } else {
            $all_booking = Orders::where('id_customer', Auth::guard('customer')->user()->id)->paginate(4);
            return view('customer.pages.user_dashboard_booking', compact('all_booking'));
        }
    }
    public function my_booking_detail($id_order)
    {
        if (!Auth::guard('customer')->check()) {
            return redirect()->back();
        } else {
            $order_dt_found = Order_detail::join('Customer', 'Order_detail.id_customer', '=', 'Customer.id')
                ->join('Orders', 'Order_detail.id_order', '=', 'Orders.id')
                ->join('Tour', 'Order_detail.id_tour', '=', 'Tour.id')
                ->join('Payments', 'Order_detail.id_payment', '=', 'Payments.id')
                ->select('Tour.tour_code as tour_code', 'Customer.address as customer_address', 'Orders.count_adults as adults', 'Orders.count_children as children', 'Customer.phone', 'Orders.time as deadtime', 'Orders.id as order_id', 'Orders.status as status', 'Customer.name as customer_name', 'Customer.email as email', 'Tour.name as tour', 'Payments.method as payment', 'Order_detail.*', 'Order_detail.created_at as created')
                ->where('id_order',$id_order)
                ->first();
                if ($order_dt_found != null) {
                    $time = Carbon::create($order_dt_found->created)->addDay($order_dt_found->deadtime);
                }else{
                    $time = '';
                }
            return view('customer.pages.detail', compact('order_dt_found', 'time'));
        }
    }
    public function my_profile_information()
    {
        if (!Auth::guard('customer')->check()) {
            return redirect()->back();
        } else {
            return view('customer.pages.my_account');
        }
    }
    public function my_reviews()
    {
        if (!Auth::guard('customer')->check()) {
            return redirect()->back();
        } else {
            $reviews = Comments::join('tour', 'comments.id_tour', '=', 'tour.id')
                ->join('ratings', 'ratings.id_tour', '=', 'tour.id')
                ->select('tour.name as tour_name', 'tour.slug as tour_slug', 'ratings.rating_star as star', 'comments.*')
                ->where('comments.id_customer', '=', Auth::guard('customer')->user()->id)
                ->orderBy('comments.created_at', 'desc')->distinct()->paginate(4);
            return view('customer.pages.user_dashboard_reviews', compact('reviews'));
        }
    }
    public function settings()
    {
        if (!Auth::guard('customer')->check()) {
            return redirect()->back();
        } else {
            $reviews = Comments::join('tour', 'comments.id_tour', '=', 'tour.id')
                ->join('ratings', 'ratings.id_tour', '=', 'tour.id')
                ->select('tour.name as tour_name', 'ratings.rating_star as star', 'comments.*')
                ->where('comments.id_customer', '=', Auth::guard('customer')->user()->id)
                ->orderBy('comments.created_at', 'desc')->distinct()->paginate(4);
            return view('customer.pages.user_dashboard_settings', compact('reviews'));
        }
    }
    public function update_settings(Request $request)
    {
        if (!Auth::guard('customer')->check()) {
            return redirect()->back();
        } else {
            $type = $request->type;
            if ($type == 'change_infor') {
                $find_acc = Customer::find(Auth::guard('customer')->user()->id);
                $request->validate([
                    'name' => 'required',
                    'email' => 'required|email',
                    'phone' => 'required|numeric|digits:10',
                    'address' => 'required',
                ]);
                if ($request->has('avatar')) {
                    $file = $request->avatar;
                    $file_name = time() . $file->getClientoriginalName();
                    $file->move(public_path('customers/images'), $file_name);
                } else {
                    $file_name = Auth::guard('customer')->user()->avatar;
                }
                $update_acc = $find_acc->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'avatar' => $file_name,
                    'phone' => $request->phone,
                    'address' => $request->address,
                ]);
                if ($update_acc) {
                    return redirect()->back()->with('add_success', 'Change your account successfull');
                } else {
                    return redirect()->back()->with('warning', "Error. Can't update your information");
                }
            }
            if ($type == 'change_pass') {
                $find_acc = Customer::find(Auth::guard('customer')->user()->id);
                $request->validate([
                    'old_password' => 'required',
                    'pass' => ['required', Password::min(8)->mixedCase()],
                    'cf_password' => ['required', 'same:pass', Password::min(8)->mixedCase()],
                ]);
                $check_pass = Hash::check($request->old_password, Auth::guard('customer')->user()->password);
                if ($check_pass) {
                    $update_acc = $find_acc->update([
                        'password' => Hash::make($request->pass),
                    ]);
                    if ($update_acc) {
                        Auth::guard('customer')->logout();
                        return redirect()->route('customer.login')->with('add_success', 'Update password successfull. Please login again');
                    } else {
                        return redirect()->back()->with('warning', "Error. Can't update your password");
                    }
                } else {
                    return redirect()->back()->with('error', 'Wrong password. Please try again');
                }
            }
            if ($type == 'forgot_pass') {
                $request->validate([
                    'emails' => 'required|email'
                ], [
                    'emails.email' => 'Please enter right email format'
                ]);
                $email_from_form = $request->emails;
                $get_email_from_db = Customer::where('email', $email_from_form)->first();
                if ($get_email_from_db != null) {
                    $code_authenticate = random_int(0, 100000);
                    $email = $get_email_from_db->email;
                    $name = $get_email_from_db->name;
                    Mail::send('email.customers.recovery_pass_my_account.recovery', [
                        'code' => $code_authenticate,
                        'email' => $email,
                        'name' => $name,
                    ], function ($message) use ($email, $name) {
                        $message->from('customer.tour@gmail.com', 'Tour Booking Center');
                        $message->to($email, $name);
                        $message->subject('Recovery password from customer');
                    });
                    if (count(Mail::failures()) > 0) {
                        return redirect()->back()->with('error', 'Get error when sending mail. Please try again later');
                    } else {
                        session(['code_authenticate' => $code_authenticate]);
                        session(['mail_changed' => $get_email_from_db->email]);
                        return redirect()->back()->with('add_success', 'We sent you a email to reset password. Please check your code to reset your password');
                    }
                } else {
                    return redirect()->back()->with('error', "Can't not find your account. Please try again !!");
                }
            }
            if ($request->has('recovery')) {
                $session_code = session('code_authenticate');
                $session_email = session('mail_changed');
                $find_acc = Customer::where('email', $session_email)->first();
                if ($request->code == $session_code) {
                    $new_pass = "Ab" . Str::random(8) . random_int(0, 10);
                    $update_password = $find_acc->update([
                        'password' => Hash::make($new_pass)
                    ]);
                    if ($update_password) {
                        $name_admin = $find_acc->name;
                        $time_changed = $find_acc->updated_at;
                        Mail::send('email.customers.recovery_pass_my_account.success', [
                            'time' => $time_changed,
                            'new_pass'=>$new_pass,
                            'name' => $name_admin,
                        ], function ($message) use ($session_email, $name_admin) {
                            $message->from('customer.tour@gmail.com', 'Admin Center');
                            $message->to($session_email, $name_admin);
                            $message->subject('Customers | Change password successfully !!!');
                        });

                        if (count(Mail::failures()) > 0) {
                            return redirect()->back()->with('error', 'Get error when sending mail. Please try again later');
                        } else {
                            session(['mail_changed' => '']);
                            session(['code_authenticate' => '']);
                            Auth::guard('customer')->logout();
                            return redirect()->route('customer.login')->with('add_success', 'Your password has changed. We sent it to your email. Please login and change new password !!!');
                        }
                    } else {
                        return redirect()->back()->with('error', 'Get error when processing. Please try again');
                    }
                } else {
                    return redirect()->back()->with('error', "Wrong code authenticate. Please try again !!");
                }
            }
            return view('customer.pages.user_dashboard_settings');
        }
    }

    public function remove_avatar()
    {
        if (!Auth::guard('customer')->check()) {
            return redirect()->back();
        } else {
            $find_acc = Customer::find(Auth::guard('customer')->user()->id);
            $remove_avt = $find_acc->update([
                'avatar' => 'team9.jpg'
            ]);
            if ($remove_avt) {
                return redirect()->back()->with('add_success', 'Remove your avatar successfull');
            } else {
                return redirect()->back()->with('warning', "Error. Can't remive your avatar");
            }
            return view('customer.pages.user_dashboard_settings');
        }
    }
    public function my_blog()
    {
        if (!Auth::guard('customer')->check()) {
            return redirect()->back();
        } else {
            $find_my_blog = Blog::where('who_accept', '!=', 'null')
                                ->where('customer_id',Auth::guard('customer')->user()->id)
                                ->paginate(6);
            return view('customer.pages.my_blog',compact('find_my_blog'));
        }
    }
    public function user_profile($id)
    {
        if (Auth::guard('customer')->user()->id == $id) {
            return redirect()->route('my_profile',Auth::guard('customer')->user()->name);
        } else {
            $find_user = Customer::find($id);
            return view('customer.pages.user-profile',compact('find_user'));
        }
    }
    public function update_order(Request $request,$id){
        $edit = Orders::find($id);
        $edit->update([
            'status'=>$request->status
        ]);
            return redirect()->back();
    }
}
