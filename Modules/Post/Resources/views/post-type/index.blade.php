@extends('layouts.master')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/app/css/additional.css') }}">
@endpush

@section('wrapper')
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <x-breadcrumb pageTitle="Jenis Postingan">
                <x-slot name="link">
                    <x-breadcrumb.link active="true" pageTitle="Jenis Postingan" />
                </x-slot>

                <x-slot name="button">
                    <div class="btn-group">
                        @can('post-type.create')
                            <x-button.create text="Jenis" href="{{ route('adm.post-type.create') }}" />
                        @endcan
                    </div>
                </x-slot>
            </x-breadcrumb>

            <x-blank-container>
                <livewire:post::post-type.table />
            </x-blank-container>
        </div>
    </div>
@endsection
