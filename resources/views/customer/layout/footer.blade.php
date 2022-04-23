<!-- ================================
       START FOOTER AREA
================================= -->
<section class="footer-area section-bg padding-top-100px padding-bottom-30px">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 responsive-column">
                <div class="footer-item">
                    <div class="footer-logo padding-bottom-30px">
                        <a href="{{ route('customer.index') }}" class="foot__logo"><img
                                src="{{ url('admin') }}/images/{{$logos!= null?$logos->logo:'logo.png'}}" width="100px" height="60px" alt="logo"></a>
                    </div><!-- end logo -->
                    <p class="footer__desc">Morbi convallis bibendum urna ut viverra. Maecenas consequat</p>
                    <ul class="list-items pt-3">
                        <li>Hà Nội,Việt Nam</li>
                        <li>+123-456-789</li>
                        <li><a href="mailto:tls.team.project@gmail.com">tls.team.project@gmail.com</a></li>
                    </ul>
                </div><!-- end footer-item -->
            </div><!-- end col-lg-3 -->
            <div class="col-lg-3 responsive-column">
                <div class="footer-item">
                    <h4 class="title curve-shape pb-3 margin-bottom-20px" data-text="curvs">Others Links</h4>
                    <ul class="list-items list--items">
                        <li><a href="{{route('about')}}">About us</a></li>
                        <li><a href="{{route('blogs.index')}}">Blog</a></li>
                        <li><a href="{{route('contact')}}">Support</a></li>
                    </ul>
                </div><!-- end footer-item -->
            </div><!-- end col-lg-3 -->
            <div class="col-lg-3 responsive-column">
            </div><!-- end col-lg-3 -->
            <div class="col-lg-3 responsive-column">
                <div class="footer-item">
                    <h4 class="title curve-shape pb-3 margin-bottom-20px" data-text="curvs">Subscribe now</h4>
                    <p class="footer__desc pb-3">Subscribe for latest updates & promotions</p>
                    <div class="contact-form-action">
                        <form action="#">
                            <div class="input-box">
                                <label class="label-text">Enter email address</label>
                                <div class="form-group mb-0">
                                    <span class="la la-envelope form-icon"></span>
                                    <input class="form-control" type="email" name="email" placeholder="Email address">
                                    <button class="theme-btn theme-btn-small submit-btn" type="submit">Go</button>
                                    <span class="font-size-14 pt-1"><i class="la la-lock mr-1"></i>Your information is
                                        safe with us.</span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div><!-- end footer-item -->
            </div><!-- end col-lg-3 -->
        </div><!-- end row -->
        <div class="row align-items-center">
            <div class="col-lg-8">
                <div class="term-box footer-item">
                    <ul class="list-items list--items d-flex align-items-center">
                        <li><a href="#">Terms & Conditions</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Help Center</a></li>
                    </ul>
                </div>
            </div><!-- end col-lg-8 -->
            <div class="col-lg-4">
                <div class="footer-social-box text-right">
                    <ul class="social-profile">
                        <li><a href="#"><i class="lab la-facebook-f"></i></a></li>
                        <li><a href="#"><i class="lab la-twitter"></i></a></li>
                        <li><a href="#"><i class="lab la-instagram"></i></a></li>
                        <li><a href="#"><i class="lab la-linkedin-in"></i></a></li>
                    </ul>
                </div>
            </div><!-- end col-lg-4 -->
        </div><!-- end row -->
    </div><!-- end container -->
    <div class="section-block mt-4"></div>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <div class="copy-right padding-top-30px">
                    <p class="copy__desc">
                        &copy; Copyright TLS Team 2021. Made with
                        <span class="la la-heart"></span> by <a
                            href="#">TLS Team</a>
                    </p>
                </div><!-- end copy-right -->
            </div><!-- end col-lg-7 -->
            <div class="col-lg-5">
                <div class="copy-right-content d-flex align-items-center justify-content-end padding-top-30px">
                    <h3 class="title font-size-15 pr-2">We Accept</h3>
                    <img src="{{ url('customers') }}/images/payment-img.png" alt="">
                </div><!-- end copy-right-content -->
            </div><!-- end col-lg-5 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end footer-area -->
<!-- ================================
       START FOOTER AREA
================================= -->

<!-- start back-to-top -->
<div id="back-to-top">
    <i class="la la-angle-up" title="Go top"></i>
</div>
<!-- end back-to-top -->
<!-- end modal-shared -->
@if (strlen($employee) > 0)
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function checkRegister() {
            Swal.fire("You're became our employee")
        }
    </script>
