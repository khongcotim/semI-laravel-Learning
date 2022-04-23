@extends('admin.master.master')
@section('title')
    {{ $tour->name }}
@endsection
@section('main')
@section('tour', 'active')

<section class="breadcrumb-area bread-bg-2 py-0" style="height: 500px;background-image:url({{url('customers/images')}}/{{$tour->image}})">
    <div class="breadcrumb-wrap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-btn">
                        <div class="btn-box">
                        </div>
                    </div><!-- end breadcrumb-btn -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end breadcrumb-wrap -->
</section><!-- end breadcrumb-area -->
<section class="tour-detail-area padding-bottom-90px">
    <div class="single-content-navbar-wrap menu section-bg" id="single-content-navbar">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="single-content-nav" id="single-content-nav">
                        <ul>
                            <li><a data-scroll="description" href="#description"
                                    class="scroll-link active">Description</a></li>

                            <li><a data-scroll="photo" href="#photo" class="scroll-link">Photo</a></li>

                            <li><a data-scroll="location-map" href="#location-map" class="scroll-link">Map</a></li>
                            <li><a data-scroll="reviews" href="#reviews" class="scroll-link">Reviews</a></li>
                            @if (Auth::user()->role == 'admin' || Auth::user()->role == 'manager')
                                <li>
                                    <form action="{{ route('tour.update_status', $tour->id) }}" method="POST">
                                        @csrf
                                        <select style="height: 35px" class="theme-btn"
                                            onchange="this.form.submit()" name="status">
                                            @if ($tour->status == 0)<option value="0" selected>Hide</option>@else<option value="0" >Hide</option>@endif
                                            @if ($tour->status == 1)<option value="1" selected>Show</option>@else<option value="1" >Show</option>@endif
                                        </select>
                                    </form>
                                </li>
                            @else
                                <li>
                                    @if ($tour->status == 1)<a title="Tour Status" style="color: green">Show</a>@else<a title="Tour Status" style="color: gray">Hide</a>@endif
                                </li>
                            @endif
                        </ul>
                        @if (Auth::user()->role == 'admin' || Auth::user()->role == 'manager')
                            <div class="btn-box load-more text-center">
                                <div class="theme-btn">
                                    <a class="theme-btn theme-btn-small theme-btn-transparent"
                                        href="{{ route('tour.edit', $tour->id) }}">Edit this tour</a>
                                </div>
                                <form class="theme-btn" action="{{ route('tour.destroy', $tour->id) }}"
                                    method="post">
                                    @method("DELETE")
                                    @csrf
                                    <button class="theme-btn theme-btn-small theme-btn-transparent" type="submit">Delete
                                        this tour</button>
                                </form>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div><!-- end single-content-navbar-wrap -->
    <div class="single-content-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
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
                            <div class="section-block"></div>
                            <div class="single-content-item padding-top-40px padding-bottom-40px">
                                <h3 class="title font-size-20">Description</h3>
                                {!! $tour->description !!}
                            </div><!-- end single-content-item -->
                            <div class="section-block"></div>
                        </div><!-- end description -->

                        <div class="section-block"></div>

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
                        <div class="review-box">
                            <div class="single-content-item padding-top-40px">
                                <h3 class="title font-size-20">Reviews</h3>
                                <div class="comments-list padding-top-50px">
                                    @foreach ($comment as $value)
                                        <div class="comment">
                                            <div class="comment-avatar">
                                                <img class="avatar__img" alt="{{ $value->avatar }}"
                                                    src="{{ url('customers') }}/images/{{ $value->avatar }}">
                                            </div>
                                            <div class="comment-body">
                                                <div class="meta-data">
                                                    <h3 class="comment__author">{{ $value->customer_name }}</h3>
                                                    <div class="meta-data-inner d-flex">
                                                        <span class="ratings d-flex align-items-center mr-1">
                                                            @if ($value->star < 0)<i class="lar la-star"></i>@elseif($value->star>0&&$value->star<=0.5)<i class="las la-star-half"></i>@elseif($value->star>0.5)<i class="la la-star"></i>@endif
                                                            @if ($value->star < 1)<i class="lar la-star"></i>@elseif($value->star>1&&$value->star<=1.5)<i class="las la-star-half"></i>@elseif($value->star>1.5)<i class="la la-star"></i>@endif
                                                            @if ($value->star < 2)<i class="lar la-star"></i>@elseif($value->star>2&&$value->star<=2.5)<i class="las la-star-half"></i>@elseif($value->star>2.5)<i class="la la-star"></i>@endif
                                                            @if ($value->star < 3)<i class="lar la-star"></i>@elseif($value->star>3&&$value->star<=3.5)<i class="las la-star-half"></i>@elseif($value->star>3.5)<i class="la la-star"></i>@endif
                                                            @if ($value->star < 4)<i class="lar la-star"></i>@elseif($value->star>4&&$value->star<=4.5)<i class="las la-star-half"></i>@elseif($value->star>4.5)<i class="la la-star"></i>@endif
                                                        </span>
                                                        <p class="comment__date">{{ $value->created_at }}</p>
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
                                                    @if (Auth::user()->role == 'admin' || Auth::user()->role == 'manager')
                                                        <form action="{{ route('comments.update', $value->id) }}"
                                                            method="post">
                                                            @method("PUT")
                                                            @csrf
                                                            <select style="height: 35px" class="theme-btn"
                                                                onchange="this.form.submit()" name="comment_status">
                                                                @if ($value->status == 0)<option value="0" selected>Hide</option>@else<option value="0" >Hide</option>@endif
                                                                @if ($value->status == 1)<option value="1" selected>Show</option>@else<option value="1" >Show</option>@endif
                                                            </select>
                                                        </form>
                                                        @if ($value->id == Auth::user()->id)
                                                            <a class="theme-btn" href="#" data-toggle="modal"
                                                                data-target="#replayPopupForm{{ $value->id }}">
                                                                Delete
                                                            </a>
                                                        @endif

                                                    @else
                                                    @endif


                                                </div>
                                            </div>
                                        </div><!-- end comments -->
                                        @foreach ($reply as $rep)
                                        @if($rep->reply_to==$value->id)
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
                                                        <h3 class="comment__author">@if ($rep->admin_id != 0) {{ $rep->admin_name }}@elseif($rep->customer_id!=0){{ $rep->customer_name }}@endif</h3>
                                                        <div class="meta-data-inner d-flex">
                                                            <p class="comment__date">{{ $rep->created_at }}</p>
                                                        </div>
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            @if ($rep->who_eccept != 0)
                                                                @foreach ($admin as $ad)
                                                                    @if ($rep->who_eccept == $ad->id)
                                                                        <small>
                                                                            Accepted by
                                                                        </small>
                                                                        <p class="ml-3" style="color: green">
                                                                            {{ $ad->name }}</p>
                                                                    @endif
                                                                @endforeach
                                                            @else
                                                                <form action="{{ route('reply.update', $rep->id) }}"
                                                                    method="post">
                                                                    @method("PUT")
                                                                    @csrf
                                                                    <button class="theme-btn" type="submit">
                                                                        Accept
                                                                    </button>
                                                                </form>

                                                            @endif
                                                            <div class='m-2'></div>
                                                            @if ($rep->admin_id == Auth::user()->id)
                                                                <form action="{{ route('reply.destroy', $rep->id) }}"
                                                                    method="post">
                                                                    @method("DELETE")
                                                                    @csrf
                                                                    <button class="theme-btn" type="submit">
                                                                        Delete
                                                                    </button>
                                                                </form>
                                                            @endif
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
                                            <div class="modal fade" id="replayPopupForm{{ $value->id }}"
                                                tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title title" id="exampleModalLongTitle3">
                                                                Replay to review</h5>
                                                            <button type="button" class="close"
                                                                data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true" class="la la-close"></span>
                                                            </button>
                                                        </div>
                                                        <form method="post" action="{{ route('reply.store') }}">
                                                            <div class="modal-body">
                                                                <div class="contact-form-action">
                                                                    @csrf
                                                                    <input type="hidden" name="type" value="tour">
                                                                    <div class="input-box">
                                                                        <div class="form-group mb-0">
                                                                            <i class="la la-pencil form-icon"></i>
                                                                            <input type="hidden" name="reply_to"
                                                                                value="{{ $value->id }}">
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
                                    @endforeach


                                </div><!-- end comments-list -->

                            </div><!-- end single-content-item -->
                        </div><!-- end review-box -->

                    </div><!-- end single-content-wrap -->
                </div><!-- end col-lg-8 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end single-content-box -->
</section>
@stop
