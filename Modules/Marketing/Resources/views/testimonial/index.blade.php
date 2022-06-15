@extends('layouts.master')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/app/css/additional.css') }}">
@endpush

@section('wrapper')
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <x-breadcrumb pageTitle="Testimonial">
                <x-slot name="link">
                    <x-breadcrumb.link active="true" pageTitle="Testimonial" />
                </x-slot>

                <x-slot name="button">
                    <div class="btn-group">
                        @can('testimonial.create')
                            <x-button.create text="Testimonial" href="{{ route('adm.marketing.testimonial.create') }}" />
                        @endcan
                    </div>
                </x-slot>
            </x-breadcrumb>

            <x-blank-container>
                <livewire:marketing::testimonial.table />
            </x-blank-container>
        </div>
    </div>
@endsection
