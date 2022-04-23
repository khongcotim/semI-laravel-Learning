@extends('admin.master.master')
@section('main')
@section('banner','active')
@section('create_banner','active')
@section('title','Create New Banner')
<div class="dashboard-bread dashboard--bread dashboard-bread-2 ">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="breadcrumb-content">
                    <div class="section-heading">Banner</h2>
                    </div>
                </div><!-- end breadcrumb-content -->
            </div><!-- end col-lg-6 -->
            <div class="col-lg-6">
                <div class="breadcrumb-list text-right">
                    <ul class="list-items">
                        <li><a href="{{route('admin.home')}}" class="text-white">Home</a></li>
                        <li>Banner</li>
                        <li>Create Banner</li>
                    </ul>
                </div><!-- end breadcrumb-list -->
            </div><!-- end col-lg-6 -->
        </div><!-- end row -->
    </div>
</div>

<section class="listing-form section--padding">
    <div class="container">
        <form action="{{route('banner.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-8">
                    <div class="form-box">
                        <div class="form-title-wrap">
                            <h3 class="title"><i class="la la-gear mr-2 text-gray"></i>Add New Banner</h3>
                        </div><!-- form-title-wrap -->
                        <div class="form-content contact-form-action">
                            <div class="col-lg-12">
                                <div class="input-box">
                                    <label class="label-text">Title</label>
                                    <div class="form-group">
                                        <span class="la la-briefcase form-icon"></span>
                                        <input value="{{old('title')}}" class="form-control" type="text" name="title" placeholder="Enter title here">
                                    </div>
                                    @if ($errors->has('title'))
                                        <small style="color: red">{{$errors->first('title')}}</small>
                                    @endif
                                </div>
                            </div><!-- end col-lg-12 -->
                            <div class="col-lg-12">
                                <div class="form-box">
                                        <select name="page" class="select-contain-select" tabindex="-98">
                                            <option value="home">Home</option>
                                            <option value="tour">Tour</option>
                                            <option value="new_blog">Create new blog</option>
                                            <option value="blog">Blog</option>
                                            <option value="about">About us</option>
                                            <option value="contact">Contact Us</option>
                                            <option value="cart">Cart</option>
                                            <option value="checkout">Checkout</option>
                                            <option value="become">Become local expert</option>
                                        </select>
                                        <label class="label-text ml-5">Page you want to display in</label>
                                    @if ($errors->has('page'))
                                        <small style="color: red">{{$errors->first('page')}}</small>
                                    @endif
                                </div>
                            </div><!-- end col-lg-12 -->
                            {{-- <div class="col-lg-12">
                                <div class="input-box">
                                    <label class="label-text">Links</label>
                                    <div class="form-group">
                                        <span class="la la-briefcase form-icon"></span>
                                        <input value="{{old('links')}}" class="form-control" type="text" name="links" placeholder="Enter title here">
                                    </div>
                                    @if ($errors->has('links'))
                                        <small style="color: red">{{$errors->first('links')}}</small>
                                    @endif
                                </div>
                            </div><!-- end col-lg-12 --> --}}
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
                        </div><!-- end form-content -->
                    </div><!-- end form-box -->
                    <div class="submit-box">
                        <div class="btn-box pt-3">
                            <button type="submit" class="theme-btn">Add New Banner <i class="la la-arrow-right ml-1"></i></button>
                        </div>
                    </div><!-- end submit-box -->
                </div><!-- end col-lg-8 -->
                <div class="col-lg-4">
                    <div class="form-box">
                        <div class="form-title-wrap">
                            <h3 class="title"><i class="la la-photo mr-2 text-gray"></i>Background</h3>
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
