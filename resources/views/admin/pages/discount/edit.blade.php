@extends('admin.master.master')
@section('main')
@section('discount','active')
@section('manage_discount','active')
@section('title','Update Discount')


<div class="dashboard-content-wrap">
    <div class="dashboard-bread dashboard--bread dashboard-bread-2">
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
                            <li>Update Discount</li>
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
                            <h3 class="title">Update Discount</h3>
                        </div>
                        <div class="form-content">
                            <div class="contact-form-action">
                                <form action="{{route('discount.update',$discount_found->id)}}" class="MultiFile-intercepted" method="POST">
                                    @csrf
                                    @method("PUT")
                                    <div class="row">
                                        <div class="col-lg-12 responsive-column">
                                            <div class="input-box">
                                                <label class="label-text">Discount</label>
                                                <div class="form-group">
                                                    <i class="las la-pen-nib form-icon"></i>
                                                    <input class="form-control" value="{{$discount_found->name}}" name="name" type="text" placeholder="New name">
                                                    @if ($errors->has('name'))
                                                        <small style="color: red">{{$errors->first('name')}}</small>
                                                    @endif
                                                </div>
                                            </div>
                                        </div><!-- end col-lg-12 -->
                                        <div class="col-lg-12 responsive-column">
                                            <div class="input-box">
                                                <label class="label-text">Percent Reduce (%)</label>
                                                <div class="form-group">
                                                    <i class="las la-pen-nib form-icon"></i>
                                                    <input class="form-control" value="{{$discount_found->percent_reduce}}" name="percent_reduce" type="number" placeholder="New percent reduce">
                                                    @if ($errors->has('percent_reduce'))
                                                        <small style="color: red">{{$errors->first('percent_reduce')}}</small>
                                                    @endif
                                                </div>
                                            </div>
                                        </div><!-- end col-lg-12 -->
                                        <div class="col-lg-12 responsive-column">
                                            <div class="input-box">
                                                <label class="label-text">Limit</label>
                                                <div class="form-group">
                                                    <i class="las la-pen-nib form-icon"></i>
                                                    <input class="form-control" value="{{$discount_found->limit}}" name="limit" type="number" placeholder="Choose limit">
                                                    @if ($errors->has('limit'))
                                                        <small style="color: red">{{$errors->first('limit')}}</small>
                                                    @endif
                                                </div>
                                            </div>
                                        </div><!-- end col-lg-12 -->
                                        <div class="col-lg-12 responsive-column">
                                            <div class="input-box">
                                                <label class="label-text">Time Exist (hours)</label>
                                                <div class="form-group">
                                                    <i class="las la-pen-nib form-icon"></i>
                                                    <input class="form-control" value="{{$discount_found->time}}" name="time" type="number" placeholder="Choose time">
                                                    @if ($errors->has('time'))
                                                        <small style="color: red">{{$errors->first('time')}}</small>
                                                    @endif
                                                </div>
                                            </div>
                                        </div><!-- end col-lg-12 -->
                                        <div class="col-lg-12 responsive-column">
                                            <div class="input-box">
                                                <label class="label-text">Tour Apply:</label>
                                                <div class="select-contain mb-4">
                                                    <div class="dropdown" id="show"><select name="id_tour" class="select-contain-select" tabindex="-98">
                                                        @foreach ($tour as $val)
                                                        <option value="{{$val->id}}" {{$val->id==$discount_found->id_tour?'selected':''}}>{{$val->name}}</option>
                                                        @endforeach
                                                    </select>
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