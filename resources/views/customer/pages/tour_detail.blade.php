@extends('customer.master.master_two')
@section('main')
@section('title')
    {{ $tour->name }}
@endsection
@section('tour', 'activate')

<!-- ================================
    START BREADCRUMB TOP BAR
================================= -->
<section class="breadcrumb-top-bar">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-list breadcrumb-top-list">
                    <ul class="list-items bg-transparent radius-none p-0">
                        <li><a href="{{ route('admin.home') }}">Home</a></li>
                        <li>{{ $tour->to }}</li>
                        <li>{{ $tour->name }}</li>
                    </ul>
                </div><!-- end breadcrumb-list -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end breadcrumb-top-bar -->
<!-- ================================
    END BREADCRUMB TOP BAR
================================= -->

<!-- ================================
    START BREADCRUMB AREA
================================= -->

<section class="breadcrumb-area bread-bg-2 py-0"
    style="background-image: url('{{ url('customers/images') }}/{{ $tour->image }}')">
    <div class="breadcrumb-wrap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-btn">
                        <div class="btn-box">
                            <a class="theme-btn" data-src="{{ url('customers') }}/images/{{ $tour->image }}"
                                data-fancybox="gallery" data-caption="Showing image - 01" data-speed="700">
                                <i class="la la-photo mr-2"></i>More Photos
                            </a>
                        </div>
                        @foreach (json_decode($tour->des_photos, true) as $des_pt)
                            <a class="d-none" data-fancybox="gallery"
                                data-src="{{ url('customers') }}/images/{{ $des_pt }}"
                                data-caption="Showing image - 0{{ $loop->index + 2 }}" data-speed="700"></a>
                        @endforeach
                    </div><!-- end breadcrumb-btn -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end breadcrumb-wrap -->
</section><!-- end breadcrumb-area -->
<!-- ================================
    END BREADCRUMB AREA
================================= -->

<!-- ================================
    START TOUR DETAIL AREA
