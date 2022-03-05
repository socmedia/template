<section class="first-section">
    <nav style="--bs-breadcrumb-divider: '•';" aria-label="breadcrumb">
        <div class="container">
            <div class="d-flex flex-column flex-md-row align-items-md-center w-100 px-3 px-md-0">
                <h3 class="page-title">{{ $pageTitle }}</h3>
                <ol class="breadcrumb ms-md-auto">
                    <li class="breadcrumb-item">
                        <a href="{{ route('public.index') }}"><i class="bi bi-house-fill"></i></a>
                    </li>
                    {{ $slot }}
                </ol>
            </div>
        </div>
    </nav>
</section>
