<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\customer\login\AddLoginRequest;
use App\Http\Requests\customer\register\AddRegisterRequest;
use App\Models\customer\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Str;
class AccountController extends Controller
{
    public function sign_up(){
        return view('customer.pages.sign_up');
    }
    public function post_sign_up(AddRegisterRequest $request){
        if ($request->has('avatar')) {
            $file = $request->avatar;
            $avatar = $file->getClientOriginalName();
            $file->move(public_path('customers/images'),$avatar);
        }else{
            $avatar = '';
        }
        if ($avatar !='') {
            $information = [
                'name'=>$request->name,
                'avatar'=>$avatar,
                'phone'=>$request->phone,
                'email'=>$request->email,
                'pass'=>$request->pass,
            ];
        }else{
            $information = [
                'name'=>$request->name,
                'phone'=>$request->phone,
                'email'=>$request->email,
                'pass'=>$request->pass,
            ];
        }
        /////// Save information and send mail ///////
        $encode_information= json_encode($information);
        $code_authenticate = random_int(0,1000000);
        $name = $request->name;
        $email = $request->email;
        Mail::send('email.customers.register.register', [
            'code' => $code_authenticate,
            'email' => $email,
            'name' => $name,
        ], function ($message) use ($email, $name) {
            $message->from('customer.tour@gmail.com', 'Tour Booking');
            $message->to($email, $name);
            $message->subject('Authenticate to become customer !!!');
        });
        if (count(Mail::failures()) > 0) {
            return redirect()->back()->with('error', 'Get error when sending mail. Please try again later');
        } else {
            session(['information_register'=>$encode_information]);
            session(['code'=>$code_authenticate]);
            return redirect()->route('continue-register');
        }
        $information = [
            'name'=>$request->name,
            'email'=>$request->email,
            'pass'=>$request->pass,
            'avatar'=>$request->name,
        ];
    }
    public function continue_register()
    {
        if (session('code') !=null) {
            return view('customer.pages.continue-register');
        }else{
            return redirect()->back();
        }
    }
    public function post_continue_register(Request $request)
    {
        $request->validate([
            'code'=>'required'
        ]);
        $code_fr_users = $request->code;
        $get_infor_from_session = session('information_register');
        $code_fr_mail = session('code');
        if ($code_fr_users == $code_fr_mail) {
            $infor_account = json_decode($get_infor_from_session,true);
            $new_password = Hash::make($infor_account['pass']);
            $check_exist_avatar = array_key_exists("avatar",$infor_account);
            if ($check_exist_avatar != false) {
                $create_new_acc = Customer::create([
                    'name'=>$infor_account['name'],
                    'avatar'=>$infor_account['avatar'],
                    'phone'=>$infor_account['phone'],
                    'email'=>$infor_account['email'],
                    'password'=>$new_password,
                    'status'=>1
                ]);
            }else{
                $create_new_acc = Customer::create([
                    'name'=>$infor_account['name'],
                    'phone'=>$infor_account['phone'],
                    'email'=>$infor_account['email'],
                    'password'=>$new_password,
                    'status'=>1
                ]);
            }
            if ($create_new_acc) {
                session(['information_register'=>'']);
                session(['code'=>'']);
                return redirect()->route('customer.login')->with('add_success',"Register successfull. Please login !!!");
            }else{
                return redirect()->back()->with('error',"Get error when creating your account. Please try again");
            }

        }else{
            return redirect()->back()->with('error',"Your code doesn't exist. Please try again later!!!");
        }
    }
    public function login(){
        if (Auth::guard('customer')->check()) {
            return redirect()->route('customer.index');
        }else{
            return view('customer.pages.login');
        }
    }

    public function recovery()
    {
        return view('customer.pages.recovery');
    }
    public function post_recovery(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ], [
            'email.email' => 'Please enter right email format'
        ]);
        $email_from_form = $request->email;
        $get_email_from_db = Customer::where('email', $email_from_form)->first();
        if ($get_email_from_db != null) {
            $code_authenticate = random_int(0, 100000);
            $email = $get_email_from_db->email;
            $name = $get_email_from_db->name;
            Mail::send('email.customers.recovery_pass.recovery', [
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
                return redirect()->route('customer.reset_password');
            }
        } else {
            return redirect()->back()->with('error', "Can't not find your account. Please try again !!");
        }
    }

    public function reset_password()
    {
        if (session('code_authenticate') != null) {
            return view('customer.pages.reset_password');
        } else {
            return redirect()->route('customer.index');
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
            $find_account = Customer::where('email', $mail_changed)->first();
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
                        Mail::send('email.customers.recovery_pass.success', [
                            'time' => $time_changed,
                            'name' => $name_admin,
                        ], function ($message) use ($mail_changed, $name_admin) {
                            $message->from('customer.tour@gmail.com', 'Admin Center');
                            $message->to($mail_changed, $name_admin);
                            $message->subject('Customer | Change password successfully !!!');
                        });

                        if (count(Mail::failures()) > 0) {
                            return redirect()->back()->with('error', 'Get error when sending mail. Please try again later');
                        } else {
                            session(['mail_changed'=>'']);
                            session(['code_authenticate'=>'']);
                            return redirect()->route('customer.login')->with('add_success','Change password successfully');
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
    public function post_login(AddLoginRequest $request)
    {

        $check_customer = Auth::guard('customer')->attempt(['email'=>$request->email,'password'=>$request->pass]);
        if (Auth::guard('customer')->check()) {
            
            if ($request->has('page')) {
                if (Str::contains($request->page, '/')) {
                    return redirect($request->page);
                }else{
                    return redirect($request->page);
                }
            }else{
                return redirect()->route('customer.index')->with('add_success','Login successfully');
            }
        }else{
            return redirect()->back()->with('error',"Wrong information");
        }
    }

    public function logout(Request $request)
    {
        Auth::guard('customer')->logout();
        if ($request->page == 'my_profile') {
            return redirect()->route('customer.index');
        }else{
            return redirect()->back()->with('delete_success','Logout successfully');
        }
    }
}
