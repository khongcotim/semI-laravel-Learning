@extends('admin.master.master')
@section('main')
@section('tour', 'active')
@section('title', 'Create Tour')

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
                            <li><a href="{{ route('admin.home') }}" class="text-white">Home</a></li>
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
                        @if (Session::has('success'))
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert"
                                    aria-hidden="true">&times;</button>
                                <strong>{{ Session::get('success') }}</strong>
                            </div>
                        @endif
                        <div class="form-content">
                            <div class="contact-form-action">
                                <form action="{{ route('tour.store') }}" class="MultiFile-intercepted" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-6 responsive-column">
                                            <label class="label-text">Image</label>
                                            <div class="form-box">
                                                <div class="form-content">
                                                    <div class="file-upload-wrap file-upload-wrap-3">
                                                        <input type="file" name="image"
                                                            class="multi file-upload-input with-preview" maxlength="1">
                                                        <span class="file-upload-text"><i
                                                                class="la la-upload mr-2"></i>Upload image</span>

                                                    </div>
                                                </div>
                                                @if ($errors->has('image'))
                                                    <span style="color:red">{{ $errors->first('image') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-6 responsive-column">
                                            <label class="label-text">Description Photo</label>
                                            <div class="form-box">
                                                <div class="form-content">
                                                    <div class="file-upload-wrap file-upload-wrap-3">
                                                        <input type="file" name="des_photos[]" multiple
                                                            class="multi file-upload-input with-preview" maxlength="5">
                                                        <span class="file-upload-text"><i class="la la-upload mr-2"></i>Upload image</span>
                                                    </div>
                                                </div>
                                                @if ($errors->has('des_photos'))
                                                    <span style="color:red">{{ $errors->first('des_photos') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 responsive-column">
                                            <div class="input-box">
                                                <label class="label-text">Name</label>
                                                <div class="form-group">
                                                    <span class="la la-globe-europe form-icon"></span>
                                                    <input class="form-control" type="text" name="name"
                                                        placeholder="Enter tour name" value="{{ old('name') }}">
                                                    @if ($errors->has('name'))
                                                        <span style="color:red">{{ $errors->first('name') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div><!-- end col-lg-6 -->
                                        <div class="col-lg-6 responsive-column">
                                            <div class="input-box">
                                                <label class="label-text">From</label>
                                                <div class="form-group">
                                                    <span class="la la-plane-departure form-icon"></span>
                                                    <input class="form-control" type="text" name="from"
                                                        placeholder="Enter departure" value="{{ old('from') }}">
                                                    @if ($errors->has('from'))
                                                        <span style="color:red">{{ $errors->first('from') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div><!-- end col-lg-6 -->
                                        <div class="col-lg-6 responsive-column">
                                            <div class="input-box">
                                                <label class="label-text">To</label>
                                                <div class="form-group">
                                                    <span class="la la-plane-arrival form-icon"></span>
                                                    <input class="form-control" type="text" name="to"
                                                        placeholder="Enter destination" value="{{ old('to') }}">
                                                    @if ($errors->has('to'))
                                                        <span style="color:red">{{ $errors->first('to') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div><!-- end col-lg-6 -->
                                        <div class="col-lg-6 responsive-column">
                                            <div class="input-box">
                                                <label class="label-text">Time</label>
                                                <div class="form-group">
                                                    <span class="la la-clock form-icon"></span>
                                                    <input class="form-control" type="number" name="time"
                                                        placeholder="Enter destination" value="{{ old('time') }}">
                                                    @if ($errors->has('time'))
                                                        <span style="color:red">{{ $errors->first('time') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div><!-- end col-lg-6 -->
                                        <div class="col-lg-6 responsive-column">
                                            <div class="input-box">
                                                <label class="label-text">Distant (From origin to destination - km)</label>
                                                <div class="form-group">
                                                    <span class="lab la-servicestack form-icon"></span>
                                                    <input class="form-control" type="number" name="distant" placeholder="Enter tour distant" value="{{old('distant')}}">
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
                                                    <input class="form-control" type="text" name="map"
                                                        placeholder="Enter map" value="{{ old('map') }}">
                                                    @if ($errors->has('map'))
                                                        <span style="color:red">{{ $errors->first('map') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div><!-- end col-lg-6 -->
                                        <div class="col-lg-6 responsive-column">
                                            <div class="input-box">
                                                <label class="label-text">Address</label>
                                                <div class="form-group">
                                                    <span class="la la-map form-icon"></span>
                                                    <input class="form-control" type="text" name="address"
                                                        placeholder="Enter address" value="{{ old('address') }}">
                                                    @if ($errors->has('address'))
                                                        <span style="color:red">{{ $errors->first('address') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div><!-- end col-lg-6 -->

                                        <div class="col-lg-6 responsive-column">
                                            <div class="input-box">
                                                <label class="label-text">Service</label>
                                                <div class="form-group">
                                                    @foreach ($service as $value)
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input" name="service[]" type="checkbox" value="{{$value->id}}">{{$value->name}}
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
                                                <label class="label-text">Price</label>
                                                <div class="form-group">
                                                    <span class="la la-money form-icon"></span>
                                                    <input class="form-control" type="number" name="price"
                                                        placeholder="Enter Price" value="{{ old('price') }}">
                                                    @if ($errors->has('price'))
                                                        <span style="color:red">{{ $errors->first('price') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div><!-- end col-lg-6 -->
                                        <div class="col-lg-6 responsive-column">
                                            <div class="input-box">
                                                <label class="label-text">Limit/day</label>
                                                <div class="form-group">
                                                    <span class="las la-circle-notch form-icon"></span>
                                                    <input class="form-control" type="number" name="limit"
                                                        placeholder="Enter your address" value="{{ old('limit') }}">
                                                    @if ($errors->has('limit'))
                                                        <span style="color:red">{{ $errors->first('limit') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div><!-- end col-lg-6 -->
                                        <div class="col-lg-6 responsive-column">
                                            <div class="input-box">
                                                <label class="label-text">Category</label>
                                                <div class="form-group">
                                                    <span class="las la-bars form-icon"></span>
                                                    <select class="form-control" type="text" name="category">
                                                        @foreach ($cate as $value)
                                                            <option value="{{ $value->id }}"
                                                                {{ old('category') == $value->id ? 'selected' : '' }}>
                                                                {{ $value->name }}</option>
                                                        @endforeach
                                                        @if ($errors->has('category'))
                                                            <span
                                                                style="color:red">{{ $errors->first('category') }}</span>
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                        </div><!-- end col-lg-6 -->
                                        <div class="col-lg-6 responsive-column">
                                            <div class="input-box">
                                                <label class="label-text">Vehicle</label>
                                                <div class="form-group">
                                                    @foreach ($vehicle as $value)
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input" name="vehicle[]" type="checkbox" value="{{$value->id}}">{{$value->name}}
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
                                                    <select class="form-control" type="text" name="hotel"
                                                        placeholder="Enter your address">
                                                        @foreach ($hotel as $value)
                                                            <option value="{{ $value->id }}"
                                                                {{ old('hotel') == $value->id ? 'selected' : '' }}>
                                                                {{ $value->name }}</option>
                                                        @endforeach
                                                        @if ($errors->has('hotel'))
                                                            <span
                                                                style="color:red">{{ $errors->first('hotel') }}</span>
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
                                                    <textarea placeholder="Please enter your description" class="message-control form-control" id="mytextarea"
                                                        name="description"
                                                        placeholder="Write description here...">{{ old('description') }}</textarea>
                                                    @if ($errors->has('description'))
                                                        <span
                                                            style="color:red">{{ $errors->first('description') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div><!-- end col-lg-6 -->
                                        <div class="col-lg-6">
                                            <div class="input-box">
                                                <label class="label-text">Status</label>
                                                <div class="form-group">
                                                    <select name="status" class="form-control" id="">
                                                        <option value="0" {{old('status')=="0"? 'selected':''}}>Hide</option>
                                                        <option value="1" {{old('status')=="1"? 'selected':''}}>Show</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div><!-- end col-lg-12 -->
                                        <div class="col-lg-12">
                                            <div class="btn-box">
                                                <button class="theme-btn" type="submit">Create</button>
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
