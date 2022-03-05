@extends("layouts.master")

@section("wrapper")
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <x-breadcrumb pageTitle="User">
            <x-slot name="link">
                <x-breadcrumb.link href="{{ route('adm.access-level.user.index')}}" pageTitle="User" />
                <x-breadcrumb.link active="true" pageTitle="Sampah" />
            </x-slot>

            <x-slot name="button">
                <div class="btn-group">
                    <x-button.create text="User" href="{{ route('adm.access-level.user.create') }}" />
                    <x-button.export>
                        <x-dropdown.item target="_blank" href="{{ route('adm.access-level.user.download', 'xlsx') }}">
                            Excel
                        </x-dropdown.item>
                        <x-dropdown.item target="_blank" href="{{ route('adm.access-level.user.download', 'csv') }}">
                            CSV
                        </x-dropdown.item>
                    </x-button.export>
                    <x-button.back href="{{ route('adm.access-level.user.index') }}" />
                </div>
            </x-slot>
        </x-breadcrumb>

        <x-blank-container>
            <livewire:accesslevel::user.table />
        </x-blank-container>
    </div>
</div>
@endsection
