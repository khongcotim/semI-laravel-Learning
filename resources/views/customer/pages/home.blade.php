@extends('customer.master.master_one')
@section('main')
@section('title', 'Tour Booking')
@section('home', 'activate')
<!-- ================================
    START INFO AREA
================================= -->
<section class="info-area info-bg padding-top-50px padding-bottom-50px text-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="icon-box">
                    <div class="info-icon">
                        <i class="la la-bullhorn"></i>
                    </div><!-- end info-icon-->
                    <div class="info-content">
                        <h4 class="info__title">You'll never roam alone</h4>
                        <p class="info__desc">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                        </p>
                    </div><!-- end info-content -->
                </div><!-- end icon-box -->
            </div><!-- end col-lg-4 -->
            <div class="col-lg-4">
                <div class="icon-box margin-top-50px">
                    <div class="info-icon">
                        <i class="la la-globe"></i>
                    </div><!-- end info-icon-->
                    <div class="info-content">
                        <h4 class="info__title">A world of choice – anytime, anywhere</h4>
                        <p class="info__desc">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                        </p>
                    </div><!-- end info-content -->
                </div><!-- end icon-box -->
            </div><!-- end col-lg-4 -->
            <div class="col-lg-4">
                <div class="icon-box">
                    <div class="info-icon">
                        <i class="la la-thumbs-up"></i>
                    </div><!-- end info-icon-->
                    <div class="info-content">
                        <h4 class="info__title">Peace of mind, wherever you wander</h4>
                        <p class="info__desc">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                        </p>
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
    START ROUND-TRIP AREA
