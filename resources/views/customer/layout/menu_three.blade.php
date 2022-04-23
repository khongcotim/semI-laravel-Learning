    <!-- ================================
       START DASHBOARD NAV
================================= -->
<div class="sidebar-nav">
    <div class="sidebar-nav-body">
        <div class="side-menu-close">
            <i class="la la-times"></i>
        </div><!-- end menu-toggler -->
        <div class="author-content">
            <div class="d-flex align-items-center">
                <div class="author-img avatar-sm">
                    <img src="{{ url('customers/images') }}/{{ Auth::guard('customer')->user()->avatar }}"
                        alt="testimonial image">
                </div>
                <div class="author-bio">
                    <h4 class="author__title">{{ Auth::guard('customer')->user()->name }}</h4>
                    <span class="author__meta">Member Since
                        {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', Auth::guard('customer')->user()->created_at)->format('F Y') }}</span>
                </div>
            </div>
        </div>
        <div class="sidebar-menu-wrap">
            <ul class="sidebar-menu list-items">
                <li class="page-@yield('dashboard')"><a href="{{route('my_profile',Auth::guard('customer')->user()->name)}}"><i
                            class="la la-dashboard mr-2"></i>Dashboard</a></li>
                <li class="page-@yield('booking')"><a href="{{route('my-booking')}}"><i class="la la-shopping-cart mr-2 text-color"></i>My
                        Booking</a></li>
                <li class="page-@yield('my_profile')"><a href="{{route('my_profile_information')}}"><i class="la la-user mr-2 text-color-2"></i>My
                        Profile</a></li>
                <li class="page-@yield('my_blog')"><a href="{{route('my_blog')}}"><i class="lab la-stack-overflow mr-2"></i>My
                        Blog</a></li>
                <li class="page-@yield('reviews')"><a href="{{route('my_reviews')}}"><i class="la la-star mr-2 text-color-3"></i>My
                        Reviews</a></li>
                <li class="page-@yield('wishlist')"><a href="{{route('favorite.index')}}"><i
                            class="la la-heart mr-2 text-color-4"></i>Wishlist</a></li>
                <li class="page-@yield('settings')"><a href="{{route('settings')}}"><i class="la la-cog mr-2 text-color-5"></i>Settings</a>
                </li>
                <li><a href="{{route('customer.logout',['page'=>'my_profile'])}}"><i class="la la-power-off mr-2 text-color-6"></i>Logout</a></li>
            </ul>
        </div><!-- end sidebar-menu-wrap -->
    </div>
</div><!-- end sidebar-nav -->
<!-- ================================
   END DASHBOARD NAV
================================= -->
