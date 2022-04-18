@extends("layouts.master")

@section("wrapper")
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <x-breadcrumb pageTitle="Leads">
            <x-slot name="link">
                <x-breadcrumb.link active="true" pageTitle="Leads" />
            </x-slot>
        </x-breadcrumb>

        <x-blank-container>
            <livewire:lead::lead.table />
        </x-blank-container>
    </div>
</div>
@endsection
