@extends('admin.master.master')
@section('main')
@section('category','active')
@section('title','Edit Category')


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
                            <li>Edit Category</li>
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
                            <h3 class="title">Edit Category</h3>
                        </div>
                        <div class="form-content">
                            <div class="contact-form-action">
                                <form action="{{route('category.update',$category_founded->id)}}" class="MultiFile-intercepted" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="id" value="{{$category_founded->id}}">
                                    <div class="row">
                                        <div class="col-lg-12 responsive-column">
                                            <div class="input-box">
                                                <label class="label-text">Category's name</label>
                                                <div class="form-group">
                                                    <i class="las la-pen-nib form-icon"></i>
                                                    <input class="form-control" name="name" id="name" onkeyup="ChangeToSlug()" type="text" placeholder="Hotel's name" value="{{$category_founded->name}}">
                                                    @if ($errors->has('name'))
                                                        <h5 style="color: red">{{$errors->first('name')}}</h5>
                                                    @endif
                                                </div>
                                            </div>
                                        </div><!-- end col-lg-12 -->
                                        <div class="col-lg-12 responsive-column">
                                            <div class="input-box">
                                                <label class="label-text">Slug</label>
                                                <div class="form-group">
                                                    <i class="las la-pen-nib form-icon"></i>
                                                    <input class="form-control" name="slug" id="slug" type="text" placeholder="Hotel's address" value="{{$category_founded->slug}}">
                                                    @if ($errors->has('slug'))
                                                        <h5 style="color: red">{{$errors->first('slug')}}</h5>
                                                    @endif
                                                </div>
                                            </div>
                                        </div><!-- end col-lg-12 -->
                                        @if(Auth::user()->role=='admin'||Auth::user()->role=='manager')
                                            <div class="col-lg-12">
                                                <div class="input-box">
                                                    <label class="label-text">Links</label>
                                                    <div class="form-group">
                                                        <select name="status" class="form-control" id="">
                                                            <option value="0" {{$category_founded->status=="0"? 'selected':''}}>Hide</option>
                                                            <option value="1" {{$category_founded->status=="1"? 'selected':''}}>Show</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div><!-- end col-lg-12 -->
                                            @endif
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