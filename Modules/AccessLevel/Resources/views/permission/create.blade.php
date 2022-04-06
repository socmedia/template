@extends("layouts.master")

@section("wrapper")
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <x-breadcrumb pageTitle="Permission">
            <x-slot name="link">
                <x-breadcrumb.link href="{{ route('adm.access-level.permission.index')}}" pageTitle="Permission" />
                <x-breadcrumb.link active="true" pageTitle="Tambah" />
            </x-slot>

            <x-slot name="button">
                <x-button.back href="{{ route('adm.access-level.permission.index') }}" />
            </x-slot>
        </x-breadcrumb>

        <x-blank-container class="justify-content-center" md="8" lg="8">
            <livewire:accesslevel::permission.create />
        </x-blank-container>
    </div>
</div>
@endsection
