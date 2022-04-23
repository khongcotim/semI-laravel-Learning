@extends('admin.master.master')
@section('main')
@section('service','active')
@section('title','Edit Service')


<div class="dashboard-content-wrap">
    <div class="dashboard-bread dashboard--bread dashboard-bread-2">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="breadcrumb-content">
                        <div class="section-heading">
                            <h2 class="sec__title font-size-30 text-white">Service</h2>
                        </div>
                    </div><!-- end breadcrumb-content -->
                </div><!-- end col-lg-6 -->
                <div class="col-lg-6">
                    <div class="breadcrumb-list text-right">
                        <ul class="list-items">
                            <li><a href="{{route('admin.home')}}" class="text-white">Home</a></li>
                            <li>Service</li>
                            <li>Edit Service</li>
                        </ul>
                    </div><!-- end breadcrumb-list -->
                </div><!-- end col-lg-6 -->
            </div><!-- end row -->
        </div>
    </div><!-- end dashboard-bread -->
    <div class="dashboard-main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-box">
                        <div class="form-title-wrap">
                            <h3 class="title">Edit Service</h3>
                        </div>
                        <div class="form-content">
                            <div class="contact-form-action">
                                <form action="{{route('service.update',$service_founded->id)}}" class="MultiFile-intercepted" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="id" value="{{$service_founded->id}}">
                                    <div class="row">
                                        <div class="col-lg-12 responsive-column">
                                            <div class="input-box">
                                                <label class="label-text">Service's name</label>
                                                <div class="form-group">
                                                    <i class="las la-pen-nib form-icon"></i>
                                                    <input class="form-control" name="name" id="name"  type="text" placeholder="Service's name" value="{{$service_founded->name}}">
                                                    @if ($errors->has('name'))
                                                        <h6 style="color: red">{{$errors->first('name')}}</h6>
                                                    @endif
                                                </div>
                                            </div>
                                        </div><!-- end col-lg-12 -->
                                        <div class="col-lg-12 responsive-column">
                                            <div class="input-box">
                                                <label class="label-text">Price</label>
                                                <div class="form-group">
                                                    <i class="las la-pen-nib form-icon"></i>
                                                    <input class="form-control" name="price" id="price" type="number" placeholder="Service's price" value="{{$service_founded->price}}">
                                                    @if ($errors->has('price'))
                                                        <h5 style="color: red">{{$errors->first('price')}}</h5>
                                                    @endif
                                                </div>
                                            </div>
                                        </div><!-- end col-lg-12 -->
                                         <div class="col-lg-12">
                                             <div class="btn-box">
                                                 <button class="theme-btn" type="submit">Update</button>
                                             </div>
                                        </div><!-- end col-lg-12 -->
                                    </div><!-- end row -->
                                </form>
                            </div>
                        </div>
                    </div><!-- end form-box -->
                </div><!-- end col-lg-6 -->
                <div class="col-lg-6">

                </div><!-- end col-lg-6 -->
            </div><!-- end row -->
        </div><!-- end container-fluid -->
    </div><!-- end dashboard-main-content -->
</div>




@stop
@section('js')
    <script src="{{url('admin')}}/js/slug.js"></script>
@stop
