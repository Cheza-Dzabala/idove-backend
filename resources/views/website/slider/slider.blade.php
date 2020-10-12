<div>
    <div class="splide" id="main-slider">
        <div class="splide__arrows">
            <button class="splide__arrow splide__arrow--prev directional" style="border-radius: 0px;
            height: 70px;
            width: 150px;
            background-color: black;
            opacity: 0.5;">
                <img src={{ asset('images/icons/back.png') }} / style="height: 40px" />
            </button>
            <button class="splide__arrow splide__arrow--next directional" style="border-radius: 0px;
            height: 70px;
            width: 150px;
            background-color: black;
            opacity: 0.5;">
                <img src={{ asset('images/icons/forward.png') }} style="height: 40px" />
            </button>
        </div>
        <div class="splide__track">
            <ul class="splide__list">
                <li class="splide__slide">
                    <img src={{ asset('images/people.png') }} style="width: 100%;" />
                </li>
                <li class="splide__slide">
                    <img src={{ asset('images/people.png') }} style="width: 100%;" />
                </li>
                <li class="splide__slide">
                    <img src={{ asset('images/people.png') }} style="width: 100%;" />
                </li>
            </ul>
        </div>
    </div>
</div>
@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            new Splide('#main-slider').mount();
        });

    </script>
@endsection
