@extends('customer.master.master_three')
@section('main_dasboard')
@section('title')
{{Auth::guard('customer')->user()->name}}
@endsection
@section('dashboard','active')
<!-- ================================
    START DASHBOARD AREA
================================= -->
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
                            <div class="dashboard-search-box">
                                <div class="contact-form-action">
                                    <form action="#">
                                        <div class="form-group mb-0">
                                            <input class="form-control" type="text" name="text" placeholder="Search">
                                            <button class="search-btn"><i class="la la-search"></i></button>
                                        </div>
                                    </form>
                                </div>
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
            <div class="dashboard-bread">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="breadcrumb-content">
                                <div class="section-heading">
                                    <h2 class="sec__title font-size-30 text-white">Hi,
                                        {{ Auth::guard('customer')->user()->name }} Welcome Back!</h2>
                                </div>
                            </div><!-- end breadcrumb-content -->
                        </div><!-- end col-lg-6 -->

                    </div><!-- end row -->
                    <div class="row mt-4">
                        <div class="col-lg-3 responsive-column-m">
                            <div class="icon-box icon-layout-2 dashboard-icon-box">
                                <div class="d-flex">
                                    <div class="info-icon icon-element flex-shrink-0">
                                        <i class="la la-shopping-cart"></i>
                                    </div><!-- end info-icon-->
                                    <div class="info-content">
                                        <p class="info__desc">Total Booking</p>
                                        <h4 class="info__title">{{ count($total_booking) }}</h4>
                                    </div><!-- end info-content -->
                                </div>
                            </div>
                        </div><!-- end col-lg-3 -->
                        <div class="col-lg-3 responsive-column-m">
                            <div class="icon-box icon-layout-2 dashboard-icon-box">
                                <div class="d-flex">
                                    <div class="info-icon icon-element bg-2 flex-shrink-0">
                                        <i class="la la-bookmark"></i>
                                    </div><!-- end info-icon-->
                                    <div class="info-content">
                                        <p class="info__desc">Wishlist</p>
                                        <h4 class="info__title">{{ count($wish_list) }}</h4>
                                    </div><!-- end info-content -->
                                </div>
                            </div>
                        </div><!-- end col-lg-3 -->
                        <div class="col-lg-3 responsive-column-m">
                            <div class="icon-box icon-layout-2 dashboard-icon-box">
                                <div class="d-flex">
                                    <div class="info-icon icon-element bg-4 flex-shrink-0">
                                        <i class="la la-star"></i>
                                    </div><!-- end info-icon-->
                                    <div class="info-content">
                                        <p class="info__desc">Reviews</p>
                                        <h4 class="info__title">{{ count($review) }}</h4>
                                    </div><!-- end info-content -->
                                </div>
                            </div>
                        </div><!-- end col-lg-3 -->
                    </div><!-- end row -->
                </div>
            </div><!-- end dashboard-bread -->
            <div class="dashboard-main-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-6 responsive-column--m">
                            <div class="form-box">
                                <div class="form-title-wrap">
                                    <h3 class="title">Statics Results</h3>
                                </div>
                                <div class="form-content">
                                    <canvas id="bar-chart"></canvas>
                                </div>
                            </div><!-- end form-box -->
                        </div><!-- end col-lg-6 -->
                        <div class="col-lg-6 responsive-column--m" id="show_notification">
                            <div class="form-box dashboard-card">
                                <div class="form-title-wrap">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h3 class="title">Notifications</h3>
                                        <button type="button" class="icon-element mark-as-read-btn ml-auto mr-0"
                                            data-toggle="tooltip" data-placement="left" title="Mark all as read">
                                            <i class="la la-check-square"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="form-content p-0">
                                    <div class="list-group drop-reveal-list">
                                        @foreach ($discount_found as $dis)
                                            <a href="#" class="list-group-item list-group-item-action count_notification">
                                                <div class="msg-body d-flex align-items-center">
                                                    <div class="icon-element bg-1 flex-shrink-0 mr-3 ml-0"><i
                                                            class="la la-bell"></i></div>
                                                    <div class="msg-content w-100">
                                                        <h3 class="title pb-1">{{$dis->percent_reduce}}% Discount Offer</h3>
                                                        <h6 style="color: grey;font-size: 14px">You has one discount name <span style="color: black;font-size: 15px">"{{$dis->name}}"</span> for {{$dis->tour_name}}...There are too many offers for this trip,let use it now before it expires</h6>
                                                        <p class="msg-text">{{\Carbon\Carbon::parse($dis->created_at)->diffForHumans()}}</p>
                                                    </div>
                                                    <span class="icon-element mark-as-read-btn flex-shrink-0 ml-auto mr-0"
                                                        data-toggle="tooltip" data-placement="left" title="Mark as read">
                                                        <i class="la la-check-square"></i>
                                                    </span>
                                                </div>
                                            </a>
                                        @endforeach
                                        <a href="#" class="list-group-item list-group-item-action count_notification">
                                            <div class="msg-body d-flex align-items-center">
                                                <div class="icon-element bg-2 flex-shrink-0 mr-3 ml-0"><i
                                                        class="la la-check"></i></div>
                                                <div class="msg-content w-100">
                                                    <h3 class="title pb-1">Your account has been created</h3>
                                                    <p class="msg-text">{{\Carbon\Carbon::parse(Auth::guard('customer')->user()->created_at)->diffForHumans()}}</p>
                                                </div>
                                                <span class="icon-element mark-as-read-btn flex-shrink-0 ml-auto mr-0"
                                                    data-toggle="tooltip" data-placement="left" title="Mark as read">
                                                    <i class="la la-check-square"></i>
                                                </span>
                                            </div><!-- end msg-body -->
                                        </a>
                                        <a href="#" class="list-group-item list-group-item-action count_notification">
                                            <div class="msg-body d-flex align-items-center">
                                                <div class="icon-element bg-3 flex-shrink-0 mr-3 ml-0"><i
                                                        class="la la-user"></i></div>
                                                <div class="msg-content w-100">
                                                    <h3 class="title pb-1">Your account updated</h3>
                                                    <p class="msg-text">{{\Carbon\Carbon::parse(Auth::guard('customer')->user()->updated_at)->diffForHumans()}}</p>
                                                </div>
                                                <span class="icon-element mark-as-read-btn flex-shrink-0 ml-auto mr-0"
                                                    data-toggle="tooltip" data-placement="left" title="Mark as read">
                                                    <i class="la la-check-square"></i>
                                                </span>
                                            </div><!-- end msg-body -->
                                        </a>
                                        <a href="#" class="list-group-item list-group-item-action count_notification">
                                            <div class="msg-body d-flex align-items-center">
                                                <div class="icon-element bg-4 flex-shrink-0 mr-3 ml-0"><i
                                                        class="la la-lock"></i></div>
                                                <div class="msg-content w-100">
                                                    <h3 class="title pb-1">Your password changed</h3>
                                                    <p class="msg-text">{{\Carbon\Carbon::parse(Auth::guard('customer')->user()->updated_at)->diffForHumans()}}</p>
                                                </div>
                                                <span class="icon-element mark-as-read-btn flex-shrink-0 ml-auto mr-0"
                                                    data-toggle="tooltip" data-placement="left" title="Mark as read">
                                                    <i class="la la-check-square"></i>
                                                </span>
                                            </div><!-- end msg-body -->
                                        </a>
                                    </div>
                                </div>
                            </div><!-- end form-box -->
                        </div><!-- end col-lg-6 -->
                        <div class="col-lg-6 responsive-column--m">
                            <div class="form-box dashboard-card order-card border-0">
                                <div class="form-title-wrap">Tour Ordered</h3>
                                </div>
                                <div class="form-content p-0">
                                    <div class="list-group drop-reveal-list">
                                        @foreach ($ordered as $ord)
                                            <div class="list-group-item list-group-item-action">
                                                <div class="msg-body d-flex align-items-center justify-content-between">
                                                    <div class="msg-content">
                                                        <h3 class="title pb-2">{{$ord->name}}</h3>
                                                        <ul class="list-items d-flex align-items-center">
                                                            <li class="font-size-14 mr-2"><span
                                                                    class="badge badge-success py-1 px-2 font-size-13 font-weight-medium">Paid</span>
                                                            </li>
                                                            <li class="font-size-14 mr-2">Order: #{{$loop->index+1}}</li>
                                                            <li class="font-size-14">Date: {{\Carbon\Carbon::parse($ord->created_at)->format('M d Y')}}</li>
                                                        </ul>
                                                    </div>
                                                    <a href="{{route('my-booking-detail',$ord->id)}}"
                                                        class="theme-btn theme-btn-small theme-btn-transparent font-size-13">
                                                        View Invoice
                                                    </a>
                                                </div><!-- end msg-body -->
                                            </div>
                                        @endforeach
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
    <!-- ================================
    END DASHBOARD AREA