================================= -->
<section class="tour-detail-area padding-bottom-90px">
    <div class="single-content-navbar-wrap menu section-bg" id="single-content-navbar">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="single-content-nav" id="single-content-nav">
                        <ul>
                            <li><a data-scroll="description" href="#description"
                                    class="scroll-link active">Description</a></li>
                            <li><a data-scroll="faq" href="#faq" class="scroll-link">FAQ</a></li>
                            <li><a data-scroll="location-map" href="#location-map" class="scroll-link">Map</a></li>
                            <li><a data-scroll="reviews" href="#reviews" class="scroll-link">Reviews</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- end single-content-navbar-wrap -->
    <div class="single-content-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="single-content-wrap padding-top-60px">
                        <div id="description" class="page-scroll">
                            <div class="single-content-item pb-4">
                                <h3 class="title font-size-26">{{ $tour->name }}</h3>
                                <div class="d-flex flex-wrap align-items-center pt-2">
                                    <p class="mr-2">{{ $tour->from }} - {{ $tour->to }}</p>
                                    <p>
                                        <span
                                            class="badge badge-warning text-white font-size-16">@if (!empty($rating)) {{ $rating }} @else 0 @endif</span>
                                        <span>(@if (!empty($review)) {{ $review }} @else 0 @endif Reviews)</span>
                                    </p>
                                </div>
                            </div><!-- end single-content-item -->
                            <div class="section-block"></div>
                            <div class="single-content-item py-4">
                                <div class="row">

                                    <div class="col-lg-4 responsive-column">
                                        <div class="single-tour-feature d-flex align-items-center mb-3">
                                            <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                                <i class="la la-clock"></i>
                                            </div>
                                            <div class="single-feature-titles">
                                                <h3 class="title font-size-15 font-weight-medium">Time</h3>
                                                <span class="font-size-13">{{ $tour->time }} day</span>
                                            </div>
                                        </div><!-- end single-tour-feature -->
                                    </div><!-- end col-lg-4 -->
                                    <div class="col-lg-4 responsive-column">
                                        <div class="single-tour-feature d-flex align-items-center mb-3">
                                            <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                                <i class="la la-globe"></i>
                                            </div>
                                            <div class="single-feature-titles">
                                                <h3 class="title font-size-15 font-weight-medium">Tour Type</h3>
                                                <span class="font-size-13">Adventures Tour</span>
                                            </div>
                                        </div><!-- end single-tour-feature -->
                                    </div><!-- end col-lg-4 -->

                                </div><!-- end row -->
                            </div><!-- end single-content-item -->
                            <div class="section-block"></div>
                            <div class="single-content-item padding-top-40px padding-bottom-40px">
                                <h3 class="title font-size-20 pb-3">Description</h3>
                                <p class="font-size-15 font-weight-medium pb-3">{!! $tour->description !!}</p>

                                <div class="row">
                                    <div class="col-lg-6 responsive-column">
                                        <h3 class="title font-size-15 font-weight-medium pb-3">Service</h3>
                                        <ul class="list-items">
                                            @foreach ($services as $value)
                                                <li><i class="la la-check text-success mr-2"></i>{{ $value->name }}
                                                </li>
                                            @endforeach

                                        </ul>
                                    </div>
                                    <div class="col-lg-6 responsive-column">
                                        <h3 class="title font-size-15 font-weight-medium pb-3">Vehicle</h3>
                                        <ul class="list-items">
                                            @foreach ($vehicles as $value)
                                                <li><i class="la la-check text-success mr-2"></i>{{ $value->name }}
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div><!-- end row -->
                            </div><!-- end single-content-item -->
                            <div class="section-block"></div>
                        </div><!-- end description -->
                        <div id="photo" class="page-scroll">
                            <div class="single-content-item padding-top-40px padding-bottom-40px">
                                <h3 class="title font-size-20">Photo</h3>
                                <div class="gallery-carousel carousel-action padding-top-30px">
                                    @foreach (json_decode($tour->des_photos) as $photo)
                                        <div class="card-item mb-0">
                                            <div class="card-img">
                                                <img src="{{ url('customers') }}/images/{{ $photo }}"
                                                    alt="Destination-img" style="width:100%">
                                            </div>
                                        </div><!-- end card-item -->
                                    @endforeach

                                </div><!-- end gallery-carousel -->
                            </div><!-- end single-content-item -->
                            <div class="section-block"></div>
                        </div><!-- end photo -->
                        <div id="faq" class="page-scroll">
                            <div class="single-content-item padding-top-40px padding-bottom-40px">
                                <h3 class="title font-size-20">FAQ</h3>
                                <div class="accordion accordion-item padding-top-30px" id="accordionExample2">
                                    @foreach ($QnA as $value)
                                        <div class="card">
                                            <div class="card-header" id="faqHeadingFour">
                                                <h2 class="mb-0">
                                                    <button
                                                        class="btn btn-link d-flex align-items-center justify-content-end flex-row-reverse font-size-16"
                                                        type="button" data-toggle="collapse"
                                                        data-target="#faqCollapse{{ $value->id }}"
                                                        aria-expanded="false"
                                                        aria-controls="faqCollapse{{ $value->id }}">
                                                        <span class="ml-3">{{ $value->solution }}</span>
                                                        <i class="la la-minus"></i>
                                                        <i class="la la-plus"></i>
                                                    </button>
                                                </h2>
                                            </div>
                                            <div id="faqCollapse{{ $value->id }}" class="collapse"
                                                aria-labelledby="faqHeading{{ $value->id }}"
                                                data-parent="#accordionExample2">
                                                <div class="card-body d-flex">
                                                    <p>{{ $value->answer }}</p>
                                                </div>
                                            </div>
                                        </div><!-- end card -->
                                    @endforeach


                                </div>
                            </div><!-- end single-content-item -->
                            <div class="section-block"></div>
                        </div><!-- end faq -->
                        <div id="location-map" class="page-scroll">
                            <div class="single-content-item padding-top-40px padding-bottom-40px">
                                <h3 class="title font-size-20">Location</h3>
                                <div class="gmaps padding-top-30px">
                                    <iframe src="{{ $tour->map }}" allowfullscreen="" aria-hidden="false"
                                        tabindex="0"></iframe>
                                </div>
                            </div><!-- end single-content-item -->
                            <div class="section-block"></div>
                        </div><!-- end location-map -->
                        <div id="reviews" class="page-scroll">
                            <div class="single-content-item padding-top-40px padding-bottom-40px">
                                <h3 class="title font-size-20">Reviews</h3>
                                <div class="review-container padding-top-30px">
                                    <div class="row align-items-center">
                                        <div class="col-lg-4">
                                            <div class="review-summary">
                                                <h2>@if (!empty($rating)) {{ $rating }} @else 0 @endif<span>/5</span></h2>
                                                <p>Excellent</p>
                                                <span>(@if (!empty($review)) {{ $review }} @else 0 @endif Reviews)</span>
                                            </div>
                                        </div><!-- end col-lg-4 -->
                                        <div class="col-lg-8">
                                            <div class="review-bars">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="progress-item">
                                                            <h3 class="progressbar-title">5 Star</h3>
                                                            <div
                                                                class="progressbar-content line-height-20 d-flex align-items-center justify-content-between">
                                                                <div class="progressbar-box flex-shrink-0">
                                                                    <div class="progressbar-line"
                                                                        data-percent="{{ $rates[5] }}%">
                                                                        <div class="progressbar-line-item bar-bg-1"
                                                                            style="width:{{ $rates[5] }}%;"></div>
                                                                    </div> <!-- End Skill Bar -->
                                                                </div>

                                                            </div>
                                                        </div><!-- end progress-item -->
                                                    </div><!-- end col-lg-6 -->
                                                    <div class="col-lg-6">
                                                        <div class="progress-item">
                                                            <h3 class="progressbar-title">4 Star</h3>
                                                            <div
                                                                class="progressbar-content line-height-20 d-flex align-items-center justify-content-between">
                                                                <div class="progressbar-box flex-shrink-0">
                                                                    <div class="progressbar-line"
                                                                        data-percent="{{ $rates[4] }}%">
                                                                        <div class="progressbar-line-item bar-bg-1"
                                                                            style="width:{{ $rates[4] }}%;"></div>
                                                                    </div> <!-- End Skill Bar -->
                                                                </div>

                                                            </div>
                                                        </div><!-- end progress-item -->
                                                    </div><!-- end col-lg-6 -->
                                                    <div class="col-lg-6">
                                                        <div class="progress-item">
                                                            <h3 class="progressbar-title">3 Star</h3>
                                                            <div
                                                                class="progressbar-content line-height-20 d-flex align-items-center justify-content-between">
                                                                <div class="progressbar-box flex-shrink-0">
                                                                    <div class="progressbar-line"
                                                                        data-percent="{{ $rates[3] }}%">
                                                                        <div class="progressbar-line-item bar-bg-1"
                                                                            style="width:{{ $rates[3] }}%;"></div>
                                                                    </div> <!-- End Skill Bar -->
                                                                </div>

                                                            </div>
                                                        </div><!-- end progress-item -->
                                                    </div><!-- end col-lg-6 -->
                                                    <div class="col-lg-6">
                                                        <div class="progress-item">
                                                            <h3 class="progressbar-title">2 Star</h3>
                                                            <div
                                                                class="progressbar-content line-height-20 d-flex align-items-center justify-content-between">
                                                                <div class="progressbar-box flex-shrink-0">
                                                                    <div class="progressbar-line"
                                                                        data-percent="{{ $rates[2] }}%">
                                                                        <div class="progressbar-line-item bar-bg-1"
                                                                            style="width:{{ $rates[2] }}%;"></div>
                                                                    </div> <!-- End Skill Bar -->
                                                                </div>

                                                            </div>
                                                        </div><!-- end progress-item -->
                                                    </div><!-- end col-lg-6 -->
                                                    <div class="col-lg-6">
                                                        <div class="progress-item">
                                                            <h3 class="progressbar-title">1 Star</h3>
                                                            <div
                                                                class="progressbar-content line-height-20 d-flex align-items-center justify-content-between">
                                                                <div class="progressbar-box flex-shrink-0">
                                                                    <div class="progressbar-line"
                                                                        data-percent="{{ $rates[1] }}%">
                                                                        <div class="progressbar-line-item bar-bg-1"
                                                                            style="width:{{ $rates[1] }}%;"></div>
                                                                    </div> <!-- End Skill Bar -->
                                                                </div>

                                                            </div>
                                                        </div><!-- end progress-item -->
                                                    </div><!-- end col-lg-6 -->
                                                </div><!-- end row -->
                                            </div>
                                        </div><!-- end col-lg-8 -->
                                    </div>
                                </div>
                            </div><!-- end single-content-item -->
                            <div class="section-block"></div>
                        </div><!-- end reviews -->

                        <div id='start_comment' class="review-box">
                            <div class="single-content-item padding-top-40px">
                                <h3 class="title font-size-20">Reviews</h3>
                                <div class="comments-list padding-top-50px">
                                    @foreach ($comment as $value)
                                        @if (Auth::guard('customer')->check())
                                            @if ($value->status != 0 || $value->customer_name == Auth::guard('customer')->user()->name)
                                                <div class="comment">
                                                    <div class="comment-avatar">
                                                        <img class="avatar__img" alt=""
                                                            src="{{ url('customers') }}/images/{{ $value->avatar }}">
                                                    </div>
                                                    <div class="comment-body">
                                                        <div class="meta-data">
                                                            <h3 class="comment__author">{{ $value->customer_name }}
                                                            </h3>
                                                            <div class="meta-data-inner d-flex">
                                                                <span class="ratings d-flex align-items-center mr-1">
                                                                    @if ($value->star < 0)<i class="lar la-star"></i>@elseif($value->star>0&&$value->star<=0.5)<i class="las la-star-half"></i>@elseif($value->star>0.5)<i class="la la-star"></i>@endif
                                                                    @if ($value->star < 1)<i class="lar la-star"></i>@elseif($value->star>1&&$value->star<=1.5)<i class="las la-star-half"></i>@elseif($value->star>1.5)<i class="la la-star"></i>@endif
                                                                    @if ($value->star < 2)<i class="lar la-star"></i>@elseif($value->star>2&&$value->star<=2.5)<i class="las la-star-half"></i>@elseif($value->star>2.5)<i class="la la-star"></i>@endif
                                                                    @if ($value->star < 3)<i class="lar la-star"></i>@elseif($value->star>3&&$value->star<=3.5)<i class="las la-star-half"></i>@elseif($value->star>3.5)<i class="la la-star"></i>@endif
                                                                    @if ($value->star < 4)<i class="lar la-star"></i>@elseif($value->star>4&&$value->star<=4.5)<i class="las la-star-half"></i>@elseif($value->star>4.5)<i class="la la-star"></i>@endif
                                                                </span>
                                                                <p class="comment__date">{{ $value->created_at }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <p class="comment-content">
                                                            {!! $value->contents !!}
                                                        </p>
                                                        <div
                                                            class="comment-reply d-flex align-items-center justify-content-between">
                                                            @if ($value->customer_name == Auth::guard('customer')->user()->name && $value->status == 0)
                                                                <a class="theme-btn mr-1">
                                                                    <span
                                                                        class=""></span>This your comment were hide to other people
                                                        </a>
                                                        @else
                                                        <a class="
                                                                        theme-btn" href="#" data-toggle="modal"
                                                                        data-target="#replayPopupForm{{ $value->id }}">
                                                                        <span
                                                                            class="la la-mail-reply mr-1"></span>Reply
                                                                </a>
                                                            @endif
                                                            @if (Auth::guard('customer')->check())
                                                                @if ($value->id_customer == Auth::guard('customer')->user()->id)
                                                                    <form method="post"
                                                                        action="{{ route('comment.destroy', $value->id) }}"
                                                                        class="comment-reply d-flex align-items-center justify-content-betwe">
                                                                        @csrf
                                                                        @method("delete")
                                                                        <input type="hidden" name="Y" runat="server"
                                                                            value="3000" />
                                                                        <button class="theme-btn">
                                                                            <span
                                                                                class="la la-trash mr-1"></span>Delete
                                                                        </button>
                                                                    </form>
                                                                @endif
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div><!-- end comments -->
                                                @foreach ($reply as $rep)
                                                    @if ($rep->reply_to == $value->id)
                                                        <div class="comment comment-reply-item">
                                                            <div class="comment-avatar">
                                                                @if ($rep->admin_id != 0)
                                                                    <img class="avatar__img" alt=""
                                                                        src="{{ url('admin') }}/images/{{ $rep->admin_avatar }}">

                                                                @elseif($rep->customer_id!=0)
                                                                    <img class="avatar__img" alt=""
                                                                        src="{{ url('customers') }}/images/{{ $rep->customer_avatar }}">
                                                                @endif

                                                            </div>
                                                            <div class="comment-body">
                                                                <div class="meta-data">
                                                                    <h3 class="comment__author">
                                                                        @if ($rep->admin_id != 0) {{ $rep->admin_name }}@elseif($rep->customer_id!=0){{ $rep->customer_name }}@endif</h3>
                                                                    <div class="meta-data-inner d-flex">

                                                                        <p class="comment__date">
                                                                            {{ $rep->created_at }}</p>
                                                                    </div>
                                                                </div>
                                                                <p class="comment-content">
                                                                    {!! $rep->contents !!}
                                                                </p>
                                                                @if (Auth::guard('customer')->check())
                                                                    @if ($rep->customer_reply == Auth::guard('customer')->user()->id)
                                                                        <form method="post"
                                                                            action="{{ route('replies.destroy', $rep->id) }}"
                                                                            class="comment-reply d-flex align-items-center justify-content-betwe">
                                                                            @csrf
                                                                            @method("delete")
                                                                            <input type="hidden" name="Y" runat="server"
                                                                                value="3000" />
                                                                            <button class="theme-btn">
                                                                                <span
                                                                                    class="la la-trash mr-1"></span>Delete
                                                                            </button>
                                                                        </form>
                                                                    @endif
                                                                @endif
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endforeach
                                                <div class="modal-popup">
                                                    <div class="modal fade"
                                                        id="replayPopupForm{{ $value->id }}" tabindex="-1"
                                                        role="dialog" style="display: none;" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered"
                                                            role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title title"
                                                                        id="exampleModalLongTitle3">Replay to review
                                                                    </h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true"
                                                                            class="la la-close"></span>
                                                                    </button>
                                                                </div>
                                                                <form method="post"
                                                                    action="{{ route('replies.store') }}">
                                                                    <input type="hidden" name="Y" runat="server"
                                                                        value="3000" />
                                                                    <div class="modal-body">
                                                                        <div class="contact-form-action">

                                                                            @csrf
                                                                            <div class="input-box">
                                                                                <div class="form-group mb-0">
                                                                                    <i
                                                                                        class="la la-pencil form-icon"></i>
                                                                                    <input type="hidden" name="reply_to"
                                                                                        value="{{ $value->id }}">
                                                                                    <input type="hidden" name="type"
                                                                                        value="tour">

                                                                                    <textarea
                                                                                        class="message-control form-control"
                                                                                        name="message"
                                                                                        placeholder="Write message here..."></textarea>
                                                                                </div>
                                                                            </div>

                                                                        </div><!-- end contact-form-action -->
                                                                    </div>
                                                                    <div class="modal-footer border-top-0 pt-0">

                                                                        <button type="submit"
                                                                            class="theme-btn theme-btn-small">Replay</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @else
                                            @if ($value->status != 0)
                                                <div class="comment">
                                                    <div class="comment-avatar">
                                                        <img class="avatar__img" alt=""
                                                            src="{{ url('customers') }}/images/{{ $value->avatar }}">
                                                    </div>
                                                    <div class="comment-body">
                                                        <div class="meta-data">
                                                            <h3 class="comment__author">{{ $value->customer_name }}
                                                            </h3>
                                                            <div class="meta-data-inner d-flex">
                                                                <span class="ratings d-flex align-items-center mr-1">
                                                                    @if ($value->star < 0)<i class="lar la-star"></i>@elseif($value->star>0&&$value->star<=0.5)<i class="las la-star-half"></i>@elseif($value->star>0.5)<i class="la la-star"></i>@endif
                                                                    @if ($value->star < 1)<i class="lar la-star"></i>@elseif($value->star>1&&$value->star<=1.5)<i class="las la-star-half"></i>@elseif($value->star>1.5)<i class="la la-star"></i>@endif
                                                                    @if ($value->star < 2)<i class="lar la-star"></i>@elseif($value->star>2&&$value->star<=2.5)<i class="las la-star-half"></i>@elseif($value->star>2.5)<i class="la la-star"></i>@endif
                                                                    @if ($value->star < 3)<i class="lar la-star"></i>@elseif($value->star>3&&$value->star<=3.5)<i class="las la-star-half"></i>@elseif($value->star>3.5)<i class="la la-star"></i>@endif
                                                                    @if ($value->star < 4)<i class="lar la-star"></i>@elseif($value->star>4&&$value->star<=4.5)<i class="las la-star-half"></i>@elseif($value->star>4.5)<i class="la la-star"></i>@endif
                                                                </span>
                                                                <p class="comment__date">{{ $value->created_at }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <p class="comment-content">
                                                            {!! $value->contents !!}
                                                        </p>
                                                        <div
                                                            class="comment-reply d-flex align-items-center justify-content-between">

                                                            <a class="theme-btn" href="#" data-toggle="modal"
                                                                data-target="#replayPopupForm{{ $value->id }}">
                                                                <span class="la la-mail-reply mr-1"></span>Reply
                                                            </a>


                                                        </div>
                                                    </div>
                                                </div><!-- end comments -->
                                                @foreach ($reply as $rep)
                                                    @if ($rep->reply_to == $value->id)
                                                        <div class="comment comment-reply-item">
                                                            <div class="comment-avatar">
                                                                @if ($rep->admin_id != 0)
                                                                    <img class="avatar__img" alt=""
                                                                        src="{{ url('admin') }}/images/{{ $rep->admin_avatar }}">

                                                                @elseif($rep->customer_id!=0)
                                                                    <img class="avatar__img" alt=""
                                                                        src="{{ url('customers') }}/images/{{ $rep->customer_avatar }}">
                                                                @endif

                                                            </div>
                                                            <div class="comment-body">
                                                                <div class="meta-data">
                                                                    <h3 class="comment__author">
                                                                        @if ($rep->admin_id != 0) {{ $rep->admin_name }}@elseif($rep->customer_id!=0){{ $rep->customer_name }}@endif</h3>
                                                                    <div class="meta-data-inner d-flex">

                                                                        <p class="comment__date">
                                                                            {{ $rep->created_at }}</p>
                                                                    </div>
                                                                </div>
                                                                <p class="comment-content">
                                                                    {!! $rep->contents !!}
                                                                </p>

                                                            </div>
                                                        </div>
                                                    @endif
                                                @endforeach
                                                <div class="modal-popup">
                                                    <div class="modal fade"
                                                        id="replayPopupForm{{ $value->id }}" tabindex="-1"
                                                        role="dialog" style="display: none;" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered"
                                                            role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title title"
                                                                        id="exampleModalLongTitle3">Replay to review
                                                                    </h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true"
                                                                            class="la la-close"></span>
                                                                    </button>
                                                                </div>
                                                                <form method="post"
                                                                    action="{{ route('replies.store') }}">
                                                                    <input id="Y" type="hidden" name="Y" runat="server"
                                                                        value="" />
                                                                    <div class="modal-body">
                                                                        <div class="contact-form-action">

                                                                            @csrf
                                                                            <div class="input-box">
                                                                                <div class="form-group mb-0">
                                                                                    <i
                                                                                        class="la la-pencil form-icon"></i>
                                                                                    <input type="hidden" name="reply_to"
                                                                                        value="{{ $value->id }}">
                                                                                    <input type="hidden" name="type"
                                                                                        value="tour">

                                                                                    <textarea
                                                                                        class="message-control form-control"
                                                                                        name="message"
                                                                                        placeholder="Write message here..."></textarea>
                                                                                </div>
                                                                            </div>

                                                                        </div><!-- end contact-form-action -->
                                                                    </div>
                                                                    <div class="modal-footer border-top-0 pt-0">

                                                                        <button type="submit"
                                                                            class="theme-btn theme-btn-small">Replay</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endif
                                    @endforeach
                                    @if (count($comment) < count($all_comment))
                                        <form action="{{ route('tour_detail', $tour->slug) }}" method="GET">
                                            @csrf
                                            <input id="load_more_scroll" type="hidden" name="Y" runat="server"
                                                value="4000" />
                                            <input type="hidden" name="total_comment_now" class="form-control"
                                                value="{{ count($comment) }}">

                                            <div class="btn-box">
                                                <button type="submit" class="theme-btn mb-2">Load more comment</button>
                                            </div>
                                        </form>


                                    @endif
                                    <div class="form-box">
                                        <div class="form-title-wrap">
                                            <h3 class="title">Write a Review</h3>
                                        </div><!-- form-title-wrap -->
                                        <div class="form-content">
                                            <form action="{{ route('comment.store') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="Y" runat="server" value='3000'>
                                                <div class="rate-option p-2">
                                                    <div class="row">
                                                        @if ($check_rated != null)
                                                            <div class="col-lg-4 responsive-column">
                                                                <div class="rate-option-item">
                                                                    <label>Your Rate</label>
                                                                    <div id="rateYo"></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 responsive-column">
                                                                <div class="rate-option-item">
                                                                    <label>Rate</label>
                                                                    <div class="rate-stars-option">
                                                                        <input type="checkbox" id="lst1"
                                                                            name="review_rate" value="5">
                                                                        <label for="lst1"></label>
                                                                        <input type="checkbox" id="lst2"
                                                                            name="review_rate" value="4">
                                                                        <label for="lst2"></label>
                                                                        <input type="checkbox" id="lst3"
                                                                            name="review_rate" value="3">
                                                                        <label for="lst3"></label>
                                                                        <input type="checkbox" id="lst4"
                                                                            name="review_rate" value="2">
                                                                        <label for="lst4"></label>
                                                                        <input type="checkbox" id="lst5"
                                                                            name="review_rate" value="1">
                                                                        <label for="lst5"></label>
                                                                    </div>
                                                                </div>
                                                            </div><!-- col-lg-4 -->
                                                        @else
                                                            <div class="col-lg-4 responsive-column">
                                                                <div class="rate-option-item">
                                                                    <label>Rate</label>
                                                                    <div class="rate-stars-option">
                                                                        <input type="checkbox" id="lst1"
                                                                            name="review_rate" value="5">
                                                                        <label for="lst1"></label>
                                                                        <input type="checkbox" id="lst2"
                                                                            name="review_rate" value="4">
                                                                        <label for="lst2"></label>
                                                                        <input type="checkbox" id="lst3"
                                                                            name="review_rate" value="3">
                                                                        <label for="lst3"></label>
                                                                        <input type="checkbox" id="lst4"
                                                                            name="review_rate" value="2">
                                                                        <label for="lst4"></label>
                                                                        <input type="checkbox" id="lst5"
                                                                            name="review_rate" value="1">
                                                                        <label for="lst5"></label>
                                                                    </div>
                                                                </div>
                                                            </div><!-- col-lg-4 -->
                                                        @endif
                                                    </div><!-- end row -->
                                                </div><!-- end rate-option -->
                                                <div class="contact-form-action">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="input-box">
                                                                <label class="label-text">Message</label>
                                                                <div class="form-group">
                                                                    <span class="la la-pencil form-icon"></span>
                                                                    <input type="hidden" name="tour"
                                                                        value="{{ $tour->id }}">
                                                                    <textarea class="message-control form-control"
                                                                        name="message"
                                                                        placeholder="Write message"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="btn-box">
                                                                <button type="submit" class="theme-btn">Leave a
                                                                    Review</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- end contact-form-action -->
                                            </form>
                                        </div><!-- end form-content -->
                                    </div><!-- end form-box -->

                                </div><!-- end comments-list -->

                            </div><!-- end single-content-item -->
                        </div><!-- end review-box -->
                    </div><!-- end single-content-wrap -->
                </div><!-- end col-lg-8 -->
                <div class="col-lg-4">
                    <div class="sidebar single-content-sidebar mb-0">
                        <div class="sidebar-widget single-content-widget">
                            <form action="{{ route('booking.index', $tour->id) }}" method="GET">
                                @csrf
                                <div class="sidebar-widget-item">
                                    <div class="sidebar-book-title-wrap mb-3">
                                        <h3>Booking Now</h3>
                                        <p><span class="text-form">From</span><span
                                                class="text-value ml-2 mr-1">{{ number_format($tour->price) }}$</span></p>
                                    </div>
                                </div><!-- end sidebar-widget-item -->
                                <div class="sidebar-widget-item">
                                    <div class="qty-box mb-2 d-flex align-items-center justify-content-between">
                                        <label class="font-size-16">Adults <span>Age 18+</span></label>
                                        <div class="qtyBtn d-flex align-items-center">
                                            <div class="qtyDec"><i class="la la-minus"></i></div>
                                            <input type="text" name="adult" value="0">
                                            <div class="qtyInc"><i class="la la-plus"></i></div>
                                        </div>
                                    </div><!-- end qty-box -->
                                    @if ($errors->has('adult'))
                                        <small style="color: gray">{{ $errors->first('adult') }}</small>
                                    @endif
                                    <div class="qty-box mb-2 d-flex align-items-center justify-content-between">
                                        <label class="font-size-16">Children <span>2-12 years old</span></label>
                                        <div class="qtyBtn d-flex align-items-center">
                                            <div class="qtyDec"><i class="la la-minus"></i></div>
                                            <input type="text" name="children" value="0">
                                            <div class="qtyInc"><i class="la la-plus"></i></div>
                                        </div>
                                    </div><!-- end qty-box -->
                                    @if ($errors->has('children'))
                                        <small style="color: gray">{{ $errors->first('children') }}</small>
                                    @endif
                                    <div class="qty-box mb-2 d-flex align-items-center justify-content-between">
                                        <label class="font-size-16">Infants <span>0-2 years old</span></label>
                                        <div class="qtyBtn d-flex align-items-center">
                                            <div class="qtyDec"><i class="la la-minus"></i></div>
                                            <input type="text" name="infant" value="0">
                                            <div class="qtyInc"><i class="la la-plus"></i></div>
                                        </div>
                                    </div><!-- end qty-box -->
                                    @if ($errors->has('infant'))
                                        <small style="color: gray">{{ $errors->first('infant') }}</small>
                                    @endif
                                    <input type="hidden" name="tour" value="{{ $tour->id }}">
                                    @if ($tour->ordered < $tour->limit)
                                        <button type="submit" class="theme-btn text-center w-100 mb-2"><i
                                                class="la la-shopping-cart mr-2 font-size-18"></i>Book Now</button>
                                    @else
                                        <a class="theme-btn text-center w-100 mb-2"><i
                                                class="la la-shopping-cart mr-2 font-size-18"></i>Tour is out of
                                            limit</a>
                                    @endif
                                </div><!-- end sidebar-widget-item -->
                            </form>
                            <div class="btn-box pt-2">


                                <?php $fCheck = 0; ?>
                                @foreach ($favorite as $favor)
                                    @if ($favor->id_tour == $tour->id)
                                        <form action="{{ route('favorite.destroy', $tour->id) }}" method="post"
                                            class="theme-btn text-center w-100 theme-btn-transparent">
                                            @method("DELETE")
                                            @csrf
                                            <button type="submit" style="background: none;border: none;">
                                                <i class="la la-heart-o mr-2"></i>Add to Wishlist
                                            </button>
                                        </form>
                                        <?php $fCheck = 1; ?>
                                    @endif
                                @endforeach
                                @if ($fCheck == 0)
                                    <form action="{{ route('favorite.store') }}" method="post"
                                        class="theme-btn text-center w-100 theme-btn-transparent">
                                        @method("POST")
                                        @csrf

                                        <input type="hidden" name="id" class="form-control"
                                            value="{{ $tour->id }}">

                                        <button type="submit" style="background: none;border: none;">
                                            <i class="la la-heart-o mr-2"></i>Unfavorite
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </div><!-- end sidebar-widget -->
                        <div class="sidebar-widget single-content-widget">
                            <h3 class="title stroke-shape">Have any question??</h3>
                            <div class="enquiry-forum">
                                <div class="form-box">
                                    <form action="{{ route('post_feedback') }}" method="POST">
                                        @csrf
                                        <div class="form-content">
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
                                                            <textarea class="message-control form-control"
                                                                id="check_messsage" name="message"
                                                                placeholder="Write message" @if (!Auth::guard('customer')->check())
                                                                    checkLogin = 'none_login'
                                                                @endif></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="btn-box">
                                                        <button type="button" id="send_feedback_btn"
                                                            class="theme-btn">Send
                                                            Message</button>
                                                    </div>
                                                </div><!-- end contact-form-action -->
                                            </div><!-- end form-content -->
                                        </div><!-- end form-content -->
                                    </form>
                                </div><!-- end form-box -->
                            </div><!-- end enquiry-forum -->
                        </div><!-- end sidebar-widget -->
                        <div class="sidebar-widget single-content-widget">
                            <h3 class="title stroke-shape">Why Book With Us?</h3>
                            <div class="sidebar-list">
                                <ul class="list-items">
                                    <li><i class="la la-dollar icon-element mr-2"></i>No-hassle best price guarantee
                                    </li>
                                    <li><i class="la la-microphone icon-element mr-2"></i>Customer care available 24/7
                                    </li>
                                    <li><i class="la la-thumbs-up icon-element mr-2"></i>Hand-picked Tours & Activities
                                    </li>
                                    <li><i class="la la-file-text icon-element mr-2"></i>Free Travel Insureance</li>
                                </ul>
                            </div><!-- end sidebar-list -->
                        </div><!-- end sidebar-widget -->
                        <div class="sidebar-widget single-content-widget">
                            <h3 class="title stroke-shape">Get a Question?</h3>
                            <p class="font-size-14 line-height-24">Do not hesitate to give us a call. We are an expert
                                team and we are happy to talk to you.</p>
                            <div class="sidebar-list pt-3">
                                <ul class="list-items">
                                    <li><i class="la la-phone icon-element mr-2"></i><a href="#">+ 61 23 8093 3400</a>
                                    </li>
                                    <li><i class="la la-envelope icon-element mr-2"></i><a
                                            href="mailto:tls.team.project@gmail.com">tls.team.project@gmail.com</a></li>
                                </ul>
                            </div><!-- end sidebar-list -->
                        </div><!-- end sidebar-widget -->
                    </div><!-- end sidebar -->
                </div><!-- end col-lg-4 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end single-content-box -->
</section><!-- end tour-detail-area -->
<!-- ================================
    END TOUR DETAIL AREA
================================= -->

<div class="section-block"></div>

<!-- ================================
    START RELATE TOUR AREA
================================= -->
<section class="related-tour-area section--padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading text-center">
                    <h2 class="sec__title">You might also like</h2>
                </div><!-- end section-heading -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
        <div class="row padding-top-50px">
            @foreach ($sub_tour as $value)
                <div class="col-lg-4 responsive-column">
                    <div class="card-item trending-card">
                        <div class="card-img">
                            <a href="{{ route('tour_detail', $value->slug) }}" class="d-block">
                                <img src="{{ url('customers') }}/images/{{ $value->image }}"
                                    alt="{{ $value->image }}">
                            </a>
                        </div>
                        <div class="card-body">
                            <h3 class="card-title"><a href="{{ $value->slug }}">{{ $value->name }}</a></h3>
                            <p class="card-meta">{{ $value->to }}</p>
                            <div class="card-rating">
                                <span class="badge text-white"><?php $check = 0; ?>@foreach ($sub_rating as $rate)  @if (!empty($sub_rating[$value->id]))  {{ $sub_rating[$value->id] }} @break @else <?php $check++; ?> @endif @endforeach @if ($check != 0) 0 @endif /5</span>
                                <span class="review__text">Average</span>
                                <span class="rating__text"><?php $check = 0; ?>(@foreach ($sub_review as $r)  @if (!empty($sub_review[$value->id]))   {{ $sub_review[$value->id] }} @break @else <?php $check++; ?> @endif  @endforeach @if ($check != 0) 0 @endif
                                    Reviews)</span>
                            </div>
                            <div class="card-price d-flex align-items-center justify-content-between">
                                <p>
                                    <span class="price__num">${{ number_format($value->price) }}</span>
                                </p>
                                <a href="{{ route('tour_detail', $value->slug) }}" class="btn-text">View
                                    details<i class="la la-angle-right"></i></a>
                            </div>
                        </div>
                    </div><!-- end card-item -->
                </div><!-- end col-lg-4 -->
            @endforeach
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end related-tour-area -->
<!-- ================================
    END RELATE TOUR AREA
================================= -->

<!-- ================================
    START CTA AREA
================================= -->
<section class="cta-area subscriber-area section-bg-2 padding-top-60px padding-bottom-60px">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <div class="section-heading">
                    <h2 class="sec__title font-size-30 text-white">Subscribe to see Secret Deals</h2>
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
<script type="text/javascript">
    function setScrollPosition() {

        @if (!empty($scroll)) document.getElementById('start_comment').scrollIntoView() @endif;

    }
    window.onload = setScrollPosition();
</script>
@stop
@section('js')
<script src="{{ url('admin') }}/js/copy-text-script.js"></script>
<script src="{{ url('admin') }}/js/navbar-sticky.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
<script>
    $('#send_feedback_btn').on('click', function() {
        var checkLogin = $('#check_messsage').attr('checkLogin');
        if (checkLogin == 'none_login') {
            Swal.fire('Please login to send feedback');
            $('#send_feedback_btn').attr('type', 'button');
        } else if (!checkLogin) {
            if ($('#check_messsage').val() == '') {
                console.log(1);
                $('#check_messsage').css('border', '1px solid red');
                $('#send_feedback_btn').attr('type', 'button');
            }
        }
        $('#check_messsage').on('change', function() {
            var checkLengthMess = $('#check_messsage').val();
            if (checkLengthMess != '') {
                $('#check_messsage').css('border', '1px solid green');
                $('#send_feedback_btn').attr('type', 'submit');
            }
        })
    })
</script>
<script>
    var rating_star = "{{$check_rated!=null?number_format($check_rated->rating_star):0}}"
    $(function() {
        $("#rateYo").rateYo({
            rating: rating_star,
            readOnly: true,
            starWidth: "18px"
        });
    });
</script>
@endsection
