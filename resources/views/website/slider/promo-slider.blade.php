<div class="promo-wrapper">
    <div class="splide" id="promo-slider">
        <div class="splide__track">
            <ul class="splide__list">
                <li class="splide__slide">
                    <img src="{{ asset('public/images/promo-1.png') }}" class="top-promos" />
                </li>
            </ul>
        </div>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        new Splide('#promo-slider').mount();
    });

</script>
