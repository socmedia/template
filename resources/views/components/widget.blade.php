<div class="card radius-10 border-start border-0 border-3 border-{{ $state }}">
    <div class="card-body">
        <div class="d-flex align-items-center">
            <div>
                <p class="mb-0 text-secondary">{{ $title }}</p>
                <h4 class="my-1 text-{{ $state }}">{{ $text }}</h4>
            </div>
            <div class="widgets-icons-2 rounded-circle bg-gradient-bloody text-white ms-auto">

                @if ($icon)
                <i class="bx bxs-{{ $icon }}"></i>
                @endif
            </div>
        </div>
    </div>
</div>
