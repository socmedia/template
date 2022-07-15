<div>
    <div class="card radius-10">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <div>
                    <h6 class="mb-0">Pencarian Terkini</h6>
                    <p>Bulan {{ dateTimeTranslated(now(), 'M Y') }}</p>
                </div>
            </div>
            <div class="table-responsive pb-5">
                <table class="table align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Keyword</th>
                            <th>Jml.Pencarian</th>
                            <th>Terakhir Dicari</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($searches as $search)
                            <tr>
                                <td><a>{{ $search->keywords }}</a></td>
                                <td>{{ $search->total }} Pencarian</td>
                                <td>{{ dateTimeTranslated($search->last_search_at, 'D, d M Y') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center py-3" colspan="3">Data belum tersedia</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
