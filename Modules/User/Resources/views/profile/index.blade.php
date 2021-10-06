@extends("layouts.master")

@section("wrapper")
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Profile</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('adm.user.index')}}">
                                <i class="bx bx-home-alt"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Profile</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->

        <livewire:user::profile.main />
    </div>
</div>
@endsection

@push('style')
<link rel="stylesheet" href="{{asset('assets/app/css/additional.css')}}">
@endpush

@push('script')

@endpush
<script>
    document.addEventListener('preferences', function (e) {
        const className = `${e.detail.theme}`;
        const html = document.querySelector('html');
        html.className = className
    })
</script>
