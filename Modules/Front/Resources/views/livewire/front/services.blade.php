<div>
    @if ($isHomePage)
    <div id="slider-services" class="splide slider-services mt-5">
        <div class="splide__track">
            <ul class="splide__list">
                @forelse ($services as $service)
                <li class="splide__slide">
                    <img src="{{ $service->thumbnail }}">
                    <p>
                        {{ $service->name }}
                    </p>
                </li>
                @empty

                @endforelse
            </ul>
        </div>
    </div>
    @else

    <div class="row justify-content-center">
        <div class="col-md-10">
            @forelse ($services as $index => $service)
            <div class="media service mb-3">
                <img src="{{ $service->thumbnail }}" alt="{{ $service->name }}">
                <div class="media-body">
                    <h4 class="mb-0 font-weight-bold">
                        <a href="{{ route('front.service.show', $service->slug_name) }}">{{ $service->name }}</a>
                    </h4>
                    {!! $service->description !!}

                    <hr>

                    <div class="d-flex">

                        <div class="mr-3">
                            <ul class="nav flex-column nav-tabs" id="service-{{ $service->slug_name }}" role="tablist">
                                @if ($service->duration)
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" id="duration-{{ $index }}-tab" data-toggle="tab"
                                        href="#duration-{{ $index }}" role="tab" aria-controls="duration-{{ $index }}"
                                        aria-selected="true">
                                        <i class="bx bxs-time"></i>
                                    </a>
                                </li>
                                @endif

                                @if ($service->terms_n_conditions)
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link {{ !$service->duration ? 'active' : null }}"
                                        id="tnc-{{ $index }}-tab" data-toggle="tab" href="#tnc-{{ $index }}" role="tab"
                                        aria-controls="tnc-{{ $index }}" aria-selected="false">
                                        <i class="bx bxs-notepad"></i>
                                    </a>
                                </li>
                                @endif
                            </ul>
                        </div>
                        <div class="tab-content" id="service-{{ $service->slug_name }}Content">

                            @if ($service->duration)
                            <div class="tab-pane fade show active" id="duration-{{ $index }}" role="tabpanel"
                                aria-labelledby="service-{{ $service->slug_name }}-tab">
                                {!! $service->duration !!}
                            </div>
                            @endif


                            @if ($service->terms_n_conditions)
                            <div class="tab-pane fade {{ !$service->duration ? 'show active' : null }}"
                                id="tnc-{{ $index }}" role="tabpanel" aria-labelledby="tnc-{{ $index }}-tab">
                                {!! $service->terms_n_conditions !!}
                            </div>
                            @endif

                        </div>
                    </div>


                </div>
            </div>
            @empty

            @endforelse
        </div>
    </div>

    @endif
</div>
