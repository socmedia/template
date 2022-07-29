<div>
    <div class="card radius-10">
        <div class="card-body">

            @if (session()->has('analytics-failed'))
                <x-alert state="warning" color="white" title="Upsss..." :message="session('analytics-failed')" />
            @endif

            <div class="d-flex align-items-center mb-2">
                <div>
                    <h5>
                        Analytics <small class="text-muted" style="font-size: 10px">(Most Visited Pages)</small>
                    </h5>
                    <p class="small text-muted mb-0" id="subheading">
                        {{ $analytics['heading'] }}
                    </p>
                </div>
                <div class="dropdown ms-auto">
                    <a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown"
                       aria-expanded="true"><i class="bx bx-dots-horizontal-rounded font-22 text-option"></i>
                    </a>
                    <ul class="dropdown-menu" data-popper-placement="bottom-end">
                        @foreach ($filter_labels as $label)
                            <li>
                                <a class="dropdown-item" href="javascript:void(0)"
                                   wire:click="filterAnalytics('{{ $label['value'] }}', '{{ $label['date_in_string'] }}')">
                                    {{ $label['label'] }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="table-responsive pb-5">
                <table class="table align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Halaman</th>
                            <th>Views</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($visited_pages as $page)
                            <tr>
                                <td>
                                    <a href="{{ url($page['url']) }}" target="_blank">{{ $page['pageTitle'] }}</a>
                                </td>
                                <td>{{ $page['pageViews'] }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center py-3" colspan="2">Data belum tersedia</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
