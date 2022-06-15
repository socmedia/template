@extends('layouts.master')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/app/css/additional.css') }}">
@endpush

@section('wrapper')
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <x-breadcrumb pageTitle="FAQ">
                <x-slot name="link">
                    <x-breadcrumb.link active="true" pageTitle="FAQ" />
                </x-slot>

                <x-slot name="button">
                    <div class="btn-group">
                        @can('faq.create')
                            <x-button.create text="FAQ" href="{{ route('adm.marketing.faq.create') }}" />
                        @endcan
                    </div>
                </x-slot>
            </x-breadcrumb>

            <x-blank-container>
                <livewire:marketing::faq.table />
            </x-blank-container>
        </div>
    </div>
@endsection
