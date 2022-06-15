@extends('layouts.master')

@section('wrapper')
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <x-breadcrumb pageTitle="Sub Kategori">
                <x-slot name="link">
                    <x-breadcrumb.link active="true" pageTitle="Sub Kategori" />
                </x-slot>

                <x-slot name="button">
                    <div class="btn-group">
                        @can('sub-category.create')
                            <x-button.create text="Sub Kategori" href="{{ route('adm.master.sub-category.create') }}" />
                        @endcan
                        @can('sub-category.delete')
                            <x-button.trash href="{{ route('adm.master.sub-category.trash') }}" :totalTrash="$countTrash" />
                        @endcan
                    </div>
                </x-slot>
            </x-breadcrumb>

            <x-blank-container>
                <livewire:master::sub-category.table />
            </x-blank-container>
        </div>
    </div>
@endsection

@push('script')
    <script src="https://cdn.jsdelivr.net/gh/livewire/sortable@v0.x.x/dist/livewire-sortable.js"></script>
@endpush
