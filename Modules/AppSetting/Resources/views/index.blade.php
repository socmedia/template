@extends("layouts.master")

@section("wrapper")
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <x-breadcrumb pageTitle="Site Settings">
            <x-slot name="link">
                <x-breadcrumb.link active="true" pageTitle="Site Settings" />
            </x-slot>

            <x-slot name="button">
                <div class="btn-group">
                    <a href="{{ route('adm.access-level.user.create') }}"
                        class="btn btn-dark btn-sm ms-auto px-3">Tambah
                        User</a>
                </div>
            </x-slot>
        </x-breadcrumb>

        <livewire:appsetting::settings.table />
    </div>
</div>
@endsection
