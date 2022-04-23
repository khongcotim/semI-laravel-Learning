@extends('customer.master.master_two')
@section('main')
@section('title', 'Become Tour Guide')

<!-- ================================
    START BREADCRUMB AREA
================================= -->
@if ($become_banner!=null)
    <section class="breadcrumb-area bread-bg"
        style="background-image: url('{{ url('admin/images') }}/{{ $become_banner!=null }}')">
        <div class="breadcrumb-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb-content">
                            <div class="section-heading">
                                <h2 class="sec__title line-height-55 text-white">{{ $become_banner->title }}</h2>
                                <p class="sec__desc pt-2 text-white">Join 3000+ locals & 1400+ contributors from 2000
                                    cities</p>
                            </div>
                            <div class="btn-box pt-4">
                                @if (strlen($employee)>0)
                                    <a href="javascript:;" class="theme-btn border-0" onclick="checkRegister()">Register</a>
                                @else
                                    <a href="#" data-toggle="modal" data-target="#signupPopupForm" class="theme-btn border-0">Register
                                        Now</a>
                                @endif
                            </div>
                        </div><!-- end breadcrumb-content -->
                    </div><!-- end col-lg-12 -->
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end breadcrumb-wrap -->
        <div class="bread-svg-box">
            <svg class="bread-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 10"
                preserveAspectRatio="none">
                <polygon points="100 0 50 10 0 0 0 10 100 10"></polygon>
            </svg>
        </div><!-- end bread-svg -->
    </section><!-- end breadcrumb-area -->
@else
    <section class="breadcrumb-area bread-bg">
        <div class="breadcrumb-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb-content">
                            <div class="section-heading">
                                <h2 class="sec__title line-height-55 text-white">Become our local expert</h2>
                                <p class="sec__desc pt-2 text-white">Join 3000+ locals & 1400+ contributors from 2000
                                    cities</p>
                            </div>
                            <div class="btn-box pt-4">
                                @if (strlen($employee)>0)
                                    <a href="javascript:;" class="theme-btn border-0" onclick="checkRegister()">Register</a>
                                @else
                                    <a href="#" data-toggle="modal" data-target="#signupPopupForm" class="theme-btn border-0">Register
                                        Now</a>
                                @endif
                            </div>
                        </div><!-- end breadcrumb-content -->
                    </div><!-- end col-lg-12 -->
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end breadcrumb-wrap -->
        <div class="bread-svg-box">
            <svg class="bread-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 10"
                preserveAspectRatio="none">
                <polygon points="100 0 50 10 0 0 0 10 100 10"></polygon>
            </svg>
        </div><!-- end bread-svg -->
    </section><!-- end breadcrumb-area -->
@endif

<!-- ================================
    END BREADCRUMB AREA
================================= -->

<!-- ================================
    START INFO AREA
================================= -->
<section class="info-area info-bg padding-top-100px padding-bottom-60px">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading text-center">
                    <h2 class="sec__title">How TLS work?</h2>
                </div><!-- end section-heading -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
        <div class="row padding-top-50px">
            <div class="col-lg-4 responsive-column">
                <div class="icon-box icon-layout-3 d-flex">
                    <div class="info-icon flex-shrink-0">
                        <i class="la la-sign-in"></i>
                    </div><!-- end info-icon-->
                    <div class="info-content">
                        <h4 class="info__title">Sign up</h4>
                        <p class="info__desc">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam odio
                        </p>
                        <span class="info__num">1</span>
                    </div><!-- end info-content -->
                </div><!-- end icon-box -->
            </div><!-- end col-lg-4 -->
            <div class="col-lg-4 responsive-column">
                <div class="icon-box icon-layout-3 d-flex">
                    <div class="info-icon flex-shrink-0">
                        <i class="la la-gears"></i>
                    </div><!-- end info-icon-->
                    <div class="info-content">
                        <h4 class="info__title">Add Your Services</h4>
                        <p class="info__desc">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam odio
                        </p>
                        <span class="info__num">2</span>
                    </div><!-- end info-content -->
                </div><!-- end icon-box -->
            </div><!-- end col-lg-4 -->
            <div class="col-lg-4 responsive-column">
                <div class="icon-box icon-layout-3 d-flex">
                    <div class="info-icon flex-shrink-0">
                        <i class="la la-money"></i>
                    </div><!-- end info-icon-->
                    <div class="info-content">
                        <h4 class="info__title">Get Bookings</h4>
                        <p class="info__desc">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam odio
                        </p>
                        <span class="info__num">3</span>
                    </div><!-- end info-content -->
                </div><!-- end icon-box -->
            </div><!-- end col-lg-4 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end info-area -->
<!-- ================================
    END INFO AREA
================================= -->

<div class="section-block"></div>

<!-- ================================
    START VIDEO AREA
