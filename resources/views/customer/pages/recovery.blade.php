<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="{{url('admin/assets_authenticate')}}/images/favicon-32x32.png" type="image/png" />
	<!-- loader-->
	<link href="{{url('admin/assets_authenticate')}}/css/pace.min.css" rel="stylesheet" />
	<script src="{{url('admin/assets_authenticate')}}/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="{{url('admin/assets_authenticate')}}/css/bootstrap.min.css" rel="stylesheet">
	<link href="{{url('admin/assets_authenticate')}}/css/bootstrap-extended.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
	<link href="{{url('admin/assets_authenticate')}}/css/app.css" rel="stylesheet">
	<link href="{{url('admin/assets_authenticate')}}/css/icons.css" rel="stylesheet">
	<title>Recovery Password</title>
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
							<p class="text-muted">Enter your registered email ID to reset the password</p>
							<div class="my-4">
								<label class="form-label">Email id</label>
								<input type="email" class="form-control form-control-lg" name="email" placeholder="example@user.com" />
								@if($errors->has('email'))
									<span style="color:red">{{$errors->first('email')}}</span>
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
    </script>
</body>
</html>