<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="author" content="TechyDevs">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <!-- Favicon -->
    <link rel="icon" href="{{ url('admin') }}/images/favicon.png">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&amp;display=swap"
        rel="stylesheet">

    <!-- Template CSS Files -->
    <link rel="stylesheet" href="{{ url('admin') }}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ url('admin') }}/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="{{ url('admin') }}/css/line-awesome.css">
    <link rel="stylesheet" href="{{ url('admin') }}/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ url('admin') }}/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{ url('admin') }}/css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="{{ url('admin') }}/css/daterangepicker.css">
    <link rel="stylesheet" href="{{ url('admin') }}/css/animate.min.css">
    <link rel="stylesheet" href="{{ url('admin') }}/css/animated-headline.css">
    <link rel="stylesheet" href="{{ url('admin') }}/css/jquery-ui.css">
    <link rel="stylesheet" href="{{ url('admin') }}/css/flag-icon.min.css">
    <link rel="stylesheet" href="{{ url('admin') }}/css/style.css">
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#mytextarea'
        });
    </script>
    <style>
        body::-webkit-scrollbar {
            width: 8px;
            background-color: #F5F5F5;
        }

        body::-webkit-scrollbar-thumb {
            border-radius: 10px;
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, .3);
            background-color: #555;
        }

        body::-webkit-scrollbar-button {
            height: 0px;
        }

        .sidebar-nav::-webkit-scrollbar {
            width: 10px;
            background-color: #F5F5F5;
        }

        .sidebar-nav::-webkit-scrollbar-thumb {
            border-radius: 10px;
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, .3);
            background-color: rgb(175, 173, 173);
        }

        .sidebar-nav::-webkit-scrollbar-button {
            height: 0px;
        }

    </style>
</head>
