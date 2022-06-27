@extends('layouts.master')

@push('style')
    <link rel="stylesheet" href="{{ asset('assets/app/css/additional.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.css"
        integrity="sha512-5m1IeUDKtuFGvfgz32VVD0Jd/ySGX7xdLxhqemTmThxHdgqlgPdupWoSN8ThtUSLpAGBvA8DY2oO7jJCrGdxoA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- Filepond --}}
    <link href="{{ asset('vendor/filepond/css/filepond.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('vendor/filepond/plugins/image-preview/filepond-plugin-image-preview.min.css') }}"
        rel="stylesheet" />
    <link href="{{ asset('vendor/filepond/plugins/file-poster/filepond-plugin-file-poster.min.css') }}"
        rel="stylesheet" />

    {{-- Summernote --}}
    <link href="{{ asset('vendor/summernote/css/summernote-lite.min.css') }}" rel="stylesheet">
@endpush


@section('wrapper')
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <x-breadcrumb pageTitle="Settings">
                <x-slot name="link">
                    <x-breadcrumb.link href="{{ route('adm.settings.index') }}" pageTitle="Settings" />
                    <x-breadcrumb.link active="true" pageTitle="Edit" />
                </x-slot>
                <x-slot name="button">
                    <x-button.back href="{{ route('adm.settings.index') }}" />
                </x-slot>
            </x-breadcrumb>

            <livewire:appsetting::settings.edit :setting="$setting" />
        </div>
    </div>
@endsection

@push('script')
    {{-- Summernote --}}
    <script src="{{ asset('vendor/summernote/js/summernote-lite.min.js') }}"></script>

    {{-- Filepond --}}
    <script src="{{ asset('vendor/filepond/js/filepond.js') }}"></script>
    <script src="{{ asset('vendor/filepond/plugins/image-preview/filepond-plugin-image-preview.min.js') }}"></script>
    <script src="{{ asset('vendor/filepond/plugins/file-poster/filepond-plugin-file-poster.min.js') }}"></script>
    <script src="{{ asset('vendor/filepond/plugins/jquery/filepond.jquery.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js"
        integrity="sha512-/1nVu72YEESEbcmhE/EvjH/RxTg62EKvYWLG3NdeZibTCuEtW5M4z3aypcvsoZw03FAopi94y04GhuqRU9p+CQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('assets/app/js/additional.js') }}"></script>
@endpush
