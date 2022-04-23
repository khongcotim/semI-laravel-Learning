@extends('customer.master.master_two')
@section('main')
@section('title')
    {{ $blog_found->title }}
@endsection
@section('blog', 'activate')

<!-- ================================
    START BREADCRUMB AREA
================================= -->
<section class="breadcrumb-area bread-bg-9">
    <div class="breadcrumb-wrap">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="breadcrumb-content">
                        <div class="section-heading">
                            <h2 class="sec__title text-white">Blog Details</h2>
                        </div>
                    </div><!-- end breadcrumb-content -->
                </div><!-- end col-lg-6 -->
                <div class="col-lg-6">
                    <div class="breadcrumb-list text-right">
                        <ul class="list-items">
                            <li><a href="{{ route('customer.index') }}">Home</a></li>
                            <li>Blog</li>
                            <li>Blog Details</li>
                        </ul>
                    </div><!-- end breadcrumb-list -->
                </div><!-- end col-lg-6 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end breadcrumb-wrap -->
    <div class="bread-svg-box">
        <svg class="bread-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 10" preserveAspectRatio="none">
            <polygon points="100 0 50 10 0 0 0 10 100 10"></polygon>
        </svg>
    </div><!-- end bread-svg -->
</section><!-- end breadcrumb-area -->
<!-- ================================
    END BREADCRUMB AREA
================================= -->
<!-- ================================
    START CARD AREA
