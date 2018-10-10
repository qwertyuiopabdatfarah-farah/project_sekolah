<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Mulai Dari Sini Dulu -->
    <!-- Favicon -->
        <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}" type="image/x-icon">
        <link rel="apple-touch-icon" href="{{ asset('img/apple-touch-icon.png') }}">
        <!-- Web Fonts  -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light" rel="stylesheet" type="text/css">
        <!-- Vendor CSS -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        {{--<link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">--}}
        <link rel="stylesheet" href="{{ asset('vendor/font-awesome/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/animate/animate.min.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/simple-line-icons/css/simple-line-icons.min.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/owl.carousel/assets/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/owl.carousel/assets/owl.theme.default.min.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/magnific-popup/magnific-popup.min.css') }}">
        <!-- Theme CSS -->
        <link rel="stylesheet" href="{{ asset('css/theme.css') }}">
        <link rel="stylesheet" href="{{ asset('css/theme-elements.css') }}">
        <link rel="stylesheet" href="{{ asset('css/theme-blog.css') }}">
        <link rel="stylesheet" href="{{ asset('css/theme-shop.css') }}">
        <!-- Current Page CSS -->
        <link rel="stylesheet" href="{{ asset('vendor/rs-plugin/css/settings.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/rs-plugin/css/layers.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/rs-plugin/css/navigation.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/circle-flip-slideshow/css/component.css') }}">
        <!-- Skin CSS -->
        <link rel="stylesheet" href="{{ asset('css/skins/default.css') }}"> 
        <!-- Theme Custom CSS -->
        <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
        <!-- Head Libs -->
        <script src="{{ asset('vendor/modernizr/modernizr.min.js') }}"></script>
        @yield('atas')
</head>

<body>


<div class="body">

            <header id="header" class="header-narrow" data-plugin-options="{'stickyEnabled': true, 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': true, 'stickyStartAt': 0, 'stickySetTop': '0'}">        
             @include('include._public_header')
             </header>

            <div role="main" class="main">
            <div style="text-align: center;" >
            @include('flash::message')</div>    
            @yield('isi')    
            </div>

            <footer id="footer">    
            @include('include._public_footer')
            </footer>    

</div>

<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
@yield('bawah') 
<!-- Vendor -->
        {{-- <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script> --}}
        <script src="{{ asset('vendor/jquery.appear/jquery.appear.min.js') }}"></script>
        <script src="{{ asset('vendor/jquery.easing/jquery.easing.min.js') }}"></script>
        <script src="{{ asset('vendor/jquery-cookie/jquery-cookie.min.js') }}"></script>
        <script src="{{ asset('vendor/popper/umd/popper.min.js') }}"></script>
        <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('vendor/common/common.min.js') }}"></script>
        <script src="{{ asset('vendor/jquery.validation/jquery.validation.min.js') }}"></script>
        <script src="{{ asset('vendor/jquery.easy-pie-chart/jquery.easy-pie-chart.min.js') }}"></script>
        <script src="{{ asset('vendor/jquery.gmap/jquery.gmap.min.js') }}"></script>
        <script src="{{ asset('vendor/jquery.lazyload/jquery.lazyload.min.js') }}"></script>
        <script src="{{ asset('vendor/isotope/jquery.isotope.min.js') }}"></script>
        <script src="{{ asset('vendor/owl.carousel/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('vendor/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
        <script src="{{ asset('vendor/vide/vide.min.js') }}"></script>
        <!-- Theme Base, Components and Settings -->
        <script src="{{ asset('js/theme.js') }}"></script>
        <!-- Current Page Vendor and Views -->
        <script src="{{ asset('vendor/rs-plugin/js/jquery.themepunch.tools.min.js') }}"></script>
        <script src="{{ asset('vendor/rs-plugin/js/jquery.themepunch.revolution.min.js') }}"></script>
        <script src="{{ asset('vendor/circle-flip-slideshow/js/jquery.flipshow.min.js') }}"></script>
        <script src="{{ asset('js/views/view.home.js') }}"></script>
        <!-- Theme Custom -->
        <script src="{{ asset('js/custom.js') }}"></script>
        <!-- Theme Initialization Files -->
        <script src="{{ asset('js/theme.init.js') }}"></script>
</body>
</html>