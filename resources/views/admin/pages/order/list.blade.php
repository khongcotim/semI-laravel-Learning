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
                                        <h3 class="title">Order Lists</h3>
                                    </div>
                                    <div class="select-contain">
                                                <select class="select-contain-select" tabindex="-98" onchange="this.form.submit()" name="filterTime">
                                                    @if($filterTime=='any')   <option value="any" selected > Any Time </option>   @else   <option value="any"> Any Time </option>    @endif
                                                    @if($filterTime=='desc')   <option value="desc" selected > Latest </option>   @else   <option value="desc"> Latest </option>    @endif
                                                    @if($filterTime=='asc')   <option value="asc" selected> Oldest </option>   @else   <option value="asc"> Oldest </option>    @endif
                                                </select>

                                    </div>
                                    <div class="select-contain">

                                                <select class="select-contain-select" tabindex="-98" onchange="this.form.submit()" name="filterPrice">
                                                    @if($filterPrice=='any')   <option value="any" selected > Any Price </option>   @else   <option value="any"> Any Price </option>    @endif
                                                    @if($filterPrice=='asc')   <option value="asc" selected > Price Hight To Low </option>   @else   <option value="asc"> Price Hight To Low </option>    @endif
                                                    @if($filterPrice=='desc')   <option value="desc" selected> Price Low To Hight </option>   @else   <option value="desc"> Price Low To Hight </option>    @endif
                                                </select>

                                    </div>
                                    <div class="select-contain">

                                                <select class="select-contain-select" tabindex="-98" onchange="this.form.submit()" name="filterStatus">
                                                    @if($filterStatus=='4')   <option value="4" selected > All Status </option>   @else   <option value="4"> All Status </option>    @endif
                                                    @if($filterStatus=='0')   <option value="0" selected > Pending </option>   @else   <option value="0"> Pending </option>    @endif
                                                    @if($filterStatus=='1')   <option value="1" selected >  Hole On</option>   @else   <option value="1">Hole On </option>    @endif
                                                    @if($filterStatus=='2')   <option value="2" selected > Completed </option>   @else   <option value="2"> Completed </option>    @endif
                                                    @if($filterStatus=='3')   <option value="3" selected > Delayed </option>   @else   <option value="3"> Delayed </option>    @endif

                                                </select>

                                    </div>
                                    <div class="select-contain">

                                            <select class="select-contain-select" tabindex="-98" onchange="this.form.submit()" name="filterMethod">
                                                    @if($filterMethod=='all')   <option value="all" selected > All Payment Method </option>   @else   <option value="all"> All Payment Method </option>    @endif
                                                @foreach($method as $method)
                                                    @if($filterMethod==$method->name)   <option value="{{$method->method}}" selected > {{$method->method}} </option>   @else   <option value="{{$method->method}}"> {{$method->method}} </option>    @endif
                                                @endforeach
                                            </select>

                                    </div>



                                    @if(Session::has('success'))
                                        <div class="alert alert-success">
                                        <strong>{{Session::get('success')}}</strong>
                                        </div>
                                    @endif

                                </div>

                           <div class="form-content">
                               <div class="table-form table-responsive">
                                   <table class="table">
                                       <thead>
                                       <tr>
                                           <th scope="col">Customer Email</th>
                                           <th scope="col">Customer Name</th>
                                           <th scope="col">Tour Name</th>
                                           <th scope="col">Total Cost</th>
                                           <th scope="col">Payment Method</th>
                                           <th scope="col">Status</th>
                                           <th scope="col">Action</th>
                                       </tr>
                                       </thead>
                                       <tbody>
                                           @foreach($list_order as $value)
                                       <tr>
                                           <th scope="row">{{$value->email}}</th>
                                           <td>
                                               <div class="table-content">
                                                   <h3 class="title">{{$value->customer_name}}</h3>
                                               </div>
                                           </td>
                                           <td>{{$value->tour}}</td>
                                           <td>${{number_format($value->total_price)}}</td>
                                           <td>{{$value->payment}}</td>
                                           <td> @if($value->status==0)  <span class="badge badge-warning text-white py-1 px-2">Pending</span>
                                                @elseif($value->status==1) <span class="badge badge-infor text-white py-1 px-2">Hole On</span>
                                                @elseif($value->status==2) <span class="badge badge-success text-white py-1 px-2">Completed</span>
                                                @elseif($value->status==3) <span class="badge badge-danger text-white py-1 px-2">Delayed</span>
                                                @endif
                                            </td>
                                           <td>
                                               <div class="table-content">
                                                   <a href="{{route('order.show',$value->order_id)}}" class="theme-btn theme-btn-small mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="View details"><i class="la la-eye"></i></a>
                                                   <a href="#" class="theme-btn theme-btn-small" data-toggle="modal" data-target="#modalPopup"><i class="la la-envelope"></i></a>
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
                            <ul class="pagination">
                            {{ $list_order->links('pagination::bootstrap-4') }}
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="border-top mt-5"></div>
            </div><!-- end container-fluid -->
        </div>
    </div>
    </form>
@stop
@section('searchForm')
<form action="{{route('order.index')}}" method="GET">
 @csrf
@endsection

@section('search')
<div class="dashboard-search-box">
    <div class="contact-form-action">
        <?php
            $current_url=strtok(substr(Request::path('adminstrator'),13),'/');

            $admin_url=substr(Request::path('adminstrator'),0);

        ?>
        @if ($current_url == false)

        @else

                <div class="form-group mb-0" >
                    <input class="form-control" type="text" name="search" id="search" placeholder="Search" value="{{$search_value}}">
                    <button class="search-btn" type="submit"><i class="la la-search"></i></button>
                </div>

        @endif
    </div>
</div>
@endsection