================================= -->
<section class="card-area section--padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="card-item blog-card blog-card-layout-2 blog-single-card mb-5">
                    <div class="card-img before-none">
                        <img src="{{ url('admin/images') }}/{{ $blog_found->image }}"
                            style="width: 100%;height: 500px;" alt="{{ $blog_found->image }}">
                    </div>
                    <div class="card-body px-0 pb-0">
                        {{-- <div class="post-categories">
                            <a href="#" class="badge">Travel</a>
                            <a href="#" class="badge">lifestyle</a>
                        </div> --}}
                        <h3 class="card-title font-size-28">{{ $blog_found->title }}</h3>
                        <p class="card-meta pb-3">
                            <span class="post__author">By <a href="#" class="text-gray">
                                    @if ($blog_found->admin_name != '')
                                        {{ $blog_found->admin_name }} <small style="color: grey">Admin</small>
                                    @endif
                                    @if ($blog_found->customer_name != '')
                                        {{ $blog_found->customer_name }}
                                    @endif
                                </a></span>
                            <span class="post-dot"></span>
                            <span class="post__date">
                                {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $blog_found->created_at)->format('d F Y') }}</span>
                            <span class="post-dot"></span>
                            <span class="post__time"><a href="#" class="text-gray">{{ $count_comment }}
                                    Comments</a></span>
                        </p>
                        <div class="section-block"></div>
                        @if (strlen($blog_found->contents) >= 800)
                            <div id="contents"
                                style="max-width: 100%;;text-overflow: ellipsis;overflow:hidden;white-space:nowrap;width: 100%;height: 400px;">
                                {!! $blog_found->contents !!}
                            </div>
                            <div class="btn-box load-more text-center" id="btn_load_more">
                                <button class="theme-btn theme-btn-small theme-btn-transparent" type="button">Read
                                    more</button>
                            </div>
                        @else
                            {!! $blog_found->contents !!}
                        @endif
                        <div class="section-block"></div>
                        <div class="post-tag-wrap d-flex align-items-center justify-content-between py-4">
                            <ul class="tag-list">
                                {{-- <li><a href="#">Tour</a></li>
                                <li><a href="#">Nature</a></li>
                                <li><a href="#">Beaches</a></li> --}}
                            </ul>
                            <div class="post-share">
                                <ul>
                                    <li>
                                        <i class="la la-share icon-element"></i>
                                        <ul class="post-share-dropdown d-flex align-items-center">
                                            <li><a href="#"><i class="lab la-facebook-f"></i></a></li>
                                            <li><a href="#"><i class="lab la-twitter"></i></a></li>
                                            <li><a href="#"><i class="lab la-instagram"></i></a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="section-block"></div>
                        <div class="post-navigation d-flex justify-content-between py-4">
                            <a title="See Previous Blog"
                                href="{{ $prev_blog != null ? route('blogs.show', $prev_blog->slug) : 'javascript:void(0)' }}"
                                class="btn theme-btn-hover-gray line-height-35"><i
                                    class="la la-arrow-left mr-2 {{ $prev_blog == null ? 'd-none' : '' }}"></i>{{ $prev_blog != null ? $prev_blog->title : '' }}</a>
                            <a title="See Next Blog"
                                href="{{ $next_blog != null ? route('blogs.show', $next_blog->slug) : 'javascript:void(0)' }}"
                                class="btn theme-btn-hover-gray line-height-35">{{ $next_blog != null ? $next_blog->title : '' }}<i
                                    class="la la-arrow-right ml-2 {{ $next_blog == null ? 'd-none' : '' }}"></i></a>
                        </div>
                        <div class="section-block"></div>
                        <div class="post-author-wrap">
                            <div class="author-content pt-5">
                                <div class="d-flex">
                                    <div class="author-img author-img-md mr-4">
                                        @if ($blog_found->admin_avt != '')
                                            <a href="#"><img
                                                    src="{{ url('admin/images') }}/{{ $blog_found->admin_avt }}"
                                                    alt="{{ $blog_found->admin_avt }}"></a>
                                        @endif
                                        @if ($blog_found->customer_avt != '')
                                            <a href="#"><img
                                                    src="{{ url('customers/images') }}/{{ $blog_found->customer_avt }}"
                                                    alt="{{ $blog_found->customer_avt }}"></a>
                                        @endif
                                    </div>
                                    <div class="author-bio">
                                        <h4 class="author__title"><a href="{{route('user_profile',$blog_found->cus_id)}}">
                                                @if ($blog_found->admin_name != '')
                                                    {{ $blog_found->admin_name }}
                                                @endif
                                                @if ($blog_found->customer_name != '')
                                                    {{ $blog_found->customer_name }}
                                                @endif
                                            </a></h4>
                                        <span class="author__meta">About the Author</span>
                                        <p class="author__text pt-1">
                                            @if ($blog_found->description != null)
                                                {!! $blog_found->description !!}
                                            @else
                                                Don't have information about this author
                                            @endif
                                        <ul class="social-profile pt-3">
                                            <li><a href="https://www.facebook.com/khongcotim/" target="_blank"><i
                                                        class="lab la-facebook-f"></i></a></li>
                                            <li><a href="#"><i class="lab la-twitter"></i></a></li>
                                            <li><a href="https://www.instagram.com/khongcotim_02_33/" target="_blank"><i
                                                        class="lab la-instagram"></i></a></li>
                                            <li><a href="#"><i class="lab la-linkedin-in"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- end card-item -->
                <div class="section-block"></div>
                <div class="related-posts pt-5 pb-4">
                    <h3 class="title">Related Posts</h3>
                    <div class="row pt-4">
                        @foreach ($related_blog as $related)
                            <div class="col-lg-6 responsive-column">
                                <div class="card-item blog-card">
                                    <div class="card-img">
                                        <img src="{{ url('admin/images') }}/{{ $related->image }}" height="300"
                                            alt="{{ $related->image }}">
                                        {{-- <div class="post-format icon-element">
                                            <i class="la la-music"></i>
                                        </div> --}}
                                        <div class="card-body">
                                            <h3 class="card-title line-height-26"><a
                                                    href="{{ route('blogs.show', $related->slug) }}">{{ $related->title }}</a>
                                            </h3>
                                            <p class="card-meta">
                                                <span class="post__date">
                                                    {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $related->created_at)->format('d F Y') }}</span>
                                                <span class="post-dot"></span>
                                                <span
                                                    class="post__time">{{ number_format(strlen($related->contents) / 240) }}
                                                    Mins read</span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <div class="author-content d-flex align-items-center">
                                            <div class="author-img">
                                                @if ($related->customer_avt != null)
                                                    <img src="{{ url('customers/images') }}/{{ $related->customer_avt }}"
                                                        alt="{{ $related->customer_avt }}">
                                                @endif
                                                @if ($related->admin_avt != null)
                                                    <img src="{{ url('admin/images') }}/{{ $related->admin_avt }}"
                                                        alt="{{ $related->admin_avt }}">
                                                @endif
                                            </div>
                                            <div class="author-bio">
                                                @if ($related->customer_name != null)
                                                    <a href="#"
                                                        class="author__title">{{ $related->customer_name }}</a>
                                                @endif
                                                @if ($related->admin_name != null)
                                                    <a href="#" class="author__title">{{ $related->admin_name }}</a>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="post-share">
                                            <ul>
                                                <li>
                                                    <i class="la la-share icon-element"></i>
                                                    <ul class="post-share-dropdown d-flex align-items-center">
                                                        <li><a href="#"><i class="lab la-facebook-f"></i></a></li>
                                                        <li><a href="#"><i class="lab la-twitter"></i></a></li>
                                                        <li><a href="#"><i class="lab la-instagram"></i></a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div><!-- end card-item -->
                            </div><!-- end col-lg-6 -->
                        @endforeach
                    </div><!-- end row -->
                </div>
                <div class="section-block"></div>
                <div class="comments-list pt-5">
                    <h3 class="title">Showing {{ $count_comment }} Comments</h3>
                    @foreach ($comments as $cmt)
                        <div class="comment pt-5">
                            <div class="comment-avatar">
                                <img class="avatar__img" alt="{{ $cmt->cus_name }}"
                                    src="{{ url('customers/images') }}/{{ $cmt->cus_avt }}">
                            </div>
                            <div class="comment-body">
                                <div class="meta-data">
                                    <h3 class="comment__author">{{ $cmt->cus_name }}</h3>
                                    <div class="meta-data-inner">
                                        <p class="comment__date">
                                            {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $cmt->created_at)->format('d F Y') }}
                                        </p>
                                    </div>
                                </div>
                                <p class="comment-content">
                                    {{ $cmt->contents }}
                                </p>
                                @if (Auth::guard('customer')->check())
                                    <div class="comment-reply">
                                        <a class="theme-btn" href="#" data-toggle="modal"
                                            data-target="#replayPopupForm{{ $cmt->id }}">
                                            <span class="la la-mail-reply mr-1"></span>Reply
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div><!-- end comments -->
                        @if (count($reply_cmt[$cmt->id]) > 0)
                            @foreach ($reply_cmt[$cmt->id] as $reply)
                                @if ($reply->admin_name != '')
                                    <div class="comment comment-reply-item">
                                        <div class="comment-avatar">
                                            <img class="avatar__img" alt="{{ $reply->admin_name }}"
                                                src="{{ url('admin/images') }}/{{ $reply->admin_avt }}">
                                        </div>
                                        <div class="comment-body">
                                            <div class="meta-data">
                                                <h3 class="comment__author">{{ $reply->admin_name }} <small
                                                        style="color: grey">Admin</small></h3>
                                                <div class="meta-data-inner">
                                                    <p class="comment__date">
                                                        {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $reply->created_at)->format('d F Y') }}
                                                    </p>
                                                </div>
                                            </div>
                                            <p class="comment-content">
                                                {{ $reply->contents }}
                                            </p>
                                        </div>
                                    </div><!-- end comments -->
                                @endif
                                @if ($reply->cus_name != '')
                                    <div class="comment comment-reply-item">
                                        <div class="comment-avatar">
                                            <img class="avatar__img" alt="{{ $reply->cus_name }}"
                                                src="{{ url('customers/images') }}/{{ $reply->cus_avt }}">
                                        </div>
                                        <div class="comment-body">
                                            <div class="meta-data">
                                                <h3 class="comment__author">{{ $reply->cus_name }}</h3>
                                                <div class="meta-data-inner">
                                                    <p class="comment__date">
                                                        {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $reply->created_at)->format('d F Y') }}
                                                    </p>
                                                </div>
                                            </div>
                                            <form action="{{ route('replies.update', $reply->id) }}" method="POST">
                                                @method('PUT')
                                                @csrf
                                                <p class="comment-content" id="reply_contents{{ $reply->id }}">
                                                    {{ $reply->contents }}
                                                </p>
                                                <textarea class="message-control form-control d-none"
                                                    id="message{{ $reply->id }}"
                                                    onkeyup="checkLength({{ $reply->id }})" name="message"
                                                    placeholder="Write message here...">{{ $reply->contents }}</textarea>
                                                <small style="display: none;color: red"
                                                    id="errMess{{ $reply->id }}">Please fill this field</small>
                                                <div class="pt-3">
                                                    <button type="reset" class="btn btn-secondary d-none"
                                                        id="cancer_update_reply{{ $reply->id }}"
                                                        onclick="cancer_reply({{ $reply->id }})">Cancer</button>
                                                    <button type="submit" class="btn btn-primary d-none"
                                                        id="update_reply{{ $reply->id }}">Update</button>
                                                </div>
                                            </form>
                                        </div>
                                        @if (Auth::guard('customer')->check())
                                            @if ($reply->customer_reply == Auth::guard('customer')->user()->id)
                                                <form action="{{ route('replies.destroy', $reply->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="comment-footer" style="right: 0;position: absolute">
                                                        <a class="btn btn-primary" style="text-align: right;color: #fff"
                                                            onclick="edit_reply(this.id)"
                                                            id="{{ $reply->id }}">Edit</a>
                                                        <button href="" id="delete_btn{{ $reply->id }}"
                                                            class="btn btn-secondary" type="submit"
                                                            onclick="return confirm('Are you sure??')">Delete</button>
                                                    </div>
                                                </form>
                                            @endif
                                        @endif
                                    </div><!-- end comments -->
                                @endif
                            @endforeach
                        @else
                        @endif
                    @endforeach
                </div><!-- end comments-list -->
                <div class="comment-forum pt-5">
                    <div class="form-box">
                        <div class="form-title-wrap">
                            <h3 class="title">Add a Comment</h3>
                        </div><!-- form-title-wrap -->
                        <div class="form-content">
                            <div class="contact-form-action">
                                @if (Auth::guard('customer')->check())
                                    <form method="post" action="{{ route('comment.store') }}">
                                        @csrf
                                        <input type="hidden" value="blog{{ $blog_found->id }}" name="type">
                                        <div class="row">
                                            <div class="col-lg-6 responsive-column">
                                                <div class="input-box">
                                                    <label class="label-text">Name</label>
                                                    <div class="form-group">
                                                        <span class="la la-user form-icon"></span>
                                                        <input class="form-control" type="text" name="name"
                                                            value="{{ Auth::guard('customer')->user()->name }}"
                                                            placeholder="Your name" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 responsive-column">
                                                <div class="input-box">
                                                    <label class="label-text">Email</label>
                                                    <div class="form-group">
                                                        <span class="la la-envelope-o form-icon"></span>
                                                        <input class="form-control" type="email" name="email"
                                                            value="{{ Auth::guard('customer')->user()->email }}"
                                                            placeholder="Email address" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="input-box">
                                                    <label class="label-text">Message</label>
                                                    <div class="form-group">
                                                        <span class="la la-pencil form-icon"></span>
                                                        <textarea class="message-control form-control" name="message"
                                                            placeholder="Write message"></textarea>
                                                    </div>
                                                </div>
                                                @if ($errors->has('message'))
                                                    <small style="color: red">{{ $errors->first('message') }}</small>
                                                @endif
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <div class="custom-checkbox">
                                                        <input type="checkbox" id="chbyes">
                                                        <label for="chbyes">Save my name, email, and website in this
                                                            browser for the next time I comment.</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="btn-box">
                                                    <button type="submit" class="theme-btn">Leave a
                                                        Comment</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                @else
                                    <h5><a href="{{ route('customer.login', ['page' => Request::path('blog')]) }}">Please
                                            login to comment</a></h5>
                                @endif
                            </div><!-- end contact-form-action -->
                        </div><!-- end form-content -->
                    </div><!-- end form-box -->
                </div><!-- end comment-forum -->
            </div><!-- end col-lg-8 -->
            <div class="col-lg-4">
                <div class="sidebar mb-0">
                    <div class="sidebar-widget">
                        <h3 class="title stroke-shape">Search Post</h3>
                        <div class="contact-form-action">
                            <div class="input-box">
                                <div class="form-group mb-0">
                                    <input class="form-control pl-3" id="searchKey" onkeyup="suggestPost()" type="text"
                                        placeholder="Type your keywords...">
                                    <button class="search-btn" type="button"><i
                                            class="la la-search"></i></button>
                                </div>
                            </div>
                            <div class="tab-pane" role="tabpanel" aria-labelledby="new-tab" id="printSuggest">
                            </div>
                        </div>
                    </div><!-- end sidebar-widget -->
                    <div class="sidebar-widget">
                        <div class="section-tab section-tab-2 pb-3">
                            <ul class="nav nav-tabs" id="myTab3" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="recent-tab" data-toggle="tab" href="#recent"
                                        role="tab" aria-controls="recent" aria-selected="true">
                                        Recent
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="new-tab" data-toggle="tab" href="#new" role="tab"
                                        aria-controls="new" aria-selected="false">
                                        New
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane show active" id="recent" role="tabpanel" aria-labelledby="recent-tab">
                                @if (Auth::guard('customer')->check())
                                    @foreach ($recent_post as $recent)
                                        <div class="card-item card-item-list recent-post-card mb-0">
                                            <div class="card-img">
                                                <a href="{{ route('blogs.show', $recent->slug) }}"
                                                    class="d-block">
                                                    <img src="{{ url('admin/images') }}/{{ $recent->image }}"
                                                        alt="{{ $recent->image }}">
                                                </a>
                                            </div>
                                            <div class="card-body">
                                                <h3 class="card-title"><a
                                                        href="{{ route('blogs.show', $recent->slug) }}">{{ $recent->title }}</a>
                                                </h3>
                                                <p class="card-meta">
                                                    <span class="post__date">
                                                        {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $recent->created_at)->format('d F Y') }}</span>
                                                    <span class="post-dot"></span>
                                                    <span
                                                        class="post__time">{{ number_format(strlen($recent->contents) / 240) }}
                                                        Mins read</span>
                                                </p>
                                            </div>
                                        </div><!-- end card-item -->
                                    @endforeach
                                @else
                                    <h6><a href="{{ route('customer.login', ['page' => Request::path('blog')]) }}">Please
                                            login to view your recent post</a></h6>
                                @endif
                            </div><!-- end tab-pane -->
                            <div class="tab-pane " id="new" role="tabpanel" aria-labelledby="new-tab">
                                @foreach ($new_post as $new)
                                    <div class="card-item card-item-list recent-post-card mb-0">
                                        <div class="card-img">
                                            <a href="{{ route('blogs.show', $new->slug) }}" class="d-block">
                                                <img src="{{ url('admin/images') }}/{{ $new->image }}"
                                                    alt="{{ $new->image }}">
                                            </a>
                                        </div>
                                        <div class="card-body">
                                            <h3 class="card-title"><a
                                                    href="{{ route('blogs.show', $new->slug) }}">{{ $new->title }}</a>
                                            </h3>
                                            <p class="card-meta">
                                                <span class="post__date">
                                                    {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $new->created_at)->format('d F Y') }}</span>
                                                <span class="post-dot"></span>
                                                <span
                                                    class="post__time">{{ number_format(strlen($new->contents) / 240) }}
                                                    Mins read</span>
                                            </p>
                                        </div>
                                    </div><!-- end card-item -->
                                @endforeach
                            </div><!-- end tab-pane -->
                        </div>
                    </div><!-- end sidebar-widget -->
                    <div class="sidebar-widget">
                        <h3 class="title stroke-shape">About us</h3>
                        <div class="sidebar-about">
                            <div class="sidebar-about-img">
                                <img src="{{ url('customers') }}/images/destination-img3.jpg" alt="">
                                <p class="font-size-28 font-weight-bold text-white">TLS</p>
                            </div>
                            <p class="pt-3">Sed ut perspiciatis unde omnis iste natus error sit voluptatem
                                eaque ipsa quae ab illo inventore incididunt ut labore et dolore magna</p>
                        </div>
                    </div><!-- end sidebar-widget -->
                    <div class="sidebar-widget">
                        <h3 class="title stroke-shape">Follow & Connect</h3>
                        <ul class="social-profile">
                            <li><a href="#"><i class="lab la-facebook-f"></i></a></li>
                            <li><a href="#"><i class="lab la-twitter"></i></a></li>
                            <li><a href="#"><i class="lab la-instagram"></i></a></li>
                            <li><a href="#"><i class="lab la-linkedin-in"></i></a></li>
                        </ul>
                    </div><!-- end sidebar-widget -->
                </div><!-- end sidebar -->
            </div><!-- end col-lg-4 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end card-area -->
