@extends('admin.master.master')
@section('main')
@section('tour','active')
@section('title', 'Edit Tour')
<div class="dashboard-content-wrap">
        <div class="dashboard-bread dashboard--bread dashboard-bread-2">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="breadcrumb-content">
                            <div class="section-heading">
                                <h2 class="sec__title font-size-30 text-white">Create Tour</h2>
                            </div>
                        </div><!-- end breadcrumb-content -->
                    </div><!-- end col-lg-6 -->
                    <div class="col-lg-6">
                        <div class="breadcrumb-list text-right">
                            <ul class="list-items">
                                <li><a href="{{route('admin.home')}}" class="text-white">Home</a></li>
                                <li>Dashboard</li>
                                <li>Create Tour</li>
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
                                <h3 class="title">New Tour</h3>
                            </div>
                           
                            <div class="form-content">
                                <div class="contact-form-action">
                                <form action="{{route('tour.update',$tour->id)}}" class="MultiFile-intercepted" method="POST" enctype="multipart/form-data">
                                @method("PUT")
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-6 responsive-column">
                                                <label class="label-text">Image</label>
                                                <div class="form-box text-center">
                                                    <div class="form-content">
                                                        <div class="file-upload-wrap file-upload-wrap-3">
                                                            <input type="file" name="image" class="multi file-upload-input with-preview" maxlength="1" >
                                                            <span class="file-upload-text"><i class="la la-upload mr-2"></i>Choose Image</span>
                                                        </div>
                                                    </div>
                                                    <img src="{{url('customers/images')}}/{{$tour->image}}" height="150" alt="{{$tour->image}}">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 responsive-column">
                                                <label class="label-text">Description Photo</label>
                                                <div class="form-box">
                                                    <div class="form-content">
                                                        <div class="file-upload-wrap file-upload-wrap-3">
                                                            <input type="file" name="des_photos[]" class="multi file-upload-input with-preview" maxlength="5">
                                                            <span class="file-upload-text"><i class="la la-upload mr-2"></i>Choose Description Image</span>
                                                        </div>
                                                    </div>
                                                    @foreach (json_decode($tour->des_photos) as $item)
                                                        <img src="{{url('customers/images')}}/{{$item}}" width="100%" height="150" alt="{{$tour->image}}">
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6 responsive-column">
                                                <div class="input-box">
                                                    <label class="label-text">Name</label>
                                                    <div class="form-group">
                                                        <span class="la la-globe-europe form-icon"></span>
                                                        <input class="form-control" type="text" name="name" placeholder="Enter tour name" value="{{$tour->name}}">
                                                        @if($errors->has('name'))
                                                        <span style="color:red">{{$errors->first('name')}}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div><!-- end col-lg-6 -->
                                            <div class="col-lg-6 responsive-column">
                                                <div class="input-box">
                                                    <label class="label-text">From</label>
                                                    <div class="form-group">
                                                        <span class="la la-plane-departure form-icon"></span>
                                                        <input class="form-control" type="text" name="from" placeholder="Enter departure" value="{{$tour->from}}">
                                                        @if($errors->has('from'))
                                                        <span style="color:red">{{$errors->first('from')}}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div><!-- end col-lg-6 -->
                                             <div class="col-lg-6 responsive-column">
                                                <div class="input-box">
                                                    <label class="label-text">To</label>
                                                    <div class="form-group">
                                                        <span class="la la-plane-arrival form-icon"></span>
                                                        <input class="form-control" type="text" name="to" placeholder="Enter destination"value="{{$tour->to}}">
                                                        @if($errors->has('to'))
                                                        <span style="color:red">{{$errors->first('to')}}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div><!-- end col-lg-6 -->
                                             <div class="col-lg-6 responsive-column">
                                                <div class="input-box">
                                                    <label class="label-text">Time</label>
                                                    <div class="form-group">
                                                        <span class="la la-clock form-icon"></span>
                                                        <input class="form-control" type="number" name="time" placeholder="Enter destination"value="{{$tour->time}}">
                                                        @if($errors->has('time'))
                                                        <span style="color:red">{{$errors->first('time')}}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div><!-- end col-lg-6 -->
                                            <div class="col-lg-6 responsive-column">
                                                <div class="input-box">
                                                    <label class="label-text">Distant (From origin to destination - km)</label>
                                                    <div class="form-group">
                                                        <span class="lab la-servicestack form-icon"></span>
                                                        <input class="form-control" type="number" name="distant" placeholder="Enter tour distant" value="{{$tour->distant}}">
                                                        @if($errors->has('distant'))
                                                        <span style="color:red">{{$errors->first('distant')}}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div><!-- end col-lg-6 -->
                                             <div class="col-lg-6 responsive-column">
                                                <div class="input-box">
                                                    <label class="label-text">Map link Src</label>
                                                    <div class="form-group">
                                                        <span class="la la-map-marker form-icon"></span>
                                                        <input class="form-control" type="text" name="map" placeholder="Enter map" value="{{$tour->map}}">
                                                        @if($errors->has('map'))
                                                        <span style="color:red">{{$errors->first('map')}}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div><!-- end col-lg-6 -->
                                            <div class="col-lg-6 responsive-column">
                                                <div class="input-box">
                                                    <label class="label-text">Address</label>
                                                    <div class="form-group">
                                                        <span class="la la-map form-icon"></span>
                                                        <input class="form-control" type="text" name="address" placeholder="Enter address" value="{{$tour->address}}">
                                                        @if($errors->has('address'))
                                                        <span style="color:red">{{$errors->first('address')}}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div><!-- end col-lg-6 -->
                                            <div class="col-lg-6 responsive-column">
                                                <div class="input-box">
                                                    <label class="label-text">Price</label>
                                                    <div class="form-group">
                                                        <span class="la la-money form-icon"></span>
                                                        <input class="form-control" type="number" name="price" placeholder="Enter Price" value="{{$tour->price}}">
                                                        @if($errors->has('price'))
                                                        <span style="color:red">{{$errors->first('price')}}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div><!-- end col-lg-6 -->
                                            <div class="col-lg-6 responsive-column">
                                                <div class="input-box">
                                                    <label class="label-text">Limit</label>
                                                    <div class="form-group">
                                                        <span class="las la-circle-notch form-icon"></span>
                                                        <input class="form-control" type="number" name="limit" placeholder="Enter your address" value="{{$tour->limit}}">
                                                        @if($errors->has('limit'))
                                                        <span style="color:red">{{$errors->first('limit')}}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div><!-- end col-lg-6 -->
                                            <div class="col-lg-6 responsive-column">
                                                <div class="input-box">
                                                    <label class="label-text">Category</label>
                                                    <div class="form-group">
                                                        <span class="las la-bars form-icon"></span>
                                                        <select class="form-control" type="text" name="category" >
                                                            @foreach($cate as $value)
                                                                @if($value->id==$tour->category_id)
                                                                        <option value="{{$value->id}}" selected>{{$value->name}}</option>
                                                                @else
                                                                    <option value="{{$value->id}}">{{$value->name}}</option>
                                                                @endif
                                                            @endforeach
                                                        @if($errors->has('category'))
                                                        <span style="color:red">{{$errors->first('category')}}</span>
                                                        @endif
                                                        </select>
                                                    </div>
                                                </div>
                                            </div><!-- end col-lg-6 -->
                                            <div class="col-lg-6 responsive-column">
                                                <div class="input-box">
                                                    <label class="label-text">Service</label>
                                                    <div class="form-group">
                                                        <?php $old_service = json_decode($tour->service)?>
                                                        @foreach ($service as $val)
                                                        <div class="form-check form-check-inline">
                                                            <label class="form-check-label">
                                                                <input class="form-check-input" name="service[]" type="checkbox" value="{{$val->id}}" {{in_array($val->id,$old_service) ? 'checked':''}}>{{$val->name}}
                                                            </label>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                @if ($errors->has('service'))
                                                    <span
                                                        style="color:red">{{ $errors->first('service') }}</span>
                                                @endif
                                            </div><!-- end col-lg-6 -->
                                            <div class="col-lg-6 responsive-column">
                                                <div class="input-box">
                                                    <label class="label-text">Vehicle</label>
                                                    <div class="form-group">
                                                        <?php $old_vehicle = json_decode($tour->vehicle_id)?>
                                                        @foreach ($vehicle as $val)
                                                        <div class="form-check form-check-inline">
                                                            <label class="form-check-label">
                                                                <input class="form-check-input" name="vehicle[]" type="checkbox" value="{{$val->id}}" {{in_array($val->id,$old_vehicle) ? 'checked':''}}>{{$val->name}}
                                                            </label>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                @if ($errors->has('vehicle'))
                                                    <span
                                                        style="color:red">{{ $errors->first('vehicle') }}</span>
                                                @endif
                                            </div><!-- end col-lg-6 -->
                                            <div class="col-lg-6 responsive-column">
                                                <div class="input-box">
                                                    <label class="label-text">Hotel</label>
                                                    <div class="form-group">
                                                        <span class="la la-hotel form-icon"></span>
                                                        <select class="form-control" type="text" name="hotel" placeholder="Enter your address">
                                                            @foreach($hotel as $value)
                                                                @if($value->id==$tour->hotel_id)
                                                                        <option value="{{$value->id}}" selected>{{$value->name}}</option>
                                                                @else
                                                                    <option value="{{$value->id}}">{{$value->name}}</option>
                                                                @endif
                                                            @endforeach
                                                        @if($errors->has('hotel'))
                                                        <span style="color:red">{{$errors->first('hotel')}}</span>
                                                        @endif
                                                        </select>
                                                    </div>
                                                </div>
                                            </div><!-- end col-lg-6 -->
                                            <div class="col-lg-6 responsive-column">
                                                <div class="input-box">
                                                    <label class="label-text">Description</label>
                                                    <div class="form-group">
                                                        <span class="lab la-elementor form-icon"></span>
                                                        <textarea placeholder="Please enter your description" class="message-control form-control" id="mytextarea" name="description" placeholder="Write description here..." >{!!$tour->description!!}</textarea>
                                                        @if($errors->has('description'))
                                                        <span style="color:red">{{$errors->first('description')}}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div><!-- end col-lg-6 -->
                                           
                                            <div class="col-lg-12">
                                                <div class="btn-box">
                                                    <button class="theme-btn" type="submit">Save</button>
                                                </div>
                                            </div><!-- end col-lg-12 -->
                                        </div><!-- end row -->
                                    </form>
                                </div>
                            </div>
                        </div><!-- end form-box -->
                    </div><!-- end col-lg-6 -->
                </div><!-- end row -->
                <div class="border-top mt-4"></div>
            </div><!-- end container-fluid -->
        </div><!-- end dashboard-main-content -->
    </div>
@stop