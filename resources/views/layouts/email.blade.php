<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="rtl">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/fonts/fonts.css')}}">


    <!-- BEGIN Custom CSS-->
    {{--  <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css-rtl/style-rtl.css')}}">  --}}
    {{--  <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/style.css')}}">  --}}
    {{--  <link rel="stylesheet" type="text/css" href="{{asset('public/css/app.css')}}">  --}}
    <!-- END Custom CSS-->
    @yield('style')
    {{--<link href="https://fonts.googleapis.com/css?family=Cairo&display=swap" rel="stylesheet">--}}
    <style>

        *, *::before, *::after {
            box-sizing: border-box;
        }

        .text-center {
            text-align: center !important;
        }

        
        body {
            font-family: 'Cairo', sans-serif !important;
            background-color: #F4F5FA;
            font-size: 0.9rem;
            font-weight: 400;
            line-height: 1.6;
            color: #212529;
            text-align: left;
        }

        .alert-success {
            color: #1d643b;
            background-color: #d7f3e3;
            border-color: #c7eed8;
        }

        .alert {
            position: relative;
            padding: 0.75rem 1.25rem;
            margin-bottom: 1rem;
            border: 1px solid transparent;
            border-radius: 0.25rem;
        }

        .email-header{
            background-color: #1E9FF2 !important;
            color: #fff !important;
            min-height: 100px;
            padding-top: 50px;
            padding-bottom: 50px;
            font-size: 30px;
            border: 0px;
            border-radius: 0px;
        }

        .container-xl, .container-lg, .container-md, .container-sm, .container {
            max-width: 1140px;
            margin: auto;
        }

        .mb-3, .my-3 {
            margin-bottom: 1rem !important;
        }

        h2, .h2 {
            font-size: 1.8rem;
        }

        h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6 {
            margin-bottom: 0.5rem;
            font-weight: 500;
            line-height: 1.2;
        }

        h1, h2, h3, h4, h5, h6 {
            margin-top: 0;
            margin-bottom: 0.5rem;
        }

        h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6, .breadcrumb {
            font-family: 'Cairo', sans-serif !important;
        }

        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 1px solid rgba(0, 0, 0, 0.125);
            border-radius: 0.25rem;
        }

        .card-body {
            flex: 1 1 auto;
            min-height: 1px;
            padding: 1.25rem;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            margin-right: -15px;
            margin-left: -15px;
            margin-top: 10px;
        }

        .text-right {
            text-align: right !important;
        }

        .col-6 {
            flex: 0 0 50%;
            max-width: 50%;
        }

        .col-xl, .col-xl-auto, .col-xl-12, .col-xl-11, .col-xl-10, .col-xl-9, .col-xl-8, .col-xl-7, .col-xl-6, .col-xl-5, .col-xl-4, .col-xl-3, .col-xl-2, .col-xl-1, .col-lg, .col-lg-auto, .col-lg-12, .col-lg-11, .col-lg-10, .col-lg-9, .col-lg-8, .col-lg-7, .col-lg-6, .col-lg-5, .col-lg-4, .col-lg-3, .col-lg-2, .col-lg-1, .col-md, .col-md-auto, .col-md-12, .col-md-11, .col-md-10, .col-md-9, .col-md-8, .col-md-7, .col-md-6, .col-md-5, .col-md-4, .col-md-3, .col-md-2, .col-md-1, .col-sm, .col-sm-auto, .col-sm-12, .col-sm-11, .col-sm-10, .col-sm-9, .col-sm-8, .col-sm-7, .col-sm-6, .col-sm-5, .col-sm-4, .col-sm-3, .col-sm-2, .col-sm-1, .col, .col-auto, .col-12, .col-11, .col-10, .col-9, .col-8, .col-7, .col-6, .col-5, .col-4, .col-3, .col-2, .col-1 {
            position: relative;
            width: 100%;
            padding-right: 15px;
            padding-left: 15px;
        }

        a {
            color: #3490dc;
            text-decoration: none;
            background-color: transparent;
        }

        table{
            width: 100%;
        }

        tr td{
            width: 50%;
            padding: 10px;
            border: 1px dashed #ddd;
            text-align: center !important;
        }


    </style>
</head>
<body class="vertical-layout vertical-menu 2-columns  menu-expanded fixed-navbar"
      data-open="click" data-menu="vertical-menu" data-col="2-columns">
<!-- fixed-top-->
<!-- ////////////////////////////////////////////////////////////////////////////-->
<div class="text-center">
{{--  {{\App\Models\Setting::first()->APP_NAME }}  --}}
    <div class="alert alert-success email-header">{{ __('front_layout.home_name') }} </div>
    <div class="container ">
        @yield('content')    
    </div>
    <p style="padding: 5px;width: 100%;margin-top: 20px;padding: 10px;background: #ffffff">جميع الحقوق محفوظة - {{ date('Y') }} &copy; <a href="{{ route('home', app()->getLocale()) }}">{{ __('front_layout.home_name') }}</a></p>
</div>

<!-- ////////////////////////////////////////////////////////////////////////////-->
<!-- BEGIN VENDOR JS-->
<script src="{{asset('assets/admin/vendors/js/vendors.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/admin/js/admin.js')}}" type="text/javascript"></script>
@yield('script')
</body>
</html>