<!-- ================================
    END CARD AREA
================================= -->

<!-- ================================
    START CTA AREA
================================= -->
<section class="cta-area subscriber-area section-bg-2 padding-top-60px padding-bottom-60px">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <div class="section-heading">
                    <h2 class="sec__title font-size-30 text-white">Subscribe to see Secret Deals</h2>
                </div><!-- end section-heading -->
            </div><!-- end col-lg-7 -->
            <div class="col-lg-5">
                <div class="subscriber-box">
                    <div class="contact-form-action">
                        <form action="#">
                            <div class="input-box">
                                <label class="label-text text-white">Enter email address</label>
                                <div class="form-group mb-0">
                                    <span class="la la-envelope form-icon"></span>
                                    <input class="form-control" type="email" name="email"
                                        placeholder="Email address">
                                    <button class="theme-btn theme-btn-small submit-btn"
                                        type="submit">Subscribe</button>
                                    <span class="font-size-14 pt-1 text-white-50"><i class="la la-lock mr-1"></i>Don't
                                        worry your information is safe with us.</span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div><!-- end section-heading -->
            </div><!-- end col-lg-5 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end cta-area -->
<!-- ================================
    END CTA AREA
================================= -->
@stop
@section('modal')
@foreach ($comments as $cmt)
    <div class="modal-popup">
        <div class="modal fade" id="replayPopupForm{{ $cmt->id }}" tabindex="-1" role="dialog"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <form method="post" action="{{ route('replies.store') }}">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title title" id="exampleModalLongTitle3">Replay to comment</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true" class="la la-close"></span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="contact-form-action">
                                <input type="hidden" name="reply_to" value="{{ $cmt->id }}">
                                <input type="hidden" name="type" value="blog">
                                <div class="input-box">
                                    <div class="form-group mb-0">
                                        <i class="la la-pencil form-icon"></i>
                                        <textarea class="message-control form-control" id="message{{ $cmt->id }}"
                                            name="message"
                                            placeholder="Write message here...">{{ $cmt->cus_name }}</textarea>
                                        <small style="display: none;color: red" id="errMess{{ $cmt->id }}">Please
                                            fill this field</small>
                                    </div>
                                </div>
                            </div><!-- end contact-form-action -->
                        </div>
                        <div class="modal-footer border-top-0 pt-0">
                            <button type="button" class="btn font-weight-bold font-size-15 color-text-2 mr-2"
                                data-dismiss="modal">Cancel</button>
                            <button type="submit" class="theme-btn theme-btn-small"
                                id="reply_comment{{ $cmt->id }}">Replay</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach
