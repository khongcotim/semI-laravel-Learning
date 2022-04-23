@extends('admin.master.master')
@section('main')
@section('vehicle','active')
@section('list_vehicle','active')
@section('title','List Vehicle')
<div class="dashboard-bread dashboard--bread dashboard-bread-2">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="breadcrumb-content">
                    <div class="section-heading">
                        <h2 class="sec__title font-size-30 text-white">Vehicle</h2>
                    </div>
                </div><!-- end breadcrumb-content -->
            </div><!-- end col-lg-6 -->
            <div class="col-lg-6">
                <div class="breadcrumb-list text-right">
                    <ul class="list-items">
                        <li><a href="{{route('admin.home')}}" class="text-white">Home</a></li>
                        <li>Vehicle</li>
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
                                <h3 class="title">Vehicle Lists</h3>
                                <p class="font-size-14">Showing {{$vehicle->firstItem()}} {{$vehicle->count()!=1 ? "to".' '.$vehicle->count():""}} of {{$vehicle->total()}} results</p>
                            </div>
                            <form method="GET">
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
                                   <th scope="col">Price</th>
                                   <th scope="col">Status</th>
                                   @if(Auth::user()->role=='admin'||Auth::user()->role=='manager')
                                   <th scope="col">Action</th>
                                   @endif
                               </tr>
                               </thead>
                               <tbody>
                                   @foreach ($vehicle as $value)
                                        <tr>
                                            <td>{{$loop->index+1}}</td>
                                            <td>{{$value->name}}</td>
                                            <td>{{number_format($value->price)}} VND</td>
                                            <td>{{$value->status==0?'Hidden':'Display'}}</td>
                                            <form action="{{route('vehicle.destroy',$value->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <td>
                                                    @if(Auth::user()->role=='admin'||Auth::user()->role=='manager')
                                                    <a href="{{route('vehicle.edit',$value->id)}}" class="btn btn-primary">Edit</a>
                                                    <button class="btn btn-danger" type="submit" onclick="return confirm('Do you want to delete this')">Delete</button>
                                                    @endif
                                                </td>
                                            </form>
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
                    {{ $vehicle->appends($_GET) }}
                </nav>
            </div>
        </div><!-- end row -->
    </div><!-- end container-fluid -->
</div><!-- end dashboard-main-content -->
@stop