@extends('layouts.master')

@push('style')
    <link href="{{ asset('assets/app/plugins/vectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet" />
@endpush

@section('wrapper')
    <div class="page-wrapper">
        <div class="page-content">

            <div class="row">
                <div class="col-12 mb-3">
                    <livewire:count />
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-lg-8 col-xl-8">
                    {{-- <livewire:widget.table.news class="mb-5" /> --}}

                    <livewire:search />
                </div>

                <div class="col-12 col-lg-4 col-xl-4">

                    <div class="card radius-10 mb-3">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <h6 class="">Total Visitor</h6>
                            </div>
                            <livewire:analytics-perform />
                        </div>
                    </div>

                    {{-- <div class="card radius-10">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <h6 class="mb-0">Status Pertanyaan</h6>
                            </div>
                            <livewire:chart.pie.leads />
                        </div>
                    </div> --}}

                </div>
            </div>

        </div>
    </div>
@endsection


@push('script')
    <script src="{{ asset('assets/app/plugins/vectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
    <script src="{{ asset('assets/app/plugins/vectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ asset('assets/app/plugins/chartjs/js/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/app/plugins/chartjs/js/Chart.extension.js') }}"></script>
    <script src="{{ asset('assets/app/plugins/sparkline-charts/jquery.sparkline.min.js') }}"></script>
    <!--Morris JavaScript -->
    <script src="{{ asset('assets/app/plugins/raphael/raphael-min.js') }}"></script>
    <script src="{{ asset('assets/app/plugins/morris/js/morris.js') }}"></script>
    <script src="{{ asset('assets/app/js/index2.js') }}"></script>
@endpush
