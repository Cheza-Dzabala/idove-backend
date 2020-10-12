    <div class="splide" id="promo-slider">
        <div class="splide__track">
            <ul class="splide__list">
                <li class="splide__slide">
                    <img src="{{ asset('images/promo-1.png') }}" class="h-28 w-85" />
                </li>
            </ul>
        </div>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            new Splide('#promo-slider').mount();
        });

    </script>
