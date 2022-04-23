@extends('customer.master.master_two')
@section('main')
@section('title','Create new Blog')

<!-- ================================
    START BREADCRUMB AREA
================================= -->
<section class="breadcrumb-area bread-bg-9">
    <div class="breadcrumb-wrap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-content text-center">
                        <div class="section-heading">
                            <h2 class="sec__title">Add New Post</h2>
                        </div>
                    </div><!-- end breadcrumb-content -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end breadcrumb-wrap -->
    <div class="bread-svg-box">
        <svg class="bread-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 10" preserveAspectRatio="none"><polygon points="100 0 50 10 0 0 0 10 100 10"></polygon></svg>
    </div><!-- end bread-svg -->
</section><!-- end breadcrumb-area -->
<!-- ================================
    END BREADCRUMB AREA
================================= -->

<!-- ================================
    START FORM AREA
================================= -->
<section class="listing-form section--padding">
    <div class="container">
        <form action="{{route('blogs.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-8">
                    <div class="form-box">
                        <div class="form-title-wrap">
                            <h3 class="title"><i class="la la-gear mr-2 text-gray"></i>Add New Post</h3>
                        </div><!-- form-title-wrap -->
                        <div class="form-content contact-form-action">
                                <div class="col-lg-12">
                                    <div class="input-box">
                                        <label class="label-text">Title</label>
                                        <div class="form-group">
                                            <span class="la la-briefcase form-icon"></span>
                                            <input value="{{old('title')}}" class="form-control" id="name"  onkeyup="ChangeToSlug()" type="text" name="title" placeholder="Enter title here">
                                            <input type="hidden" id="slug" name="slug">
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
                                            <textarea class="message-control form-control" id="editor" name="contents">{{old('contents')}}</textarea>
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
                            <button type="submit" class="theme-btn">Add New Post <i class="la la-arrow-right ml-1"></i></button>
                        </div>
                    </div><!-- end submit-box -->
                </div><!-- end col-lg-8 -->
                <div class="col-lg-4">
                    <div class="form-box">
                        <div class="form-title-wrap">
                            <h3 class="title"><i class="la la-photo mr-2 text-gray"></i>Featured Image</h3>
                        </div><!-- form-title-wrap -->
                        <div class="form-content">
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
<!-- ================================
    END FORM AREA
================================= -->

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
    CKEDITOR.replace( 'editor1', {
        extraPlugins: 'imageuploader'
    });
    CKEDITOR.editorConfig = function( config ) {
        config.extraPlugins = 'imageuploader';
    };
</script>
@endsection