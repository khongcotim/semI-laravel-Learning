@extends('admin.master.master')
@section('main')
@section('tour_guide', 'active')
@section('title', 'Edit Tour Guide')


<div class="dashboard-content-wrap">
    <div class="dashboard-bread dashboard--bread dashboard-bread-2">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="breadcrumb-content">
                        <div class="section-heading">
                            <h2 class="sec__title font-size-30 text-white">Tour Guide</h2>
                        </div>
                    </div><!-- end breadcrumb-content -->
                </div><!-- end col-lg-6 -->
                <div class="col-lg-6">
                    <div class="breadcrumb-list text-right">
                        <ul class="list-items">
                            <li><a href="{{ route('admin.home') }}" class="text-white">Home</a></li>
                            <li>Tour Guide</li>
                            <li>Edit Tour Guide</li>
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
                            <h3 class="title">Edit Tour Guide</h3>
                        </div>
                        <div class="form-content">
                            <div class="contact-form-action">
                                <form action="{{ route('tour_guide.update', $tour_guide_founded->id) }}"
                                    class="MultiFile-intercepted" method="POST" enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <input type="hidden" name="id" value="{{$tour_guide_founded->id}}">
                                    <div class="row">
                                        <div class="col-lg-6 responsive-column">
                                            <label class="label-text">Avatar</label>
                                            <div class="form-box">
                                                <div class="form-content">
                                                    <div class="file-upload-wrap file-upload-wrap-3">
                                                        <input type="file" name="avatar"
                                                            class="multi file-upload-input with-preview" maxlength="1">
                                                        <img src="{{ url('admin/images') }}/{{ $tour_guide_founded->avatar }}"
                                                            alt="" width="100px">
                                                        <span class="file-upload-text"><i
                                                                class="la la-upload mr-2"></i>Upload Avatar</span>
                                                    </div>
                                                </div>
                                                @if ($errors->has('avatar'))
                                                    <h6 style="color:red">{{ $errors->first('avatar') }}</h6>
                                                @endif
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 responsive-column">
                                            <div class="input-box">
                                                <label for="name" class="label-text">Name</label>
                                                <div class="form-group">
                                                    <i class="las la-pen-nib form-icon"></i>
                                                    <input class="form-control" id="name" name="name" type="text"
                                                        placeholder="Service's name"
                                                        value="{{ $tour_guide_founded->name }}">
                                                    @if ($errors->has('name'))
                                                        <h6 style="color: red">{{ $errors->first('name') }}</h6>
                                                    @endif
                                                </div>
                                            </div>
                                        </div><!-- end col-lg-6 -->
                                        <div class="col-lg-6 responsive-column">
                                            <div class="input-box">
                                                <label for="price" class="label-text">Price</label>
                                                <div class="form-group">
                                                    <i class="las la-pen-nib form-icon"></i>
                                                    <input class="form-control" id="price" name="price" type="number"
                                                        placeholder="Service's price" value="{{ $tour_guide_founded->price }}">
                                                    @if ($errors->has('price'))
                                                        <h6 style="color: red">{{ $errors->first('price') }}</h6>
                                                    @endif
                                                </div>
                                            </div>
                                        </div><!-- end col-lg-6 -->
                                        <div class="col-lg-6 responsive-column">
                                            <div class="input-box">
                                                <label for="phone" class="label-text">Phone</label>
                                                <div class="form-group">
                                                    <i class="las la-pen-nib form-icon"></i>
                                                    <input class="form-control" id="phone" name="phone" type="number"
                                                        placeholder="Service's phone"
                                                        value="{{ $tour_guide_founded->phone }}">
                                                    @if ($errors->has('phone'))
                                                        <h6 style="color: red">{{ $errors->first('phone') }}</h6>
                                                    @endif
                                                </div>
                                            </div>
                                        </div><!-- end col-lg-6 -->

                                        <div class="col-lg-6 responsive-column">
                                            <div class="input-box">
                                                <label for="email" class="label-text">Email</label>
                                                <div class="form-group">
                                                    <i class="las la-pen-nib form-icon"></i>
                                                    <input class="form-control" id="email" name="email" type="text"
                                                        placeholder="Service's email"
                                                        value="{{ $tour_guide_founded->email }}">
                                                    @if ($errors->has('email'))
                                                        <h6 style="color: red">{{ $errors->first('email') }}</h6>
                                                    @endif
                                                </div>
                                            </div>
                                        </div><!-- end col-lg-12 -->
                                        <div class="col-lg-6 responsive-column">
                                            <div class="input-box">
                                                <label for="address" class="label-text">Address</label>
                                                <div class="form-group">
                                                    <i class="las la-pen-nib form-icon"></i>
                                                    <input class="form-control" id="address" name="address"
                                                        type="text" placeholder="Service's address"
                                                        value="{{ $tour_guide_founded->address }}">
                                                    @if ($errors->has('address'))
                                                        <h6 style="color: red">{{ $errors->first('address') }}</h6>
                                                    @endif
                                                </div>
                                            </div>
                                        </div><!-- end col-lg-6 -->

                                        <div class="col-lg-6">
                                            <div class="input-box">
                                                <label class="label-text">Status</label>
                                                <div class="form-group">
                                                    <i class="las la-pen-nib form-icon"></i>
                                                    <select name="status" class="form-control" id="">
                                                        <option value="0"
                                                            {{ $tour_guide_founded->gender == '0' ? 'selected' : '' }}>
                                                            Hidden
                                                        </option>
                                                        <option value="1"
                                                            {{ $tour_guide_founded->gender == '1' ? 'selected' : '' }}>
                                                            Show
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div><!-- end col-lg-6 -->
                                        <div class="col-lg-6">
                                            <div class="input-box">
                                                <label class="label-text">Gender</label>
                                                <div class="form-group">
                                                    <i class="las la-pen-nib form-icon"></i>
                                                    <select name="gender" class="form-control" id="">
                                                        <option value="0"
                                                            {{ $tour_guide_founded->gender == '0' ? 'selected' : '' }}>
                                                            Nam
                                                        </option>
                                                        <option value="1"
                                                            {{ $tour_guide_founded->gender == '1' ? 'selected' : '' }}>
                                                            Nữ
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div><!-- end col-lg-6 -->
                                        <div class="col-lg-6 responsive-column">
                                            <div class="input-box">
                                                <label class="label-text">Description</label>
                                                <div class="form-group">
                                                    <textarea class="form-control" id="exampleFormControlTextarea1"
                                                        name="description"
                                                        value="{{ $tour_guide_founded->description }}"
                                                        rows=" 3">{{ $tour_guide_founded->description }}</textarea>
                                                    @if ($errors->has('description'))
                                                        <h6 style="color:red">{{ $errors->first('description') }}
                                                        </h6>
                                                    @endif
                                                </div>
                                            </div>
                                        </div><!-- end col-lg-6 -->
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
<script src="{{ url('admin') }}/js/slug.js"></script>
@stop
