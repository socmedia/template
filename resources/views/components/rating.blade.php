<div class="d-flex">
    <div class="text-center flex-shrink-1">
        <h3 class="lead lg">
            {{ $average }}
            <small class="sub fs-5 text-muted">/ 5</small>
            <br>
        </h3>
        <h4>
            <i class="bx bxs-star {{ (int) round($average) >= 1 ? 'text-warning' : 'text-gray' }}"></i>
            <i class="bx bxs-star {{ (int) round($average) >= 2 ? 'text-warning' : 'text-gray' }}"></i>
            <i class="bx bxs-star {{ (int) round($average) >= 3 ? 'text-warning' : 'text-gray' }}"></i>
            <i class="bx bxs-star {{ (int) round($average) >= 4 ? 'text-warning' : 'text-gray' }}"></i>
            <i class="bx bxs-star {{ (int) round($average) == 5 ? 'text-warning' : 'text-gray' }}"></i>
        </h4>
        <p class="fw-light fs-6 text-muted">
            ({{ numberShortner($count) }}) Penilaian
        </p>
    </div>
</div>
