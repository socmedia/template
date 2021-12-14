@if ($href)
<a href="{{ $href }}" {{ $attributes->merge(['class' => 'btn btn-light btn-sm']) }}>
    {{ $slot }}
</a>
@else
<button type="{{ $type }}" {{ $attributes->merge(['class' => 'btn btn-light btn-sm']) }}>
    {{ $slot }}
</button>
@endif
