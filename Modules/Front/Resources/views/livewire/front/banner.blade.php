<header class="slider">
    <div class="slider-container">
        <div class="swiper-wrapper">

            @foreach ($banners as $banner)
            <div class="swiper-slide {{ $banner->desktop_background_position }}"
                data-background="{{ $banner->desktop_media_path }}" data-stellar-background-ratio="1.15">
                <div class="container">

                    @if ($banner->with_caption)

                    @if ($banner->caption_title)
                    <h2>{{ $banner->caption_title }}</h2>
                    @endif

                    @if ($banner->caption_text)
                    <p>{{ $banner->caption_text }}</p>
                    @endif

                    @endif

                    @if ($banner->button_link)
                    <a class="btn btn-light text-dark" href="{{ $banner->button_link }}">{{ $banner->button_text }}</a>
                    @endif

                </div>
            </div>
            @endforeach

        </div>
        <div class="inner-elements">
            <div class="container">
                <div class="pagination"></div>
                <div class="button-prev"><i class="bx bx-chevron-left"></i></div>
                <div class="button-next"><i class="bx bx-chevron-right"></i></div>
            </div>
        </div>
    </div>
</header>
