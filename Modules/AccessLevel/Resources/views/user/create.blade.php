@extends("layouts.master")

@section("wrapper")
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <x-breadcrumb pageTitle="User">
            <x-slot name="link">
                <x-breadcrumb.link href="{{ route('adm.access-level.user.index')}}" pageTitle="User" />
                <x-breadcrumb.link active="true" pageTitle="Tambah" />
            </x-slot>

            <x-slot name="button">
                <x-button.back href="{{ route('adm.access-level.user.index') }}" />
            </x-slot>
        </x-breadcrumb>

        <x-blank-container class="justify-content-center">
            <livewire:accesslevel::user.create />
        </x-blank-container>
    </div>
</div>
@endsection
