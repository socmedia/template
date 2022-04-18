<div>
    @if (session()->has('success'))
    <x-alert state="primary" color="white" title="Sukses !" :message="session('success')" />
    @endif

    @if (session()->has('failed'))
    <x-alert state="warning" color="white" title="Gagal !" :message="session('failed')" />
    @endif

    <h6 class="text-uppercase text-secondary">Daftar Setting</h6>
    <hr>

    <div class="row">
        <div class="col-12">
            <form wire:submit.prevent="optimize">
                <button class="btn btn-dark">
                    Optimize
                    <div class="spinner-border spinner-border-sm" role="status" wire:loading wire:target="optimize">
                        <span class='visually-hidden'>Loading...</span>
                    </div>
                </button>
            </form>
        </div>
    </div>
</div>