================================= -->
<section class="video-area padding-top-100px text-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="video-content z-index-1">
                    <div class="video-content-img ripple-bg">
                        <img src="{{ url('customers') }}/images/img20.jpg" alt="">
                    </div>
                    <div class="video-content-box">
                        <div class="section-heading">
                            <h2 class="sec__title text-white line-height-55">Share the Beauty of Your <br> City to the
                                World</h2>
                        </div><!-- end section-heading -->
                        <div class="btn-box pt-4">
                            <a href="#" class="icon-element text-white" data-fancybox="video"
                                data-src="https://www.youtube.com/watch?v=0GZSfBuhf6Y" data-speed="700">
                                <i class="la la-play"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end video-area -->
<!-- ================================
    END VIDEO AREA
================================= -->

<!-- ================================
    START INFO AREA
================================= -->
<section class="info-area section-bg padding-top-200px padding-bottom-100px text-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading">
                    <h2 class="sec__title">Why be a Local Expert</h2>
                </div><!-- end section-heading -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
        <div class="row padding-top-60px">
            <div class="col-lg-4 responsive-column">
                <div class="icon-box">
                    <div class="info-icon">
                        <i class="la la-money"></i>
                    </div><!-- end info-icon-->
                    <div class="info-content">
                        <h4 class="info__title">Earn an additional income</h4>
                        <p class="info__desc">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam odio
                        </p>
                    </div><!-- end info-content -->
                </div><!-- end icon-box -->
            </div><!-- end col-lg-4 -->
            <div class="col-lg-4 responsive-column">
                <div class="icon-box">
                    <div class="info-icon">
                        <span><i class="la la-users"></i></span>
                    </div><!-- end info-icon-->
                    <div class="info-content">
                        <h4 class="info__title">Open your network</h4>
                        <p class="info__desc">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam odio
                        </p>
                    </div><!-- end info-content -->
                </div><!-- end icon-box -->
            </div><!-- end col-lg-4 -->
            <div class="col-lg-4 responsive-column">
                <div class="icon-box">
                    <div class="info-icon">
                        <span><i class="la la-language"></i></span>
                    </div><!-- end info-icon-->
                    <div class="info-content">
                        <h4 class="info__title line-height-26">Practice your language</h4>
                        <p class="info__desc">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam odio
                        </p>
                    </div><!-- end info-content -->
                </div><!-- end icon-box -->
            </div><!-- end col-lg-4 -->
        </div><!-- end row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="btn-box">
                    @if (strlen($employee)>0)
                        <a href="javascript:;" class="theme-btn" onclick="checkRegister()">Register</a>
                    @else
                        <a href="#" data-toggle="modal" data-target="#signupPopupForm" class="theme-btn">Register
                            Now</a>
                    @endif
                </div>
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end info-area -->
<!-- ================================
    END INFO AREA
================================= -->

<!-- ================================
    START FAQ AREA
================================= -->
<section class="faq-area section--padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading text-center">
                    <h2 class="sec__title">Frequently Asked Questions</h2>
                </div><!-- end section-heading -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
        <div class="row padding-top-40px">
            <div class="col-lg-7">
                <div class="accordion accordion-item" id="accordionExample">
                    @foreach ($feedback as $faq)
                        <div class="card">
                            <div class="card-header" id="faqHeading{{ $faq->id }}">
                                <h2 class="mb-0">
                                    <button class="btn btn-link d-flex align-items-center justify-content-between"
                                        type="button" data-toggle="collapse"
                                        data-target="#faqCollapse{{ $faq->id }}" aria-expanded="false"
                                        aria-controls="faqCollapse{{ $faq->id }}">
                                        <span>{{ $faq->solution }}</span>
                                        <i class="la la-minus"></i>
                                        <i class="la la-plus"></i>
                                    </button>
                                </h2>
                            </div>
                            <div id="faqCollapse{{ $faq->id }}" class="collapse"
                                aria-labelledby="faqHeading{{ $faq->id }}" data-parent="#accordionExample">
                                <div class="card-body">
                                    <p>{{ $faq->answer }}</p>
                                </div>
                            </div>
                        </div><!-- end card -->
                    @endforeach
                </div>
                <div class="accordion-help-text pt-2">
                    <p class="font-size-14 font-weight-regular">Any questions? Just see form from <a
                            href="javascript:;" onclick="see_form_feedback()" class="color-text">Right of your
                            eyes</a> or <a href="{{ route('contact') }}" class="color-text">Contact Us</a></p>
                </div>
            </div><!-- end col-lg-7 -->
            <div class="col-lg-5">
                <div class="faq-forum pl-4">
                    <div class="form-box" id="form_feedback">
                        <form action="{{route('post_feedback')}}" method="POST">
                            @csrf
                            <div class="form-title-wrap">
                                <h3 class="title">Still have question?</h3>
                            </div><!-- form-title-wrap -->
                            <div class="form-content">
                                <div class="contact-form-action">
                                    <div class="input-box">
                                        <label class="label-text">Your Name</label>
                                        <div class="form-group">
                                            <span class="la la-user form-icon"></span>
                                            <input class="form-control" type="text"
                                                value="{{ Auth::guard('customer')->check() ? Auth::guard('customer')->user()->name : old('name') }}"
                                                name="name" placeholder="Your name"
                                                {{ Auth::guard('customer')->check() ? 'readonly' : 'checkLogin = none_login' }}>
                                        </div>
                                    </div>
                                    <div class="input-box">
                                        <label class="label-text">Your Email</label>
                                        <div class="form-group">
                                            <span class="la la-envelope-o form-icon"></span>
                                            <input class="form-control" type="email"
                                                value="{{ Auth::guard('customer')->check() ? Auth::guard('customer')->user()->email : old('email') }}"
                                                name="email" placeholder="Email address"
                                                {{ Auth::guard('customer')->check() ? 'readonly' : 'checkLogin = none_login' }}>
                                        </div>
                                    </div>
                                    <div class="input-box">
                                        <label class="label-text">Message</label>
                                        <div class="form-group">
                                            <span class="la la-pencil form-icon"></span>
                                            <textarea class="message-control form-control" name="message"
                                                placeholder="Write message" @if (!Auth::guard('customer')->check())
                                                    checkLogin = 'none_login'
                                                @endif></textarea>
                                        </div>
                                    </div>
                                    <div class="btn-box">
                                        <button type="button" id="send_feedback_btn" class="theme-btn">Send
                                            Message</button>
                                    </div>
                                </div><!-- end contact-form-action -->
                            </div><!-- end form-content -->
                        </form>
                    </div><!-- end form-box -->
                </div><!-- end faq-forum -->
            </div><!-- end col-lg-4 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end faq-area -->
