@extends("layouts.master")

@section("wrapper")
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <x-breadcrumb pageTitle="Role">
            <x-slot name="link">
                <x-breadcrumb.link href="{{ route('adm.access-level.role.index')}}" pageTitle="Role" />
                <x-breadcrumb.link active="true" pageTitle="Tambah" />
            </x-slot>

            <x-slot name="button">
                <div class="ms-auto">
                    <a class="btn btn-dark btn-sm ms-auto px-3"
                        href="{{route('adm.access-level.role.index')}}">Kembali</a>
                </div>
            </x-slot>
        </x-breadcrumb>

        <x-blank-container class="justify-content-center" md="8" lg="8">
            <livewire:accesslevel::role.create />
        </x-blank-container>
    </div>
</div>
@endsection