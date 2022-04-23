@extends('admin.master.master')
@section('main')
@section('payment', 'active')
@section('title', 'Manage Payments')
<div class="dashboard-content-wrap">
    <div class="dashboard-bread dashboard--bread dashboard-bread-2">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="breadcrumb-content">
                        <div class="section-heading">
                            <h2 class="sec__title font-size-30 text-white">Payment</h2>
                        </div>
                    </div><!-- end breadcrumb-content -->
                </div><!-- end col-lg-6 -->
                <div class="col-lg-6">
                    <div class="breadcrumb-list text-right">
                        <ul class="list-items">
                            <li><a href="{{ route('admin.home') }}" class="text-white">Home</a></li>
                            <li>Dashboard</li>
                            <li>Payment</li>
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
                            <h3 class="title">Payment Lists</h3>
                            <p class="font-size-14">Showing {{$payment->firstItem()}} {{$payment->count()!=1 ? "to".' '.$payment->count():""}} of {{$payment->total()}} results</p>
                        </div>
                        <div class="form-content">
                            <div class="table-form table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Ordered</th>
                                            <th scope="col">Amount</th>
                                            <th scope="col">Payment Tape</th>
                                            <th scope="col">Payment Date</th>
                                            <th scope="col">Who Received</th>
                                            <th scope="col">Received Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($payment as $val)
                                            <tr>
                                                <th scope="row">{{ $loop->index + 1 }}</th>
                                                <td>{{ $val->cus_name }}</td>
                                                <td>${{ number_format($val->amount) }}</td>
                                                <td>{{ $val->method }}</td>
                                                <td>{{ $val->created_at }}</td>
                                                <td>{{ $val->admin_name}}</td>
                                                @if ($val->who_except != null)
                                                    <td><span class="badge badge-success py-1 px-2">Ok</span></td>
                                                @else
                                                    <td><span
                                                            class="badge badge-warning text-white py-1 px-2">Pending</span>
                                                    </td>
                                                @endif
                                                <td>
                                                    <div class="table-content">
                                                        <a href="{{ route('payment.show', $val->id) }}"
                                                            class="theme-btn theme-btn-small" data-toggle="tooltip"
                                                            data-placement="top" title="View"><i
                                                                class="la la-eye"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div><!-- end form-box -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
            <div class="row">
                <div class="col-lg-12">
                    <nav aria-label="Page navigation example">
                        {{ $payment->appends($_GET) }}
                    </nav>
                </div>
            </div>
            
        </div><!-- end container-fluid -->
    </div><!-- end dashboard-main-content -->
@stop