================================= -->
@stop
@section('js_dasboard')
<script>
    var ctx = document.getElementById("bar-chart");
    Chart.defaults.global.defaultFontFamily = "Cabin",
        Chart.defaults.global.defaultFontSize = 14,
        Chart.defaults.global.defaultFontStyle = "500",
        Chart.defaults.global.defaultFontColor = "#808996";
    var chart = new Chart(ctx, {
        type: "bar",
        data: {
            labels: ["Jan", "Feb", "March", "April", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            datasets: [{
                label: "Order By Month",
                data: ["{{ $total_order_in_jan }}", "{{ $total_order_in_feb }}",
                    "{{ $total_order_in_march }}", "{{ $total_order_in_april }}",
                    "{{ $total_order_in_may }}", "{{ $total_order_in_jun }}",
                    "{{ $total_order_in_jul }}", "{{ $total_order_in_aug }}",
                    "{{ $total_order_in_sep }}", "{{ $total_order_in_oct }}",
                    "{{ $total_order_in_nov }}", "{{ $total_order_in_dec }}"
                ],
                backgroundColor: "#287dfa",
                hoverBackgroundColor: "#2273e5",
                pointBackgroundColor: "#fff",
                borderWidth: 0,
                pointRadius: 4
            }]
        },
        options: {
            tooltips: {
                backgroundColor: "#1c2540"
            },
            legend: {
                display: true
            },
            scales: {
                xAxes: [{
                    barPercentage: .4,
                    barThickness: 15,
                    display: !0,
                    gridLines: {
                        offsetGridLines: !1,
                        display: !1
                    }
                }],
                yAxes: [{
                    display: !0,
                    gridLines: {
                        color: "#eee"
                    },
                    ticks: {
                        fontSize: 14
                    }
                }]
            },
            title: {
                display: true,
                font: {
                    weight: 'bold'
                },
                text: "Statistics of income for the year " + new Date().getFullYear()
        }
    }
    });
</script>
@stop
