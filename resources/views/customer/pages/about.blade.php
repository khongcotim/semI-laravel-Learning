@extends('customer.master.master_two')
@section('main')
@section('title','About')
@section('about','activate')
<!-- ================================
    START BREADCRUMB AREA
================================= -->
@if ($about_blog!=null)
    <section class="breadcrumb-area bread-bg-9" style="background-image: url('{{url('admin/images')}}/{{$about_blog->image}}')">
        <div class="breadcrumb-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb-content">
                            <div class="section-heading">
                                <h2 class="sec__title line-height-50 text-white">TLS is Your Trusted <br> Travel Companion.</h2>
                            </div>
                        </div><!-- end breadcrumb-content -->
                    </div><!-- end col-lg-12 -->
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end breadcrumb-wrap -->
        <div class="bread-svg-box">
            <svg class="bread-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 10" preserveAspectRatio="none"><polygon points="100 0 50 10 0 0 0 10 100 10"></polygon></svg>
        </div><!-- end bread-svg -->
    </section><!-- end breadcrumb-area -->
@else
    <section class="breadcrumb-area bread-bg-9">
        <div class="breadcrumb-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb-content">
                            <div class="section-heading">
                                <h2 class="sec__title line-height-50 text-white">About Us</h2>
                            </div>
                        </div><!-- end breadcrumb-content -->
                    </div><!-- end col-lg-12 -->
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end breadcrumb-wrap -->
        <div class="bread-svg-box">
            <svg class="bread-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 10" preserveAspectRatio="none"><polygon points="100 0 50 10 0 0 0 10 100 10"></polygon></svg>
        </div><!-- end bread-svg -->
    </section><!-- end breadcrumb-area -->
@endif
<!-- ================================
    END BREADCRUMB AREA
================================= -->

<!-- ================================
    START INFO AREA
================================= -->
<section class="info-area padding-top-100px padding-bottom-70px">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 responsive-column">
                <div class="card-item" data-toggle="tooltip" data-placement="top" title="hello word">
                    <div class="card-img">
                        <img src="{{url('customers')}}/images/img21.jpg" alt="about-img">
                    </div>
                    <div class="card-body">
                        <h3 class="card-title mb-2">Who We Are?</h3>
                        <p class="card-text">
                            Duis cursus lectus sed dui imperdiet, id pharetra nunc ullamcorper donec luctus.
                        </p>
                    </div>
                </div><!-- end card-item -->
            </div><!-- end col-lg-4 -->
            <div class="col-lg-4 responsive-column">
                <div class="card-item ">
                    <div class="card-img">
                        <img src="{{url('customers')}}/images/img22.jpg" alt="about-img">
                    </div>
                    <div class="card-body">
                        <h3 class="card-title mb-2">What We Do?</h3>
                        <p class="card-text">
                            Duis cursus lectus sed dui imperdiet, id pharetra nunc ullamcorper donec luctus.
                        </p>
                    </div>
                </div><!-- end card-item -->
            </div><!-- end col-lg-4 -->
            <div class="col-lg-4 responsive-column">
                <div class="card-item ">
                    <div class="card-img">
                        <img src="{{url('customers')}}/images/img23.jpg" alt="about-img">
                    </div>
                    <div class="card-body">
                        <h3 class="card-title mb-2">Our Mission</h3>
                        <p class="card-text">
                            Duis cursus lectus sed dui imperdiet, id pharetra nunc ullamcorper donec luctus.
                        </p>
                    </div>
                </div><!-- end card-item -->
            </div><!-- end col-lg-4 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end info-area -->
<!-- ================================
    END INFO AREA
================================= -->

<!-- ================================
    START ABOUT AREA
================================= -->
<section class="about-area padding-bottom-90px overflow-hidden">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="section-heading margin-bottom-40px">
                    <h2 class="sec__title">About Us</h2>
                    <h4 class="title font-size-16 line-height-26 pt-4 pb-2">Since 2021, TLS has been revolutionising the travel industry. Metasearch for travel? No one was doing it. Until we did.</h4>
                    <p class="sec__desc font-size-16 pb-3">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>
                    <p class="sec__desc font-size-16 pb-3">Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy.</p>
                    <p class="sec__desc font-size-16">Vivamus a mauris vel nunc tristique volutpat. Aenean eu faucibus enim. Aenean blandit arcu lectus, in cursus elit porttitor non. Curabitur risus eros, </p>
                </div><!-- end section-heading -->
            </div><!-- end col-lg-6 -->
            <div class="col-lg-5 ml-auto">
                <div class="image-box about-img-box">
                    <img src="{{url('customers')}}/images/img24.jpg" alt="about-img" class="img__item img__item-1">
                    <img src="{{url('customers')}}/images/img25.jpg" alt="about-img" class="img__item img__item-2">
                </div>
            </div><!-- end col-lg-5 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end about-area -->
