@extends('customer.master.master_three')
@section('main_dasboard')
@section('title','My Reviews')
@section('reviews','active')
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
                                <h2 class="sec__title font-size-30 text-white">My Reviews</h2>
                            </div>
                        </div><!-- end breadcrumb-content -->
                    </div><!-- end col-lg-6 -->
                    <div class="col-lg-6">
                        <div class="breadcrumb-list text-right">
                            <ul class="list-items">
                                <li><a href="{{route('my_profile',Auth::guard('customer')->user()->name)}}" class="text-white">Home</a></li>
                                <li>My Reviews</li>
                            </ul>
                        </div><!-- end breadcrumb-list -->
                    </div><!-- end col-lg-6 -->
                </div><!-- end row -->
            </div>
        </div><!-- end dashboard-bread -->
        <div class="dashboard-main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-box">
                            <div class="form-title-wrap">
                                <h3 class="title">Reviews</h3>
                                <p class="font-size-14">Showing {{$reviews->firstItem()}} {{$reviews->count()!=1 ? "to".' '.$reviews->count():""}} of {{$reviews->total()}} results</p>
                            </div>
                            <div class="form-content">
                                <div class="comments-list">
                                    @foreach($reviews as $rv)
                                        <div class="comment">
                                            <div class="comment-avatar">
                                                <img class="avatar__img" alt="my_avatar" src="{{url('customers')}}/images/{{Auth::guard('customer')->user()->avatar}}">
                                            </div>
                                            <div class="comment-body">
                                                <div class="meta-data">
                                                    <a href="{{route('tour_detail',$rv->tour_slug)}}">
                                                        <h3 class="comment__author">{{$rv->tour_name}}</h3>
                                                    </a>
                                                    <div class="meta-data-inner d-flex">
                                                        <span class="ratings d-flex align-items-center mr-1">
                                                            @if ($rv->star < 0)<i class="lar la-star"></i>@elseif($rv->star>0&&$rv->star<=0.5)<i class="las la-star-half"></i>@elseif($rv->star>0.5)<i class="la la-star"></i>@endif
                                                            @if ($rv->star < 1)<i class="lar la-star"></i>@elseif($rv->star>1&&$rv->star<=1.5)<i class="las la-star-half"></i>@elseif($rv->star>1.5)<i class="la la-star"></i>@endif
                                                            @if ($rv->star < 2)<i class="lar la-star"></i>@elseif($rv->star>2&&$rv->star<=2.5)<i class="las la-star-half"></i>@elseif($rv->star>2.5)<i class="la la-star"></i>@endif
                                                            @if ($rv->star < 3)<i class="lar la-star"></i>@elseif($rv->star>3&&$rv->star<=3.5)<i class="las la-star-half"></i>@elseif($rv->star>3.5)<i class="la la-star"></i>@endif
                                                            @if ($rv->star < 4)<i class="lar la-star"></i>@elseif($rv->star>4&&$rv->star<=4.5)<i class="las la-star-half"></i>@elseif($rv->star>4.5)<i class="la la-star"></i>@endif
                                                        </span>
                                                        <p class="comment__date">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $rv->created_at)->format('d F Y') }}</p>
                                                    </div>
                                                </div>
                                                <p class="comment-content mb-0">
                                                    {{$rv->contents}}
                                                </p>
                                            </div>
                                        </div><!-- end comments -->
                                    @endforeach
                                </div><!-- end comments-list -->
                            </div>
                        </div><!-- end form-box -->
                    </div><!-- end col-lg-12 -->
                </div><!-- end row -->
                <div class="row">
                    <div class="col-lg-12">
                        {{$reviews->links()}}
                    </div><!-- end col-lg-12 -->
                </div><!-- end row -->
                <div class="border-top mt-5"></div>
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
