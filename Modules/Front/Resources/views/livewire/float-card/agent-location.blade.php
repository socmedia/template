<div>
    <h3 class="font-weight-bold mb-0">Daftar Agen</h3>
    <p>Temukan agen-agen kami yang siap melayani kebutuhan Anda.</p>

    <div class="form-group row justify-content-end mb-4">
        <div class="col-8 col-md-4">
            <input type="text" class="form-control" placeholder="Masukkan nama agen..." wire:model.lazy="form.search">
        </div>
    </div>

    <div class="row {{ $isHomePage? 'agent-row' : null }} pb-4 mb-3">
        @forelse ($agents as $agent)
        <div class="col-6 col-md-4 col-lg-3 mb-3 px-2 px-md-3">
            <div class="card card-agent">
                <div class="card-body">
                    <h6>({{ $agent->tlc }}) {{ title($agent->nama_agen) }}</h6>
                    <p class="small mb-0">ALAMAT:</p>
                    <p class="small mb-0">{{ title($agent->alamat_agen) }}</p>
                </div>
                <div class="card-footer">
                    <div class="btn-group btn-block">
                        <a href="tel:{{ $agent->no_telp }}" class="btn btn-light">
                            <i class="bx bxs-phone"></i>
                        </a>
                        <a href="https://maps.google.com/?q={{ $agent->lat_agen }}, {{ $agent->lng_agen }}"
                            target="_blank" class="btn btn-light">
                            <i class="bx bxs-map"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center py-3">
            <p class="m-0">Data tidak ditemukan.</p>
        </div>
        @endforelse

        @if (!$agents->isEmpty())
        <div class="col-12 text-center mt-4">

            @if ($agents->hasMorePages())
            <button class="btn btn-danger" wire:click="loadMore">
                Muat lebih
                <div class="spinner-wrapper" wire:target="loadMore" wire:loading>
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                </div>
            </button>
            @else
            <div class="btn btn-danger disabled">
                Muat lebih
            </div>
            @endif

        </div>
        @endif
    </div>
</div>
