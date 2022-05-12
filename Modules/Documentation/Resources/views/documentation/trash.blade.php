@extends("layouts.master")

@section('wrapper')
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <x-breadcrumb pageTitle="Dokumentasi">
                <x-slot name="link">
                    <x-breadcrumb.link href="{{ route('adm.docs.index') }}" pageTitle="Dokumentasi" />
                    <x-breadcrumb.link active="true" pageTitle="Sampah" />
                </x-slot>

                <x-slot name="button">
                    <div class="btn-group">
                        <x-button.create text="Dokumentasi" href="{{ route('adm.docs.create') }}" />
                        <x-button.back href="{{ route('adm.docs.index') }}" />
                    </div>
                </x-slot>
            </x-breadcrumb>

            <x-blank-container>
                <livewire:documentation::table />
            </x-blank-container>
        </div>
    </div>
@endsection
