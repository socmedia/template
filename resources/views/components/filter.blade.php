<div {{ $attributes->merge(['class' => 'row']) }}>
    <div class="col-12">
        <div class="{{ !$showFilterText ?: 'mb-3'}} text-end">
            {{ $button }}
        </div>

        @if ($showFilterText)
        <p class="text-uppercase text-secondary mb-0"><strong>Filter:</strong></p>
        @endif

        <div class="py-3">

            @foreach ($filters as $index => $filter)

            @if (is_array($filter['query']))

            @if (!in_array(null, $filter['query']))
            <x-badge icon="" state="primary">
                {{ $index }}: {{ implode(' - ', $filter['query']) }}
                <x-button-close wire:click="{{ $filter['reset_method'] }}" />
            </x-badge>
            @endif

            @else

            @if ($filter['query'])
            <x-badge icon="" state="primary">
                {{ $index }}: {{ $filter['query'] }}
                <x-button-close wire:click="{{ $filter['reset_method'] }}" />
            </x-badge>
            @endif

            @endif

            @endforeach
        </div>
    </div>

    {{ $slot }}
</div>
