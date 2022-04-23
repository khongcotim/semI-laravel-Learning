<div class="sidebar-nav sidebar--nav">
    <div class="sidebar-nav-body">
        <div class="side-menu-close">
            <i class="la la-times"></i>
        </div><!-- end menu-toggler -->
        <div class="author-content">
            <div class="d-flex align-items-center">
                <div class="author-img avatar-sm">
                @if(Auth::check())<img src="{{url('admin')}}/images/{{Auth::user()->avatar}}" alt="{{Auth::user()->avatar}}">@else<img src="{{url('admin')}}/images/noadmin.png" alt="team-img">@endif
                </div>
                <div class="author-bio">
                    <h4 class="author__title"> @if(Auth::check()){{Auth::user()->name}}@endif</h4>
                    <span class="author__meta">Welcome to Admin Panel</span>
                </div>
            </div>
        </div>
        <div class="sidebar-menu-wrap">
            <ul class="sidebar-menu toggle-menu list-items">
                <li class="page @yield('dashboard')"><a href="{{route('admin.home')}}"><i class="la la-dashboard mr-2"></i>Dashboard</a></li>
                <li class=" @yield('category')">
                    <span class="side-menu-icon toggle-menu-icon">
                        <i class="la la-angle-down"></i>
                    </span>
                    <a href="javascript:void(0)"><i class="lab la-buffer mr-2"></i>Category</a>
                    @if(Auth::check())
                        @if(Auth::user()->role=='admin'||Auth::user()->role=='manager')
                        <ul class="toggle-drop-menu">
                            <li class="@yield('create_category')"><a href="{{route('category.create')}}">Create</a></li>
                        </ul>
                        @endif
                    @endif
                    <ul class="toggle-drop-menu">
                        <li class="@yield('list_category')"><a href="{{route('category.index')}}">List</a></li>
                    </ul>
                </li>
                <li class=" @yield('vehicle')">
                    <span class="side-menu-icon toggle-menu-icon">
                        <i class="la la-angle-down"></i>
                    </span>
                    <a href="javascript:void(0)"><i class="la la-bus mr-2"></i>Vehicle</a>
                    @if(Auth::check())
                    @if(Auth::user()->role=='admin'||Auth::user()->role=='manager')
                    <ul class="toggle-drop-menu">
                        <li class="@yield('create_vehicle')"><a href="{{route('vehicle.create')}}">Create</a></li>
                    </ul>
                    @endif
                    @endif
                    <ul class="toggle-drop-menu">
                        <li class="@yield('list_vehicle')"><a href="{{route('vehicle.index')}}">List</a></li>
                    </ul>
                </li>
                <li class="@yield('hotel')">
                    <span class="side-menu-icon toggle-menu-icon">
                        <i class="la la-angle-down"></i>
                    </span>
                    <a href="javascript:void(0)"><i class="las la-hotel mr-2"></i>Hotel</a>
                    <ul class="toggle-drop-menu">
                        <li class="@yield('create_hotel')"><a href="{{route('hotel.create')}}">Create</a></li>
                    </ul>
                    <ul class="toggle-drop-menu">
                        <li class="@yield('list_hotel')"><a href="{{route('hotel.index')}}">List</a></li>
                    </ul>
                </li>
                <li class="@yield('service')">
                    <span class="side-menu-icon toggle-menu-icon">
                        <i class="la la-angle-down"></i>
                    </span>
                    <a href="javascript:void(0)"><i class="lab la-servicestack mr-2"></i>Service</a>
                    <ul class="toggle-drop-menu">
                        <li class="@yield('create_service')"><a href="{{ route('service.create') }}">Create</a></li>
                    </ul>
                    <ul class="toggle-drop-menu">
                        <li class="@yield('list_service')"><a href="{{ route('service.index') }}">List</a></li>
                    </ul>
                </li>
                <li class="@yield('tour_guide')">
                    <span class="side-menu-icon toggle-menu-icon">
                        <i class="la la-angle-down"></i>
                    </span>
                    <a href="javascript:void(0)"><i class="las la-user-tie mr-2"></i></i>Tour guild</a>
                    <ul class="toggle-drop-menu">
                        <li class="@yield('create_tour_guide')"><a href="{{ route('tour_guide.create') }}">Create</a>
                        </li>
                    </ul>
                    <ul class="toggle-drop-menu">
                        <li class="@yield('list_tour_guide')"><a href="{{ route('tour_guide.index') }}">List</a></li>
                    </ul>
                </li>
                <li class="@yield('tour')">
                    <span class="side-menu-icon toggle-menu-icon">
                        <i class="la la-angle-down"></i>
                    </span>
                    <a href="{{route('tour.index')}}"><i class="las la-map-marked-alt mr-2"></i>Tour</a>
                    @if(Auth::check())
                    @if(Auth::user()->role=='admin'||Auth::user()->role=='manager')
                    <ul class="toggle-drop-menu">
                        <li><a href="{{route('tour.create')}}">Create</a></li>
                    </ul>
                    @endif
                    @endif
                    <ul class="toggle-drop-menu">
                        <li><a href="{{route('tour.index')}}">List</a></li>
                    </ul>
                    @if(Auth::check())
                    @if(Auth::user()->role=='admin'||Auth::user()->role=='manager')
                    <ul class="toggle-drop-menu">
                        <li ><a href="{{route('trash.index')}}">Trash</a></li>
                    </ul>
                    @endif
                    @endif
                </li>
                <li class="@yield('order')">
                    <a href="{{route('order.index')}}"><i class="las la-calendar mr-2"></i>Orders</a>
                </li>
                <li class="@yield('blog')">
                    <span class="side-menu-icon toggle-menu-icon">
                        <i class="la la-angle-down"></i>
                    </span>
                    <a href="javascript:void(0)"><i class="lab la-stack-overflow mr-2"></i>Blog</a>
                    <ul class="toggle-drop-menu">
                        <li class="@yield('create_blog')"><a href="{{route('blog.create')}}">Create</a></li>
                    </ul>
                    <ul class="toggle-drop-menu">
                        <li class="@yield('list_blog')"><a href="{{route('blog.index')}}">Manage</a></li>
                    </ul>
                </li>
                <li class="@yield('logo')">
                    <span class="side-menu-icon toggle-menu-icon">
                        <i class="la la-angle-down"></i>
                    </span>
                    <a href="javascript:void(0)"><i class="las la-warehouse mr-2"></i>Logo</a>
                    <ul class="toggle-drop-menu">
                        <li class="@yield('create_logo')"><a href="{{ route('logo.create') }}">Create</a></li>
                    </ul>
                    <ul class="toggle-drop-menu">
                        <li class="@yield('list_logo')"><a href="{{ route('logo.index') }}">List</a></li>
                    </ul>
                </li>
                <li class="@yield('banner')">
                    <span class="side-menu-icon toggle-menu-icon">
                        <i class="la la-angle-down"></i>
                    </span>
                    <a href="javascript:void(0)"><i class="las la-image mr-2"></i>Banner</a>
                    @if(Auth::check())
                    @if(Auth::user()->role=='admin'||Auth::user()->role=='manager')
                    <ul class="toggle-drop-menu">
                        <li class="@yield('create_banner')"><a href="{{route('banner.create')}}">Create</a></li>
                    </ul>
                    @endif
                    @endif
                    <ul class="toggle-drop-menu">
                        <li class="@yield('manage_banner')"><a href="{{route('banner.index')}}">Manage</a></li>
                    </ul>
                </li>
                <li class="@yield('slides')">
                    <span class="side-menu-icon toggle-menu-icon">
                        <i class="la la-angle-down"></i>
                    </span>
                    <a href="javascript:void(0)"><i class="las la-layer-group mr-2"></i>Slides</a>
                    <ul class="toggle-drop-menu">
                        <li class="@yield('create_slides')"><a href="{{route('slides.create')}}">Create</a></li>
                    </ul>
                    <ul class="toggle-drop-menu">
                        <li class="@yield('manage_slides')"><a href="{{route('slides.index')}}">Manage</a></li>
                    </ul>
                </li>
                <li class="@yield('feedback')">
                    <span class="side-menu-icon toggle-menu-icon">
                        <i class="la la-angle-down"></i>
                    </span>
                    <a href="javascript:void(0)"><i class="las la-exclamation-triangle mr-2"></i>Feedback & FAQ</a>
                    <ul class="toggle-drop-menu">
                        <li class="@yield('create_feedback')"><a href="{{route('feedback.create')}}">Create</a></li>
                    </ul>
                    <ul class="toggle-drop-menu">
                        <li class="@yield('manage_feedback')"><a href="{{route('feedback.index')}}">List</a></li>
                    </ul>
                </li>
                <li class="@yield('discount')">
                    <span class="side-menu-icon toggle-menu-icon">
                        <i class="la la-angle-down"></i>
                    </span>
                    <a href="javascript:void(0)"><i class="las la-ticket-alt mr-2"></i>Discount</a>
                    <ul class="toggle-drop-menu">
                        <li class="@yield('create_discount')"><a href="{{route('discount.create')}}">Create</a></li>
                    </ul>
                    <ul class="toggle-drop-menu">
                        <li class="@yield('manage_discount')"><a href="{{route('discount.index')}}">Manage</a></li>
                    </ul>
                </li>
                <li class="@yield('payment')">
                    <a href="{{route('payment.index')}}"><i class="las la-credit-card mr-2"></i>Payment</a>
                </li>
                <li class="@yield('account')">
                    <span class="side-menu-icon toggle-menu-icon">
                        <i class="la la-angle-down"></i>
                    </span>
                    <a href="javascript:void(0)"><i class="la la-cog mr-2"></i>Account</a>
                    <ul class="toggle-drop-menu">
                        <li class="@yield('create_discount')"><a href="{{route('accountCustomer.index')}}">Custormer Account</a></li>
                    </ul>
                    <ul class="toggle-drop-menu">
                        <li class="@yield('manage_discount')"><a href="{{route('accountAdmin.index')}}">Manager Account</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- end sidebar-menu-wrap -->
    </div>
</div>
