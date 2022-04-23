<div class="header-menu-wrapper padding-right-100px padding-left-100px">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12" style="max-width: 99% !important;">
                <div class="menu-wrapper">
                    <a href="#" class="down-button"><i class="la la-angle-down"></i></a>
                    <div class="logo">
                        <a href="{{route('customer.index')}}"><img src="{{url('admin')}}/images/{{$logos!= null?$logos->logo:'logo.png'}}" width="100px" height="60px" alt="logo"></a>
                        <div class="menu-toggler">
                            <i class="la la-bars"></i>
                            <i class="la la-times"></i>
                        </div><!-- end menu-toggler -->
                    </div><!-- end logo -->
                    <div class="main-menu-content">
                        <nav>
                            <ul>
                                <li>
                                    <a class="@yield('home')" href="{{route('customer.index')}}">Home</a>
                                </li>
                                <li>
                                    <a class="@yield('tour')" href="{{route('tour_shop')}}">Tour</a>
                                </li>
                                <li>
                                    <a class="@yield('blog')" href="{{route('blogs.index')}}">Blog</a>
                                    <ul class="dropdown-menu-item">
                                        <li><a href="{{route('blogs.create')}}">Create New Blog</a></li>
                                        <li><a href="{{route('blogs.index')}}">All Blog</a></li>
                                    </ul>
                                </li>

                                <li>
                                    <a class="@yield('about')" href="{{route('about')}}">About us</a>
                                </li>
                                <li>
                                    <a class="@yield('contact')" href="{{route('contact')}}">Contact Us</a>
                                </li>
                                <li>
                                    <a class="@yield('cart')" href="{{route('cart')}}">Cart</a>
                                </li>
                            </ul>
                        </nav>
                    </div><!-- end main-menu-content -->
                    <div class="nav-btn">
                        <a href="{{route('become')}}" class="theme-btn">Become Tour Guide</a>
                    </div><!-- end nav-btn -->
                </div><!-- end menu-wrapper -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
    </div><!-- end container-fluid -->
</div><!-- end header-menu-wrapper -->
