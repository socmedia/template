@extends("layouts.master")

@section("wrapper")
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <x-breadcrumb pageTitle="Sub Kategori">
            <x-slot name="link">
                <x-breadcrumb.link href="{{ route('adm.master.sub-category.index')}}" pageTitle="Sub Kategori" />
                <x-breadcrumb.link active="true" pageTitle="Edit" />
            </x-slot>

            <x-slot name="button">
                <div class="btn-group">
                    <x-button.back href="{{route('adm.master.sub-category.index')}}" />
                </div>
            </x-slot>
        </x-breadcrumb>

        <x-blank-container class="justify-content-center">
            <livewire:master::sub-category.edit :sub_category="$sub_category" />
        </x-blank-container>
    </div>
</div>
@endsection
