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
                    <a href="{{ route('adm.access-level.role.create') }}"
                        class="btn btn-dark btn-sm ms-auto px-3">Tambah
                        Role</a>
                    <div class="btn-group" role="group">
                        <button id="dropdown" type="button" class="btn btn-secondary btn-sm dropdown-toggle"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Export
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdown">
                            <li>
                                <a class="dropdown-item" target="_blank"
                                    href="{{ route('adm.access-level.role.download', 'xlsx') }}">Excel</a>
                            </li>
                            <li>
                                <a class="dropdown-item" target="_blank"
                                    href="{{ route('adm.access-level.role.download', 'csv') }}">CSV</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </x-slot>
        </x-breadcrumb>

        <x-blank-container>
            <livewire:accesslevel::role.table />
        </x-blank-container>
    </div>
</div>
@endsection