@else
    <div class="modal-popup">
        <div class="modal fade" id="signupPopupForm" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <div>
                            <h5 class="modal-title title" id="exampleModalLongTitle">Sign Up</h5>
                            <p class="font-size-14">Hello! Welcome Create a New Account</p>
                        </div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="la la-close"></span>
                        </button>
                    </div>
                    <div class="modal-body" id="checkAll">
                        <div class="contact-form-action">
                            <form method="post" action="{{ route('post_register_employee') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="input-box">
                                    <label class="label-text">Avatar</label>
                                    <div class="form-group">
                                        <span class="la la-user form-icon"></span>
                                        @if ($auth != 'null')
                                           <img src="{{url('customers/images')}}/{{Auth::guard('customer')->user()->avatar}}" style="width: 100%;height: 300px;" alt="{{Auth::guard('customer')->user()->avatar}}">
                                        @else
                                            <input class="form-control" id="avatar_guild" type="file" name="avatar"
                                                onblur="checkAvatarInput()" value="" placeholder="Type your username">
                                            <small id="errAvatar" style="color: red">Please choose your avatar</small>
                                        @endif
                                    </div>
                                </div><!-- end input-box -->
                                <div class="input-box">
                                    <label class="label-text">Username</label>
                                    <div class="form-group">
                                        <span class="la la-user form-icon"></span>
                                        @if ($auth != 'null')
                                            <input class="form-control" id="name_guild" type="text" name="name"
                                                value="{{ $auth->user()->name }}" placeholder="Type your username"
                                                readonly>
                                        @else
                                            <input class="form-control" id="name_guild" type="text" name="name"
                                                onblur="checkNameInput()" value="" placeholder="Type your username">
                                            <small id="errName" style="color: red">Please fill this field</small>
                                        @endif
                                    </div>
                                </div><!-- end input-box -->
                                <div class="input-box">
                                    <label class="label-text">Email Address</label>
                                    <div class="form-group">
                                        <span class="la la-envelope form-icon"></span>
                                        @if ($auth != 'null')
                                            <input class="form-control" id="email_guild" type="email" name="email"
                                                value="{{ $auth->user()->email }}" placeholder="Type your email"
                                                readonly>
                                        @else
                                            <input class="form-control" id="email_guild" type="email" name="email"
                                                onblur="checkEmailInput()" value="" placeholder="Type your email">
                                            <small id="errEmail" style="color: red">Please fill this field</small>
                                        @endif
                                    </div>
                                </div><!-- end input-box -->
                                <div class="input-box">
                                    <label class="label-text">Phone</label>
                                    <div class="form-group">
                                        <span class="la la-lock form-icon"></span>
                                        @if ($auth != 'null')
                                            <input class="form-control" id="phone_guild" type="number" name="phone"
                                                value="Same your phone" placeholder="Type password" readonly>
                                        @else
                                            <input class="form-control" id="phone_guild" type="text" name="phone"
                                                onblur="checkPhoneInput()" value="" placeholder="Type password">
                                            <small id="errPhone" style="color: red"></small>
                                        @endif
                                    </div>
                                </div><!-- end input-box -->
                                <div class="input-box">
                                    <label class="label-text">Price ( VND/Tour )</label>
                                    <div class="form-group">
                                        <span class="la la-lock form-icon"></span>
                                            <input class="form-control" id="price_guild" type="number" name="price"
                                                onblur="checkPriceInput()" value="" placeholder="Your Price">
                                            <small id="erPrice" style="color: red">Please give us your price, must from 50.000 VND</small>
                                    </div>
                                </div><!-- end input-box -->
                                <div class="input-box">
                                    <div class="form-group">
                                        <label class="label-text">Gender</label>
                                        <select class="form-control" name="gender" id="">
                                            <option value="0" selected>Boy</option>
                                            <option value="1">Girl</option>
                                        </select>
                                    </div>
                                </div><!-- end input-box -->
                                <div class="btn-box pt-3 pb-4">
                                    <button type="button" id="registerNew" class="theme-btn w-100">Become our Tour
                                        Guild</button>
                                </div>
                            </form>
                        </div><!-- end contact-form-action -->
                    </div>
                </div>
            </div>
        </div>
    </div><!-- end modal-popup -->
@endif

<!-- end modal-shared -->
<div class="modal-popup">
    <div class="modal fade" id="loginPopupForm" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div>
                        <h5 class="modal-title title" id="exampleModalLongTitle2">Login</h5>
                        <p class="font-size-14">Hello! Welcome to your account</p>
                    </div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="la la-close"></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="contact-form-action">
                        <form method="post">
                            <div class="input-box">
                                <label class="label-text">Username</label>
                                <div class="form-group">
                                    <span class="la la-user form-icon"></span>
                                    <input class="form-control" type="text" name="text"
                                        placeholder="Type your username">
                                </div>
                            </div><!-- end input-box -->
                            <div class="input-box">
                                <label class="label-text">Password</label>
                                <div class="form-group mb-2">
                                    <span class="la la-lock form-icon"></span>
                                    <input class="form-control" type="text" name="text"
                                        placeholder="Type your password">
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="custom-checkbox mb-0">
                                        <input type="checkbox" id="rememberchb">
                                        <label for="rememberchb">Remember me</label>
                                    </div>
                                    <p class="forgot-password">
                                        <a href="recover.html">Forgot Password?</a>
                                    </p>
                                </div>
                            </div><!-- end input-box -->
                            <div class="btn-box pt-3 pb-4">
                                <button type="button" class="theme-btn w-100">Login Account</button>
                            </div>
                            <div class="action-box text-center">
                                <p class="font-size-14">Or Login Using</p>
                                <ul class="social-profile py-3">
                                    <li><a href="#" class="bg-5 text-white"><i class="lab la-facebook-f"></i></a></li>
                                    <li><a href="#" class="bg-6 text-white"><i class="lab la-twitter"></i></a></li>
                                    <li><a href="#" class="bg-7 text-white"><i class="lab la-instagram"></i></a></li>
                                    <li><a href="#" class="bg-5 text-white"><i class="lab la-linkedin-in"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </form>
                    </div><!-- end contact-form-action -->
                </div>
            </div>
        </div>
    </div>
</div><!-- end modal-popup -->
