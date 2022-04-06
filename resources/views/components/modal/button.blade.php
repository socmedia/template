<button type="button" class="{{ isset($class) ? $class : 'btn btn-light btn-sm'}}" data-bs-toggle="modal"
    data-bs-target="#{{ isset($modalId) ? $modalId : 'modal' }}" {{ $attributes }}>
    {{ $slot }}
</button>
