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
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <!-- Web Fonts  -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">
    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/font-awesome/css/font-awesome.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('vendor/magnific-popup/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css') }}">
    <!-- Specific Page Vendor CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/jquery-ui/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/jquery-ui/jquery-ui.theme.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/select2/css/select2.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/select2-bootstrap-theme/select2-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap-multiselect/bootstrap-multiselect.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap-tagsinput/bootstrap-tagsinput.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap-colorpicker/css/bootstrap-colorpicker.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap-timepicker/css/bootstrap-timepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/dropzone/basic.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/dropzone/dropzone.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap-markdown/css/bootstrap-markdown.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/summernote/summernote.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/codemirror/lib/codemirror.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/codemirror/theme/monokai.css') }}"> --}}
    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{ asset('stylesheets/theme.css') }}">
    <!-- Skin CSS -->
    <link rel="stylesheet" href="{{ asset('stylesheets/skins/default.css') }}">
    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="{{ asset('stylesheets/theme-custom.css') }}">
    <!-- Head Libs -->
    <script src="{{ asset('vendor/modernizr/modernizr.js') }}"></script>
</head>
    @yield('atas')

<body>
<section class="body">

    <header class="header">
           @include('include._private_header')
    </header>

    <div class="inner-wrapper">

        <aside id="sidebar-left" class="sidebar-left">
            @include('include._private_left')
        </aside>

        <section role="main" class="content-body">
            @include('include._private_headers')
            <div style="text-align: center;" >
            @include('flash::message')</div>
            @yield('isi')
        </section>
    </div>

       {{-- <aside id="sidebar-right" class="sidebar-right">
            @include('include._private_right')
        </aside>--}}

</section>
{{--<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>--}}
@yield('bawah')
<!-- Vendor -->
{{--<script src="{{ asset('vendor/jquery/jquery.js') }}"></script>--}}
<script src="{{ asset('vendor/jquery-browser-mobile/jquery.browser.mobile.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.js') }}"></script>
<script src="{{ asset('vendor/nanoscroller/nanoscroller.js') }}"></script>
<script src="{{ asset('vendor/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('vendor/magnific-popup/jquery.magnific-popup.js') }}"></script>
<script src="{{ asset('vendor/jquery-placeholder/jquery-placeholder.js') }}"></script>
<!-- Specific Page Vendor -->
{{-- <script src="{{ asset('vendor/jquery-ui/jquery-ui.js') }}"></script>
<script src="{{ asset('vendor/jqueryui-touch-punch/jqueryui-touch-punch.js') }}"></script>
<script src="{{ asset('vendor/select2/js/select2.js') }}"></script>
<script src="{{ asset('vendor/bootstrap-multiselect/bootstrap-multiselect.js') }}"></script>
<script src="{{ asset('vendor/jquery-maskedinput/jquery.maskedinput.js') }}"></script>
<script src="{{ asset('vendor/bootstrap-tagsinput/bootstrap-tagsinput.js') }}"></script>
<script src="{{ asset('vendor/bootstrap-colorpicker/js/bootstrap-colorpicker.js') }}"></script>
<script src="{{ asset('vendor/bootstrap-timepicker/bootstrap-timepicker.js') }}"></script>
<script src="{{ asset('vendor/fuelux/js/spinner.js') }}"></script>
<script src="{{ asset('vendor/dropzone/dropzone.js') }}"></script>
<script src="{{ asset('vendor/bootstrap-markdown/js/markdown.js') }}"></script>
<script src="{{ asset('vendor/bootstrap-markdown/js/to-markdown.js') }}"></script>
<script src="{{ asset('vendor/bootstrap-markdown/js/bootstrap-markdown.js') }}"></script>
<script src="{{ asset('vendor/codemirror/lib/codemirror.js') }}"></script>
<script src="{{ asset('vendor/codemirror/addon/selection/active-line.js') }}"></script>
<script src="{{ asset('vendor/codemirror/addon/edit/matchbrackets.js') }}"></script>
<script src="{{ asset('vendor/codemirror/mode/javascript/javascript.js') }}"></script>
<script src="{{ asset('vendor/codemirror/mode/xml/xml.js') }}"></script>
<script src="{{ asset('vendor/codemirror/mode/htmlmixed/htmlmixed.js') }}"></script>
<script src="{{ asset('vendor/codemirror/mode/css/css.js') }}"></script>
<script src="{{ asset('vendor/summernote/summernote.js') }}"></script>
<script src="{{ asset('vendor/bootstrap-maxlength/bootstrap-maxlength.js') }}"></script>
<script src="{{ asset('vendor/ios7-switch/ios7-switch.js') }}"></script>
<script src="{{ asset('vendor/bootstrap-confirmation/bootstrap-confirmation.js') }}"></script> --}}
<!-- Theme Base, Components and Settings -->
<script src="{{ asset('javascripts/theme.js') }}"></script>
<!-- Theme Custom -->
<script src="{{ asset('javascripts/theme.custom.js') }}"></script>
<!-- Theme Initialization Files -->
<script src="{{ asset('javascripts/theme.init.js') }}"></script>
<!-- Examples -->
{{-- <script src="{{ asset('javascripts/forms/examples.advanced.form.js') }}"></script> --}}
</body>
</html>