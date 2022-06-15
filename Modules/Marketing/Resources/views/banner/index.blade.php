@extends('layouts.master')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/app/css/additional.css') }}">
@endpush

@section('wrapper')
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <x-breadcrumb pageTitle="Banner">
                <x-slot name="link">
                    <x-breadcrumb.link active="true" pageTitle="Banner" />
                </x-slot>

                <x-slot name="button">
                    <div class="btn-group">
                        @can('banner.create')
                            <x-button.create text="Banner" href="{{ route('adm.marketing.banner.create') }}" />
                        @endcan
                    </div>
                </x-slot>
            </x-breadcrumb>

            <x-blank-container>
                <livewire:marketing::banner.table />
            </x-blank-container>
        </div>
    </div>
@endsection
