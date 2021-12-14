<div {{ $attributes->merge(['class' => 'row']) }}>
    <div class="col-{{ $xs }} col-sm-{{ $sm }} col-md-{{ $md }} col-lg-{{ $lg }} {{ $additionalClass }}">
        {{ $slot }}
    </div>
</div>