<!-- ================================
    END ABOUT AREA
================================= -->

<!-- ================================
    STAR FUNFACT AREA
================================= -->
<section class="funfact-area padding-bottom-70px">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading text-center">
                    <h2 class="sec__title">Our Numbers Say Everything</h2>
                </div><!-- end section-heading -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
        <div class="counter-box counter-box-2 margin-top-60px mb-0">
            <div class="row">
                <div class="col-lg-3 responsive-column">
                    <div class="counter-item counter-item-layout-2 d-flex">
                        <div class="counter-icon flex-shrink-0">
                            <i class="la la-users"></i>
                        </div>
                        <div class="counter-content">
                            <div>
                                <span class="counter" data-from="0" data-to="200"  data-refresh-interval="5">0</span>
                                <span class="count-symbol">+</span>
                            </div>
                            <p class="counter__title">Partners</p>
                        </div><!-- end counter-content -->
                    </div><!-- end counter-item -->
                </div><!-- end col-lg-3 -->
                <div class="col-lg-3 responsive-column">
                    <div class="counter-item counter-item-layout-2 d-flex">
                        <div class="counter-icon flex-shrink-0">
                            <i class="la la-building"></i>
                        </div>
                        <div class="counter-content">
                            <div>
                                <span class="counter" data-from="0" data-to="3"  data-refresh-interval="5">0</span>
                                <span class="count-symbol">k</span>
                            </div>
                            <p class="counter__title">Properties</p>
                        </div><!-- end counter-content -->
                    </div><!-- end counter-item -->
                </div><!-- end col-lg-3 -->
                <div class="col-lg-3 responsive-column">
                    <div class="counter-item counter-item-layout-2 d-flex">
                        <div class="counter-icon flex-shrink-0">
                            <i class="la la-globe"></i>
                        </div>
                        <div class="counter-content">
                            <div>
                                <span class="counter" data-from="0" data-to="400"  data-refresh-interval="5">0</span>
                                <span class="count-symbol">+</span>
                            </div>
                            <p class="counter__title">Destinations</p>
                        </div><!-- end counter-content -->
                    </div><!-- end counter-item -->
                </div><!-- end col-lg-3 -->
                <div class="col-lg-3 responsive-column">
                    <div class="counter-item counter-item-layout-2 d-flex">
                        <div class="counter-icon flex-shrink-0">
                            <i class="la la-check-circle"></i>
                        </div>
                        <div class="counter-content">
                            <div>
                                <span class="counter" data-from="0" data-to="40"  data-refresh-interval="5">0</span>
                                <span class="count-symbol">k</span>
                            </div>
                            <p class="counter__title">Booking</p>
                        </div><!-- end counter-content -->
                    </div><!-- end counter-item -->
                </div><!-- end col-lg-3 -->
            </div><!-- end row -->
        </div><!-- end counter-box -->
    </div><!-- end container -->
</section>
<!-- ================================
    END FUNFACT AREA
================================= -->

<!-- ================================
       START TESTIMONIAL AREA
