@extends('layouts.master')

@push('style')
    <style>
        table td p,
        table td div {
            white-space: normal;
        }
    </style>
@endpush

@section('wrapper')
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <x-breadcrumb pageTitle="Content Management System">
                <x-slot name="link">
                    <x-breadcrumb.link active="true" pageTitle="Content Management System" />
                </x-slot>

                <x-slot name="button">
                    @can('cms.create')
                        <x-button.create text="CMS" href="{{ route('adm.settings.create', ['group' => 'front.']) }}" />
                    @endcan
                </x-slot>
            </x-breadcrumb>

            <livewire:appsetting::cms.table />
        </div>
    </div>
@endsection
