@extends('layouts.master')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/app/css/additional.css') }}">
@endpush

@section('wrapper')
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <x-breadcrumb pageTitle="Tag">
                <x-slot name="link">
                    <x-breadcrumb.link active="true" pageTitle="Tag" />
                </x-slot>
            </x-breadcrumb>

            <x-blank-container>
                <livewire:post::tag.all />
            </x-blank-container>
        </div>
    </div>
@endsection
