<!DOCTYPE html>
<html lang="en">

<head>
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

</head>

<body class="section-bg">
    <!-- start cssload-loader -->
    <div class="preloader" id="preloader">
        <div class="loader">
            <svg class="spinner" viewBox="0 0 50 50">
                <circle class="path" cx="25" cy="25" r="20" fill="none" stroke-width="5"></circle>
            </svg>
        </div>
    </div>
    <!-- end cssload-loader -->
@include('customer.layout.header_three')
@include('customer.layout.menu_three')
@yield('main_dasboard')
@include('customer.layout.footer_three')
