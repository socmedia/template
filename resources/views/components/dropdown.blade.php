<div class="dropdown ms-auto">
    <a class="dropdown-toggle dropdown-toggle-nocaret {{ $additionalClass }}" href="#" data-bs-toggle="dropdown"
        aria-expanded="true">
        {{ $text }}

        @if ($withIcon != 'false')
        <i class="{{ $icon }} {{ $iconSize }} {{ $color }}"></i>
        @endif
    </a>
    <ul class="dropdown-menu"
        style="margin: 0px; position: absolute; inset: 0px auto auto 0px; transform: translate(0px, 28.8px);"
        data-popper-placement="bottom-start">
        {{ $slot }}
    </ul>
</div>
