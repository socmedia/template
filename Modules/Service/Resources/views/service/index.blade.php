@extends("layouts.master")

@section("wrapper")
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <x-breadcrumb pageTitle="Layanan">
            <x-slot name="link">
                <x-breadcrumb.link active="true" pageTitle="Layanan" />
            </x-slot>

            <x-slot name="button">
                <div class="btn-group">
                    <x-button.create text="Layanan" href="{{ route('adm.service.create') }}" />
                </div>
            </x-slot>
        </x-breadcrumb>

        <x-blank-container>
            <livewire:service::service.table />
        </x-blank-container>
    </div>
</div>
@endsection

@push('script')
<script src="https://cdn.jsdelivr.net/gh/livewire/sortable@v0.x.x/dist/livewire-sortable.js"></script>
@endpush
