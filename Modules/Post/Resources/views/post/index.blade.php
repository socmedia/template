@extends("layouts.master")

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/app/css/additional.css') }}">
@endpush

@section('wrapper')
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <x-breadcrumb pageTitle="Post">
                <x-slot name="link">
                    <x-breadcrumb.link active="true" pageTitle="Postingan" />
                </x-slot>

                <x-slot name="button">
                    <div class="btn-group">
                        @if (request('type'))
                            <x-button.create text="Postingan"
                                             href="{{ route('adm.post.create', [
                                                 'type' => request('type'),
                                             ]) }}" />
                        @else
                            <x-button.create text="Postingan" href="{{ route('adm.post.create') }}" />
                        @endif
                    </div>
                </x-slot>
            </x-breadcrumb>

            <x-blank-container>
                <livewire:post::post.table />
            </x-blank-container>
        </div>
    </div>
@endsection
