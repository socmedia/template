@extends("layouts.master")

@section("wrapper")
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <x-breadcrumb pageTitle="Settings">
            <x-slot name="link">
                <x-breadcrumb.link active="true" pageTitle="Settings" />
            </x-slot>
            <x-slot name="button">
                <x-button.create href="{{ route('adm.settings.create') }}" text="Tambah Setting" />
            </x-slot>
        </x-breadcrumb>

        <livewire:appsetting::settings.table />
    </div>
</div>
@endsection
