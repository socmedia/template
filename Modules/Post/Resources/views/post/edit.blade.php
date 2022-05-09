@extends("layouts.master")

@push('style')
    <link rel="stylesheet" href="{{ asset('assets/app/css/additional.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.css"
          integrity="sha512-5m1IeUDKtuFGvfgz32VVD0Jd/ySGX7xdLxhqemTmThxHdgqlgPdupWoSN8ThtUSLpAGBvA8DY2oO7jJCrGdxoA=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush

@section('wrapper')
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <x-breadcrumb pageTitle="Post">
                <x-slot name="link">
                    @if (request('type'))
                        <x-breadcrumb.link pageTitle="Post"
                                           href="{{ route('adm.post.index', [
                                               'type' => request('type'),
                                           ]) }}" />
                    @else
                        <x-breadcrumb.link href="{{ route('adm.post.index') }}" pageTitle="Post" />
                    @endif
                    <x-breadcrumb.link active="true" pageTitle="Edit" />
                </x-slot>

                <x-slot name="button">
                    @if (request('type'))
                        <x-button.back
                                       href="{{ route('adm.post.index', [
                                           'type' => request('type'),
                                       ]) }}" />
                    @else
                        <x-button.back href="{{ route('adm.post.index') }}" />
                    @endif
                </x-slot>
            </x-breadcrumb>

            <x-blank-container class="justify-content-center">
                <livewire:post::post.edit :post="$post" />
            </x-blank-container>
        </div>
    </div>
@endsection

@push('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js"
            integrity="sha512-/1nVu72YEESEbcmhE/EvjH/RxTg62EKvYWLG3NdeZibTCuEtW5M4z3aypcvsoZw03FAopi94y04GhuqRU9p+CQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('assets/app/js/additional.js') }}"></script>
@endpush
