<div id="slider-review" class="splide slider-review mt-5">
    <div class="splide__track">
        <ul class="splide__list">
            @foreach ($reviews as $review)
            <li class="splide__slide">
                <div class="card bg-transparent h-100">
                    <div class="card-body">
                        <div class="avatar" style="background-image: url('{{ $review->media_path }}')">
                        </div>
                        <h4>{{ $review->name }}</h4>
                        <p>“{{ $review->review }}”</p>
                    </div>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
</div>
