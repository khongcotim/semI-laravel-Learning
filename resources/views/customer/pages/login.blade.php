<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="{{ url('customers') }}/images/favicon.png">
    <!--plugins-->
    <link href="{{ url('admin') }}/assets_authenticate/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <link href="{{ url('admin') }}/assets_authenticate/plugins/perfect-scrollbar/css/perfect-scrollbar.css"
        rel="stylesheet" />
    <link href="{{ url('admin') }}/assets_authenticate/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
    <!-- loader-->
    <link href="{{ url('admin') }}/assets_authenticate/css/pace.min.css" rel="stylesheet" />
    <script src="{{ url('admin') }}/assets_authenticate/js/pace.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="{{ url('admin') }}/assets_authenticate/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ url('admin') }}/assets_authenticate/css/bootstrap-extended.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
    <link href="{{ url('admin') }}/assets_authenticate/css/app.css" rel="stylesheet">
    <link href="{{ url('admin') }}/assets_authenticate/css/icons.css" rel="stylesheet">
    <title>Login </title>
</head>

<body class="bg-login">
    <!--wrapper-->
    <div class="wrapper">
        <div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
            <div class="container-fluid">
                <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
                    <div class="col mx-auto">
                        <div class="mb-4 text-center">
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="border p-4 rounded">
                                    <div class="text-center">
                                        <h3 class="">Sign in</h3>
										<p>Don't have an account yet? <a href="
                                            {{ route('customer.sign_up') }}">Sign up here</a>
                                            </p>
                                    </div>
                                </div>
                                <div class="form-body mt-4">
                                    <form action="{{route('customer.post_login')}}" class="row g-3" method="POST">
                                        @csrf
                                        <div class="col-12">
                                            <label for="inputEmailAddress" class="form-label">Email Address</label>
                                            <input class="form-control" type="email" value="{{ old('email') }}"
                                                name="email" id="inputEmailAddress" placeholder="Type your email">
                                            @if ($errors->has('email'))
                                                <span style="color:red">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-12">
                                            <label for="inputChoosePassword" class="form-label">Enter
                                                Password</label>
                                            <div class="input-group" id="show_hide_password">
                                                <input type="password" name="pass" class="form-control border-end-0"
                                                    id="inputChoosePassword" value="{{ old('pass') }}"
                                                    placeholder="Enter Password"> <a href="javascript:;"
                                                    class="input-group-text bg-transparent"><i
                                                        class='bx bx-hide'></i></a>
                                            </div>
                                            @if ($errors->has('pass'))
                                                <span style="color:red">{{ $errors->first('pass') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox"
                                                    id="flexSwitchCheckChecked" checked>
                                                <label class="form-check-label" for="flexSwitchCheckChecked">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 text-end"> <a
                                                href="{{ route('customer.recovery') }}">Forgot Password ?</a>
                                        </div>
                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button type="submit" class="btn btn-primary"><i
                                                        class="bx bxs-lock-open"></i>Sign in</button>
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
    <script src="{{ url('admin') }}/assets_authenticate/js/bootstrap.bundle.min.js"></script>
    <!--plugins-->
    <script src="{{ url('admin') }}/assets_authenticate/js/jquery.min.js"></script>
    <script src="{{ url('admin') }}/assets_authenticate/plugins/simplebar/js/simplebar.min.js"></script>
    <script src="{{ url('admin') }}/assets_authenticate/plugins/metismenu/js/metisMenu.min.js"></script>
    <script src="{{ url('admin') }}/assets_authenticate/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
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
        });
    </script>
    <!--app JS-->
    <script src="{{ url('admin') }}/assets_authenticate/js/app.js"></script>
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
