@extends('admin.master.master')
@section('main')
@section('discount','active')
@section('manage_discount','active')
@section('title','Manage Discount')
<div class="dashboard-bread dashboard--bread dashboard-bread-2 ">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="breadcrumb-content">
                    <div class="section-heading">
                        <h2 class="sec__title font-size-30 text-white">Discount</h2>
                    </div>
                </div><!-- end breadcrumb-content -->
            </div><!-- end col-lg-6 -->
            <div class="col-lg-6">
                <div class="breadcrumb-list text-right">
                    <ul class="list-items">
                        <li><a href="{{route('admin.home')}}" class="text-white">Home</a></li>
                        <li>Discount</li>
                        <li>Manage Discount</li>
                    </ul>
                </div><!-- end breadcrumb-list -->
            </div><!-- end col-lg-6 -->
        </div><!-- end row -->
    </div>
</div><!-- end dashboard-bread -->
<div class="dashboard-main-content ">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="form-box">
                    <div class="form-title-wrap">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <h3 class="title">Manage Discount</h3>
                                <p class="font-size-14">Showing {{$discount->firstItem()}} {{$discount->count()!=1 ? "to".' '.$discount->count():""}} of {{$discount->total()}} results</p>
                            </div>
                            <form action="">
                                @if ($get_keyword != '')
                                    <input type="hidden" name="keyword" value="{{ $get_keyword }}">
                                @else
                                @endif
                                <div class="select-contain">
                                    <div class="dropdown"><select onchange="this.form.submit()" name="condition" class="select-contain-select" tabindex="-98">
                                        <option value="all" {{Request::get('condition')=='all'?'selected':''}}>Any Time</option>
                                        <option value="desc" {{Request::get('condition')=='desc'?'selected':''}}>Latest</option>
                                        <option value="asc" {{Request::get('condition')=='asc'?'selected':''}}>Oldest</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                    </div>
                   <div class="form-content">
                       <div class="table-form table-responsive">
                           <table class="table">
                               <thead>
                               <tr>
                                   <th scope="col">STT</th>
                                   <th scope="col">Name</th>
                                   <th scope="col">Percent Reduce</th>
                                   <th scope="col">Limit</th>
                                   <th scope="col">Times</th>
                                   <th scope="col">Tour</th>
                                   <th scope="col">Action</th>
                                   <th scope="col">Apply for</th>
                               </tr>
                               </thead>
                               <tbody>
                                   @foreach ($discount as $value)
                                        <tr>
                                            <td>{{$loop->index+1}}</td>
                                            <td>{{$value->name}}</td>
                                            <td>{{$value->percent_reduce}}%</td>
                                            <td>{{$value->limit}}</td>
                                            <td>{{$value->time}} hours</td>
                                            <td>{{$value->tour_name}}</td>
                                            <form action="{{route('discount.destroy',$value->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <td>
                                                    <a href="{{route('discount.edit',$value->id)}}" class="btn btn-primary">Edit</a>
                                                    <button class="btn btn-danger" type="submit" onclick="return confirm('Do you want to delete this')">Delete</button>
                                                </td>
                                            </form>
                                            <td><a href="{{route('discount.show',$value->id)}}" style="color: #fff" class="btn btn-primary">Send to...</a></td>
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
                    {{ $discount->appends($_GET) }}
                </nav>
            </div>
        </div>
        

       <!-- end row -->
    </div><!-- end container-fluid -->
</div><!-- end dashboard-main-content -->
@stop
