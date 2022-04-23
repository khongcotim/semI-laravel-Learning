@extends('customer.master.master_three')
@section('main_dasboard')
@section('title','My Booking Detail')
@section('booking','active')
<section class="dashboard-area">
    <div class="dashboard-content-wrap">
        <div class="dashboard-bread dashboard--bread">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="breadcrumb-content">
                            <div class="section-heading">
                                <h2 class="sec__title font-size-30 text-white">Order</h2>
                            </div>
                        </div><!-- end breadcrumb-content -->
                    </div><!-- end col-lg-6 -->
                    <div class="col-lg-6">
                        <div class="breadcrumb-list text-right">
                            <ul class="list-items">
                                <li><a href="{{route('my_profile',Auth::guard('customer')->user()->name)}}" class="text-white">Home</a></li>
                                <li><a href="{{route('my-booking')}}" class="text-white">Order</a></li>
                                <li>Order Detail</li>
                            </ul>
                           
                        </div><!-- end breadcrumb-list -->
                    </div><!-- end col-lg-6 -->
                </div><!-- end row -->
            </div>
        </div><!-- end dashboard-bread -->
        <div class="dashboard-main-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-box">
                            <div class="form-title-wrap">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                        <h3 class="title">Order detail</h3>
                                    </div>
                                    @if ($time != '')
                                        @if($order_dt_found->status!=3)
                                            <form action="{{route('update_order',$order_dt_found->id_order)}}" method="post">
                                                @csrf
                                                <input type="hidden" name="status" value="3">
                                                <button type="submit" onclick="return confirm('Are you sure to cancer??')" class="btn" style="background-color: red;color:#fff">Delay</button>
                                            </form>
                                        @endif
                                    @else
                                    @endif
                                </div>
                            </div>
                            <div class="form-content">
                                @if ($time != '')
                                    <ul class="list-items list-items-2 list-items-flush">
                                        <li><span>Tour Code:</span>{{$order_dt_found->tour_code}}</li>
                                        <li><span>Tour:</span>{{$order_dt_found->tour}}</li>
                                        <li><span>Package Duration:</span>{{$time}}</li>
                                        <li><span>Customer Name:</span>{{$order_dt_found->customer_name}}</li>
                                        <li><span>Customer Email:</span>{{$order_dt_found->email}}</li>
                                        <li><span>Customer Phone:</span>{{$order_dt_found->phone}}</li>
                                        <li><span>Customer Address:</span>{{$order_dt_found->customer_address}}</li>
                                        <li><span>Total Adults:</span>{{$order_dt_found->adults}}</li>
                                        <li><span>Total Child:</span>{{$order_dt_found->children}}</li>
                                        <li><span>Total Cost:</span>${{number_format($order_dt_found->total_price)}}</li>
                                        <li><span>Booking Date:</span>{{$order_dt_found->created}}</li>
                                        <li><span>Payment Method:</span>{{$order_dt_found->payment}}</li>
                                    </ul>
                                @else
                                    <h3 class="text-center">Bạn chưa có Đơn hàng nào</h3>
                                @endif
                            </div>
                        </div><!-- end form-box -->
                    </div><!-- end col-lg-12 -->
                </div><!-- end row -->
                <div class="border-top mt-5"></div>
            </div><!-- end container-fluid -->
        </div>
    </div>
</section>
@stop
