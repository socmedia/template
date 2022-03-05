<div class="form-check">
    <input class="form-check-input" type="radio" name="{{ $name }}" id="{{ $id }}" value="{{ $value }}" {{
        $attributes->whereStartsWith('wire:model') }}>
    <label class="form-check-label" for="{{ $id }}">
        {{ $label ?: $slot }}
    </label>
</div>
