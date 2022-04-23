
    <!-- start scroll top -->
    <div id="back-to-top">
        <i class="la la-angle-up" title="Go top"></i>
    </div>
    <!-- end scroll top -->

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
    <script src="{{ url('customers') }}/js/chart.js"></script>
    <script src="{{ url('customers') }}/js/chart.extension.js"></script>
    <script src="{{ url('customers') }}/js/jquery.ripples-min.js"></script>
    <script src="{{ url('customers') }}/js/main.js"></script>
    <script src="{{ url('customers') }}/js/jquery.multi-file.min.js"></script>
    @yield('js_dasboard')
  
    <script>
        $('#show_notification').hide();
        $('#view_all').on('click',function(){
            $('#show_notification').show(400);
            $('#show_notification').css('borders','3px solid green');
        })
        $('.notification_counted').html($('.count_notification').length);
    </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