================================= -->
<section class="testimonial-area section-bg section-padding">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-4">
                <div class="section-heading">
                    <h2 class="sec__title line-height-50">What our customers are saying us?</h2>
                    <p class="sec__desc padding-top-30px">
                        Morbi convallis bibendum urna ut viverra. Maecenas quis consequat libero
                    </p>
                </div><!-- end section-heading -->
            </div><!-- end col-lg-4 -->
            <div class="col-lg-8">
                <div class="testimonial-carousel carousel-action">
                    <div class="testimonial-card">
                        <div class="testi-desc-box">
                            <p class="testi__desc">Tour của các bạn đi rất tốt an toàn, giá cả hợp lý và có thể đặt mọi lúc mọi nơi mỗi khi tôi cần. Tôi rất yêu thích trang này 😍</p>
                        </div>
                        <div class="author-content d-flex align-items-center">
                            <div class="author-img">
                                <img src="{{url('customers')}}/images/team8.jpg" alt="testimonial image">
                            </div>
                            <div class="author-bio">
                                <h4 class="author__title">Phạm Văn Thành</h4>
                                <span class="author__meta">Việt Nam</span>
                                <span class="ratings d-flex align-items-center">
                                    <i class="la la-star"></i>
                                    <i class="la la-star"></i>
                                    <i class="la la-star"></i>
                                    <i class="la la-star"></i>
                                    <i class="la la-star"></i>
                                </span>
                            </div>
                        </div>
                    </div><!-- end testimonial-card -->
                    <div class="testimonial-card">
                        <div class="testi-desc-box">
                            <p class="testi__desc">Từ khi đi tour của các bạn, tôi đã có thêm bạn gái mới. Cuộc sống của tôi trở nên thêm thú vị và mặn mà hơn. Cám ơn các bạn rất nhiều !!!</p>
                        </div>
                        <div class="author-content d-flex align-items-center">
                            <div class="author-img">
                                <img src="{{url('customers')}}/images/team9.jpg" alt="testimonial image">
                            </div>
                            <div class="author-bio">
                                <h4 class="author__title">Đoàn Khánh Toàn</h4>
                                <span class="author__meta">Canada</span>
                                <span class="ratings d-flex align-items-center">
                                    <i class="la la-star"></i>
                                    <i class="la la-star"></i>
                                    <i class="la la-star"></i>
                                    <i class="la la-star"></i>
                                    <i class="la la-star"></i>
                                </span>
                            </div>
                        </div>
                    </div><!-- end testimonial-card -->
                    <div class="testimonial-card">
                        <div class="testi-desc-box">
                            <p class="testi__desc">Đây là trang đặt tour mà chúng tôi thấy tin tưởng nhất, dịch vụ nhanh, an toàn, bảo mật. Nhân viên nhiệt tình, tận tuỵ. Mong rằng mình sẽ phát triển hơn</p>
                        </div>
                        <div class="author-content d-flex align-items-center">
                            <div class="author-img">
                                <img src="{{url('customers')}}/images/team10.jpg" alt="testimonial image">
                            </div>
                            <div class="author-bio">
                                <h4 class="author__title">Phạm Ngọc Linh</h4>
                                <span class="author__meta">Việt Nam</span>
                                <span class="ratings d-flex align-items-center">
                                    <i class="la la-star"></i>
                                    <i class="la la-star"></i>
                                    <i class="la la-star"></i>
                                    <i class="la la-star"></i>
                                    <i class="la la-star"></i>
                                </span>
                            </div>
                        </div>
                    </div><!-- end testimonial-card -->
                    <div class="testimonial-card">
                        <div class="testi-desc-box">
                            <p class="testi__desc">Life is very simple. Why do you keep making it difficult? I like this site very much because it is quite simple and harmonious. From Khaby Lame with love</p>
                        </div>
                        <div class="author-content d-flex align-items-center">
                            <div class="author-img">
                                <img src="{{url('customers')}}/images/khaby_lamp.jpeg" alt="testimonial image">
                            </div>
                            <div class="author-bio">
                                <h4 class="author__title">Khabi Lame</h4>
                                <span class="author__meta">Italy</span>
                                <span class="ratings d-flex align-items-center">
                                    <i class="la la-star"></i>
                                    <i class="la la-star"></i>
                                    <i class="la la-star"></i>
                                    <i class="la la-star"></i>
                                    <i class="la la-star"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-card">
                        <div class="testi-desc-box">
                            <p class="testi__desc">Có ai muốn đi du lịch với ta không. Book luôn trên đây nhé. Lên thiên đàng lên thiên đàng lên thiên đàng nè :)))</p>
                        </div>
                        <div class="author-content d-flex align-items-center">
                            <div class="author-img">
                                <img src="{{url('customers')}}/images/chuatroi.jpg" alt="testimonial image">
                            </div>
                            <div class="author-bio">
                                <h4 class="author__title">Chúa trời</h4>
                                <span class="author__meta">Thiên đàng</span>
                                <span class="ratings d-flex align-items-center">
                                    <i class="la la-star"></i>
                                    <i class="la la-star"></i>
                                    <i class="la la-star"></i>
                                    <i class="la la-star"></i>
                                    <i class="la la-star"></i>
                                </span>
                            </div>
                        </div>
                    </div><!-- end testimonial-card -->
                </div><!-- end testimonial-carousel -->
            </div><!-- end col-lg-8 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end testimonial-area -->
<!-- ================================
       START TESTIMONIAL AREA
================================= -->

<!-- ================================
    START INFO AREA
