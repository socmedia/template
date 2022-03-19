@extends("layouts.master")

@section("wrapper")
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <x-breadcrumb pageTitle="Settings">
            <x-slot name="link">
                <x-breadcrumb.link href="{{ route('adm.settings.index') }}" pageTitle="Settings" />
                <x-breadcrumb.link active="true" pageTitle="Tambah" />
            </x-slot>
            <x-slot name="button">
                <x-button.back href="{{ route('adm.settings.index') }}" />
            </x-slot>
        </x-breadcrumb>

        <livewire:appsetting::settings.create />
    </div>
</div>
@endsection
