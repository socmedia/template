<div class="row justify-content-center">

    @foreach ($partners as $partner)
    <div class="col-lg-2 col-md-4 col-sm-6 col-6 mb-3">
        <figure> <img src="{{ $partner->media_path }}" alt="{{ $partner->name }}">
            <h6>{{ $partner->name }}</h6>
        </figure>
    </div>
    @endforeach

</div>