================================= -->
<section class="info-area padding-top-100px padding-bottom-60px text-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading">
                    <h2 class="sec__title">Our Dedicated Team</h2>
                </div><!-- end section-heading -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
        <div class="row padding-top-100px">
            <div class="col-lg-4 responsive-column">
                <div class="card-item team-card">
                    <div class="card-img">
                        <img src="{{url('customers')}}/images/tien.jpg" alt="team-img">
                    </div>
                    <div class="card-body">
                        <h3 class="card-title">Bùi Công Tiến</h3>
                        <p class="card-meta">Leader</p>
                        <p class="card-text font-size-15 pt-2">Chúng tôi luôn mang lại cho bạn những trải nghiệm tốt nhất từ dịch vụ của mình !!</p>
                        <ul class="social-profile padding-top-20px pb-2">
                            <li><a href="https://www.facebook.com/khongcotim/" target="_blank"><i class="lab la-facebook-f"></i></a></li>
                            <li><a href="#"><i class="lab la-twitter"></i></a></li>
                            <li><a href="#"><i class="lab la-instagram"></i></a></li>
                            <li><a href="#"><i class="lab la-linkedin-in"></i></a></li>
                        </ul>
                    </div>
                </div><!-- end card-item -->
            </div><!-- end col-lg-4 -->
            <div class="col-lg-4 responsive-column">
                <div class="card-item team-card">
                    <div class="card-img">
                        <img src="{{url('customers')}}/images/son.jpg" alt="team-img">
                    </div>
                    <div class="card-body">
                        <h3 class="card-title">Lê Phùng Sơn</h3>
                        <p class="card-meta">Chiến Binh IT</p>
                        <p class="card-text font-size-15 pt-2">Code là điều tuyệt vời giúp tôi nổi tiếng và tán được nhiều gái hơn </p>
                        <ul class="social-profile padding-top-20px pb-2">
                            <li><a href="https://www.facebook.com/lpson1920" target="_blank"><i class="lab la-facebook-f"></i></a></li>
                            <li><a href="#"><i class="lab la-twitter"></i></a></li>
                            <li><a href="#"><i class="lab la-instagram"></i></a></li>
                            <li><a href="#"><i class="lab la-linkedin-in"></i></a></li>
                        </ul>
                    </div>
                </div><!-- end card-item -->
            </div><!-- end col-lg-4 -->
            <div class="col-lg-4 responsive-column">
                <div class="card-item team-card">
                    <div class="card-img">
                        <img src="https://scontent.fhph2-1.fna.fbcdn.net/v/t1.6435-1/p200x200/212613873_1475334366161130_6130993314056573063_n.jpg?_nc_cat=109&ccb=1-5&_nc_sid=7206a8&_nc_ohc=FHnKnlCy-kYAX990hb5&tn=cjPy_yJYDjz8e9Pc&_nc_ht=scontent.fhph2-1.fna&oh=73253914582fc6c01d24012a0834a4d8&oe=618411F1" alt="team-img">
                    </div>
                    <div class="card-body">
                        <h3 class="card-title">Lê Đức Lương</h3>
                        <p class="card-meta">Chiến Binh IT</p>
                        <p class="card-text font-size-15 pt-2">Code giúp chúng ta tiến hoá gần hơn với loài người và thời đại 4.0</p>
                        <ul class="social-profile padding-top-20px pb-2">
                            <li><a href="https://www.facebook.com/ld.luong1806" target="_blank"><i class="lab la-facebook-f"></i></a></li>
                            <li><a href="#"><i class="lab la-twitter"></i></a></li>
                            <li><a href="#"><i class="lab la-instagram"></i></a></li>
                            <li><a href="#"><i class="lab la-linkedin-in"></i></a></li>
                        </ul>
                    </div>
                </div><!-- end card-item -->
            </div><!-- end col-lg-4 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end info-area -->
<!-- ================================
    END INFO AREA
================================= -->

<!-- ================================
    START CTA AREA
================================= -->
<section class="cta-area cta-bg-2 bg-fixed section-padding text-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading">
                    <h2 class="sec__title mb-3 text-white">Interested in a career <br> at TLS.</h2>
                    <p class="sec__desc text-white">We’re always looking for talented individuals and
                        <br> people who are hungry to do great work.
                    </p>
                </div><!-- end section-heading -->
                <div class="btn-box padding-top-35px">
                    <a href="#" class="theme-btn border-0">Join Our Team</a>
                </div>
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end cta-area -->
<!-- ================================
    END CTA AREA
================================= -->

@stop
