<a
    href="{{ route('public.place.detail', ['category' => $place->category ? $place->category->slug_name : 'not-found', 'place' => $place->slug_name]) }}">
    <div class="card card-product">
        <div class="card-body"
            style="background-image: url({{ !$place->thumbnail ? asset('assets/default/images/image_not_found.png') : $place->thumbnail }})">
            <span class="badge badge-location">
                <i class="icon-icon_location"></i>
                Kec. {{ Str::title($place->district->name) }}
            </span>

            <div class="text">
                <h5 class="text-title text-capitalize">{{ $place->name }}</h5>
                <p class="text-description">{{ $place->description }}</p>
            </div>
        </div>
    </div>
</a>
