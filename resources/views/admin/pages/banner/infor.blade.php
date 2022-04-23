@extends('admin.master.master')
@section('main')
@section('banner','active')
@section('manage_banner','active')
@section('title','Review Banner')
<section class="card-area mt-3 mb-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="filter-wrap">
                    <div class="filter-top d-flex align-items-center justify-content-between">
                        <div>
                            <h3 class="title font-size-24">Your banner will look like this</h3>
                        </div>
                    </div><!-- end filter-top -->
                </div><!-- end filter-wrap -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section>
<section class="breadcrumb-area bread-bg" style="height: 100% !important;background-image: url({{url('admin')}}/images/{{$banner_found->image}}) !important;width: 55%;margin-left:20%">
    <div class="breadcrumb-wrap">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="search-result-content">
                        <div class="section-heading">
                            <h2 class="sec__title text-white">{{$banner_found->title}}</h2>
                        </div>
                    </div><!-- end search-result-content -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end breadcrumb-wrap -->
</section><!-- end breadcrumb-area -->


@stop