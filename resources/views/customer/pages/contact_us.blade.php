@extends('customer.master.master_two')
@section('main')
@section('title','Contact Us')
@section('contact','activate')
    <!-- ================================
    START BREADCRUMB AREA
================================= -->
@if ($contact_banner!=null)
    <section class="breadcrumb-area bread-bg-5" style="background-image: url('{{url('admin/images')}}/{{$contact_banner!=null}}')">
        <div class="breadcrumb-wrap">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="breadcrumb-content">
                            <div class="section-heading">
                                <h2 class="sec__title text-white">{{$contact_banner->title}}</h2>
                            </div>
                        </div><!-- end breadcrumb-content -->
                    </div><!-- end col-lg-6 -->
                    <div class="col-lg-6">
                        <div class="breadcrumb-list text-right">
                            <ul class="list-items">
                                <li><a href="{{route('customer.index')}}">Home</a></li>
                                <li>Pages</li>
                                <li>Contact us</li>
                            </ul>
                        </div><!-- end breadcrumb-list -->
                    </div><!-- end col-lg-6 -->
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end breadcrumb-wrap -->
        <div class="bread-svg-box">
            <svg class="bread-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 10" preserveAspectRatio="none">
                <polygon points="100 0 50 10 0 0 0 10 100 10"></polygon>
            </svg>
        </div><!-- end bread-svg -->
    </section><!-- end breadcrumb-area -->
@else
    <section class="breadcrumb-area bread-bg-5">
            <div class="breadcrumb-wrap">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="breadcrumb-content">
                                <div class="section-heading">
                                    <h2 class="sec__title text-white">Contact Us</h2>
                                </div>
                            </div><!-- end breadcrumb-content -->
                        </div><!-- end col-lg-6 -->
                        <div class="col-lg-6">
                            <div class="breadcrumb-list text-right">
                                <ul class="list-items">
                                    <li><a href="{{route('customer.index')}}">Home</a></li>
                                    <li>Pages</li>
                                    <li>Contact us</li>
                                </ul>
                            </div><!-- end breadcrumb-list -->
                        </div><!-- end col-lg-6 -->
                    </div><!-- end row -->
                </div><!-- end container -->
            </div><!-- end breadcrumb-wrap -->
            <div class="bread-svg-box">
                <svg class="bread-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 10" preserveAspectRatio="none">
                    <polygon points="100 0 50 10 0 0 0 10 100 10"></polygon>
                </svg>
            </div><!-- end bread-svg -->
    </section><!-- end breadcrumb-area -->
@endif
    <!-- ================================
    END BREADCRUMB AREA
================================= -->



    <!-- ================================
    START CONTACT AREA
================================= -->
    <section class="contact-area section--padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="form-box">
                        <div class="form-title-wrap">
                            <h3 class="title">We'd love to hear from you</h3>
                            <p class="font-size-15">Send us a message and we'll respond as soon as possible</p>
                        </div><!-- form-title-wrap -->
                        <div class="form-content ">
                            <div class="contact-form-action">
                                <form class="row messenger-box-form" method="post">
                                    <div class="alert alert-success messenger-box-contact__msg col-lg-12"
                                        style="display: none" role="alert">
                                        Thank You! Your message has been sent.
                                    </div>
                                    <div class="col-lg-6 responsive-column">
                                        <div class="input-box messenger-box-input-wrap">
                                            <label class="label-text" for="name">Your Name</label>
                                            <div class="form-group">
                                                <span class="la la-user form-icon"></span>
                                                <input class="form-control" type="text" id="name" name="name"
                                                    placeholder="Your name" required>
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-6 -->
                                    <div class="col-lg-6 responsive-column">
                                        <div class="input-box messenger-box-input-wrap">
                                            <label class="label-text" for="email">Your Email</label>
                                            <div class="form-group">
                                                <span class="la la-envelope-o form-icon"></span>
                                                <input class="form-control" type="email" name="email" id="email"
                                                    placeholder="Email address" required>
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-6 -->
                                    <div class="col-lg-12">
                                        <div class="input-box messenger-box-input-wrap">
                                            <label class="label-text" for="message">Message</label>
                                            <div class="form-group">
                                                <span class="la la-pencil form-icon"></span>
                                                <textarea class="message-control form-control" name="message"
                                                    id="message" placeholder="Write message" required></textarea>
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-12 -->
                                    <div class="col-lg-12">
                                        <div class="btn-box messenger-box-input-wrap">
                                            <button name="submit" type="submit" class="theme-btn send-message-btn"
                                                id="send-message-btn">Send Message</button>
                                        </div>
                                    </div><!-- end col-lg-12 -->
                                </form>
                            </div><!-- end contact-form-action -->
                        </div><!-- end form-content -->
                    </div><!-- end form-box -->
                </div><!-- end col-lg-8 -->
                <div class="col-lg-4">
                    <div class="form-box">
                        <div class="form-title-wrap">
                            <h3 class="title">Contact Us</h3>
                        </div><!-- form-title-wrap -->
                        <div class="form-content">
                            <div class="address-book">
                                <ul class="list-items contact-address">
                                    <li>
                                        <i class="la la-map-marker icon-element"></i>
                                        <h5 class="title font-size-16 pb-1">Address</h5>
                                        <p class="map__desc">
                                            Hà Nội, Việt Nam
                                        </p>
                                    </li>
                                    <li>
                                        <i class="la la-phone icon-element"></i>
                                        <h5 class="title font-size-16 pb-1">Phone</h5>
                                        <p class="map__desc">Telephone: (123) 123456</p>
                                        <p class="map__desc">Mobile: 666 777 888</p>
                                    </li>
                                    <li>
                                        <i class="la la-envelope-o icon-element"></i>
                                        <h5 class="title font-size-16 pb-1">Email</h5>
                                        <p class="map__desc">tls.team.project@gmail.com</p>
                                    </li>
                                </ul>
                                <ul class="social-profile text-center">
                                    <li><a href="#"><i class="lab la-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="lab la-twitter"></i></a></li>
                                    <li><a href="#"><i class="lab la-instagram"></i></a></li>
                                    <li><a href="#"><i class="lab la-linkedin-in"></i></a></li>
                                    <li><a href="#"><i class="lab la-youtube"></i></a></li>
                                </ul>
                            </div>
                        </div><!-- end form-content -->
                    </div><!-- end form-box -->
                </div><!-- end col-lg-4 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end contact-area -->
    <!-- ================================
    END CONTACT AREA
================================= -->

    <!-- ================================
    START MAP AREA
================================= -->
    <section class="map-area padding-bottom-100px">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="map-container">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.6574756110535!2d105.7812622148208!3d21.04638699255247!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab3b4220c2bd%3A0x1c9e359e2a4f618c!2sB%C3%A1ch%20Khoa%20Aptech!5e0!3m2!1svi!2s!4v1633631242454!5m2!1svi!2s" width="100%" height="700" style="border:0;" allowfullscreen loading="lazy"></iframe>
                    </div><!-- end map-container -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end map-area -->
    <!-- ================================
    END MAP AREA
================================= -->
@stop