@endsection
<?php $get_comments = $comments;
$all_comments = [];
foreach ($get_comments as $key => $value) {
    array_push($all_comments, $value->id);
}
$all_name = [];
foreach ($get_comments as $key => $value) {
    $all_name[$value->id] = $value->cus_name;
}
?>
@section('js')
<script>
    function checkLength(id_reply) {
        var messLength = ($('#message' + id_reply).val()).length;
        if (messLength > 0) {
            $('#update_reply' + id_reply).attr('type', 'submit');
            $('#update_reply' + id_reply).removeClass('d-none');
            $('#errMess' + id_reply).hide(200);
        } else {
            $('#update_reply' + id_reply).attr('type', 'button');
            $('#update_reply' + id_reply).addClass('d-none');
            $('#errMess' + id_reply).show(200);
        }
    }
    //Update Reply
    function edit_reply(id_reply) {
        $('#reply_contents' + id_reply).hide(200);
        $('#message' + id_reply).removeClass('d-none');
        $('#' + id_reply).hide(200);
        $('#delete_btn' + id_reply).hide(200);
        $('#cancer_update_reply' + id_reply).removeClass('d-none');
        $('#update_reply' + id_reply).removeClass('d-none');
    }
    //Cancer update
    function cancer_reply(id_reply) {
        $('#reply_contents' + id_reply).show(200);
        $('#message' + id_reply).addClass('d-none');
        $('#' + id_reply).show(200);
        $('#delete_btn' + id_reply).show(200);
        $('#cancer_update_reply' + id_reply).addClass('d-none');
        $('#update_reply' + id_reply).addClass('d-none');
        $('#errMess' + id_reply).hide(200);
    }

    //write reply
    var comments = {!! json_encode($all_comments) !!};
    var all_name = {!! json_encode($all_name) !!}
    comments.forEach(element => {
        $('#reply_comment' + element).hide();
        $('#errMess' + element).hide();
        $('#message' + element).on('keyup', function() {
            if ($('#message' + element).val().indexOf(' ') != -1) {
                $('#message' + element).not($('#message' + element).html(all_name[element])).css(
                    'font-weight', 'normal');
            }
            var messageLength = ($('#message' + element).val()).length;
            if (messageLength > 0) {
                $('#message' + element).css('border', '1px solid green');
                $('#errMess' + element).hide(100);
                $('#reply_comment' + element).show(200);
            } else {
                $('#errMess' + element).show(100);
                $('#message' + element).css('border', '1px solid red');
                $('#reply_comment' + element).hide();
            }
        })
    });

    $('#btn_load_more').on('click', function() {
        $('#btn_load_more').hide(200);
        $('#contents').css('height', '100%');
    })

    function suggestPost() {
        var searchKey = $('#searchKey').val();
        $.ajax({
                url: "{{ route('blogs.index') }}",
                type: "get",
                datatype: "html",
                data: {
                    search_key: searchKey
                },
                beforeSend: function() {
                    $('.ajax-loading').show();
                }
            })
            .done(function(suggest) {
                if (suggest.length == 0) {
                    $('#printSuggest').html("Not found" + " '" + searchKey + "'");
                    return;
                } else if (searchKey.length == 0) {
                    $("#printSuggest").html('');
                } else if (searchKey.length > 0 && suggest.length > 0) {
                    $('.ajax-loading').hide();
                    $("#printSuggest").html(suggest);
                }
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                alert('No response from server');
            });
    }
</script>
@endsection
