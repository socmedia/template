@extends("layouts.master")

@push('style')
<style>
    .avatar {
        position: relative
    }

    .avatar .avatar-button {
        position: absolute;
        bottom: -100%;
        right: 0;
        left: 0;
        transition: .3s all;
        opacity: 0;
        background: #343434bf;
        font-size: .75rem;
        padding: .25rem .5rem;
        cursor: pointer;
        color: aliceblue;
    }

    .avatar .avatar-button label {
        cursor: pointer
    }

    .avatar:hover .avatar-button {
        bottom: 0;
        opacity: 1;
    }
</style>
@endpush

@section("wrapper")
<div class="page-wrapper">
    <div class="page-content">
        <x-breadcrumb pageTitle="Theme">
            <x-slot name="link">
                <x-breadcrumb.link active="true" pageTitle="Theme" />
            </x-slot>
        </x-breadcrumb>

        <livewire:user::theme />
    </div>
</div>
@endsection

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
