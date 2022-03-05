<div class="row">
    @if (!$places->isEmpty())
    <h5 class="section-sub-title">Tempat Wisata</h5>

    <div class="row">
        @foreach ($places as $place)
        <div class="col-12 col-sm-6 col-lg-4 mb-4">
            <x-place.mini :place="$place" />
        </div>
        @endforeach
    </div>
    @endif
</div>
