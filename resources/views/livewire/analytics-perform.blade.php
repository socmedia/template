<div>
    {{-- @if ($isHomePage)
        <table class="table table-borderless table-light table-striped table-sm">
            <tr>
                <td class="p-1" width="30%">Mingguan</td>
                <td class="p-1" width="5%">:</td>
                <td class="p-1">{{ $visitors['weekly'] }} Visitor</td>
            </tr>
            <tr>
                <td class="p-1">Bulanan</td>
                <td class="p-1">:</td>
                <td class="p-1">{{ $visitors['monthly'] }} Visitor</td>
            </tr>
            <tr>
                <td class="p-1">Tahunan</td>
                <td class="p-1">:</td>
                <td class="p-1">{{ $visitors['yearly'] }} Visitor</td>
            </tr>
        </table>
    @else
        <table class="table">
            <tr>
                <td width="30%">Mingguan</td>
                <td width="5%">:</td>
                <td>{{ $visitors['weekly'] }} Visitor</td>
            </tr>
            <tr>
                <td>Bulanan</td>
                <td>:</td>
                <td>{{ $visitors['monthly'] }} Visitor</td>
            </tr>
            <tr>
                <td>Tahunan</td>
                <td>:</td>
                <td>{{ $visitors['yearly'] }} Visitor</td>
            </tr>
        </table>
    @endif --}}
    <div class="card radius-10 w-100">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <div>
                    <h5 class="mb-0">Browser Statistics</h5>
                    <p class="mb-0">{{ $analyticsConfig['label'] }}</p>
                </div>
                <div class="dropdown ms-auto">
                    <a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown"
                       aria-expanded="true"><i class="bx bx-dots-horizontal-rounded font-22 text-option"></i>
                    </a>
                    <ul class="dropdown-menu" data-popper-placement="bottom-end">
                        @foreach ($filter_labels as $label)
                            <li>
                                <a class="dropdown-item" href="javascript:void(0)"
                                   wire:click="filterAnalyticsData('{{ $label['value'] }}', '{{ $label['date_in_string'] }}')">
                                    {{ $label['label'] }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="chart-container-0">
                <canvas class="mt-4" id="analytics" style="height: 250px;"></canvas>
            </div>
        </div>
    </div>

    <script>
        function addData(chart, label, datas) {
            chart.data.labels.push(label);
            chart.data.datasets.forEach((dataset, index, arr) => {
                dataset.data.push(datas[index]);
            });

            chart.update();
            console.log(chart.data.labels)
        }

        function removeData(chart) {
            chart.data.labels.pop();
            chart.data.datasets.forEach((dataset) => {
                dataset.data.pop();
            });
            chart.update();
        }

        var ctx = document.getElementById('analytics').getContext('2d');

        var gradientStroke1 = ctx.createLinearGradient(0, 0, 0, 300);
        gradientStroke1.addColorStop(0, 'rgba(255, 255, 0, 0.5)');
        gradientStroke1.addColorStop(1, 'rgba(233, 30, 99, 0.0)');

        var gradientStroke2 = ctx.createLinearGradient(0, 0, 0, 300);
        gradientStroke2.addColorStop(0, '#ffff00');
        gradientStroke2.addColorStop(1, '#e91e63');


        var gradientStroke3 = ctx.createLinearGradient(0, 0, 0, 300);
        gradientStroke3.addColorStop(0, 'rgba(0, 114, 255, 0.5)');
        gradientStroke3.addColorStop(1, 'rgba(0, 200, 255, 0.0)');

        var gradientStroke4 = ctx.createLinearGradient(0, 0, 0, 300);
        gradientStroke4.addColorStop(0, '#0072ff');
        gradientStroke4.addColorStop(1, '#00c8ff');

        var datas = {
            labels: @json($analytics_data['metrics']),
            datasets: [{
                label: 'Sessions',
                data: @json($analytics_data['sessions']),
                backgroundColor: gradientStroke1,
                borderColor: gradientStroke2,
                pointRadius: "0",
                pointHoverRadius: "0",
                borderWidth: 3
            }, {
                label: 'Page Views',
                data: @json($analytics_data['page_views']),
                backgroundColor: gradientStroke3,
                borderColor: gradientStroke4,
                pointRadius: "0",
                pointHoverRadius: "0",
                borderWidth: 3
            }]
        };

        var options = {
            maintainAspectRatio: false,
            legend: {
                display: true,
                labels: {
                    fontColor: '#585757',
                    boxWidth: 40
                }
            },
            scales: {
                xAxes: [{
                    ticks: {
                        beginAtZero: true,
                        fontColor: '#585757'
                    },
                    gridLines: {
                        display: true,
                        color: "rgba(0, 0, 0, 0.07)"
                    },
                }],
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        fontColor: '#585757'
                    },
                    gridLines: {
                        display: true,
                        color: "rgba(0, 0, 0, 0.07)"
                    },
                }]
            }
        };

        document.addEventListener('DOMContentLoaded', function() {
            var analytics = new Chart(ctx, {
                type: 'line',
                data: datas,
                options: options
            })

            document.addEventListener('update-chart', function(e) {
                removeData(analytics)
                addData(
                    analytics,
                    @json($analytics_data['metrics']), [
                        @json($analytics_data['sessions']),
                        @json($analytics_data['page_views'])
                    ])
            })
        })
    </script>
</div>
