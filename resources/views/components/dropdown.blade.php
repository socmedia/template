<div class="dropdown">
    <a class="dropdown-toggle dropdown-toggle-nocaret {{ $additionalClass }}" href="#" data-bs-toggle="dropdown"
        aria-expanded="true">
        {{ $text }}

        @if ($loadingState == 'true' && $withIcon != 'false')
        <div class="spinner-grow spinner-grow-sm" role="status" wire:loading wire:loading.target="{{$wireTarget}}">
            <span class='visually-hidden'>Loading...</span>
        </div>

        <i class="{{ $icon }} {{ $iconSize }} {{ $color }}" wire:loading.target="{{$wireTarget}}"
            wire:loading.class="d-none"></i>
        @else
        @if ($withIcon != 'false')
        <i class="{{ $icon }} {{ $iconSize }} {{ $color }}"></i>
        @endif
        @endif
    </a>
    <ul class="dropdown-menu"
        style="margin: 0px; position: absolute; inset: 0px auto auto 0px; transform: translate(0px, 28.8px);"
        data-popper-placement="bottom-start">
        {{ $slot }}
    </ul>
</div>
