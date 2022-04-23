<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="author" content="TechyDevs">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <!-- Favicon -->
    <link rel="icon" href="{{url('customers')}}/images/favicon.png">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&amp;display=swap" rel="stylesheet">

    <!-- Template CSS Files -->
    <link rel="stylesheet" href="{{url('customers')}}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{url('customers')}}/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="{{url('customers')}}/css/line-awesome.css">
    <link rel="stylesheet" href="{{url('customers')}}/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{url('customers')}}/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{url('customers')}}/css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="{{url('customers')}}/css/daterangepicker.css">
    <link rel="stylesheet" href="{{url('customers')}}/css/animate.min.css">
    <link rel="stylesheet" href="{{url('customers')}}/css/animated-headline.css">
    <link rel="stylesheet" href="{{url('customers')}}/css/jquery-ui.css">
    <link rel="stylesheet" href="{{url('customers')}}/css/flag-icon.min.css">
    <link rel="stylesheet" href="{{url('customers')}}/css/style.css">
    <style>
        .activate{
            color: #287dfa !important;
        }
    </style>
    
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

    @include('customer.layout.banner_one')
    @yield('main')
    @include('customer.layout.footer')

    <div class="modal-popup">
        <div class="modal fade" id="replayPopupForm" tabindex="-1" role="dialog"  aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title title" id="exampleModalLongTitle3">Replay to comment</h5>
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
                                        <textarea class="message-control form-control" name="message" placeholder="Write message here..."></textarea>
                                    </div>
                                </div>
                            </form>
                        </div><!-- end contact-form-action -->
                    </div>
                    <div class="modal-footer border-top-0 pt-0">
                        <button type="button" class="btn font-weight-bold font-size-15 color-text-2 mr-2" data-dismiss="modal">Cancel</button>
                        <button type="button" class="theme-btn theme-btn-small">Replay</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- Template JS Files -->
<script src="{{url('customers')}}/js/jquery-3.4.1.min.js"></script>
<script src="{{url('customers')}}/js/jquery-ui.js"></script>
<script src="{{url('customers')}}/js/popper.min.js"></script>
<script src="{{url('customers')}}/js/bootstrap.min.js"></script>
<script src="{{url('customers')}}/js/bootstrap-select.min.js"></script>
<script src="{{url('customers')}}/js/moment.min.js"></script>
<script src="{{url('customers')}}/js/daterangepicker.js"></script>
<script src="{{url('customers')}}/js/owl.carousel.min.js"></script>
<script src="{{url('customers')}}/js/jquery.fancybox.min.js"></script>
<script src="{{url('customers')}}/js/jquery.countTo.min.js"></script>
<script src="{{url('customers')}}/js/animated-headline.js"></script>
<script src="{{url('customers')}}/js/jquery.ripples-min.js"></script>
<script src="{{url('customers')}}/js/quantity-input.js"></script>
<script src="{{url('customers')}}/js/main.js"></script>
@yield("home-slider")
</body>

</html>