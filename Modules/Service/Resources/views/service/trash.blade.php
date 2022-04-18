@extends("layouts.master")

@section("wrapper")
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <x-breadcrumb pageTitle="Layanan">
            <x-slot name="link">
                <x-breadcrumb.link href="{{ route('adm.service.index')}}" pageTitle="Layanan" />
                <x-breadcrumb.link active="true" pageTitle="Sampah" />
            </x-slot>

            <x-slot name="button">
                <div class="btn-group">
                    <x-button.create text="Layanan" href="{{ route('adm.service.create') }}" />
                    <x-button.back href="{{route('adm.service.index')}}" />
                </div>
            </x-slot>
        </x-breadcrumb>

        <x-blank-container>
            <livewire:master::category.table />
        </x-blank-container>
    </div>
</div>
@endsection
