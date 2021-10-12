<div class="alert alert-{{ $state }} border-0 bg-{{ $state }} alert-dismissible fade show py-2">
    <div class="d-flex align-items-center">

        @if ($icon)
        <div class="font-35 text-{{ $color }}">
            <i class="bx bxs-{{ $icon }}"></i>
        </div>
        @endif

        <div class="ms-3">
            <h6 class="mb-0 text-{{ $color }}">{{ $title }}</h6>
            <div class="text-{{ $color }}">{{ $message }}</div>
        </div>
    </div>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
