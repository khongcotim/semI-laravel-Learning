<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="{{ url('customers') }}/images/favicon.png">
    <!--plugins-->
    <link href="{{ url('admin/assets_authenticate') }}/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="{{ url('admin/assets_authenticate') }}/plugins/fancy-file-uploader/fancy_fileupload.css" rel="stylesheet" />
	<link href="{{ url('admin/assets_authenticate') }}/plugins/Drag-And-Drop/dist/imageuploadify.min.css" rel="stylesheet" />
	<link href="{{ url('admin/assets_authenticate') }}/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="{{ url('admin/assets_authenticate') }}/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
	<!-- loader-->
	<link href="{{ url('admin/assets_authenticate') }}/css/pace.min.css" rel="stylesheet" />
	<script src="{{ url('admin/assets_authenticate') }}/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="{{ url('admin/assets_authenticate') }}/css/bootstrap.min.css" rel="stylesheet">
	<link href="{{ url('admin/assets_authenticate') }}/css/bootstrap-extended.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
	<link href="{{ url('admin/assets_authenticate') }}/css/app.css" rel="stylesheet">
	<link href="{{ url('admin/assets_authenticate') }}/css/icons.css" rel="stylesheet">
	<!-- Theme Style CSS -->
	<link rel="stylesheet" href="{{ url('admin/assets_authenticate') }}/css/dark-theme.css" />
	<link rel="stylesheet" href="{{ url('admin/assets_authenticate') }}/css/semi-dark.css" />
	<link rel="stylesheet" href="{{ url('admin/assets_authenticate') }}/css/header-colors.css" />
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <title>Sign up</title>
</head>

