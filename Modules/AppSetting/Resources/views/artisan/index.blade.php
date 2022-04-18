@extends("layouts.master")

@section("wrapper")
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <x-breadcrumb pageTitle="Artisan">
            <x-slot name="link">
                <x-breadcrumb.link active="true" pageTitle="Artisan" />
            </x-slot>
        </x-breadcrumb>

        <h6 class="text-uppercase text-secondary">Daftar Command</h6>
        <hr>

        <div class="card">
            <div class="card-body">

                <div class="form-group">
                    <form action="{{ route('adm.artisan.optimize') }}">
                        <button class="btn btn-dark">
                            Optimize
                        </button>
                    </form>
                </div>

                <div class="form-group">
                    <form action="{{ route('adm.artisan.storageLink') }}">
                        <button class="btn btn-dark">
                            Storage Link
                        </button>
                    </form>
                </div>

                <div class="form-group">
                    <form action="{{ route('adm.artisan.keyGenerate') }}">
                        <button class="btn btn-dark">
                            Key Generate
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
