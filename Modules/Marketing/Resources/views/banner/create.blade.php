@extends('layouts.master')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/app/css/additional.css') }}">

    {{-- Filepond --}}
    <link href="{{ asset('vendor/filepond/css/filepond.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('vendor/filepond/plugins/image-preview/filepond-plugin-image-preview.min.css') }}"
        rel="stylesheet" />
    <link href="{{ asset('vendor/filepond/plugins/file-poster/filepond-plugin-file-poster.min.css') }}" rel="stylesheet" />
@endpush

@section('wrapper')
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <x-breadcrumb pageTitle="Banner">
                <x-slot name="link">
                    <x-breadcrumb.link href="{{ route('adm.marketing.banner.index') }}" pageTitle="Banner" />
                    <x-breadcrumb.link active="true" pageTitle="Tambah" />
                </x-slot>

                <x-slot name="button">
                    <x-button.back href="{{ route('adm.marketing.banner.index') }}" />
                </x-slot>
            </x-breadcrumb>

            <x-blank-container class="justify-content-center">
                <livewire:marketing::banner.create />
            </x-blank-container>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/app/js/additional.js') }}"></script>
    {{-- Filepond --}}
    <script src="{{ asset('vendor/filepond/js/filepond.js') }}"></script>
    <script src="{{ asset('vendor/filepond/plugins/image-preview/filepond-plugin-image-preview.min.js') }}"></script>
    <script src="{{ asset('vendor/filepond/plugins/file-poster/filepond-plugin-file-poster.min.js') }}"></script>
    <script src="{{ asset('vendor/filepond/plugins/jquery/filepond.jquery.js') }}"></script>
@endpush
