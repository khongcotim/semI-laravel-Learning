@extends('customer.master.master_three')
@section('main_dasboard')
@section('title','Settings')
@section('settings','active')
<section class="dashboard-area">
    <div class="dashboard-nav">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="menu-wrapper">
                        <div class="logo mr-5">
                            <a href="{{route('customer.index')}}"><img src="{{ url('customers') }}/images/logo2.png"
                                    alt="logo"></a>
                            <div class="menu-toggler">
                                <i class="la la-bars"></i>
                                <i class="la la-times"></i>
                            </div><!-- end menu-toggler -->
                            <div class="user-menu-open">
                                <i class="la la-user"></i>
                            </div><!-- end user-menu-open -->
                        </div>
                        <div class="nav-btn ml-auto">
                            <div class="notification-wrap d-flex align-items-center">
                                <div class="notification-item mr-2">
                                    <div class="dropdown">
                                        <a href="#" class="dropdown-toggle drop-reveal-toggle-icon"
                                            id="notificationDropdownMenu" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            <i class="la la-bell"></i>
                                            <span class="noti-count">4</span>
                                        </a>
                                        <div
                                            class="dropdown-menu dropdown-reveal dropdown-menu-xl dropdown-menu-right">
                                            <div class="dropdown-header drop-reveal-header">
                                                <h6 class="title">You have <strong
                                                        class="text-black">4</strong> notifications</h6>
                                            </div>
                                            <div class="list-group drop-reveal-list">
                                                <a href="#" class="list-group-item list-group-item-action">
                                                    <div class="msg-body d-flex align-items-center">
                                                        <div class="icon-element bg-2 flex-shrink-0 mr-3 ml-0"><i
                                                                class="la la-check"></i></div>
                                                        <div class="msg-content w-100">
                                                            <h3 class="title pb-1">Your account has been
                                                                created</h3>
                                                            <p class="msg-text">{{\Carbon\Carbon::parse(Auth::guard('customer')->user()->created_at)->diffForHumans()}}</p>
                                                        </div>
                                                    </div><!-- end msg-body -->
                                                </a>
                                                <a href="#" class="list-group-item list-group-item-action">
                                                    <div class="msg-body d-flex align-items-center">
                                                        <div class="icon-element bg-3 flex-shrink-0 mr-3 ml-0"><i
                                                                class="la la-user"></i></div>
                                                        <div class="msg-content w-100">
                                                            <h3 class="title pb-1">Your account updated</h3>
                                                            <p class="msg-text">{{\Carbon\Carbon::parse(Auth::guard('customer')->user()->updated_at)->diffForHumans()}}</p>
                                                        </div>
                                                    </div><!-- end msg-body -->
                                                </a>
                                                <a href="#" class="list-group-item list-group-item-action">
                                                    <div class="msg-body d-flex align-items-center">
                                                        <div class="icon-element bg-4 flex-shrink-0 mr-3 ml-0"><i
                                                                class="la la-lock"></i></div>
                                                        <div class="msg-content w-100">
                                                            <h3 class="title pb-1">Your password changed</h3>
                                                            <p class="msg-text">{{\Carbon\Carbon::parse(Auth::guard('customer')->user()->updated_at)->diffForHumans()}}</p>
                                                        </div>
                                                    </div><!-- end msg-body -->
                                                </a>
                                            </div>
                                            <a href="#" id="view_all" class="dropdown-item drop-reveal-btn text-center">View
                                                all</a>
                                        </div><!-- end dropdown-menu -->
                                    </div>
                                </div><!-- end notification-item -->
                                <div class="notification-item">
                                    <div class="dropdown">
                                        <a href="#" class="dropdown-toggle" id="userDropdownMenu"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <div class="d-flex align-items-center">
                                                <div class="avatar avatar-sm flex-shrink-0 mr-2"><img
                                                        src="{{ url('customers/images') }}/{{ Auth::guard('customer')->user()->avatar }}"
                                                        alt="team-img"></div>
                                                <span
                                                    class="font-size-14 font-weight-bold">{{ Auth::guard('customer')->user()->name }}</span>
                                            </div>
                                        </a>
                                        <div
                                            class="dropdown-menu dropdown-reveal dropdown-menu-md dropdown-menu-right">
                                            <div class="dropdown-item drop-reveal-header user-reveal-header">
                                                <h6 class="title text-uppercase">Welcome!</h6>
                                            </div>
                                            <div class="list-group drop-reveal-list user-drop-reveal-list">
                                                <a href="{{route('my_profile_information')}}"
                                                    class="list-group-item list-group-item-action">
                                                    <div class="msg-body">
                                                        <div class="msg-content">
                                                            <h3 class="title"><i
                                                                    class="la la-user mr-2"></i>My Profile</h3>
                                                        </div>
                                                    </div><!-- end msg-body -->
                                                </a>
                                                <a href="{{route('my-booking')}}"
                                                    class="list-group-item list-group-item-action">
                                                    <div class="msg-body">
                                                        <div class="msg-content">
                                                            <h3 class="title"><i
                                                                    class="la la-shopping-cart mr-2"></i>My Booking
                                                            </h3>
                                                        </div>
                                                    </div><!-- end msg-body -->
                                                </a>
                                                <a href="{{route('my_reviews')}}"
                                                    class="list-group-item list-group-item-action">
                                                    <div class="msg-body">
                                                        <div class="msg-content">
                                                            <h3 class="title"><i
                                                                    class="la la-star mr-2"></i>My Reviews</h3>
                                                        </div>
                                                    </div><!-- end msg-body -->
                                                </a>
                                                <a href="{{route('settings')}}"
                                                    class="list-group-item list-group-item-action">
                                                    <div class="msg-body">
                                                        <div class="msg-content">
                                                            <h3 class="title"><i
                                                                    class="la la-gear mr-2"></i>Settings</h3>
                                                        </div>
                                                    </div><!-- end msg-body -->
                                                </a>
                                                <div class="section-block"></div>
                                                <a href="{{route('customer.logout',['page'=>'my_profile'])}}"
                                                    class="list-group-item list-group-item-action">
                                                    <div class="msg-body">
                                                        <div class="msg-content">
                                                            <h3 class="title"><i
                                                                    class="la la-power-off mr-2"></i>Logout</h3>
                                                        </div>
                                                    </div><!-- end msg-body -->
                                                </a>
                                            </div>
                                        </div><!-- end dropdown-menu -->
                                    </div>
                                </div><!-- end notification-item -->
                            </div>
                        </div><!-- end nav-btn -->
                    </div><!-- end menu-wrapper -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
        </div><!-- end container-fluid -->
    </div><!-- end dashboard-nav -->
    <div class="dashboard-content-wrap">
        <div class="dashboard-bread dashboard--bread">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="breadcrumb-content">
                            <div class="section-heading">
                                <h2 class="sec__title font-size-30 text-white">Settings</h2>
                            </div>
                        </div><!-- end breadcrumb-content -->
                    </div><!-- end col-lg-6 -->
                    <div class="col-lg-6">
                        <div class="breadcrumb-list text-right">
                            <ul class="list-items">
                                <li><a href="{{route('my_profile',Auth::guard('customer')->user()->name)}}" class="text-white">Home</a></li>
                                <li>Settings</li>
                            </ul>
                        </div><!-- end breadcrumb-list -->
                    </div><!-- end col-lg-6 -->
                </div><!-- end row -->
            </div>
        </div><!-- end dashboard-bread -->
        <div class="dashboard-main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6">
                        <form method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-box">
                                <div class="form-title-wrap">
                                    <h3 class="title">Personal Information</h3>
                                </div>
                                <div class="form-content">
                                    <div class="user-profile-action d-flex align-items-center pb-4">
                                        <div class="user-pro-img">
                                            <img src="{{url('customers')}}/images/{{Auth::guard('customer')->user()->avatar}}" alt="user-image" width="136px" height="136px">
                                        </div>
                                        <div class="upload-btn-box">
                                            <p class="pb-2 font-size-15 line-height-24">Max file size is 5MB, Minimum dimension: 150x150 And Suitable files are .jpg &amp; .png</p>
                                            <div class="file-upload-wrap file-upload-wrap-2">
                                                <input type="file" name="avatar" class="multi file-upload-input with-preview" maxlength="1">
                                                <span class="file-upload-text"><i class="la la-upload mr-2"></i>Upload Image</span>
                                                @if (Auth::guard('customer')->user()->avatar == 'team9.jpg')
                                                @else
                                                    <a href="{{route('remove_avatar')}}" onclick="return confirm('By click ok, we will romove your avatar and use default avatar...')" class="theme-btn theme-btn-small">Remove Image</a>
                                                @endif
                                            </div>
                                        </div>
                                        @if ($errors->has('avatar'))
                                            <small style="color: red">{{$errors->first('avatar')}}</small>
                                        @endif
                                    </div>
                                    <div class="contact-form-action">
                                            <input type="hidden" name="type" value="change_infor">
                                            <div class="row">
                                                <div class="col-lg-6 responsive-column">
                                                    <div class="input-box">
                                                        <label class="label-text">Name</label>
                                                        <div class="form-group">
                                                            <span class="la la-user form-icon"></span>
                                                            <input class="form-control" name="name" type="text" value="{{Auth::guard('customer')->user()->name}}">
                                                        </div>
                                                    </div>
                                                    @if ($errors->has('name'))
                                                        <small style="color: red">{{$errors->first('name')}}</small>
                                                    @endif
                                                </div><!-- end col-lg-6 -->
                                                <div class="col-lg-6 responsive-column">
                                                    <div class="input-box">
                                                        <label class="label-text">Email Address</label>
                                                        <div class="form-group">
                                                            <span class="la la-envelope form-icon"></span>
                                                            <input class="form-control" name="email" type="email" value="{{Auth::guard('customer')->user()->email}}">
                                                        </div>
                                                    </div>
                                                    @if ($errors->has('email'))
                                                        <small style="color: red">{{$errors->first('email')}}</small>
                                                    @endif
                                                </div><!-- end col-lg-6 -->
                                                <div class="col-lg-6 responsive-column">
                                                    <div class="input-box">
                                                        <label class="label-text">Phone number</label>
                                                        <div class="form-group">
                                                            <span class="la la-phone form-icon"></span>
                                                            <input class="form-control" name="phone" type="text" value="{{Auth::guard('customer')->user()->phone}}">
                                                        </div>
                                                    </div>
                                                    @if ($errors->has('email'))
                                                        <small style="color: red">{{$errors->first('email')}}</small>
                                                    @endif
                                                </div><!-- end col-lg-6 -->
                                                <div class="col-lg-6 responsive-column">
                                                    <div class="input-box">
                                                        <label class="label-text">Address</label>
                                                        <div class="form-group">
                                                            <span class="la la-map form-icon"></span>
                                                            <input class="form-control" type="text" name="address" value="{{Auth::guard('customer')->user()->address}}">
                                                        </div>
                                                    </div>
                                                    @if ($errors->has('address'))
                                                        <small style="color: red">{{$errors->first('address')}}</small>
                                                    @endif
                                                </div><!-- end col-lg-6 -->
                                                <div class="col-lg-12">
                                                    <div class="btn-box">
                                                        <button class="theme-btn" type="submit">Save Changes</button>
                                                    </div>
                                                </div><!-- end col-lg-12 -->
                                            </div><!-- end row -->
                                    </div>
                                </div>
                            </div><!-- end form-box -->
                        </form>
                    </div><!-- end col-lg-6 -->
                    <div class="col-lg-6">
                        <div class="form-box">
                            <div class="form-title-wrap">
                                <h3 class="title">Change Password</h3>
                            </div>
                            <div class="form-content">
                                <div class="contact-form-action">
                                    <form method="POST">
                                        @csrf
                                        <input type="hidden" name="type" value="change_pass">
                                        <div class="row">
                                            <div class="col-lg-6 responsive-column">
                                                <div class="input-box">
                                                    <label class="label-text">Current Password</label>
                                                    <div class="form-group">
                                                        <span class="la la-lock form-icon"></span>
                                                        <input class="form-control" value="{{ old('old_password') }}" name="old_password" type="text" placeholder="Current password">
                                                    </div>
                                                </div>
                                                @if ($errors->has('old_password'))
                                                    <small
                                                        style="color: red">{{ $errors->first('old_password') }}</small>
                                                @endif
                                            </div><!-- end col-lg-6 -->
                                            <div class="col-lg-6 responsive-column">
                                                <div class="input-box">
                                                    <label class="label-text">New Password</label>
                                                    <div class="form-group" id="show_hide_password">
                                                        <span class="la la-lock form-icon"></span>
                                                        <input class="form-control" value="{{ old('pass') }}" name="pass" type="text" id="password" placeholder="New password">
                                                    </div>
                                                </div>
                                                @if ($errors->has('pass'))
                                                    <small
                                                        style="color: red">{{ $errors->first('pass') }}</small>
                                                @endif
                                            </div><!-- end col-lg-6 -->
                                            <div class="col-lg-6 responsive-column">
                                                <div class="input-box">
                                                    <label class="label-text">New Password Again</label>
                                                    <div class="form-group">
                                                        <span class="la la-lock form-icon"></span>
                                                        <input class="form-control" value="{{ old('cf_password') }}" name="cf_password" type="text" placeholder="New password again">
                                                    </div>
                                                </div>
                                                @if ($errors->has('cf_password'))
                                                    <small
                                                        style="color: red">{{ $errors->first('cf_password') }}</small>
                                                @endif
                                            </div><!-- end col-lg-6 -->
                                             <div class="col-lg-12">
                                                <div class="btn-box">
                                                    <button class="theme-btn" onclick="return confirm('By click OK. You will be logout... Are you sure??')" type="submit">Change Password</button>
                                                </div>
                                            </div><!-- end col-lg-12 -->
                                        </div><!-- end row -->
                                    </form>
                                </div>
                            </div>
                        </div><!-- end form-box -->
                    </div><!-- end col-lg-6 -->
                    <div class="col-lg-6">
                        <div class="form-box">
                            <div class="form-title-wrap">
                                <h3 class="title pb-2">Forgot Password</h3>
                                <p class="font-size-15 line-height-24">Enter the email of your account to reset password. Then you will receive a link to email
                                    <br> to reset the password.If you have any issue about reset password <a href="contact.html" class="color-text">contact us</a>
                                </p>
                            </div>
                            <div class="form-content">
                                <div class="contact-form-action">
                                    <form method="POST">
                                        @csrf
                                        @if (Session::get('code_authenticate') != '')
                                        @else
                                        <input type="hidden" name="type" value="forgot_pass">
                                            <div class="input-box">
                                                <label class="label-text">Email Address</label>
                                                <div class="form-group">
                                                    <span class="la la-envelope form-icon"></span>
                                                    <input class="form-control" value="" type="email" name="emails" placeholder="Enter email address">
                                                </div>
                                                @if ($errors->has('emails'))
                                                    <small style="color: red">{{ $errors->first('emails') }}</small>
                                                @endif
                                            </div>
                                        @endif
                                        @if (Session::get('code_authenticate') != '')
                                            <input type="hidden" name="recovery" value="revovery_pass">
                                            <div class="input-box">
                                                <label class="label-text">Code Authenticate</label>
                                                <div class="form-group">
                                                    <span class="la la-envelope form-icon"></span>
                                                    <input class="form-control" value="{{old('code')}}" name="code" type="code" placeholder="Enter your code here to reset your email">
                                                </div>
                                                @if ($errors->has('code'))
                                                    <small style="color: red">{{ $errors->first('code') }}</small>
                                                @endif
                                            </div>
                                        @endif
                                        <div class="btn-box">
                                            <button class="theme-btn" type="submit">Recover Password</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div><!-- end form-box -->
                    </div><!-- end col-lg-6 -->
                </div><!-- end row -->
                <div class="border-top mt-4"></div>
                <div class="row align-items-center">
                    <div class="col-lg-7">
                        <div class="copy-right padding-top-30px">
                            <p class="copy__desc">
                                &copy; Copyright Tiến Bùi 2021. Made with
                                <span class="la la-heart"></span> by <a href="#">Tiến Bùi</a>
                            </p>
                        </div><!-- end copy-right -->
                    </div><!-- end col-lg-7 -->
                    <div class="col-lg-5">
                        <div class="copy-right-content text-right padding-top-30px">
                            <ul class="social-profile">
                                <li><a href="#"><i class="lab la-facebook-f"></i></a></li>
                                <li><a href="#"><i class="lab la-twitter"></i></a></li>
                                <li><a href="#"><i class="lab la-instagram"></i></a></li>
                                <li><a href="#"><i class="lab la-linkedin-in"></i></a></li>
                            </ul>
                        </div><!-- end copy-right-content -->
                    </div><!-- end col-lg-5 -->
                </div><!-- end row -->
            </div><!-- end container-fluid -->
        </div><!-- end dashboard-main-content -->
    </div><!-- end dashboard-content-wrap -->
</section><!-- end dashboard-area -->
@stop
