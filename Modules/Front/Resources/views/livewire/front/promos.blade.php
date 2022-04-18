<div id="slider-promo" class="splide slider-promo mt-5">
    <div class="splide__track">
        <ul class="splide__list">
            @foreach ($promos as $promo)
            <li class="splide__slide">
                <img class="rounded-lg" src="{{ $promo->thumbnail }}" alt="{{ $promo->title }}">
            </li>
            @endforeach
        </ul>
    </div>
</div>
