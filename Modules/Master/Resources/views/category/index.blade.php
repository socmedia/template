@extends('layouts.master')

@section('wrapper')
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <x-breadcrumb pageTitle="Kategori">
                <x-slot name="link">
                    <x-breadcrumb.link active="true" pageTitle="Kategori" />
                </x-slot>

                <x-slot name="button">
                    <div class="btn-group">
                        @can('category.create')
                            <x-button.create text="Kategori" href="{{ route('adm.master.category.create') }}" />
                        @endcan
                        @can('category.delete')
                            <x-button.trash href="{{ route('adm.master.category.trash') }}" :totalTrash="$countTrash" />
                        @endcan
                    </div>
                </x-slot>
            </x-breadcrumb>

            <x-blank-container>
                <livewire:master::category.table />
            </x-blank-container>
        </div>
    </div>
@endsection

@push('script')
    <script src="https://cdn.jsdelivr.net/gh/livewire/sortable@v0.x.x/dist/livewire-sortable.js"></script>
@endpush
