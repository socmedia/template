@extends('layouts.master')

@push('style')
    <link href="{{ asset('assets/app/plugins/vectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet" />
@endpush

@section('wrapper')
    <div class="page-wrapper">
        <div class="page-content">
            <div class="row">
                <div class="col-12 col-md-8 mb-3">
                    <x-analytics.session-page-views-chart />
                    <livewire:analytics.most-visited />
                </div>

                <div class="col-12 col-lg-4 col-xl-4">
                    <livewire:count :mode="cache('ga_view_id') ? 'horizontal' : 'vertical'" />
                </div>

                <div class="col-12 col-lg-8 col-xl-8">
                    {{-- <livewire:widget.table.news class="mb-5" /> --}}

                    <livewire:search />
                </div>

                <div class="col-12 col-lg-4 col-xl-4">


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
            {{-- <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3">
                <div class="col d-flex">
                    <div class="card radius-10 w-100">
                        <div class="card-body">
                            <div id="chart8"></div>
                        </div>
                    </div>
                </div>
                <div class="col d-flex">
                    <div class="card radius-10 w-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <h5 class="mb-0">Browser Statistics</h5>
                                </div>
                                <div class="font-22 ms-auto"><i class="bx bx-dots-horizontal-rounded"></i>
                                </div>
                            </div>
                            <div class="mt-4" id="chart9" style="height: 250px;"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 d-flex">
                    <div class="card radius-10 w-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <h5 class="mb-0 font-weight-bold">Social Traffic</h5>
                                <p class="mb-0 ms-auto"><i class="bx bx-dots-horizontal-rounded float-right font-22"></i>
                                </p>
                            </div>
                            <div class="d-flex mt-2 mb-4">
                                <h2 class="mb-0 font-weight-bold">89,421</h2>
                                <p class="mb-0 ms-1 font-14 align-self-end">Total Visits</p>
                            </div>
                            <div class="progress radius-10" style="height: 10px">
                                <div class="progress-bar bg-white" role="progressbar" style="width: 35%" aria-valuenow="15"
                                     aria-valuemin="0" aria-valuemax="100"></div>
                                <div class="progress-bar bg-white" role="progressbar" style="width: 20%" aria-valuenow="30"
                                     aria-valuemin="0" aria-valuemax="100"></div>
                                <div class="progress-bar bg-white" role="progressbar" style="width: 15%" aria-valuenow="20"
                                     aria-valuemin="0" aria-valuemax="100"></div>
                                <div class="progress-bar bg-white" role="progressbar" style="width: 25%" aria-valuenow="20"
                                     aria-valuemin="0" aria-valuemax="100"></div>
                                <div class="progress-bar bg-white" role="progressbar" style="width: 10%" aria-valuenow="20"
                                     aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="table-responsive mt-4">
                                <table class="table mb-0">
                                    <tbody>
                                        <tr>
                                            <td class="px-0">
                                                <div class="d-flex align-items-center">
                                                    <div><i class="bx bxs-checkbox me-2 font-22 text-white"></i>
                                                    </div>
                                                    <div>Facebook</div>
                                                </div>
                                            </td>
                                            <td>46 Visits</td>
                                            <td class="px-0 text-right">33%</td>
                                        </tr>
                                        <tr>
                                            <td class="px-0">
                                                <div class="d-flex align-items-center">
                                                    <div><i class="bx bxs-checkbox me-2 font-22 text-white"></i>
                                                    </div>
                                                    <div>YouTube</div>
                                                </div>
                                            </td>
                                            <td>12 Visits</td>
                                            <td class="px-0 text-right">17%</td>
                                        </tr>
                                        <tr>
                                            <td class="px-0">
                                                <div class="d-flex align-items-center">
                                                    <div><i class="bx bxs-checkbox me-2 font-22 text-white"></i>
                                                    </div>
                                                    <div>Linkedin</div>
                                                </div>
                                            </td>
                                            <td>29 Visits</td>
                                            <td class="px-0 text-right">21%</td>
                                        </tr>
                                        <tr>
                                            <td class="px-0">
                                                <div class="d-flex align-items-center">
                                                    <div><i class="bx bxs-checkbox me-2 font-22 text-white"></i>
                                                    </div>
                                                    <div>Twitter</div>
                                                </div>
                                            </td>
                                            <td>34 Visits</td>
                                            <td class="px-0 text-right">23%</td>
                                        </tr>
                                        <tr>
                                            <td class="px-0">
                                                <div class="d-flex align-items-center">
                                                    <div><i class="bx bxs-checkbox me-2 font-22 text-white"></i>
                                                    </div>
                                                    <div>Dribbble</div>
                                                </div>
                                            </td>
                                            <td>28 Visits</td>
                                            <td class="px-0 text-right">19%</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
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
