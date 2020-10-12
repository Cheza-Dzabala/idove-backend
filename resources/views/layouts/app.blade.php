<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css', true) }}" rel="stylesheet">
    <link href={{ asset('plugins/splide/splide.min.css', true) }} type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/css/splide.min.css">
    <link rel="stylesheet" href={{ asset('plugins/lightbox/css/lightbox.css', true) }} />
    <link href={{ asset('css/materialdesignicons.min.css', true) }} rel="stylesheet" type="text/css" />
    <link href="https://vjs.zencdn.net/7.10.2/video-js.css" rel="stylesheet" />

    <title>iDove</title>
</head>

<body>
    <div class="bg-au-green px-96 flex flex-row-reverse py-3 px-5">
        <p class="text-white text-xs">English</p>
    </div>
    @include('website.header.second_bar')
    <div class="px-96 flex flex-row justify-between py-10"">
       <a href=" /"> <img class=" h-24 w-40" src="{{ asset('images/idove_logo.png') }}" /></a>
        @include('website.slider.promo-slider')
    </div>
    @include('partials.global.header')

    <div class="px-96">
        @yield('content')
</body>
<script src={{ asset('js/jquery.min.js', true) }}></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/d3/3.5.3/d3.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/topojson/1.6.9/topojson.min.js"></script>
<script src="{{ asset('js/datamaps.world.min.js', true) }}"></script>
<script src={{ asset('plugins/lightbox/js/lightbox.js', true) }}></script>
<script src="https://vjs.zencdn.net/7.8.4/video.js"></script>
<script src={{ asset('plugins/splide/splide.js', true) }}></script>
<script type="text/javascript"
    src="https://platform-api.sharethis.com/js/sharethis.js#property=5f7c3b509a89ce0012ab6f06&product=inline-share-buttons"
    async="async"></script>
@yield('js')
@yield('scripts')

</div>

@include('partials.global.footer')


</html>
