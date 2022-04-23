@extends('customer.master.master_three')
@section('main_dasboard')
@section('title','My Wishlist')
@section('wishlist','active')
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
                                            <span class="noti-count notification_counted"></span>
                                        </a>
                                        <div
                                            class="dropdown-menu dropdown-reveal dropdown-menu-xl dropdown-menu-right">
                                            <div class="dropdown-header drop-reveal-header">
                                                <h6 class="title">You have <strong
                                                        class="text-black notification_counted"></strong> notifications</h6>
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
                                                <a href="#"
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
                                <h2 class="sec__title font-size-30 text-white">My Wishlist</h2>
                            </div>
                        </div><!-- end breadcrumb-content -->
                    </div><!-- end col-lg-6 -->
                    <div class="col-lg-6">
                        <div class="breadcrumb-list text-right">
                            <ul class="list-items">
                                <li><a href="{{route('my_profile',Auth::guard('customer')->user()->name)}}" class="text-white">Home</a></li>
                                <li>Dashboard</li>
                                <li>My Wishlist</li>
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
                                <h3 class="title">Wishlist</h3>
                                <p class="font-size-14"></p>
                            </div>
                            <div class="form-content pt-5 pb-0">
                                <div class="row">
                                    @foreach ($tours as $value)
                                        <div class="col-lg-4 responsive-column">
                                            <div class="card-item ">
                                                <div class="card-img">
                                                    <a href="{{route('tour.show',$value->slug)}}" class="d-block">
                                                        <img src="{{url('customers')}}/images/{{$value->image}}" alt="Destination-img">
                                                    </a>
                                                    <?php $fCheck=0 ?>
                                                    @foreach($favorite as $favor)
                                                    @if($favor->id_tour==$value->id)
                                                    <form action="{{route('favorite.destroy',$value->id)}}" method="post">
                                                    @method("DELETE")
                                                    @csrf
                                                    <input id="Y" type="hidden" name ="Y" runat="server" value="{!! Session::has('scroll') ? Session::get("scroll") : 0 !!}" />

                                                        <button class="add-to-wishlist icon-element"  type="submit" style="background: none;border: none;">
                                                            <i style="color:red" class="las la-heart"></i>
                                                        </button>
                                                    </form>
                                                    <?php $fCheck=1 ?>
                                                    @endif
                                                    @endforeach
                                                    @if($fCheck==0)
                                                    <form action="{{route('favorite.store')}}" method="post">
                                                        @method("POST")
                                                        @csrf
                                                        <input id="Y" type="hidden" name ="Y" runat="server" value="{!! Session::has('scroll') ? Session::get("scroll") : 0 !!}" />
                                                        <input type="hidden" name="id"  class="form-control" value="{{$value->id}}">
                                                    <button class="add-to-wishlist icon-element" type="submit" style="background: none;border: none;">
                                                        <i style="color:red" class="lar la-heart"></i>
                                                    </button>
                                                    </form>
                                                    @endif
                                                </div>
                                                <div class="card-body">
                                                    <h3 class="card-title"><a href="{{route('tour_detail',$value->slug)}}">{{$value->name}}</a></h3>
                                                    <p class="card-meta">{{$value->from}} – {{$value->to}}</p>
                                                    <div class="card-rating">
                                                    <span class="badge text-white"><?php $check=0 ?>@foreach($rating as $rate)  @if(!empty($rating[$value->id]))  {{$rating[$value->id]}} @break @else <?php $check++ ?> @endif @endforeach @if($check!=0) 0 @endif /5</span>
                                                        <span class="review__text">Average</span>
                                                        <span class="rating__text"><?php $check=0 ?>(@foreach($review as $r)  @if(!empty($review[$value->id]))   {{$review[$value->id]}} @break @else <?php $check++ ?> @endif  @endforeach @if($check!=0) 0 @endif Reviews)</span>
                                                    </div>
                                                    <div class="card-price d-flex align-items-center justify-content-between">
                                                        <p>
                                                            <span class="price__from">From</span>
                                                            <span class="price__num">${{$value->price}}</span>
                                                        </p>
                                                        <p>
                                                            <span class="price__num">{{$value->time}} Day</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div><!-- end card-item -->
                                        </div><!-- end col-lg-4 -->
                                    @endforeach
                                </div><!-- end row -->
                            </div>
                        </div><!-- end form-box -->
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
<script type="text/javascript">

    function getScrollPosition()
    {
        var y;
            y = document.documentElement.scrollTop;
        document.getElementById('Y').value = y;

    }
    function setScrollPosition()
    {
        var y = document.getElementById('Y').value;
            document.documentElement.scrollTop = {{ Session::has('scroll') ? Session::get("scroll") : 0 }};

    }

   window.setInterval('getScrollPosition()', 350);
   window.onload = setScrollPosition();
</script>
@stop
