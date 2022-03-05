@extends("layouts.master")

@section("wrapper")
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <x-breadcrumb pageTitle="Role">
            <x-slot name="link">
                <x-breadcrumb.link active="true" pageTitle="Role" />
            </x-slot>

            <x-slot name="button">
                <div class="btn-group">
                    <x-button.create text="Role" href="{{ route('adm.access-level.role.create') }}" />
                    <x-button.export>
                        <x-dropdown.item target="_blank" href="{{ route('adm.access-level.role.download', 'xlsx') }}">
                            Excel
                        </x-dropdown.item>
                        <x-dropdown.item target="_blank" href="{{ route('adm.access-level.role.download', 'csv') }}">
                            CSV
                        </x-dropdown.item>
                    </x-button.export>
                </div>
            </x-slot>
        </x-breadcrumb>

        <x-blank-container>
            <livewire:accesslevel::role.table />
        </x-blank-container>
    </div>
</div>
@endsection
