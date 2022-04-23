@extends('admin.master.master')
@section('main')
@section('banner','active')
@section('list_banner','active')
@section('title','Update Banner')
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
                        <li>Edit</li>
                    </ul>
                </div><!-- end breadcrumb-list -->
            </div><!-- end col-lg-6 -->
        </div><!-- end row -->
    </div>
</div>

<section class="listing-form section--padding">
    <div class="container">
        <form action="{{route('banner.update',$banner_found->id)}}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="col-lg-8">
                    <div class="form-box">
                        <div class="form-title-wrap">
                            <h3 class="title"><i class="la la-gear mr-2 text-gray"></i>Edit Banner</h3>
                        </div><!-- form-title-wrap -->
                        <div class="form-content contact-form-action">
                            <div class="col-lg-12">
                                <div class="input-box">
                                    <label class="label-text">Title</label>
                                    <div class="form-group">
                                        <span class="la la-briefcase form-icon"></span>
                                        <input value="{{$banner_found->title}}" class="form-control" type="text" name="title" placeholder="Enter title here">
                                    </div>
                                    @if ($errors->has('title'))
                                        <small style="color: red">{{$errors->first('title')}}</small>
                                    @endif
                                </div>
                            </div><!-- end col-lg-12 -->
                            <div class="col-lg-12">
                                <div class="form-box">
                                        <select name="page" class="select-contain-select" tabindex="-98">
                                            <option value="home" {{$banner_found->page == 'home' ?'selected':''}}>Home</option>
                                            <option value="tour" {{$banner_found->page == 'tour' ?'selected':''}}>Tour</option>
                                            <option value="new_blog" {{$banner_found->page == 'new_blog' ?'selected':''}}>Create new blog</option>
                                            <option value="blog" {{$banner_found->page == 'blog' ?'selected':''}}>Blog</option>
                                            <option value="about" {{$banner_found->page == 'about' ?'selected':''}}>About us</option>
                                            <option value="contact" {{$banner_found->page == 'contact' ?'selected':''}}>Contact Us</option>
                                            <option value="cart" {{$banner_found->page == 'cart' ?'selected':''}}>Cart</option>
                                            <option value="checkout" {{$banner_found->page == 'checkout' ?'selected':''}}>Checkout</option>
                                            <option value="become" {{$banner_found->page == 'become' ?'selected':''}}>Become local expert</option>
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
                                        <input value="{{$banner_found->links}}" class="form-control" type="text" name="links" placeholder="Enter title here">
                                    </div>
                                    @if ($errors->has('links'))
                                        <small style="color: red">{{$errors->first('links')}}</small>
                                    @endif
                                </div>
                            </div><!-- end col-lg-12 --> --}}
                            @if(Auth::user()->role=='admin'||Auth::user()->role=='manager')
                            <div class="col-lg-12">
                                <div class="input-box">
                                    <label class="label-text">Links</label>
                                    <div class="form-group">
                                        <select name="status" class="form-control" id="">
                                            <option value="0" {{$banner_found->status=="0"? 'selected':''}}>Hide</option>
                                            <option value="1" {{$banner_found->status=="1"? 'selected':''}}>Show</option>
                                        </select>
                                    </div>
                                </div>
                            </div><!-- end col-lg-12 -->
                            @endif
                        </div><!-- end form-content -->
                    </div><!-- end form-box -->
                    <div class="submit-box">
                        <div class="btn-box pt-3">
                            <button type="submit" class="theme-btn">Update<i class="la la-arrow-right ml-1"></i></button>
                        </div>
                    </div><!-- end submit-box -->
                </div><!-- end col-lg-8 -->
                <div class="col-lg-4">
                    <div class="form-box">
                        <div class="form-title-wrap">
                            <h3 class="title"><i class="la la-photo mr-2 text-gray"></i>Background</h3>
                        </div><!-- form-title-wrap -->
                        <div class="form-content">
                            <img src="{{url('admin')}}/images/{{$banner_found->image}}" width="330px" alt="{{$banner_found->image}}">
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
