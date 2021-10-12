<div class="alert border-0 border-start border-5 border-{{ $state }} alert-dismissible fade show py-2">
    <div class="d-flex align-items-center">

        @if ($icon)
        <div class="font-35 text-{{ $state }}">
            <i class="bx bx-{{ $icon }}"></i>
        </div>
        @endif

        <div class="ms-3">
            <h6 class="mb-0 text-{{ $state }}">{{ $title }}</h6>
            <div>{{ $message }}</div>
        </div>
    </div>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
