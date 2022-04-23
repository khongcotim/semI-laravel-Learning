@extends('admin.master.master')
@section('main')
@section('feedback', 'active')
@section('manage_feedback', 'active')
@section('title', 'Manage Feedback and FAQ')
<div class="dashboard-bread dashboard--bread dashboard-bread-2">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="breadcrumb-content">
                    <div class="section-heading">
                        <h2 class="sec__title font-size-30 text-white">Feedback and FAQ</h2>
                    </div>
                </div><!-- end breadcrumb-content -->
            </div><!-- end col-lg-6 -->
            <div class="col-lg-6">
                <div class="breadcrumb-list text-right">
                    <ul class="list-items">
                        <li><a href="{{ route('admin.home') }}" class="text-white">Home</a></li>
                        <li>Feedback</li>
                        @if (Request::get('selection') == 'feedback')
                            <li>Manage Feedback</li>
                        @else
                            <li>Manage FAQ</li>
                        @endif
                    </ul>
                </div><!-- end breadcrumb-list -->
            </div><!-- end col-lg-6 -->
        </div><!-- end row -->
    </div>
</div><!-- end dashboard-bread -->
<div class="dashboard-main-content ">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="form-box">
                    <div class="form-title-wrap">
                        <form action="">
                            @if ($get_keyword != '')
                                <input type="hidden" name="keyword" value="{{ $get_keyword }}">
                            @else
                            @endif
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    @if (Request::get('selection') == 'feedback')
                                        <h3 class="title">Manage Feedback</h3>
                                    @else
                                        <h3 class="title">Manage FAQ</h3>
                                    @endif
                                    <p class="font-size-14">Showing {{ $feedback->firstItem() }}
                                        {{ $feedback->count() != 1 ? 'to' . ' ' . $feedback->count() : '' }} of
                                        {{ $feedback->total() }} results</p>
                                </div>
                                <div class="select-contain" style="margin-left: 50%">
                                    <div class="dropdown">
                                        <select name="selection" onchange="this.form.submit()"
                                            class="select-contain-select" tabindex="-98">
                                            <option value="faq"
                                                {{ Request::get('selection') == 'faq' ? 'selected' : '' }}>
                                                FAQ</option>
                                            <option value="feedback"
                                                {{ Request::get('selection') == 'feedback' ? 'selected' : '' }}>
                                                Feedback
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="select-contain">
                                    <div class="dropdown">
                                        <select name="condition" onchange="this.form.submit()"
                                            class="select-contain-select" tabindex="-98">
                                            <option value="all"
                                                {{ Request::get('condition') == 'all' ? 'selected' : '' }}>Any
                                                Time</option>
                                            <option value="desc"
                                                {{ Request::get('condition') == 'desc' ? 'selected' : '' }}>
                                                Latest</option>
                                            <option value="asc"
                                                {{ Request::get('condition') == 'asc' ? 'selected' : '' }}>Oldest
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </form>
                        @if (Request::get('selection') == 'feedback')
                            <div class="form-content">
                                <div class="table-form table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">STT</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Solution</th>
                                                <th scope="col">Answer</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Time</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($feedback as $value)
                                                @if ($value->customer_id != null)
                                                    <tr>
                                                        <td>{{ $loop->index + 1 }}</td>
                                                        <td>{{ $value->customer_name }}</td>
                                                        <td>{{ $value->solution }}</td>
                                                        {{-- <td>
                                                            <img width="230px"
                                                                src="{{ url('admin/images') }}/{{ $value->image }}"
                                                                alt="{{ $value->image }}">
                                                        </td> --}}
                                                        <td>{{ $value->answer == null ? 'No reply' : $value->answer }}
                                                        </td>
                                                        @if ($value->who_except != null)
                                                            <td style="color:green">Accept by
                                                                {{ $array[$value->id]->name }}</td>
                                                        @else
                                                            <td>Non Accept</td>
                                                        @endif
                                                        <td>{{ $value->created_at }}</td>
                                                        @if ($value->who_except != null)
                                                            <td>
                                                                <i class="las la-check"
                                                                    style="font-size: 18px; color: green">Answered</i>
                                                            </td>
                                                        @else
                                                            <td>
                                                                <button class="btn btn-primary" data-toggle="modal"
                                                                    data-target="#answer_question{{ $value->id }}">Answer</button>
                                                            </td>
                                                        @endif
                                                    </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @else
                            <section class="faq-area section-bg padding-top-100px padding-bottom-60px mt-4">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="section-heading text-center">
                                                <h2 class="sec__title">Frequently Asked Questions</h2>
                                            </div><!-- end section-heading -->
                                        </div><!-- end col-lg-12 -->
                                    </div><!-- end row -->
                                    <div class="row padding-top-60px">
                                        <div class="col-lg-12">
                                            <div class="faq-item mb-5">
                                                <h3 class="title font-weight-bold">Cancellations</h3>
                                                <ul class="toggle-menu list-items list-items-flush pt-4">
                                                    @foreach ($feedback as $value)
                                                        @if ($value->admin_id != null)
                                                            <li>
                                                                <a href="#"
                                                                    class="toggle-menu-icon d-flex justify-content-between align-items-center">
                                                                    {{ $value->solution }}
                                                                    <i class="la la-angle-down"></i>
                                                                </a>
                                                                <form
                                                                    action="{{ route('feedback.destroy', $value->id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <ul class="toggle-drop-menu pt-2">
                                                                        <li class="line-height-26">
                                                                            {{ $value->answer }}</li>
                                                                        <a href="{{ route('feedback.edit', $value->id) }}"
                                                                            class="btn btn-primary">Edit</a>
                                                                        <button type="submit" class="btn btn-danger"
                                                                            onclick="return confirm('Are you sure ??')">Delete</button>
                                                                    </ul>
                                                                </form>
                                                            </li>

                                                        @endif
                                                    @endforeach
                                                </ul>
                                            </div><!-- end faq-item -->
                                        </div><!-- end col-lg-6 -->
                                    </div><!-- end row -->
                                </div><!-- end container -->
                            </section>
                        @endif
                    </div><!-- end form-box -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
            <div class="row">
                <div class="col-lg-12">
                    <nav aria-label="Page navigation example">
                        {{ $feedback->appends($_GET) }}
                    </nav>
                </div>
            </div>


            <!-- end row -->
        </div><!-- end container-fluid -->
    </div><!-- end dashboard-main-content -->
