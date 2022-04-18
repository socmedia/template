@extends("layouts.master")

@section("wrapper")
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <x-breadcrumb pageTitle="Layanan">
            <x-slot name="link">
                <x-breadcrumb.link href="{{ route('adm.service.index')}}" pageTitle="Layanan" />
                <x-breadcrumb.link active="true" pageTitle="Edit" />
            </x-slot>

            <x-slot name="button">
                <div class="btn-group">
                    <x-button.back href="{{route('adm.service.index')}}" />
                </div>
            </x-slot>
        </x-breadcrumb>

        <x-blank-container class="justify-content-center">
            <livewire:service::service.edit :service="$service" />
        </x-blank-container>
    </div>
</div>
@endsection

@push('script')
<script>
    $(document).ready(function () {
        setTimeout(() => {
            $('.tox.tox-silver-sink.tox-tinymce-aux').remove()
        }, 5000);
    })
</script>
@endpush
