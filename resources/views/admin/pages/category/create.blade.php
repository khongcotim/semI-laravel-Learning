@extends('admin.master.master')
@section('main')
@section('category','active')
@section('create_category','active')
@section('title','Add Category')


<div class="dashboard-content-wrap">
    <div class="dashboard-bread dashboard--bread dashboard-bread-2">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="breadcrumb-content">
                        <div class="section-heading">
                            <h2 class="sec__title font-size-30 text-white">Category</h2>
                        </div>
                    </div><!-- end breadcrumb-content -->
                </div><!-- end col-lg-6 -->
                <div class="col-lg-6">
                    <div class="breadcrumb-list text-right">
                        <ul class="list-items">
                            <li><a href="{{route('admin.home')}}" class="text-white">Home</a></li>
                            <li>Category</li>
                            <li>Add Category</li>
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
                            <h3 class="title">Add Category</h3>
                        </div>
                        <div class="form-content">
                            <div class="contact-form-action">
                                <form action="{{route('category.store')}}" class="MultiFile-intercepted" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-12 responsive-column">
                                            <div class="input-box">
                                                <label for="name" class="label-text">New Category</label>
                                                <div class="form-group">
                                                    <i class="las la-pen-nib form-icon"></i>
                                                    <input class="form-control" onkeyup="ChangeToSlug()" id="name" name="name" type="text" placeholder="Category's name" value="{{old('name')}}">
                                                    @if ($errors->has('name'))
                                                        <h5 style="color: red">{{$errors->first('name')}}</h5>
                                                    @endif
                                                </div>
                                            </div>
                                        </div><!-- end col-lg-12 -->
                                        <div class="col-lg-12 responsive-column">
                                            <div class="input-box">
                                                <label for="slug" class="label-text">Slug</label>
                                                <div class="form-group">
                                                    <i class="las la-pen-nib form-icon"></i>
                                                    <input class="form-control" id="slug" name="slug" type="text" placeholder="Category's slug" value="{{old('slug')}}" readonly>
                                                    @if ($errors->has('slug'))
                                                        <h5 style="color: red">{{$errors->first('slug')}}</h5>
                                                    @endif
                                                </div>
                                            </div>
                                        </div><!-- end col-lg-12 -->
                                        @if(Auth::user()->role=='admin'||Auth::user()->role=='manager')
                                            <div class="col-lg-12">
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
    <script src="{{url('admin')}}/js/slug.js"></script>
@stop