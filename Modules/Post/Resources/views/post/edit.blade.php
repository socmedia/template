@extends('layouts.master')

@push('style')
    <link rel="stylesheet" href="{{ asset('assets/app/css/additional.css') }}">

    {{-- Tagify --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tagify/4.12.0/tagify.min.css"
          integrity="sha512-jA7mpoCCM3ue73dSro5PB6aLApcpF1ADflCsevAUN2SHy28rruGseQQAKKDpb8olrZRsNk/vGIPk8mpnRHI0zg=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- Filepond --}}
    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet" />
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet" />
    <link href="https://unpkg.com/filepond-plugin-file-poster/dist/filepond-plugin-file-poster.css" rel="stylesheet" />

    {{-- Summernote --}}
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">s
@endpush

@section('wrapper')
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <x-breadcrumb pageTitle="Post">
                <x-slot name="link">
                    @if (request('type'))
                        <x-breadcrumb.link pageTitle="Post"
                                           href="{{ route('adm.post.index', [
                                               'type' => request('type'),
                                           ]) }}" />
                    @else
                        <x-breadcrumb.link href="{{ route('adm.post.index') }}" pageTitle="Post" />
                    @endif
                    <x-breadcrumb.link active="true" pageTitle="Edit" />
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
                <livewire:post::post.edit :post="$post" />
            </x-blank-container>
        </div>
    </div>
@endsection

@push('script')
    {{-- Summernote --}}
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

    {{-- Filepond --}}
    <script src="https://unpkg.com/filepond/dist/filepond.min.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.js"></script>
    <script src="https://unpkg.com/filepond-plugin-file-poster/dist/filepond-plugin-file-poster.js"></script>
    <script src="https://unpkg.com/jquery-filepond/filepond.jquery.js"></script>

    <script src="{{ asset('assets/app/js/additional.js') }}"></script>
@endpush
