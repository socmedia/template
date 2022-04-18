@extends("layouts.master")

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/app/css/additional.css') }}">
@endpush

@section("wrapper")
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <x-breadcrumb pageTitle="Testimonial">
            <x-slot name="link">
                <x-breadcrumb.link href="{{ route('adm.marketing.testimonial.index')}}" pageTitle="Testimonial" />
                <x-breadcrumb.link active="true" pageTitle="Edit" />
            </x-slot>

            <x-slot name="button">
                <x-button.back href="{{ route('adm.marketing.testimonial.index') }}" />
            </x-slot>
        </x-breadcrumb>

        <x-blank-container class="justify-content-center">
            <livewire:marketing::testimonial.edit :testimonial="$testimonial" />
        </x-blank-container>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{asset('assets/app/js/additional.js')}}"></script>
@endpush
