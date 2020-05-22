<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="abogados, UBA, leyes, lbl, lblabogados, lb&l, lb&labogados, penal">
    <meta name="Copyright" content="All rights reserved by Zebra Devs, Copyright 2019">
    <meta name="description" content="Asesoramiento y representación legal">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <!-- Styles -->
    <link rel="icon" type="image/png" href="{{ asset('img/artwork/favicon.webp') }}">
    <script src="https://kit.fontawesome.com/6a517933d5.js" crossorigin="anonymous"></script>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/mdb.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main5.css') }}" rel="stylesheet">
    <!-- Custom -->
    @yield('header')
</head>
<body>
    <div id="app">
        @yield('content')
    </div>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/mdb.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script>
        $(".alert-fixed").fadeTo(3000, 500).slideUp(500, function(){
            $(".alert-fixed").slideUp(500);
        });
    </script>
</body>
</html>
