@extends('admin.master.master')
@section('main')
@section('order','active')
@section('title', 'Order')
    <div class="dashboard-content-wrap">
        <div class="dashboard-bread dashboard--bread dashboard-bread-2">
            <div class="container-fluid">
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
                                <li><a href="{{route('admin.home')}}" class="text-white">Home</a></li>
                                <li>Dashboard</li>
                                <li>Order</li>
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
                                        <h3 class="title">Order detail</h3>
                                    </div>
                                    <div class="select-contain">
                                        <div class="dropdown bootstrap-select select-contain-select">
                                            <form action="{{route('order.update',$order->order_id)}}" method="POST">
                                                @method('PUT')
                                                @csrf
                                                <select class="select-contain-select" tabindex="-98" onchange="this.form.submit()" name="status">
                                                    @if($order->status==0)   <option value="0" selected > Pending </option>   @else   <option value="0"> Pending </option>    @endif
                                                    @if($order->status==1)   <option value="1" selected> Hole on </option>   @else   <option value="1"> Hole on </option>    @endif
                                                    @if($order->status==2)   <option value="2" selected> Completed </option>   @else   <option value="2"> Completed </option>    @endif
                                                    @if($order->status==3)   <option value="3" selected> Delayed </option>   @else   <option value="3"> Delayed </option>    @endif
                                                </select>
                                            </form>
                                            @if(Session::has('success'))
                                            <div class="alert alert-success">
                                                <strong>{{Session::get('success')}}</strong>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                         
                            <div class="form-content">
                                <ul class="list-items list-items-2 list-items-flush">
                                    
                                    <li><span>Tour Code:</span>{{$order->tour_code}}</li>
                                    <li><span>Tour:</span>{{$order->tour}}</li>
                                    <li><span>Package Duration:</span>{{$time}}</li>
                                    <li><span>Customer Name:</span>{{$order->customer_name}}</li>
                                    <li><span>Customer Email:</span>{{$order->email}}</li>
                                    <li><span>Customer Phone:</span>{{$order->phone}}</li>
                                    <li><span>Customer Address:</span>{{$order->customer_address}}</li>
                                    <li><span>Total Adults:</span>{{$order->adults}}</li>
                                    <li><span>Total Child:</span>{{$order->children}}</li>
                                    <li><span>Total Cost:</span>${{number_format($order->total_price)}}</li>
                                    <li><span>Booking Date:</span>{{$order->created}}</li>
                                    <li><span>Payment Method:</span>{{$order->payment}}</li>
                                </ul>
                                <div class="btn-box mt-4">
                                    <a href="#" class="theme-btn theme-btn-small" data-toggle="modal" data-target="#modalPopup"><i class="la la-envelope mr-1"></i>Contact Customer</a>
                                </div>
                            </div>
                        </div><!-- end form-box -->
                    </div><!-- end col-lg-12 -->
                </div><!-- end row -->
                <div class="border-top mt-5"></div>
              
            </div><!-- end container-fluid -->
        </div>
    </div>
@stop