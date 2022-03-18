@extends("layouts.master")

@section("wrapper")
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <x-breadcrumb pageTitle="Kategori">
            <x-slot name="link">
                <x-breadcrumb.link active="true" pageTitle="Kategori" />
            </x-slot>

            <x-slot name="button">
                <div class="btn-group">
                    <x-button.create text="Kategori" href="{{ route('adm.master.category.create') }}" />
                    <x-button.trash href="{{ route('adm.master.category.trash') }}" :totalTrash="$countTrash" />
                </div>
            </x-slot>
        </x-breadcrumb>

        <x-blank-container>
            <livewire:master::category.table />
        </x-blank-container>
    </div>
</div>
@endsection
