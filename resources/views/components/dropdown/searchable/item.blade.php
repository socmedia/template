<li {{ $attributes->merge(['class' => 'dropdown-item']) }}>
    <a class="text-capitalize cursor-pointer text-dark" {{ $attributes->whereStartsWith('wire:click') }}>{{ $slot }}</a>
</li>