================================= -->
<section class="round-trip-flight ">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading text-center">
                    <h2 class="sec__title line-height-55">Most Popular Tour Destinations</h2>
                </div><!-- end section-heading -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
        <div class="row padding-top-50px">
            <div class="col-lg-12">
                <div class="flight-filter-tab text-center">
                    <div class="section-tab section-tab-3">
                        <ul class="nav nav-tabs justify-content-center" id="myTab4" role="tablist">
                            @foreach ($category as $value)
                                <li class="nav-item">
                                    <a class="nav-link {{in_array($value->id,$arr)?'active':''}}" id=""
                                        href="{{ route('customer.index', ['slug' => $value->slug]) }}" role="tab"
                                        aria-controls="new-york" aria-selected="false">
                                        {{ $value->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div><!-- end section-tab -->
                </div><!-- end flight-filter-tab -->
                <div class="popular-round-trip-wrap padding-top-40px">
                    <div class="tab-content" id="myTabContent4">
                        <div class="tab-pane fade show active" id="new-york" role="tabpanel"
                            aria-labelledby="new-york-tab">
                            <section class="hotel-area overflow-hidden padding-right-100px padding-left-100px">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-lg-12">
                                        </div><!-- end col-lg-12 -->
                                    </div><!-- end row -->
                                    <div class="row padding-top-50px">
                                        <div class="col-lg-12">
                                            <div class="hotel-card-wrap">
                                                <div class="hotel-card-carousel carousel-action">
                                                    @foreach ($cate_tour as $value)
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
                                                                <span class="rating__text"><?php $check=0 ?>(@foreach($review as $r)  @if(!empty($review[$value->id]))   {{$review[$value->id]}} @break @else <?php $check++ ?> @endif  @endforeach @if($check!=0) 0 @endif Reviews)</span>
                                                            </div>
                                                            <div class="card-price d-flex align-items-center justify-content-between">
                                                                <p>
                                                                    <span class="price__from">From</span>
                                                                    <span class="price__num">${{number_format($value->price)}}</span>
                                                                </p>
                                                                <p>
                                                                    <span class="price__num">{{$value->time}} Day</span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div><!-- end card-item -->
                                                    @endforeach
                                                </div><!-- end hotel-card-carousel -->
                                            </div>
                                        </div><!-- end col-lg-12 -->
                                    </div><!-- end row -->
                                </div><!-- end container-fluid -->
                            </section>
                        </div><!-- end tab-pane -->

                    </div><!-- end tab-content -->
                    <div class="tab-content-info d-flex justify-content-between align-items-center">
                        <p class="font-size-15"><i class="la la-question-circle mr-1"></i>Average round-trip price
                            per person, taxes and fees included.</p>
                        <a href="{{route('tour_shop')}}" class="btn-text font-size-15">Discover More <i class="la la-angle-right"></i></a>
                    </div><!-- end tab-content-info -->
                </div>
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end round-trip-flight -->
<!-- ================================
    END ROUND-TRIP AREA
================================= -->



<!-- ================================
    START DESTINATION AREA
================================= -->
<section class="destination-area section--padding">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <div class="section-heading">
                    <h2 class="sec__title">Top Visited Places</h2>
                    <p class="sec__desc pt-3">Morbi convallis bibendum urna ut viverra Maecenas quis
                </div><!-- end section-heading -->
            </div><!-- end col-lg-8 -->
            <div class="col-lg-4">
                <div class="btn-box btn--box text-right">
                    <a href="{{route('tour_shop')}}" class="theme-btn">Discover More</a>
                </div>
            </div>
        </div><!-- end row -->
        <div class="row padding-top-50px">
            @foreach ($tour as $value)
                <div class="col-lg-4">
                    <div class="card-item destination-card">
                        <div class="card-img">
                            <img src="{{ url('customers/images') }}/{{ $value->image }}" alt="destination-img">
                            <span class="badge">{{ $value->nameCate }}</span>
                        </div>
                        <div class="card-body">
                            <h3 class="card-title"><a href="{{route('tour_detail',$value->slug)}}">{{ $value->name }}</a></h3>
                            <div class="card-rating d-flex align-items-center">
                                <span class="ratings d-flex align-items-center mr-1">
                                    <i class="la la-star"></i>
                                    <i class="la la-star"></i>
                                    <i class="la la-star"></i>
                                    <i class="la la-star-o"></i>
                                    <i class="la la-star-o"></i>
                                </span>
                                <span class="rating__text">({{$review[$value->id]}} Reviews)</span>
                            </div>
                            <div class="card-price d-flex align-items-center justify-content-between">
                                <p class="tour__text">
                                    {{$value->limit}} Tours
                                </p>
                                <p>
                                    <span class="price__from">Price</span>
                                    <span class="price__num">${{ number_format($value->price) }}</span>
                                </p>
                            </div>
                        </div>
                    </div><!-- end card-item -->

                </div><!-- end col-lg-4 -->
            @endforeach
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end destination-area -->
<!-- ================================
    END DESTINATION AREA
================================= -->



<!-- ================================
       START TESTIMONIAL AREA
================================= -->
<section class="testimonial-area section-padding">
    <div class="container">
        <div class="row">
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
                    @foreach ($comment as $value)
                        <div class="testimonial-card">
                            <div class="testi-desc-box">
                                <p class="testi__desc">{{ $value->contents }}.</p>
                            </div>
                            <div class="author-content d-flex align-items-center">
                                <div class="author-img">
                                    <img src="{{ url('customers/images') }}/{{ $value->commentImage }}" alt=""
                                        height="200px" alt="testimonial image">
                                </div>
                                <div class="author-bio">
                                    <h4 class="author__title">{{ $value->commentName }}</h4>
                                    <span class="author__meta">United States</span>
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
                    @endforeach

                </div><!-- end testimonial-carousel -->
            </div><!-- end col-lg-8 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end testimonial-area -->
<!-- ================================
       START TESTIMONIAL AREA
================================= -->

<!-- ================================
    START CTA AREA
================================= -->
<section class="cta-area padding-top-100px padding-bottom-180px text-center">
    <div class="video-bg">
        <video autoplay loop>
            <source src="{{ url('customers') }}/video/video-bg.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading">
                    <h2 class="sec__title text-white line-height-55">Let us show you the world <br> Discover our most
                        popular destinations</h2>
                </div><!-- end section-heading -->
                <div class="btn-box padding-top-35px">
                    <a href="{{route('become')}}" class="theme-btn border-0">Join with us</a>
                </div>
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
    </div><!-- end container -->
    <svg class="cta-svg" viewBox="0 0 500 150" preserveAspectRatio="none">
        <path d="M-31.31,170.22 C164.50,33.05 334.36,-32.06 547.11,196.88 L500.00,150.00 L0.00,150.00 Z"></path>
    </svg>
</section>
<!-- ================================
    END CTA AREA
================================= -->

<!-- ================================
       START BLOG AREA
================================= -->
<section class="blog-area padding-top-30px padding-bottom-90px">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading text-center">
                    <h2 class="sec__title line-height-55">Latest News & Articles <br> You Might Like</h2>
                </div><!-- end section-heading -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
        <div class="row padding-top-50px">
            @foreach ($blog as $value)
                <div class="col-lg-4 responsive-column">
                    <div class="card-item blog-card">
                        <div class="card-img">
                            <img src="{{ url('admin/images') }}/{{ $value->image }}" alt="blog-img" height="400px">
                            <div class="card-body">
                                <h3 class="card-title line-height-26"><a
                                        href="{{ route('blogs.show', $value->slug) }}">{{ $value->title }}</a></h3>
                                <p class="card-meta">
                                    <span
                                        class="post__date">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $value->created_at)->format('d F Y') }}</span>
                                    <span class="post-dot"></span>
                                    <span class="post__time">{{ number_format(strlen($value->contents) / 240) }}
                                        Mins read</span>
                                </p>
                            </div>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <div class="author-content d-flex align-items-center">
                                @if ($value->admin_avt != null)
                                    <div class="author-img">
                                        <img src="{{ url('admin/images') }}/{{ $value->admin_avt }}"
                                            alt="admin avatar">
                                    </div>
                                @endif
                                @if ($value->customer_avt != null)
                                    <div class="author-img">
                                        <img src="{{ url('customers/images') }}/{{ $value->customer_avt }}"
                                            alt="testimonial image">
                                    </div>
                                @endif
                                @if ($value->customer_name)
                                    <div class="author-bio">
                                        <a href="#" class="author__title">{{ $value->customer_name }}</a>
                                    </div>
                                @endif
                                @if ($value->admin_name)
                                    <div class="author-bio">
                                        <a href="#" class="author__title">{{ $value->admin_name }}</a>
                                    </div>
                                @endif

                            </div>
                            <div class="post-share">
                                <ul>
                                    <li>
                                        <i class="la la-share icon-element"></i>
                                        <ul class="post-share-dropdown d-flex align-items-center">
                                            <li><a href="#"><i class="lab la-facebook-f"></i></a></li>
                                            <li><a href="#"><i class="lab la-twitter"></i></a></li>
                                            <li><a href="#"><i class="lab la-instagram"></i></a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div><!-- end card-item -->
                </div><!-- end col-lg-4 -->
            @endforeach

        </div><!-- end row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="btn-box text-center pt-4">
                    <a href="{{ route('blogs.index') }}" class="theme-btn">Read More Post</a>
                </div>
            </div>
        </div>
    </div><!-- end container -->
