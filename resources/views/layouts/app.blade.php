<!DOCTYPE html>
<html>

<!-- Mirrored from gambolthemes.net/workwise-new/sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 03 Jan 2020 14:46:53 GMT -->

<head>
    <meta charset="UTF-8">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link rel="stylesheet" type="text/css" href={{asset("css/animate.css")}}>
    <link rel="stylesheet" type="text/css" href={{asset("css/bootstrap.min.css")}}>
    <link rel="stylesheet" type="text/css" href={{asset("css/line-awesome.css")}}>
    <link rel="stylesheet" type="text/css" href={{asset("css/line-awesome-font-awesome.min.css")}}>
    <link href={{asset("vendor/fontawesome-free/css/all.min.css")}} rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href={{asset("css/font-awesome.min.css")}}>
    <link rel="stylesheet" type="text/css" href={{asset("css/jquery.mCustomScrollbar.min.css")}}>
    <link rel="stylesheet" type="text/css" href={{asset("lib/slick/slick.css")}}>
    <link rel="stylesheet" type="text/css" href={{asset("lib/slick/slick-theme.css")}}>
    <link rel="stylesheet" type="text/css" href={{asset("css/style.css")}}>
    <link rel="stylesheet" type="text/css" href={{asset("css/responsive.css")}}>
    <link rel="icon" href="{{asset('images/wd-logo.png')}}">

</head>



<body class="sign-in" oncontextmenu="return false;">
    <div id="app">
        @auth
        @if (auth()->user()->isClient())
        @include('client.header')
        @else
        @include('company.header')
        @endif
        @endauth


        @yield('content')
    </div>

    <script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/app.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/popper.js')}}"></script>
    <script type="text/javascript" src={{asset('js/bootstrap.min.js')}}></script>
    <script type="text/javascript" src="{{asset('lib/slick/slick.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/script.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.mCustomScrollbar.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/scrollbar.js') }}"></script>

    @yield('js')
</body>

</html>