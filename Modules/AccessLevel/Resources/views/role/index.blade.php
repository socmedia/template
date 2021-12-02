@extends("layouts.master")

@section("wrapper")
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Role</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('adm.user.index')}}">
                                <i class="bx bx-home-alt"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Role</li>
                    </ol>
                </nav>
            </div>
        </div>

        <livewire:accesslevel::role.main />
    </div>
</div>
@endsection

@push('style')
<script src="{{asset('assets/app/js/tinymce.min.js')}}"></script>
@endpush

@push('script')
<script>
    $(function () {
        document.addEventListener('preferences', function (e) {
            const className = `${e.detail.theme}`;
            const html = document.querySelector('html');
            html.className = className
        })

        document.addEventListener('avatar-changed', function(e) {
            const url = e.detail.url;
            const headerAvatar = document.querySelector('header .avatar img');
            headerAvatar.src = url;
        })
    })
</script>
@endpush
