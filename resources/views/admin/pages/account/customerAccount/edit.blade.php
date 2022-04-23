@extends('admin.master.master')
@section('main')
@section('account','active')
@section('title', 'Edit Customer')
<div class="dashboard-content-wrap">
        <div class="dashboard-bread dashboard--bread dashboard-bread-2">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="breadcrumb-content">
                            <div class="section-heading">
                                <h2 class="sec__title font-size-30 text-white">Edit Customer</h2>
                            </div>
                        </div><!-- end breadcrumb-content -->
                    </div><!-- end col-lg-6 -->
                    <div class="col-lg-6">
                        <div class="breadcrumb-list text-right">
                            <ul class="list-items">
                                <li><a href="{{route('admin.home')}}" class="text-white">Home</a></li>
                                <li>Dashboard</li>
                                <li>Edit Customer</li>
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
                                <h3 class="title">Profile Setting</h3>
                            </div>
                            
                            <div class="form-content">
                                <div class="contact-form-action">
                                    <form action="{{route('accountCustomer.update',$account->id)}}" class="MultiFile-intercepted" method="POST" enctype="multipart/form-data">
                                        @method("PUT")
                                        @csrf
                                       
                                        <div class="row">
                                            <div class="col-lg-6 responsive-column">
                                                <div class="input-box">
                                                    <label class="label-text">Name</label>
                                                    <div class="form-group">
                                                        <span class="la la-user form-icon"></span>
                                                        <input class="form-control" type="text"  name="name" placeholder="Enter your name" value="{{$account->name}}" readonly>
                                                       
                                                    </div>
                                                </div>
                                            </div><!-- end col-lg-6 -->
                                            <div class="col-lg-6 responsive-column">
                                                <div class="input-box">
                                                    <label class="label-text">Email Address</label>
                                                    <div class="form-group">
                                                        <span class="la la-envelope form-icon"></span>
                                                        <input class="form-control" type="email"  name="email" placeholder="Enter your email" value="{{$account->email}}" readonly>
                                                      
                                                    </div>
                                                </div>
                                            </div><!-- end col-lg-6 -->
                                             <div class="col-lg-6 responsive-column">
                                                <div class="input-box">
                                                    <label class="label-text">Phone</label>
                                                    <div class="form-group">
                                                        <span class="la la-phone form-icon"></span>
                                                        <input class="form-control" type="text" name="phone" placeholder="Enter your phone number" value="{{$account->phone}}" readonly>
                                                       
                                                    </div>
                                                </div>
                                            </div><!-- end col-lg-6 -->
                                             <div class="col-lg-6 responsive-column">
                                                <div class="input-box">
                                                    <label class="label-text">Password</label>
                                                    <div class="form-group">
                                                        <span class="la la-key form-icon"></span>
                                                        <input class="form-control" type="password" name="password" placeholder="Enter your password" readonly>
                                                       
                                                    </div>
                                                </div>
                                            </div><!-- end col-lg-6 -->
                                            <div class="col-lg-6 responsive-column">
                                                <div class="input-box">
                                                    <label class="label-text">Address</label>
                                                    <div class="form-group">
                                                        <span class="la la-map form-icon"></span>
                                                        <input class="form-control" type="address" name placeholder="Enter your address" value="{{$account->address}}" readonly>
                                                      
                                                    </div>
                                                </div>
                                            </div><!-- end col-lg-6 -->
                                            <div class="col-lg-6 responsive-column">
                                                <div class="input-box">
                                                    <label class="label-text">Status</label>
                                                    <div class="form-group">
                                                        <span class="la la-user form-icon"></span>
                                                        @if($account->status==0) 
                                                        <select class="form-control" type="text" name="status" placeholder="Enter your address" >
                                                                <option value="0" selected>Email not confirmed</option>
                                                                <option value="2">Banned</option>
                                                            </select>
                                                            @endif
                                                        @if($account->status==1||$account->status==2) 
                                                        <select class="form-control" type="text" name="status" placeholder="Enter your address">
                                                            
                                                            @if($account->status==1) 
                                                                <option value="1" selected>Confirmed</option>
                                                            @else
                                                                <option value="1">Confirmed</option>
                                                            @endif
                                                            @if($account->status==2) 
                                                                <option value="2" selected>Banned</option>
                                                            @else
                                                                <option value="2">Banned</option>
                                                            @endif
                                                        </select>
                                                        @endif
                                                        @if($errors->has('status'))
                                                        <span style="color:red">{{$errors->first('status')}}</span>
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