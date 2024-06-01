<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="UTF-8">
    <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="{{ csrf_token() }}" name="csrf-token">
    <link href="images/favicon.png" rel="shortcut icon">
    <title>{{ config('app.name') }} | @yield('title')</title>

    <!--====== Google Font ======-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800" rel="stylesheet">

    <!--====== Vendor Css ======-->
    <link rel="stylesheet" href="{{ asset('frontend/assets') }}/css/vendor.css">

    <!--====== Utility-Spacing ======-->
    <link rel="stylesheet" href="{{ asset('frontend/assets') }}/css/utility.css">

    <!--====== App ======-->
    <link rel="stylesheet" href="{{ asset('frontend/assets') }}/css/app.css">
</head>

<body class="config">
    <div class="preloader is-active">
        <div class="preloader__wrap">

            <img class="preloader__img" src="{{ asset('frontend/assets') }}/images/preloader.png" alt="">
        </div>
    </div>

    <!--====== Main App ======-->
    <div id="app">

        @include('layouts.frontend.header')

        @yield('content')

        @include('layouts.frontend.footer')
    </div>
    <!--====== End - Main App ======-->

    <!--====== Vendor Js ======-->
    <script src="{{ asset('frontend/assets') }}/js/vendor.js"></script>

    <!--====== jQuery Shopnav plugin ======-->
    <script src="{{ asset('frontend/assets') }}/js/jquery.shopnav.js"></script>

    <!--====== App ======-->
    <script src="{{ asset('frontend/assets') }}/js/app.js"></script>

    @yield('script')
</body>

</html>