<body class="bg-login">
    <!--wrapper-->
    <div class="wrapper">
        <div class="d-flex align-items-center justify-content-center my-5 my-lg-0">
            <div class="container">
                <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-2">
                    <div class="col mx-auto">
                        <div class="card">
                            <div class="card-body">
                                <div class="border p-4 rounded">
                                    <div class="text-center">
                                        <h3 class="">Sign Up</h3>
										<p>Already have an account? <a href="
                                            {{ route('customer.login') }}">Sign in here</a>
                                            </p>
                                    </div>
                                    <div class="d-grid">
                                        <a class="btn my-4 shadow-sm btn-white" href="javascript:;"> <span
                                                class="d-flex justify-content-center align-items-center">
                                                <img class="me-2"
                                                    src="{{ url('admin/assets_authenticate') }}/images/icons/search.svg"
                                                    width="16" alt="Image Description">
                                                <span>Sign Up with Google</span>
                                            </span>
                                        </a> <a href="javascript:;" class="btn btn-facebook"><i
                                                class="bx bxl-facebook"></i>Sign Up with Facebook</a>
                                    </div>
                                    <div class="login-separater text-center mb-4"> <span>OR SIGN UP WITH EMAIL</span>
                                        <hr />
                                    </div>
                                    <div class="form-body">
                                        <form class="row g-3" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <label for="name" class="form-label">Name</label>
                                                        <input type="name" value="{{ old('name') }}"
                                                            class="form-control" name="name" id="name"
                                                            placeholder="Enter your new name">
                                                        @if ($errors->has('name'))
                                                            <small
                                                                style="color: red">{{ $errors->first('name') }}</small>
                                                        @endif
                                                    </div>
                                                    <div class="col-sm-6">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 mx-auto">
                                                <h6 class="mb-0">Avatar</h6>
                                                <hr/>
                                                <div class="card">
                                                    <div class="card-body">
                                                        <input id="image-uploadify" name="avatar" type="file" accept=".xlsx,.xls,image/*,.doc,audio/*,.docx,video/*,.ppt,.pptx,.txt,.pdf" only_image>
                                                        <small class="d-none" id="warning_choose_img">You can choose only one avatar, we'll get the first avatar uploaded. Please keep avatar what you want to choose, then delete other image</small>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <label for="phone" class="form-label">Phone Number</label>
                                                <input type="text" value="{{ old('phone') }}" class="form-control"
                                                    name="phone" id="phone" placeholder="0xxxxxxxx0">
                                                @if ($errors->has('phone'))
                                                    <small style="color: red">{{ $errors->first('phone') }}</small>
                                                @endif
                                            </div>
                                            <div class="col-12">
                                                <label for="email" class="form-label">Email Address</label>
                                                <input type="email" value="{{ old('email') }}" class="form-control"
                                                    name="email" id="email" placeholder="example@user.com">
                                                @if ($errors->has('email'))
                                                    <small style="color: red">{{ $errors->first('email') }}</small>
                                                @endif
                                            </div>
                                            <div class="col-12">
                                                <label for="password" class="form-label">Password</label>
                                                <div class="input-group" id="show_hide_password">
                                                    <input value="{{ old('pass') }}" type="password"
                                                        class="form-control border-end-0" id="password" name="pass"
                                                        placeholder="Enter Password"> <a href="javascript:;"
                                                        class="input-group-text bg-transparent"><i
                                                            class='bx bx-hide'></i></a>
                                                </div>
                                                @if ($errors->has('pass'))
                                                    <small style="color: red">{{ $errors->first('pass') }}</small>
                                                @endif
                                                <div class="col-12 mt-2">
                                                    <label for="cf_password" class="form-label">Confirm
                                                        Password</label>
                                                    <div class="input-group" id="show_hide_cf_password">
                                                        <input type="password" value="{{ old('cf_password') }}"
                                                            class="form-control border-end-0" id="cf_password"
                                                            name="cf_password" placeholder="Confirm your Password"> <a
                                                            href="javascript:;"
                                                            class="input-group-text bg-transparent"><i
                                                                class='bx bx-hide'></i></a>
                                                    </div>
                                                    @if ($errors->has('cf_password'))
                                                        <small
                                                            style="color: red">{{ $errors->first('cf_password') }}</small>
                                                    @endif
                                                </div>
                                                <div class="col-12 mt-4 mb-3">
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox"
                                                            id="checkCondition" onclick="checkClick()">
                                                        <label class="form-check-label" for="checkCondition">I read and
                                                            agree to Terms & Conditions</label>
                                                    </div>
                                                </div>

                                                <div class="col-12 mt-2">
                                                    <i class="las la-exclamation-triangle" style="font-size: 20px"></i>
                                                    <label class="form-check-label">Agree to our Term and Condition to
                                                        Register Account</label>
                                                </div>
                                                <div class="col-12">
                                                    <div class="d-grid">
                                                        <button type="button" id="showButton" class="btn btn-primary"><i
                                                                class='bx bx-user'></i>Sign up</button>
                                                    </div>
                                                </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end row-->
            </div>
        </div>
    </div>
    <!--end wrapper-->
    <!-- Bootstrap JS -->
    <script src="{{ url('admin/assets_authenticate') }}/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	<script src="{{ url('admin/assets_authenticate') }}/js/jquery.min.js"></script>
	<script src="{{ url('admin/assets_authenticate') }}/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="{{ url('admin/assets_authenticate') }}/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="{{ url('admin/assets_authenticate') }}/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<script src="{{ url('admin/assets_authenticate') }}/plugins/fancy-file-uploader/jquery.ui.widget.js"></script>
	<script src="{{ url('admin/assets_authenticate') }}/plugins/fancy-file-uploader/jquery.fileupload.js"></script>
	<script src="{{ url('admin/assets_authenticate') }}/plugins/fancy-file-uploader/jquery.iframe-transport.js"></script>
	<script src="{{ url('admin/assets_authenticate') }}/plugins/fancy-file-uploader/jquery.fancy-fileupload.js"></script>
	<script src="{{ url('admin/assets_authenticate') }}/plugins/Drag-And-Drop/dist/imageuploadify.min.js"></script>
	<script>
		$('#fancy-file-upload').FancyFileUpload({
			params: {
				action: 'fileuploader'
			},
			maxfilesize: 1000000
		});
	</script>
	<script>
		$(document).ready(function () {
			$('#image-uploadify').imageuploadify();
		})
	</script>
	<!--app JS-->
	<script src="{{ url('admin/assets_authenticate') }}/js/app.js"></script>
    <!--Password show & hide js -->
    <script>
        $(document).ready(function() {
            $("#show_hide_password a").on('click', function(event) {
                event.preventDefault();
                if ($('#show_hide_password input').attr("type") == "text") {
                    $('#show_hide_password input').attr('type', 'password');
                    $('#show_hide_password i').addClass("bx-hide");
                    $('#show_hide_password i').removeClass("bx-show");
                } else if ($('#show_hide_password input').attr("type") == "password") {
                    $('#show_hide_password input').attr('type', 'text');
                    $('#show_hide_password i').removeClass("bx-hide");
                    $('#show_hide_password i').addClass("bx-show");
                }
            });
            $("#show_hide_cf_password a").on('click', function(event) {
                event.preventDefault();
                if ($('#show_hide_cf_password input').attr("type") == "text") {
                    $('#show_hide_cf_password input').attr('type', 'password');
                    $('#show_hide_cf_password i').addClass("bx-hide");
                    $('#show_hide_cf_password i').removeClass("bx-show");
                } else if ($('#show_hide_cf_password input').attr("type") == "password") {
                    $('#show_hide_cf_password input').attr('type', 'text');
                    $('#show_hide_cf_password i').removeClass("bx-hide");
                    $('#show_hide_cf_password i').addClass("bx-show");
                }
            });
        });
    </script>
    <script>
        $('#showButton').hide();

        function checkClick() {
            var checkCheckedCondition = $('#checkCondition').is(':checked');
            if (checkCheckedCondition == true) {
                $('#showButton').show(200);
                $('#showButton').attr('type', 'submit');
            } else {
                $('#showButton').hide(200);
                $('#showButton').attr('type', 'button');
            }
        }
    </script>
    <!--app JS-->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @yield('js')
    <script>
        var add_success = "{{ Session::has('add_success') ? Session::get('add_success') : '' }}";
        var edit_success = "{{ Session::has('edit_success') ? Session::get('edit_success') : '' }}";
        var delete_success = "{{ Session::has('delete_success') ? Session::get('delete_success') : '' }}";
        var error = "{{ Session::has('error') ? Session::get('error') : '' }}";
        var warning = "{{ Session::has('warning') ? Session::get('warning') : '' }}";
        if (add_success != '') {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })
            Toast.fire({
                icon: 'success',
                title: add_success
            })
        } else if (edit_success != '') {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })
            Toast.fire({
                icon: 'success',
                title: edit_success
            })
        } else if (delete_success != '') {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })
            Toast.fire({
                icon: 'success',
                title: delete_success
            })
        } else if (warning != '') {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })
            Toast.fire({
                icon: 'warning',
                title: warning
            })
        } else if (error != '') {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })
            Toast.fire({
                icon: 'error',
                title: error
            })
        }
    </script>
</body>

</html>
