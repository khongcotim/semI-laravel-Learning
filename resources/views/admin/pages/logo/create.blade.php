@extends('admin.master.master')
@section('main')
@section('logo', 'active')
@section('create_logo', 'active')
@section('title', 'Add Logo')


<div class="dashboard-content-wrap">
    <div class="dashboard-bread dashboard--bread dashboard-bread-2">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="breadcrumb-content">
                        <div class="section-heading">
                            <h2 class="sec__title font-size-30 text-white">Logo</h2>
                        </div>
                    </div><!-- end breadcrumb-content -->
                </div><!-- end col-lg-6 -->
                <div class="col-lg-6">
                    <div class="breadcrumb-list text-right">
                        <ul class="list-items">
                            <li><a href="{{ route('admin.home') }}" class="text-white">Home</a></li>
                            <li>Logo</li>
                            <li>Add Logo</li>
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
                            <h3 class="title">Add Logo</h3>
                        </div>
                        <div class="form-content">
                            <div class="contact-form-action">
                                <form action="{{ route('logo.store') }}" class="MultiFile-intercepted" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-12 responsive-column">
                                            <label class="label-text">Logo</label>
                                            <div class="form-box">
                                                <div class="form-content">
                                                    <div class="file-upload-wrap file-upload-wrap-3">
                                                        <input type="file" name="logo"
                                                            class="multi file-upload-input with-preview" maxlength="1" value="{{old('logo')}}">
                                                        <span class="file-upload-text"><i
                                                                class="la la-upload mr-2"></i>Upload Logo</span>
                                                    </div>
                                                </div>
                                                @if ($errors->has('logo'))
                                                    <h6 style="color:red">{{ $errors->first('logo') }}</h6>
                                                @endif`
                                            </div>
                                        </div>

                                        @if (Auth::user()->role == 'admin' || Auth::user()->role == 'manager')
                                            <div class="col-lg-12">
                                                <div class="input-box">
                                                    <label class="label-text">Status</label>
                                                    <div class="form-group">
                                                        <select name="status" class="form-control" id="">
                                                            <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>
                                                                Hidden</option>
                                                            <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>
                                                                Show</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div><!-- end col-lg-12 -->
                                        @endif
                                        <div class="col-lg-12">
                                            <div class="btn-box">
                                                <button class="theme-btn" type="submit">Add New</button>
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
