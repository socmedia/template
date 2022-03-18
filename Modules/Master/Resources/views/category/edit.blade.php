@extends("layouts.master")

@section("wrapper")
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <x-breadcrumb pageTitle="Kategori">
            <x-slot name="link">
                <x-breadcrumb.link href="{{ route('adm.master.category.index')}}" pageTitle="Kategori" />
                <x-breadcrumb.link active="true" pageTitle="Edit" />
            </x-slot>

            <x-slot name="button">
                <div class="btn-group">
                    <x-button.back href="{{route('adm.master.category.index')}}" />
                </div>
            </x-slot>
        </x-breadcrumb>

        <x-blank-container class="justify-content-center" md="8" lg="8">
            <livewire:master::category.edit :category="$category" />
        </x-blank-container>
    </div>
</div>
@endsection
