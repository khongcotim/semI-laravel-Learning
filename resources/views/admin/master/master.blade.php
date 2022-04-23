@include('admin.layout.header')
<body class="section-bg">
    <div class="preloader" id="preloader">
        <div class="loader">
            <svg class="spinner" viewBox="0 0 50 50">
                <circle class="path" cx="25" cy="25" r="20" fill="none" stroke-width="5"></circle>
            </svg>
        </div>
    </div>
    @include('admin.layout.menu')
    <section class="dashboard-area">
        @include('admin.layout.header_one')
        @yield('main')
        @include('admin.layout.footer')
    </section>

    <div id="back-to-top">
        <i class="la la-angle-up" title="Go top"></i>
    </div>

@yield('send_feedback')
    <!-- ./wrapper -->
    <!-- Template JS Files -->
    <script src="{{url('admin')}}/js/jquery-3.4.1.min.js"></script>
    <script src="{{url('admin')}}/js/jquery-ui.js"></script>
    <script src="{{url('admin')}}/js/popper.min.js"></script>
    <script src="{{url('admin')}}/js/bootstrap.min.js"></script>
    <script src="{{url('admin')}}/js/bootstrap-select.min.js"></script>
    <script src="{{url('admin')}}/js/moment.min.js"></script>
    <script src="{{url('admin')}}/js/daterangepicker.js"></script>
    <script src="{{url('admin')}}/js/owl.carousel.min.js"></script>
    <script src="{{url('admin')}}/js/jquery.fancybox.min.js"></script>
    <script src="{{url('admin')}}/js/jquery.countTo.min.js"></script>
    <script src="{{url('admin')}}/js/animated-headline.js"></script>
    <script src="{{url('admin')}}/js/jquery.sparkline.js"></script>
    <script src="{{url('admin')}}/js/dashboard.js"></script>
    <script src="{{url('admin')}}/js/chart.js"></script>
    <script src="{{url('admin')}}/js/chart.extension.js"></script>
    {{-- <script src="{{url('admin')}}/js/bar-chart.js"></script> --}}
    {{-- <script src="{{url('admin')}}/js/line-chart.js"></script> --}}
    <script src="{{url('admin')}}/js/jquery.ripples-min.js"></script>
    <script src="{{url('admin')}}/js/main.js"></script>
    <script src="{{url('admin')}}/js/jquery.multi-file.min.js"></script>

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
