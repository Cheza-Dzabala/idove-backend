<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>iDove - @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="iDove Website" />
    <meta name="keywords" content="idove, pve, african union, violent extremism" />
    <meta content="Macheza Dzabala" name="author" />

    <!-- favicon -->
    <link rel="shortcut icon" href="images/favicon.ico">
    <!-- Bootstrap -->
    <link href={{ asset('public/css/main/style.css') }} rel="stylesheet" type="text/css" />
    <link href={{ asset('public/css/main/responsive.css') }} rel="stylesheet" type="text/css" />
    <link href={{ asset('public/lightbox/css/lightbox.css') }} type="text/css" />
    <link href={{ asset('public/splide/splide.min.css') }} type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/css/splide.min.css">
    {{--
    <!-- Magnific Popup -->
    <link href={{ asset('public/css/magnific-popup.css" rel="stylesheet', true) }} type="text/css" />


    <!-- Slider -->
    <link rel="stylesheet" href="{{ asset('/public/css/owl.carousel.min.css', true) }}" />
    <link rel="stylesheet" href="{{ asset('/public/css/owl.theme.default.min.css', true) }}" />
    <!-- Icons -->
    <link href={{ asset('public/css/materialdesignicons.min.css', true) }} rel="stylesheet" type="text/css" />
    <!-- Css -->
    <script type="text/javascript"
        src="https://platform-api.sharethis.com/js/sharethis.js#property=5f7c3b509a89ce0012ab6f06&product=inline-share-buttons"
        async="async"></script>
    {{-- --}}
    <link href="https://vjs.zencdn.net/7.8.4/video-js.css" rel="stylesheet" />

    <script src="https://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/d3/3.5.3/d3.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/topojson/1.6.9/topojson.min.js"></script>
    <script src="{{ asset('public/maps/datamaps.world.min.js', true) }}"></script>

</head>

<body>
    <div class="top-bar">
        <a class="top-bar-item">English</a>
    </div>
    @include('website.header.second_bar')
    <div class="top-bar-logo-ad">
        <div class="logo-ad-content" style="justify-content: space-between; align-items: start">
            <img src="{{ asset('public/images/idove_logo.png') }}" class="top-logo" />
            @include('website.slider.promo-slider')
        </div>
    </div>

    @include('partials.global.header')

    <div class="content">
        @yield('content')
    </div>
    @include('partials.global.footer')

    <!-- javascript -->
    <script src={{ asset('public/js/jquery.min.js', true) }}></script>
    <script src={{ asset('public/lightbox/js/lightbox.js', true) }}></script>
    <script src="https://vjs.zencdn.net/7.8.4/video.js"></script>
    <script src={{ asset('public/splide/splide.js', true) }}></script>

    {{--

    <script src={{ asset('public/js/bootstrap.bundle.min.js', true) }}></script>
    <script src={{ asset('public/js/jquery.easing.min.js', true) }}></script>
    <script src={{ asset('public/js/scrollspy.min.js', true) }}></script>
    <!-- Magnific Popup -->
    <script src={{ asset('public/js/jquery.magnific-popup.min.js', true) }}></script>
    <script src={{ asset('public/js/magnific.init.js', true) }}></script>
    <!-- SLIDER -->
    <script src={{ asset('public/js/owl.carousel.min.js', true) }}></script>
    <script src={{ asset('public/js/owl.init.js', true) }}></script>
    <!-- Icons -->
    <script src={{ asset('public/js/feather.min.js', true) }}></script>

    <!-- Main Js -->
    <script src={{ asset('public/js/app.js', true) }}></script>


    --}}
    @yield('js')
    @yield('scripts')
</body>

</html>
