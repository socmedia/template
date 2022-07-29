<div class="card radius-10 w-100">
    <div class="card-body" data-alert>
        <div class="d-flex align-items-center">
            <div>
                <h5>
                    Analytics <small class="text-muted" style="font-size: 10px">(Sessions and Page Views)</small>
                </h5>
                <p class="small text-muted mb-0" id="subheading">
                    {{ dateTimeTranslated(now()->startOfyear()->toDateString(),'M d, Y') .' - ' .dateTimeTranslated(now()->endOfYear()->toDateString(),'M d, Y') }}
                </p>
            </div>
            <div class="dropdown ms-auto">
                <a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown"
                   aria-expanded="true"><i class="bx bx-dots-horizontal-rounded font-22 text-option"></i>
                </a>
                <ul class="dropdown-menu" data-popper-placement="bottom-end">
                    @foreach ($filter_labels as $label)
                        <li>
                            <a class="dropdown-item" href="javascript:void(0)" data-action="fetchAnalytics"
                               data-label="{{ $label['date_in_string'] }}" data-value="{{ $label['value'] }}">
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

@push('script')
    <script>
        $(function() {
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
                labels: [],
                datasets: [{
                    label: 'Sessions',
                    data: [],
                    backgroundColor: gradientStroke1,
                    borderColor: gradientStroke2,
                    pointRadius: "0",
                    pointHoverRadius: "0",
                    borderWidth: 3
                }, {
                    label: 'Page Views',
                    data: [],
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

            var analytics = new Chart(ctx, {
                type: 'line',
                data: datas,
                options: options
            })

            function updateChart(chart, label, datas) {
                chart.data.labels = label;
                chart.data.datasets.forEach((dataset, index, arr) => {
                    dataset.data = datas[index]
                });

                chart.update();
            }

            function getAnalytics(value) {
                $.ajax({
                    type: "POST",
                    url: '{{ route('api.analyticssession-page-views') }}',
                    dataType: 'json',
                    data: {
                        label: value
                    },
                    success: function(res) {
                        const data = [res.data.sessions, res.data.page_views]
                        updateChart(analytics, res.data.metrics, data)
                    },
                    error: function(err) {
                        // console.log(err)
                        const res = err.responseJSON;
                        $('[data-alert]').prepend(alert(res.message))
                    },
                })
            }

            function alert(message) {
                return `
                <div class="alert alert-warning border-0 bg-warning alert-dismissible fade show py-2">
                    <div class="d-flex align-items-center">
                        <div class="ms-3">
                            <h6 class="mb-0 text-white">Upsss...</h6>
                            <div class="text-white">${message}</div>
                        </div>
                    </div>

                    <button type="button" class="btn-close" style="height: .5rem; width: .5rem; background-size: .5rem; box-shadow: none" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                `
            }

            $('[data-action="fetchAnalytics"]').click(function() {
                const label = $(this).data('label'),
                    value = $(this).data('value');

                $('#subheading').text(label)
                getAnalytics(value);
            })

            $(document).ready(function() {
                getAnalytics('this-year');
            })
        })
    </script>
@endpush
