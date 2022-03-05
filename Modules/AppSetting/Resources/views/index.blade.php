@extends("layouts.master")

@section("wrapper")
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <x-breadcrumb pageTitle="Site Settings">
            <x-slot name="link">
                <x-breadcrumb.link active="true" pageTitle="Site Settings" />
            </x-slot>
        </x-breadcrumb>

        <livewire:appsetting::settings.table />
    </div>
</div>
@endsection
