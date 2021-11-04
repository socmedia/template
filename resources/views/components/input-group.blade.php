<div class="input-group">
    @if ($inputType = 'prepend')
    <div class="input-group-prepend">
        <div class="input-group-text">
            @if ($withIcon)
            {{ $icon }}
            @endif
            <span class="text-muted">{{$text}}</span>
        </div>
    </div>
    @endif

    {{$slot}}

    @if ($inputType = 'append')
    <div class="input-group-append">
        <div class="input-group-text">
            @if ($withIcon)
            {{ $icon }}
            @endif
            <span class="text-muted">{{$text}}</span>
        </div>
    </div>
    @endif
</div>
