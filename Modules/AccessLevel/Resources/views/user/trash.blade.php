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
                    <a href="{{ route('adm.access-level.user.create') }}"
                        class="btn btn-dark btn-sm ms-auto px-3">Tambah User</a>

                    <a href="{{ route('adm.access-level.user.index') }}"
                        class="btn btn-dark btn-sm ms-auto px-3">Kembali</a>

                    <div class="btn-group" role="group">
                        <button id="dropdown" type="button" class="btn btn-secondary btn-sm dropdown-toggle"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Export
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdown">
                            <li>
                                <a class="dropdown-item" target="_blank"
                                    href="{{ route('adm.access-level.user.download', 'xlsx') }}">Excel</a>
                            </li>
                            <li>
                                <a class="dropdown-item" target="_blank"
                                    href="{{ route('adm.access-level.user.download', 'csv') }}">CSV</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </x-slot>
        </x-breadcrumb>

        <x-blank-container>
            <livewire:accesslevel::user.table />
        </x-blank-container>
    </div>
</div>
@endsection
