@extends('layouts.master')

@push('style')
    <link rel="stylesheet" href="{{ asset('assets/app/css/additional.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.css"
          integrity="sha512-5m1IeUDKtuFGvfgz32VVD0Jd/ySGX7xdLxhqemTmThxHdgqlgPdupWoSN8ThtUSLpAGBvA8DY2oO7jJCrGdxoA=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tagify/4.12.0/tagify.min.css"
          integrity="sha512-jA7mpoCCM3ue73dSro5PB6aLApcpF1ADflCsevAUN2SHy28rruGseQQAKKDpb8olrZRsNk/vGIPk8mpnRHI0zg=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet" />
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet" />
@endpush

@section('wrapper')
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <x-breadcrumb pageTitle="Postingan">
                <x-slot name="link">
                    @if (request('type'))
                        <x-breadcrumb.link pageTitle="Postingan"
                                           href="{{ route('adm.post.index', [
                                               'type' => request('type'),
                                           ]) }}" />
                    @else
                        <x-breadcrumb.link href="{{ route('adm.post.index') }}" pageTitle="Postingan" />
                    @endif
                    <x-breadcrumb.link active="true" pageTitle="Tambah" />
                </x-slot>

                <x-slot name="button">
                    @if (request('type'))
                        <x-button.back
                                       href="{{ route('adm.post.index', [
                                           'type' => request('type'),
                                       ]) }}" />
                    @else
                        <x-button.back href="{{ route('adm.post.index') }}" />
                    @endif
                </x-slot>
            </x-breadcrumb>

            <x-blank-container class="justify-content-center">
                <livewire:post::post.create :slug_type="request('type')" />
            </x-blank-container>
        </div>
    </div>
@endsection

@push('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js"
            integrity="sha512-/1nVu72YEESEbcmhE/EvjH/RxTg62EKvYWLG3NdeZibTCuEtW5M4z3aypcvsoZw03FAopi94y04GhuqRU9p+CQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tagify/4.12.0/tagify.min.js"
            integrity="sha512-uDMk0LmYVhMq6mKY7QfiJAXBchLmLiCZjh5hmZ6UUEJ/iNDk2s8maQDx4lOPCqLJqvhktN/g7oZTesQ6SOIjhw=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- include FilePond library -->
    <script src="https://unpkg.com/filepond/dist/filepond.min.js"></script>
    <!-- include FilePond plugins -->
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.js"></script>
    <!-- include FilePond jQuery adapter -->
    <script src="https://unpkg.com/jquery-filepond/filepond.jquery.js"></script>

    <script src="{{ asset('assets/app/js/additional.js') }}"></script>
@endpush
