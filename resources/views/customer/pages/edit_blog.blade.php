@extends('customer.master.master_three')
@section('main_dasboard')
@section('title')
Edit Blog | {{$blog_found->title}}
@endsection
@section('my_blog','active')

<!-- ================================
    START FORM AREA
================================= -->
<section class="dashboard-area">
    <div class="dashboard-nav">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="menu-wrapper">
                        <div class="logo mr-5">
                            <a href="{{route('customer.index')}}"><img src="{{ url('customers') }}/images/logo2.png"
                                    alt="logo"></a>
                            <div class="menu-toggler">
                                <i class="la la-bars"></i>
                                <i class="la la-times"></i>
                            </div><!-- end menu-toggler -->
                            <div class="user-menu-open">
                                <i class="la la-user"></i>
                            </div><!-- end user-menu-open -->
                        </div>
                        <div class="nav-btn ml-auto">
                            <div class="notification-wrap d-flex align-items-center">
                                <div class="notification-item mr-2">
                                    <div class="dropdown">
                                        <a href="#" class="dropdown-toggle drop-reveal-toggle-icon"
                                            id="notificationDropdownMenu" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            <i class="la la-bell"></i>
                                            <span class="noti-count notification_counted"></span>
                                        </a>
                                        <div
                                            class="dropdown-menu dropdown-reveal dropdown-menu-xl dropdown-menu-right">
                                            <div class="dropdown-header drop-reveal-header">
                                                <h6 class="title">You have <strong
                                                        class="text-black notification_counted"></strong> notifications</h6>
                                            </div>
                                            <div class="list-group drop-reveal-list">
                                                <a href="#" class="list-group-item list-group-item-action">
                                                    <div class="msg-body d-flex align-items-center">
                                                        <div class="icon-element bg-2 flex-shrink-0 mr-3 ml-0"><i
                                                                class="la la-check"></i></div>
                                                        <div class="msg-content w-100">
                                                            <h3 class="title pb-1">Your account has been
                                                                created</h3>
                                                            <p class="msg-text">{{\Carbon\Carbon::parse(Auth::guard('customer')->user()->created_at)->diffForHumans()}}</p>
                                                        </div>
                                                    </div><!-- end msg-body -->
                                                </a>
                                                <a href="#" class="list-group-item list-group-item-action">
                                                    <div class="msg-body d-flex align-items-center">
                                                        <div class="icon-element bg-3 flex-shrink-0 mr-3 ml-0"><i
                                                                class="la la-user"></i></div>
                                                        <div class="msg-content w-100">
                                                            <h3 class="title pb-1">Your account updated</h3>
                                                            <p class="msg-text">{{\Carbon\Carbon::parse(Auth::guard('customer')->user()->updated_at)->diffForHumans()}}</p>
                                                        </div>
                                                    </div><!-- end msg-body -->
                                                </a>
                                                <a href="#" class="list-group-item list-group-item-action">
                                                    <div class="msg-body d-flex align-items-center">
                                                        <div class="icon-element bg-4 flex-shrink-0 mr-3 ml-0"><i
                                                                class="la la-lock"></i></div>
                                                        <div class="msg-content w-100">
                                                            <h3 class="title pb-1">Your password changed</h3>
                                                            <p class="msg-text">{{\Carbon\Carbon::parse(Auth::guard('customer')->user()->updated_at)->diffForHumans()}}</p>
                                                        </div>
                                                    </div><!-- end msg-body -->
                                                </a>
                                            </div>
                                            <a href="#" id="view_all" class="dropdown-item drop-reveal-btn text-center">View
                                                all</a>
                                        </div><!-- end dropdown-menu -->
                                    </div>
                                </div><!-- end notification-item -->
                                <div class="notification-item">
                                    <div class="dropdown">
                                        <a href="#" class="dropdown-toggle" id="userDropdownMenu"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <div class="d-flex align-items-center">
                                                <div class="avatar avatar-sm flex-shrink-0 mr-2"><img
                                                    src="{{ url('customers/images') }}/{{ Auth::guard('customer')->user()->avatar }}"
                                                    alt="team-img"></div>
                                                <span
                                                    class="font-size-14 font-weight-bold">{{ Auth::guard('customer')->user()->name }}</span>
                                            </div>
                                        </a>
                                        <div
                                            class="dropdown-menu dropdown-reveal dropdown-menu-md dropdown-menu-right">
                                            <div class="dropdown-item drop-reveal-header user-reveal-header">
                                                <h6 class="title text-uppercase">Welcome!</h6>
                                            </div>
                                            <div class="list-group drop-reveal-list user-drop-reveal-list">
                                                <a href="#"
                                                    class="list-group-item list-group-item-action">
                                                    <div class="msg-body">
                                                        <div class="msg-content">
                                                            <h3 class="title"><i
                                                                    class="la la-user mr-2"></i>My Profile</h3>
                                                        </div>
                                                    </div><!-- end msg-body -->
                                                </a>
                                                <a href="{{route('my-booking')}}"
                                                    class="list-group-item list-group-item-action">
                                                    <div class="msg-body">
                                                        <div class="msg-content">
                                                            <h3 class="title"><i
                                                                    class="la la-shopping-cart mr-2"></i>My Booking
                                                            </h3>
                                                        </div>
                                                    </div><!-- end msg-body -->
                                                </a>
                                                <a href="{{route('my_reviews')}}"
                                                    class="list-group-item list-group-item-action">
                                                    <div class="msg-body">
                                                        <div class="msg-content">
                                                            <h3 class="title"><i
                                                                    class="la la-star mr-2"></i>My Reviews</h3>
                                                        </div>
                                                    </div><!-- end msg-body -->
                                                </a>
                                                <a href="{{route('settings')}}"
                                                    class="list-group-item list-group-item-action">
                                                    <div class="msg-body">
                                                        <div class="msg-content">
                                                            <h3 class="title"><i
                                                                    class="la la-gear mr-2"></i>Settings</h3>
                                                        </div>
                                                    </div><!-- end msg-body -->
                                                </a>
                                                <div class="section-block"></div>
                                                <a href="{{route('customer.logout',['page'=>'my_profile'])}}"
                                                    class="list-group-item list-group-item-action">
                                                    <div class="msg-body">
                                                        <div class="msg-content">
                                                            <h3 class="title"><i
                                                                    class="la la-power-off mr-2"></i>Logout</h3>
                                                        </div>
                                                    </div><!-- end msg-body -->
                                                </a>
                                            </div>
                                        </div><!-- end dropdown-menu -->
                                    </div>
                                </div><!-- end notification-item -->
                            </div>
                        </div><!-- end nav-btn -->
                    </div><!-- end menu-wrapper -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
        </div><!-- end container-fluid -->
    </div><!-- end dashboard-nav -->
    <div class="dashboard-content-wrap">
        <div class="dashboard-bread dashboard--bread">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="breadcrumb-content">
                            <div class="section-heading">
                                <h2 class="sec__title font-size-30 text-white">My Blog</h2>
                            </div>
                        </div><!-- end breadcrumb-content -->
                    </div><!-- end col-lg-6 -->
                    <div class="col-lg-6">
                        <div class="breadcrumb-list text-right">
                            <ul class="list-items">
                                <li><a href="{{route('my_profile',Auth::guard('customer')->user()->name)}}" class="text-white">Home</a></li>
                                <li>Dashboard</li>
                                <li><a href="{{route('my_blog')}}">My Blog</a></li>
                                <li>Edit</li>
                            </ul>
                        </div><!-- end breadcrumb-list -->
                    </div><!-- end col-lg-6 -->
                </div><!-- end row -->
            </div>
        </div><!-- end dashboard-bread -->
        <div class="dashboard-main-content">
            <div class="container">
                <form action="{{route('blogs.update',$blog_found->id)}}" method="POST" enctype="multipart/form-data">
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
                                                    <input value="{{$blog_found->title}}" class="form-control" id="name"  onkeyup="ChangeToSlug()" type="text" name="title" placeholder="Enter title here">
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
                                </div><!-- form-title-wrap -->
                                <div class="form-content">
                                    <img src="{{url('admin')}}/images/{{$blog_found->image}}" width="100%" height="150px" alt="">
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
        </div><!-- end dashboard-main-content -->
    </div><!-- end dashboard-content-wrap -->
</section><!-- end dashboard-area -->
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
