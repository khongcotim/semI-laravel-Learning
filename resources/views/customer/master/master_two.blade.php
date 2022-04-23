<!DOCTYPE html>
<html lang="en">


<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="author" content="TechyDevs">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <!-- Favicon -->
    <link rel="icon" href="{{ url('customers') }}/images/favicon.png">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&amp;display=swap"
        rel="stylesheet">
    <style>
        .activate {
            color: #287dfa !important;
        }

    </style>
    <!-- Template CSS Files -->
    <link rel="stylesheet" href="{{ url('customers') }}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ url('customers') }}/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="{{ url('customers') }}/css/line-awesome.css">
    <link rel="stylesheet" href="{{ url('customers') }}/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ url('customers') }}/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{ url('customers') }}/css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="{{ url('customers') }}/css/daterangepicker.css">
    <link rel="stylesheet" href="{{ url('customers') }}/css/animate.min.css">
    <link rel="stylesheet" href="{{ url('customers') }}/css/animated-headline.css">
    <link rel="stylesheet" href="{{ url('customers') }}/css/jquery-ui.css">
    <link rel="stylesheet" href="{{ url('customers') }}/css/flag-icon.min.css">
    <link rel="stylesheet" href="{{ url('customers') }}/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">

</head>

<body>
    <!-- start cssload-loader -->
    <div class="preloader" id="preloader">
        <div class="loader">
            <svg class="spinner" viewBox="0 0 50 50">
                <circle class="path" cx="25" cy="25" r="20" fill="none" stroke-width="5"></circle>
            </svg>
        </div>
    </div>
    <!-- end cssload-loader -->


    <!-- ================================
            START HEADER AREA
================================= -->
    <header class="header-area">
        @include('customer.layout.header')
        @include('customer.layout.menu')
    </header>
    <!-- ================================
         END HEADER AREA
================================= -->

    @yield('main')
    @include('customer.layout.footer')

   @yield('modal')
    <!-- Template JS Files -->
    <script src="{{ url('customers') }}/js/jquery-3.4.1.min.js"></script>
    <script src="{{ url('customers') }}/js/jquery-ui.js"></script>
    <script src="{{ url('customers') }}/js/popper.min.js"></script>
    <script src="{{ url('customers') }}/js/bootstrap.min.js"></script>
    <script src="{{ url('customers') }}/js/bootstrap-select.min.js"></script>
    <script src="{{ url('customers') }}/js/moment.min.js"></script>
    <script src="{{ url('customers') }}/js/daterangepicker.js"></script>
    <script src="{{ url('customers') }}/js/owl.carousel.min.js"></script>
    <script src="{{ url('customers') }}/js/jquery.fancybox.min.js"></script>
    <script src="{{ url('customers') }}/js/jquery.countTo.min.js"></script>
    <script src="{{ url('customers') }}/js/animated-headline.js"></script>
    <script src="{{ url('customers') }}/js/jquery.ripples-min.js"></script>
    <script src="{{ url('customers') }}/js/quantity-input.js"></script>
    <script src="{{ url('customers') }}/js/main.js"></script>
    <script src="{{url('admin')}}/js/jquery.multi-file.min.js"></script>

    @yield('slider-js')

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $('#errAvatar').hide();
        $('#errName').hide();
        $('#erPrice').hide();
        $('#errEmail').hide();
        $('#errPhone').hide();
        var auth = "{{$auth != 'null'? $auth->check(): ''}}"
        if (auth) {
            $('#registerNew').show();
            $('#registerNew').attr('type', 'submit');
        }else {
            $('#registerNew').hide();
            $('#registerNew').attr('type', 'button');
            function checkNameInput() {
                check = true;
                var name_Length = ($('#name_guild').val()).length;

                if (name_Length > 0) {
                    $('#errName').hide(200);
                    $('#name_guild').css('border', '1px solid green');
                    check = true
                } else {
                    $('#errName').show(200);
                    $('#name_guild').css('border', '1px solid red');
                    check = false
                }
                return check;
            }

            function checkEmailInput() {
                check = true;
                var email_Length = ($('#email_guild').val()).length;

                if (email_Length > 0) {
                    $('#errEmail').hide(200);
                    $('#email_guild').css('border', '1px solid green');
                    check = true
                } else {
                    $('#errEmail').show(200);
                    $('#email_guild').css('border', '1px solid red');
                    check = false
                }
                return check;
            }

            function checkPhoneInput() {
                check = true;
                var phone_Length = ($('#phone_guild').val()).length;

                if (phone_Length >0 && phone_Length <11) {
                    $('#errPhone').hide(200);
                    $('#phone_guild').css('border', '1px solid green');
                    check = true
                } else {
                    $('#errPhone').html("phone must be 10 character");
                    $('#errPhone').show(200);
                    $('#phone_guild').css('border', '1px solid red');
                    check = false
                }
                return check;
            }

            function checkAvatarInput() {
                check = true;
                var avatar_Length = ($('#avatar_guild').val()).length;

                if (avatar_Length >0) {
                    $('#errAvatar').hide(200);
                    $('#avatar_guild').css('border', '1px solid green');
                    check = true
                } else {
                    $('#errAvatar').show(200);
                    $('#avatar_guild').css('border', '1px solid red');
                    check = false;
                }
                return check;
            }
            function checkPriceInput() {
                check = true;
                if ($('#price_guild').val()>=50000) {
                    $('#erPrice').hide(200);
                    $('#price_guild').css('border', '1px solid green');
                    check = true
                } else {
                    $('#erPrice').show(200);
                    $('#price_guild').css('border', '1px solid red');
                    check = false;
                }
                return check;
            }
            $('input').on('change', function() {
                if (checkEmailInput() && checkPriceInput() && checkPhoneInput() && checkAvatarInput() && checkNameInput()) {

                    $('#registerNew').show(200);
                    $('#registerNew').attr('type', 'submit');

                } else {
                    $("#signupPopupForm").effect("shake", {
                        direction: "left",
                        times: 4,
                        distance: 10
                    }, 1000);
                    $('#registerNew').hide(200);
                    $('#registerNew').attr('type', 'button');
                }
            })

            $('#registerNew').on('click', function() {
                if (check == false) {
                    $("#signupPopupForm").effect("shake", {
                        direction: "left",
                        times: 4,
                        distance: 10
                    }, 1000);
                    $('#registerNew').hide(200);
                } else if (check == true) {
                    $('#registerNew').show(200);
                    $('#registerNew').attr('type', 'submit');
                }
            })
        }
    </script>
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
