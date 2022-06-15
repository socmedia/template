@extends('layouts.master')

@section('wrapper')
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <x-breadcrumb pageTitle="Permission">
                <x-slot name="link">
                    <x-breadcrumb.link active="true" pageTitle="Permission" />
                </x-slot>

                <x-slot name="button">
                    <div class="btn-group">
                        @can('permissions.create')
                            <x-button.create text="Permission" href="{{ route('adm.access-level.permission.create') }}" />
                        @endcan
                        @can('permissions.download')
                            <x-button.export>
                                <x-dropdown.item target="_blank"
                                    href="{{ route('adm.access-level.permission.download', 'xlsx') }}">
                                    Excel
                                </x-dropdown.item>
                                <x-dropdown.item target="_blank"
                                    href="{{ route('adm.access-level.permission.download', 'csv') }}">
                                    CSV
                                </x-dropdown.item>
                            </x-button.export>
                        @endcan
                    </div>
                </x-slot>
            </x-breadcrumb>

            <x-blank-container>
                <livewire:accesslevel::permission.table />
            </x-blank-container>
        </div>
    </div>
@endsection
