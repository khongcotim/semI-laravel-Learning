@extends('admin.master.master')
@section('main')
@section('feedback','active')
@section('create_feedback','active')
@section('title','Create New FAQ')
<div class="dashboard-bread dashboard--bread dashboard-bread-2">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="breadcrumb-content">
                    <div class="section-heading">FAQ</h2>
                    </div>
                </div><!-- end breadcrumb-content -->
            </div><!-- end col-lg-6 -->
            <div class="col-lg-6">
                <div class="breadcrumb-list text-right">
                    <ul class="list-items">
                        <li><a href="{{route('admin.home')}}" class="text-white">Home</a></li>
                        <li>Feedback and FAQ</li>
                        <li>Create FAQ</li>
                    </ul>
                </div><!-- end breadcrumb-list -->
            </div><!-- end col-lg-6 -->
        </div><!-- end row -->
    </div>
</div>

<section class="listing-form section--padding">
    <div class="container">
        <form action="{{route('feedback.store')}}" method="POST">
            @csrf
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-box">
                        <div class="form-title-wrap">
                            <h3 class="title"><i class="la la-gear mr-2 text-gray"></i>Add New FAQ</h3>
                        </div><!-- form-title-wrap -->
                        <div class="form-content contact-form-action">
                                <div class="col-lg-12">
                                    <div class="input-box">
                                        <label class="label-text">Solution</label>
                                        <div class="form-group">
                                            <span class="la la-briefcase form-icon"></span>
                                            <input value="{{old('solution')}}" class="form-control" type="text" name="solution" placeholder="Enter title here">
                                        </div>
                                        @if ($errors->has('solution'))
                                            <small style="color: red">{{$errors->first('solution')}}</small>
                                        @endif
                                    </div>
                                </div><!-- end col-lg-12 -->
                                <div class="col-lg-12">
                                    <div class="input-box">
                                        <label class="label-text">Answer</label>
                                        <div class="form-group">
                                            <span class="la la-pencil form-icon"></span>
                                            <textarea class="message-control form-control" name="answer">{{old('answer')}}</textarea>
                                        </div>
                                        @if ($errors->has('answer'))
                                            <small style="color: red">{{$errors->first('answer')}}</small>
                                        @endif
                                    </div>
                                </div><!-- end col-lg-12 -->
                        </div><!-- end form-content -->
                    </div><!-- end form-box -->
                    <div class="submit-box">
                        <div class="btn-box pt-3">
                            <button type="submit" class="theme-btn">Add New FAQ <i class="la la-arrow-right ml-1"></i></button>
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