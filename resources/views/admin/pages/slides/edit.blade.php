@extends('admin.master.master')
@section('main')
@section('slides','active')
@section('manage_slides','active')
@section('title','Update Slide')
<div class="dashboard-bread dashboard--bread dashboard-bread-2 ">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="breadcrumb-content">
                    <div class="section-heading">Slides</h2>
                    </div>
                </div><!-- end breadcrumb-content -->
            </div><!-- end col-lg-6 -->
            <div class="col-lg-6">
                <div class="breadcrumb-list text-right">
                    <ul class="list-items">
                        <li><a href="{{route('admin.home')}}" class="text-white">Home</a></li>
                        <li>Slides</li>
                        <li>Update Slide</li>
                    </ul>
                </div><!-- end breadcrumb-list -->
            </div><!-- end col-lg-6 -->
        </div><!-- end row -->
    </div>
</div>

<section class="listing-form section--padding">
    <div class="container">
        <form action="{{route('slides.update',$slide_found)}}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-box">
                        <div class="form-title-wrap">
                            <h3 class="title"><i class="la la-gear mr-2 text-gray"></i>Update Slide</h3>
                        </div><!-- form-title-wrap -->
                        <div class="form-content contact-form-action">
                            <div class="col-lg-12">
                                <div class="input-box">
                                    <label class="label-text">Position</label>
                                    <div class="form-group">
                                        <span class="la la-briefcase form-icon"></span>
                                        <input value="{{$slide_found->position}}" class="form-control" style="background: rgb(194, 199, 204);width: 20%;" readonly placeholder="Enter position here">
                                    </div>
                                    @if ($errors->has('position'))
                                        <small style="color: red">{{$errors->first('position')}}</small>
                                    @endif
                                </div>
                            </div><!-- end col-lg-12 -->
                            <div class="col-lg-12">
                                <div class="input-box">
                                    <label class="label-text">Title</label>
                                    <div class="form-group">
                                        <span class="la la-briefcase form-icon"></span>
                                        <input value="{{$slide_found->title}}" class="form-control" type="text" name="title" placeholder="Enter title here">
                                    </div>
                                    @if ($errors->has('title'))
                                        <small style="color: red">{{$errors->first('title')}}</small>
                                    @endif
                                </div>
                            </div><!-- end col-lg-12 -->
                            <div class="col-lg-12">
                                <div class="input-box">
                                    <label class="label-text">Links</label>
                                    <div class="form-group">
                                        <span class="la la-briefcase form-icon"></span>
                                        <input value="{{$slide_found->link}}" class="form-control" type="text" name="link" placeholder="Enter links here">
                                    </div>
                                    @if ($errors->has('link'))
                                        <small style="color: red">{{$errors->first('link')}}</small>
                                    @endif
                                </div>
                            </div><!-- end col-lg-12 -->
                            <div class="col-lg-12">
                                <div class="input-box">
                                    <label class="label-text">Max Slides</label>
                                    <div class="form-group">
                                        <span class="la la-briefcase form-icon"></span>
                                        <input value="{{$slide_found->max}}" class="form-control" type="number" name="max" placeholder="Choose value here">
                                    </div>
                                    @if ($errors->has('max'))
                                        <small style="color: red">{{$errors->first('max')}}</small>
                                    @endif
                                </div>
                            </div><!-- end col-lg-12 -->
                            <div class="col-lg-12" style="width: 50%">
                                <div class="form-box">
                                    <div class="form-title-wrap">
                                        <h3 class="title"><i class="la la-photo mr-2 text-gray"></i>Image</h3>
                                    </div><!-- form-title-wrap -->
                                    <div class="form-content">
                                        <img width="100%" src="{{url('admin/images')}}/{{$slide_found->image}}" alt="{{$slide_found->image}}">
                                        <div class="file-upload-wrap file-upload-wrap-3">
                                            <input type="file" name="image" class="multi file-upload-input with-preview" maxlength="1">
                                            <span class="file-upload-text"><i class="la la-upload mr-2"></i>Upload image</span>
                                        </div>
                                        @if ($errors->has('image'))
                                            <small style="color: red">{{$errors->first('image')}}</small>
                                        @endif
                                    </div><!-- end form-content -->
                                </div><!-- end form-box -->
                            </div><!-- end col-lg-12 -->
                        </div><!-- end form-content -->
                    </div><!-- end form-box -->
                    <div class="submit-box">
                        <div class="btn-box pt-3">
                            <button type="submit" class="theme-btn">Update Slide <i class="la la-arrow-right ml-1"></i></button>
                        </div>
                    </div><!-- end submit-box -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
        </form>
    </div><!-- end container -->
</section>


@stop
@section('js')
<script src="{{url('admin')}}/js/ckeditor.js"></script>
<script src="{{url('admin')}}/js/jquery.multi-file.min.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        });
</script>
@endsection