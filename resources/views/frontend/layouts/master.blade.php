<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>@yield('title') |Mehedi</title>
    <meta name="description" content="Bolby - Portfolio/CV/Resume HTML Template">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('frontend/images/favicon.png')}}">

    <!-- STYLESHEETS -->
    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}" type="text/css" media="all">
    <link rel="stylesheet" href="{{asset('frontend/css/all.min.css')}}" type="text/css" media="all">
    <link rel="stylesheet" href="{{asset('frontend/css/simple-line-icons.css')}}" type="text/css" media="all">
    <link rel="stylesheet" href="{{asset('frontend/css/slick.css')}}" type="text/css" media="all">
    <link rel="stylesheet" href="{{asset('frontend/css/animate.css')}}" type="text/css" media="all">
    <link rel="stylesheet" href="{{asset('frontend/css/magnific-popup.css')}}" type="text/css" media="all">
    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}" type="text/css" media="all">

{{--    <!--[if lt IE 9]>--}}
{{--    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>--}}
{{--    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>--}}
{{--    <![endif]-->--}}
    @stack('css')
</head>
<body>
@include('frontend.inc.header')

@yield('content')


@include('frontend.inc.footer')

<!-- Go to top button -->
<a href="javascript:" id="return-to-top"><i class="fas fa-arrow-up"></i></a>

<!-- SCRIPTS -->
<script src="{{asset('frontend/js/jquery-1.12.3.min.js')}}"></script>
<script src="{{asset('frontend/js/jquery.easing.min.js')}}"></script>
<script src="{{asset('frontend/js/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('frontend/js/jquery.counterup.min.js')}}"></script>
<script src="{{asset('frontend/js/popper.min.js')}}"></script>
<script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
<script src="{{asset('frontend/js/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('frontend/js/infinite-scroll.min.js')}}"></script>
<script src="{{asset('frontend/js/imagesloaded.pkgd.min.js')}}"></script>
<script src="{{asset('frontend/js/slick.min.js')}}"></script>
<script src="{{asset('frontend/js/contact.js')}}"></script>
<script src="{{asset('frontend/js/validator.js')}}"></script>
<script src="{{asset('frontend/js/wow.min.js')}}"></script>
<script src="{{asset('frontend/js/morphext.min.js')}}"></script>
<script src="{{asset('frontend/js/parallax.min.js')}}"></script>
<script src="{{asset('frontend/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('frontend/js/custom.js')}}"></script>
@stack('js')
</body>
</html>