</section><!-- end blog-area -->
<!-- ================================
       START BLOG AREA
================================= -->

<!-- ================================
    START MOBILE AREA
================================= -->
<section class="mobile-app padding-top-100px padding-bottom-50px ">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="mobile-app-content">
                    <div class="section-heading">
                        <h2 class="sec__title line-height-55">TLS Android and IOS App is Available!</h2>
                    </div><!-- end section-heading -->
                    <ul class="info-list padding-top-30px">
                        <li class="d-flex align-items-center mb-3"><span
                                class="la la-check icon-element flex-shrink-0 ml-0"></span> Access and change your
                            itinerary on-the-go</li>
                        <li class="d-flex align-items-center mb-3"><span
                                class="la la-check icon-element flex-shrink-0 ml-0"></span> Free cancellation on
                            select hotels</li>
                        <li class="d-flex align-items-center mb-3"><span
                                class="la la-check icon-element flex-shrink-0 ml-0"></span> Get real-time trip updates
                        </li>
                    </ul>
                    <div class="btn-box padding-top-30px">
                        <a href="#" class="d-inline-block mr-3">
                            <img src="{{ url('customers') }}/images/app-store.png" alt="">
                        </a>
                        <a href="#" class="d-inline-block">
                            <img src="{{ url('customers') }}/images/google-play.png" alt="">
                        </a>
                    </div><!-- end btn-box -->
                </div>
            </div><!-- end col-lg-6 -->
            <div class="col-lg-6">
                <div class="mobile-img">
                    <img src="{{ url('customers') }}/images/mobile-app.png" alt="mobile-img">
                </div>
            </div><!-- end col-lg-5 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end mobile-app -->
<!-- ================================
    END MOBILE AREA
================================= -->

<!-- ================================
       START CLIENTLOGO AREA
================================= -->
<section class="clientlogo-area padding-top-80px padding-bottom-80px text-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="client-logo">
                    <div class="client-logo-item">
                        <img src="{{ url('customers') }}/images/client-logo.png" alt="brand image">
                    </div><!-- end client-logo-item -->
                    <div class="client-logo-item">
                        <img src="{{ url('customers') }}/images/client-logo2.png" alt="brand image">
                    </div><!-- end client-logo-item -->
                    <div class="client-logo-item">
                        <img src="{{ url('customers') }}/images/client-logo3.png" alt="brand image">
                    </div><!-- end client-logo-item -->
                    <div class="client-logo-item">
                        <img src="{{ url('customers') }}/images/client-logo4.png" alt="brand image">
                    </div><!-- end client-logo-item -->
                    <div class="client-logo-item">
                        <img src="{{ url('customers') }}/images/client-logo5.png" alt="brand image">
                    </div><!-- end client-logo-item -->
                    <div class="client-logo-item">
                        <img src="{{ url('customers') }}/images/client-logo6.png" alt="brand image">
                    </div><!-- end client-logo-item -->
                </div><!-- end client-logo -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end clientlogo-area -->
<!-- ================================
       START CLIENTLOGO AREA
================================= -->

@stop
