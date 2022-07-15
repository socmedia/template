@extends('layouts.master')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/app/css/additional.css') }}">
@endpush

@section('wrapper')
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <x-breadcrumb pageTitle="Headline">
                <x-slot name="link">
                    <x-breadcrumb.link active="true" pageTitle="Headline" />
                </x-slot>

                <x-slot name="button">
                    <div class="btn-group">
                        @can('featuredpost.create')
                            <x-button.create text="Headline" href="{{ route('adm.post-featured.create') }}" />
                        @endcan
                    </div>
                </x-slot>
            </x-breadcrumb>

            <x-blank-container>
                <livewire:post::featured-post.table />
            </x-blank-container>
        </div>
    </div>
@endsection