@stop
@section('send_feedback')
    @foreach ($feedback as $fb)
        <div class="modal-popup">
            <form action="{{ route('feedback.update', $fb->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal fade" id="answer_question{{ $fb->id }}" tabindex="-1" role="dialog"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title title" id="exampleModalLongTitle3">Answer the feedback</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" class="la la-close"></span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="contact-form-action">
                                    <form method="post">
                                        <div class="input-box">
                                            <div class="form-group mb-0">
                                                <i class="la la-pencil form-icon"></i>
                                                <textarea class="message-control form-control" onkeyup="checkLength()"
                                                    id="writeAnswer{{ $fb->id }}" name="message"
                                                    placeholder="Write message here..."></textarea>
                                                <small style="color: red" id="messageErr{{ $fb->id }}">Please
                                                    fill this field to
                                                    answer</small>
                                            </div>
                                        </div>
                                    </form>
                                </div><!-- end contact-form-action -->
                            </div>
                            <div class="modal-footer border-top-0 pt-0">
                                <button type="reset" class="btn font-weight-bold font-size-15 color-text-2 mr-2"
                                    data-dismiss="modal">Cancel</button>
                                <button type="button" class="theme-btn theme-btn-small"
                                    id="answer{{ $fb->id }}">Answer</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    @endforeach
@endsection
<?php $get_feedback = $feedback->items();
$all_feedback = [];
foreach ($get_feedback as $key => $value) {
    array_push($all_feedback, $value->id);
}
?>
@section('js')
    <script>
        var all_feedback = {!! json_encode($all_feedback) !!};
        all_feedback.forEach(id_feedback => {
            $('#messageErr' + id_feedback).hide();
        });
        function checkLength() {
            all_feedback.forEach(id_feedback => {
                var character = $('#writeAnswer' + id_feedback).val();
                var countCharacter = character.length;
                if (countCharacter > 0) {
                    $('#messageErr' + id_feedback).hide(200);
                    $('#writeAnswer' + id_feedback).css('border', '1px solid green');
                    $('#answer' + id_feedback).attr('type', 'submit');
                } else {
                    $('#messageErr' + id_feedback).show(200);
                    $('#writeAnswer' + id_feedback).css('border', '1px solid red');
                    $('#answer' + id_feedback).attr('type', 'button');
                }
            });
        }
        all_feedback.forEach(id_feedback => {
        $('#answer' + id_feedback).on('click', function() {
                var character = $('#writeAnswer' + id_feedback).val();
                var countCharacter = character.length;
                if (countCharacter > 0) {
                    $('#messageErr' + id_feedback).hide(200);
                    $('#answer' + id_feedback).attr('type', 'submit');
                } else {
                    $('#messageErr' + id_feedback).show(200);
                    $('#answer' + id_feedback).attr('type', 'button');
                    $('#writeAnswer' + id_feedback).css('border', '1px solid red');
                    $("#answer_question" + id_feedback).effect("shake", {
                        direction: "right",
                        times: 4,
                        distance: 5
                    }, 1000);
                }
            })
        })
    </script>
@endsection