<!-- ================================
    END FAQ AREA
================================= -->

<!-- ================================
    START CTA AREA
================================= -->
<section class="cta-area subscriber-area section-bg-2 padding-top-60px padding-bottom-60px">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <div class="section-heading">
                    <p class="sec__desc text-white-50 pb-1">Get Updates & More</p>
                    <h2 class="sec__title font-size-30 text-white">Thoughtful thoughts to your inbox</h2>
                </div><!-- end section-heading -->
            </div><!-- end col-lg-7 -->
            <div class="col-lg-5">
                <div class="subscriber-box">
                    <div class="contact-form-action">
                        <form action="#">
                            <div class="input-box">
                                <label class="label-text text-white">Enter email address</label>
                                <div class="form-group mb-0">
                                    <span class="la la-envelope form-icon"></span>
                                    <input class="form-control" type="email" name="email"
                                        placeholder="Email address">
                                    <button class="theme-btn theme-btn-small submit-btn"
                                        type="submit">Subscribe</button>
                                    <span class="font-size-14 pt-1 text-white-50"><i class="la la-lock mr-1"></i>Don't
                                        worry your information is safe with us.</span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div><!-- end section-heading -->
            </div><!-- end col-lg-5 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end cta-area -->
<!-- ================================
    END CTA AREA
================================= -->
@stop
@section('js')
<script>
    function see_form_feedback() {
        $("#form_feedback").effect("shake", {
            direction: "right",
            times: 4,
            distance: 10
        }, 1000);
        $find_form = $('#form_feedback').css('border', '1px solid green');
    }
    $('#send_feedback_btn').on('click', function() {
        var checkLogin = $('.form-control').attr('checkLogin');
        console.log(checkLogin);
        if (checkLogin == 'none_login') {
            Swal.fire('Please login to send feedback');
            $('#send_feedback_btn').attr('type', 'button');
        } else if (!checkLogin) {
            $('#send_feedback_btn').attr('type', 'submit');
        }
    })
</script>
<script>
    var add_success = "{{ Session::has('add_success') ? Session::get('add_success') : '' }}";
    var edit_success = "{{ Session::has('edit_success') ? Session::get('edit_success') : '' }}";
    var delete_success = "{{ Session::has('delete_success') ? Session::get('delete_success') : '' }}";
    var error = "{{ Session::has('error') ? Session::get('error') : '' }}";
    var warning = "{{ Session::has('warning') ? Session::get('warning') : '' }}";
    if (add_success != '') {
        Swal.fire(
            'Send feedback Successfully',
            add_success,
            'success'
        )
    } else if (edit_success != '') {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
        Toast.fire({
            icon: 'success',
            title: edit_success
        })
    } else if (delete_success != '') {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
        Toast.fire({
            icon: 'success',
            title: delete_success
        })
    } else if (warning != '') {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
        Toast.fire({
            icon: 'warning',
            title: warning
        })
    } else if (error != '') {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
        Toast.fire({
            icon: 'error',
            title: error
        })
    }
</script>
@endsection
