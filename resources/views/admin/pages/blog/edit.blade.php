@extends('admin.master.master')
@section('main')
@section('blog','active')
@section('list_blog','active')
@section('title','Edit Blog')
<div class="dashboard-bread dashboard--bread dashboard-bread-2 ">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="breadcrumb-content">
                    <div class="section-heading">Blog</h2>
                    </div>
                </div><!-- end breadcrumb-content -->
            </div><!-- end col-lg-6 -->
            <div class="col-lg-6">
                <div class="breadcrumb-list text-right">
                    <ul class="list-items">
                        <li><a href="{{route('admin.home')}}" class="text-white">Home</a></li>
                        <li>Blog</li>
                        <li>Edit Blog</li>
                    </ul>
                </div><!-- end breadcrumb-list -->
            </div><!-- end col-lg-6 -->
        </div><!-- end row -->
    </div>
</div>

<section class="listing-form section--padding">
    <div class="container">
        <form action="{{route('blog.update',$blog_found->id)}}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="col-lg-8">
                    <div class="form-box">
                        <div class="form-title-wrap">
                            <h3 class="title"><i class="la la-gear mr-2 text-gray"></i>Edit Post</h3>
                        </div><!-- form-title-wrap -->
                        <div class="form-content contact-form-action">
                                <div class="col-lg-12">
                                    <div class="input-box">
                                        <label class="label-text">Title</label>
                                        <div class="form-group">
                                            <span class="la la-briefcase form-icon"></span>
                                            <input value="{{$blog_found->title}}" class="form-control" type="text"  onkeyup="ChangeToSlug()" id="name" name="title" placeholder="Enter title here">
                                            <input type="hidden" id="slug" name="slug" value="{{$blog_found->slug}}">
                                        </div>
                                        @if ($errors->has('title'))
                                            <small style="color: red">{{$errors->first('title')}}</small>
                                        @endif
                                    </div>
                                </div><!-- end col-lg-12 -->
                                <div class="col-lg-12">
                                    <div class="input-box">
                                        <label class="label-text">Contents</label>
                                        <div class="form-group">
                                            <span class="la la-pencil form-icon"></span>
                                            <textarea class="message-control form-control" id="editor" name="contents">{{$blog_found->contents}}</textarea>
                                        </div>
                                        @if ($errors->has('contents'))
                                            <small style="color: red">{{$errors->first('contents')}}</small>
                                        @endif
                                    </div>
                                </div><!-- end col-lg-12 -->
                        </div><!-- end form-content -->
                    </div><!-- end form-box -->
                    <div class="submit-box">
                        <div class="btn-box pt-3">
                            <button type="submit" class="theme-btn">Update <i class="la la-arrow-right ml-1"></i></button>
                        </div>
                    </div><!-- end submit-box -->
                </div><!-- end col-lg-8 -->
                <div class="col-lg-4">
                    <div class="form-box">
                        <div class="form-title-wrap">
                            <h3 class="title"><i class="la la-photo mr-2 text-gray"></i>Featured Image</h3>
                        </div>
                        <div class="form-content">
                            <img width="330px" src="{{url('admin')}}/images/{{$blog_found->image}}" alt="{{$blog_found->image}}">
                            <div class="file-upload-wrap file-upload-wrap-3">
                                <input type="file" name="image" class="multi file-upload-input with-preview" maxlength="1">
                                <span class="file-upload-text"><i class="la la-upload mr-2"></i>Upload image</span>
                            </div>
                            @if ($errors->has('image'))
                                <small style="color: red">{{$errors->first('image')}}</small>
                            @endif
                        </div><!-- end form-content -->
                    </div><!-- end form-box -->
                </div><!-- end col-lg-4 -->
            </div><!-- end row -->
        </form>
    </div><!-- end container -->
</section>


@stop
@section('js')
<script src="{{url('admin')}}/js/ckeditor.js"></script>
<script src="{{url('admin')}}/js/jquery.multi-file.min.js"></script>
<script src="{{url('admin')}}/js/slug.js"></script>

<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        });
</script>
@endsection