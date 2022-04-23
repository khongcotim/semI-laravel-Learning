@extends('admin.master.master')
@section('main')
@section('dashboard','active')
@section('title','Admin')
    <div class="dashboard-content-wrap">
        <div class="dashboard-bread dashboard--bread dashboard-bread-2">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="breadcrumb-content">
                            <div class="section-heading">
                                <h2 class="sec__title font-size-30 text-white">Reviews</h2>
                            </div>
                        </div><!-- end breadcrumb-content -->
                    </div><!-- end col-lg-6 -->
                    <div class="col-lg-6">
                        <div class="breadcrumb-list text-right">
                            <ul class="list-items">
                                <li><a href="{{route('admin.home')}}" class="text-white">Home</a></li>
                                <li>Dashboard</li>
                                <li>Reviews</li>
                            </ul>
                        </div><!-- end breadcrumb-list -->
                    </div><!-- end col-lg-6 -->
                </div><!-- end row -->
            </div>
        </div><!-- end dashboard-bread -->
        <div class="dashboard-main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-box">
                            <div class="form-title-wrap">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                        <h3 class="title">Review Lists</h3>
                                        <p class="font-size-14">Showing 1 to 4 of 20 entries</p>
                                    </div>
                                    <div class="select-contain">
                                        <select class="select-contain-select">
                                            <option value="1">Any Time</option>
                                            <option value="2">Latest</option>
                                            <option value="3">Oldest</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-content">
                                <div class="comments-list">
                                    @foreach ($comment as $cmt)
                                        <div class="comment mb-0 pb-0 border-bottom-0">
                                            <div class="comment-avatar">
                                                <img class="avatar__img" alt="" src="{{ url('customers') }}/images/{{ $cmt->avatar }}">
                                            </div>
                                            <div class="comment-body">
                                                <div class="meta-data">
                                                    <h3 class="comment__author">{{$cmt->tour_name}}</h3>
                                                    <div class="meta-data-inner d-flex">
                                                        <p class="comment__meta mr-1">By <a href="#">{{$cmt->customer_name}}</a></p>
                                                        <span class="ratings d-flex align-items-center mr-1">
                                                            @if ($cmt->star < 0)<i class="lar la-star"></i>@elseif($cmt->star>0&&$cmt->star<=0.5)<i class="las la-star-half"></i>@elseif($cmt->star>0.5)<i class="la la-star"></i>@endif
                                                            @if ($cmt->star < 1)<i class="lar la-star"></i>@elseif($cmt->star>1&&$cmt->star<=1.5)<i class="las la-star-half"></i>@elseif($cmt->star>1.5)<i class="la la-star"></i>@endif
                                                            @if ($cmt->star < 2)<i class="lar la-star"></i>@elseif($cmt->star>2&&$cmt->star<=2.5)<i class="las la-star-half"></i>@elseif($cmt->star>2.5)<i class="la la-star"></i>@endif
                                                            @if ($cmt->star < 3)<i class="lar la-star"></i>@elseif($cmt->star>3&&$cmt->star<=3.5)<i class="las la-star-half"></i>@elseif($cmt->star>3.5)<i class="la la-star"></i>@endif
                                                            @if ($cmt->star < 4)<i class="lar la-star"></i>@elseif($cmt->star>4&&$cmt->star<=4.5)<i class="las la-star-half"></i>@elseif($cmt->star>4.5)<i class="la la-star"></i>@endif
                                                        </span>
                                                        <p class="comment__date"> {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $cmt->created_at)->format('d F Y') }}</p>
                                                    </div>
                                                </div>
                                                <p class="comment-content">
                                                    {{$cmt->contents}}
                                                </p>
                                            </div>
                                        </div><!-- end comments -->
                                    @endforeach
                                </div><!-- end comments-list -->
                            </div>
                        </div><!-- end form-box -->
                    </div><!-- end col-lg-12 -->
                </div><!-- end row -->
                <div class="row">
                    <div class="col-lg-12">
                        {{$comment->links()}}
                    </div>
                </div>
            </div><!-- end container-fluid -->
        </div><!-- end dashboard-main-content -->
    </div><!-- end dashboard-content-wrap -->
@stop
