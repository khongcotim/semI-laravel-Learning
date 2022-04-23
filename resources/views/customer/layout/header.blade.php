<div class="header-top-bar padding-right-100px padding-left-100px">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="header-top-content">
                        <div class="header-left">
                            <ul class="list-items">
                                <li><a href="tel:0335826918"><i class="la la-phone mr-1"></i>(123) 123-456</a></li>
                                <li><a href="mailto:tls.team.project@gmail.com"><i class="la la-envelope mr-1"></i>tls.team.project@gmail.com</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="header-top-content">
                        <div class="header-right d-flex align-items-center justify-content-end">
                            @if (Auth::guard('customer')->check())
                                <div class="header-right-action">
                                    <a href="{{route('my_profile',Auth::guard('customer')->user()->name)}}" class="theme-btn theme-btn-small theme-btn-transparent mr-1">{{Auth::guard('customer')->user()->name}}</a>
                                    <a href="{{route('customer.logout')}}" class="theme-btn theme-btn-small">Logout</a>
                                </div>
                            @else
                                <div class="header-right-action">
                                    <a href="{{route('customer.sign_up')}}" class="theme-btn theme-btn-small theme-btn-transparent mr-1">Sign Up</a>
                                    <a href="{{route('customer.login')}}" class="theme-btn theme-btn-small">Login</a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
