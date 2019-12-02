<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>{{ config('app.name', 'RomanoLumij') }}</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- favicons
        ================================================== -->
        <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
        <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:200,300,400,500,600,700&display=swap" rel="stylesheet">
        <!-- Styles -->
        <link rel="stylesheet" href="{!! asset('css/open-iconic-bootstrap.min.css') !!}">
        <link rel="stylesheet" href="{!! asset('css/animate.css') !!}">

        <link rel="stylesheet" href="{!! asset('css/owl.carousel.min.css') !!}">
        <link rel="stylesheet" href="{!! asset('css/owl.theme.default.min.css') !!}">
        <link rel="stylesheet" href="{!! asset('css/magnific-popup.css') !!}">

        <link rel="stylesheet" href="{!! asset('css/aos.css') !!}">

        <link rel="stylesheet" href="{!! asset('css/ionicons.min.css') !!}">

        <link rel="stylesheet" href="{!! asset('css/bootstrap-datetimepicker.min.css') !!}">
        <link rel="stylesheet" href="{!! asset('css/nouislider.css') !!}">


        <link rel="stylesheet" href="{!! asset('css/flaticon.css') !!}">
        <link rel="stylesheet" href="{!! asset('css/icomoon.css') !!}">
        <link rel="stylesheet" href="{!! asset('css/style.css') !!}">

    </head>
    <body>

        <div class="main-section">

            <!-- sweetalert -->
            @include('sweetalert::alert')

            <!-- NavBar -->
            @include('include.nav')

            @yield('content')

            <!-- Footer -->
            @include('include.footer')

        </div>
        <!-- Loader -->
        @include('include.loader')

        <!-- Script Search -->
        {{--@include('include.scriptSearch')--}}
    <!-- Script -->
    <script src="{!! asset('js/jquery.min.js') !!}"></script>
    <script src="{!! asset('js/jquery-migrate-3.0.1.min.js') !!}"></script>
    <script src="{!! asset('js/popper.min.js') !!}"></script>
    <script src="{!! asset('js/bootstrap.min.js') !!}"></script>
    <script src="{!! asset('js/jquery.easing.1.3.js') !!}"></script>
    <script src="{!! asset('js/jquery.waypoints.min.js') !!}"></script>
    <script src="{!! asset('js/jquery.stellar.min.js') !!}"></script>
    <script src="{!! asset('js/owl.carousel.min.js') !!}"></script>
    <script src="{!! asset('js/jquery.magnific-popup.min.js') !!}"></script>
    <script src="{!! asset('js/aos.js') !!}"></script>

    {{--<script src="{!! asset('js/nouislider.min.js') !!}"></script>--}}
    <script src="{!! asset('js/moment-with-locales.min.js') !!}"></script>
    <script src="{!! asset('js/bootstrap-datetimepicker.min.js') !!}"></script>
    <script src="{!! asset('js/main.js') !!}"></script>

    </body>
</html>
