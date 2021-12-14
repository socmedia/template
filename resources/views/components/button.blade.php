@if ($disabled == 'true')
<div class="btn btn-{{ $state }} {{ $additionalClass }} disabled">
    {{ $text }}
</div>
@else
<button class="btn btn-{{ $state }} {{ $additionalClass }}" type="{{ $type }}">
    {{ $text }}

    @if ($loadingState)
    <div class="spinner-grow spinner-grow-sm" role="status" wire:loading="{{$wireTarget}}"
        wire:target="{{$wireTarget}}">
        <span class='visually-hidden'>Loading...</span>
    </div>
    @endif
</button>
@endif
