<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
    <link rel="icon" href="{{url('admin')}}/images/favicon.png">
	<!-- loader-->
	<link href="{{url('admin/assets_authenticate')}}/css/pace.min.css" rel="stylesheet" />
	<script src="{{url('admin/assets_authenticate')}}/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="{{url('admin/assets_authenticate')}}/css/bootstrap.min.css" rel="stylesheet">
	<link href="{{url('admin/assets_authenticate')}}/css/bootstrap-extended.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
	<link href="{{url('admin/assets_authenticate')}}/css/app.css" rel="stylesheet">
	<link href="{{url('admin/assets_authenticate')}}/css/icons.css" rel="stylesheet">
	<title>Recovery Password | Adminstrator</title>
</head>

<body class="bg-forgot">
	<!-- wrapper -->
	<div class="wrapper">
		<div class="authentication-forgot d-flex align-items-center justify-content-center">
			<div class="card forgot-box">
				<div class="card-body">
					<form method="POST">
						@csrf
						<div class="p-4 rounded  border">
							<div class="text-center">
								<img src="{{url('admin/assets_authenticate')}}/images/icons/forgot-2.png" width="120" alt="" />
							</div>
							<h4 class="mt-5 font-weight-bold">Forgot Password?</h4>
							<p class="text-muted">Enter your code from your email to authenticate</p>
							<div class="my-4">
								<label for="code_generate">Code</label>
								<input type="text" class="form-control form-control-lg" value="{{old('code')}}" name="code" id="code_generate" placeholder="Enter code here" />
								@if($errors->has('code'))
									<span style="color:red">{{$errors->first('code')}}</span>
								@endif
							</div>
							<div class="my-4">
								<label for="password">New password</label>
                                <div class="input-group" id="show_hide_password">
                                    <input type="password" name="pass" class="form-control border-end-0" value="{{old('pass')}}" id="password" placeholder="Enter your password here"> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
                                </div>
								@if($errors->has('pass'))
									<span style="color:red">{{$errors->first('pass')}}</span>
								@endif
							</div>
							<div class="my-4">
								<label for="cf_password">Comfirm password</label>
                                <div class="input-group" id="show_hide_cf_password">
                                    <input type="password" name="cf_password" value="{{old('cf_password')}}" class="form-control border-end-0" id="cf_password" value="" placeholder="Confirm your password"> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
                                </div>
								@if($errors->has('cf_password'))
									<span style="color:red">{{$errors->first('cf_password')}}</span>
								@endif
							</div>
							<div class="d-grid gap-2">
								<button type="submit" class="btn btn-primary btn-lg">Send</button> <a href="{{route('adminLogin')}}" class="btn btn-light btn-lg"><i class='bx bx-arrow-back me-1'></i>Back to Login</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- end wrapper -->
	<script src="{{url('admin')}}/assets_authenticate/js/jquery.min.js"></script>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    	<!--Password show & hide js -->
        <script>
            $(document).ready(function () {
                $("#show_hide_password a").on('click', function (event) {
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
                $("#show_hide_cf_password a").on('click', function (event) {
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
        var add_success = "{{ Session::has('add_success') ? Session::get('add_success') : '' }}";
        var edit_success = "{{ Session::has('edit_success') ? Session::get('edit_success') : '' }}";
        var delete_success = "{{ Session::has('delete_success') ? Session::get('delete_success') : '' }}";
        var error = "{{ Session::has('error') ? Session::get('error') : '' }}";
        var warning = "{{ Session::has('warning') ? Session::get('warning') : '' }}";
        var same = "{{ Session::has('same') ? Session::get('same') : '' }}";
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
        }else if (warning != '') {
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
        }
        else if (error != '') {
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
        else if (same != '') {
            Swal.fire(
            'The password same??',
            same,
            'warning'
            )
        }
    </script>
</body>
</html>