@extends("layouts.master")

@section('wrapper')
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <x-breadcrumb pageTitle="SEO">
                <x-slot name="link">
                    <x-breadcrumb.link active="true" pageTitle="SEO" />
                </x-slot>
            </x-breadcrumb>

            <livewire:appsetting::seo.table />
        </div>
    </div>
@endsection
