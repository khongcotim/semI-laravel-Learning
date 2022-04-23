@extends('admin.master.master')
@section('main')
@section('account','active')
@section('title', 'Create Account')
<div class="dashboard-content-wrap">
        <div class="dashboard-bread dashboard--bread dashboard-bread-2">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="breadcrumb-content">
                            <div class="section-heading">
                                <h2 class="sec__title font-size-30 text-white">Create Manager Account</h2>
                            </div>
                        </div><!-- end breadcrumb-content -->
                    </div><!-- end col-lg-6 -->
                    <div class="col-lg-6">
                        <div class="breadcrumb-list text-right">
                            <ul class="list-items">
                                <li><a href="{{route('admin.home')}}" class="text-white">Home</a></li>
                                <li>Dashboard</li>
                                <li>Create Manager Account</li>
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
                                <h3 class="title">New Profile</h3>
                            </div>
                            
                            <div class="form-content">
                                <div class="contact-form-action">
                                    <form action="{{route('accountAdmin.store')}}" class="MultiFile-intercepted" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <label class="label-text">Avatar</label>
                                        <div class="form-box" style="width: 25%;">
                                            <div class="form-content">
                                                <div class="file-upload-wrap file-upload-wrap-3">
                                                    <input type="file" name="avatar" class="multi file-upload-input with-preview" maxlength="1">
                                                    <span class="file-upload-text"><i class="la la-upload mr-2"></i>Choose Avatar</span>
                                                </div>
                                            </div>
                                            @if($errors->has('avatar'))
                                            <span style="color:red">{{$errors->first('avatar')}}</span>
                                            @endif
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6 responsive-column">
                                                <div class="input-box">
                                                    <label class="label-text">Name</label>
                                                    <div class="form-group">
                                                        <span class="la la-user form-icon"></span>
                                                        <input class="form-control" type="text" name="name" placeholder="Enter your name" value="{{old('name')}}">
                                                        @if($errors->has('name'))
                                                        <span style="color:red">{{$errors->first('name')}}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div><!-- end col-lg-6 -->
                                            <div class="col-lg-6 responsive-column">
                                                <div class="input-box">
                                                    <label class="label-text">Email Address</label>
                                                    <div class="form-group">
                                                        <span class="la la-envelope form-icon"></span>
                                                        <input class="form-control" type="email" name="email" placeholder="Enter your email" value="{{old('email')}}">
                                                        @if($errors->has('email'))
                                                        <span style="color:red">{{$errors->first('email')}}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div><!-- end col-lg-6 -->
                                             <div class="col-lg-6 responsive-column">
                                                <div class="input-box">
                                                    <label class="label-text">Phone</label>
                                                    <div class="form-group">
                                                        <span class="la la-phone form-icon"></span>
                                                        <input class="form-control" type="text" name="phone" placeholder="Enter your phone number" value="{{old('phone')}}">
                                                        @if($errors->has('phone'))
                                                        <span style="color:red">{{$errors->first('phone')}}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div><!-- end col-lg-6 -->
                                             <div class="col-lg-6 responsive-column">
                                                <div class="input-box">
                                                    <label class="label-text">Password</label>
                                                    <div class="form-group">
                                                        <span class="la la-key form-icon"></span>
                                                        <input class="form-control" type="password" name="password" placeholder="Enter your password" value="{{old('password')}}">
                                                        @if($errors->has('password'))
                                                        <span style="color:red">{{$errors->first('password')}}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div><!-- end col-lg-6 -->
                                            <div class="col-lg-6 responsive-column">
                                                <div class="input-box">
                                                    <label class="label-text">Address</label>
                                                    <div class="form-group">
                                                        <span class="la la-map form-icon"></span>
                                                        <input class="form-control" type="text" name="address" placeholder="Enter your address" value="{{old('address')}}">
                                                        @if($errors->has('address'))
                                                        <span style="color:red">{{$errors->first('address')}}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div><!-- end col-lg-6 -->
                                            <div class="col-lg-6 responsive-column">
                                                <div class="input-box">
                                                    <label class="label-text">Office</label>
                                                    <div class="form-group">
                                                        <span class="la la-user form-icon"></span>
                                                        <select class="form-control" type="text" name="role" placeholder="Enter your address" >
                                                        @if(Auth::user()->role == 'admin') 
                                                            <option value="manager" {{old('hotel')=='manager' ? 'selected':''}}>{{Auth::user()->name}}>Manager</option>
                                                            <option value="staff" {{old('hotel')=='staff' ?'selected':''}}>{{Auth::user()->name}}>Staff</option>
                                                        @elseif(Auth::user()->role == 'manager')
                                                            <option value="staff" {{old('hotel')=='staff' ?'selected':''}}>{{Auth::user()->name}}>Staff</option>
                                                        @endif
                                                        @if($errors->has('role'))
                                                        <span style="color:red">{{$errors->first('role')}}</span>
                                                        @endif
                                                        </select>
                                                    </div>
                                                </div>
                                            </div><!-- end col-lg-6 -->
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