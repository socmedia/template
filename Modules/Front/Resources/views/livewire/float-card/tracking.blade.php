<div>
    @if (session()->has('failed'))
    <div class="alert alert-warning border-0 bg-warning alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <h6 class="mb-0 text-white">Sayang sekali...</h6>
        <p class="mb-0 text-white"> {{session('failed')}} </p>
    </div>
    @endif

    <h3 class="font-weight-bold mb-0">Tracking SP :</h3>
    <p>Masukkan no surat pengiriman anda.</p>

    <form wire:submit.prevent="checkReceipts" class="form-with-input-group">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        No. Surat Pengiriman
                    </div>
                </div>
                <input type="text" class="form-control" placeholder="Masukkan 9 digit No. Surat Pengiriman"
                    wire:model.defer="receipt">
                <div class="input-group-append">
                    <button class="btn btn-danger" data-backdrop="static">
                        <i class="bx bx-search"></i>
                        Cari Sekarang!

                        <div class="loading" wire:target="checkReceipts" wire:loading>
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            <span class="sr-only">Loading...</span>
                        </div>
                    </button>
                </div>
            </div>
            @error('receipt')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
    </form>

    @if ($isHomePage)
    {{-- Modal --}}
    <div class="modal fade" id="result" tabindex="-1" role="dialog" aria-labelledby="resultTitle" aria-hidden="true"
        data-keyboard="false" data-backdrop="static" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">No. SP:{{ $receipt }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                        wire:click="resetReceiptResult">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pb-5">

                    @if (!$receiptResult->isEmpty())
                    <ul class="list-group timeline sm">
                        @foreach ($receiptResult as $result)
                        <li class="list-group-item">
                            <p class="mb-0 text-muted">
                                <small>{{ $result->waktu }} [{{ $result->proses }}]</small>
                            </p>
                            <p class="mb-0">{{ $result->keterangan }}</p>
                        </li>
                        @endforeach
                    </ul>
                    @endif

                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('show-modal', function() {
            $('#result').modal('show')
        })
    </script>
    @else

    @if (!$receiptResult->isEmpty())
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-8">
            <div class="p-3 bg-light rounded-lg">
                <h6 class="mb-0">No. SP: {{ $receipt }}</h6>
            </div>
            <ul class="list-group d-flex timeline">
                @foreach ($receiptResult as $result)
                <li class="list-group-item pl-3">
                    <p class="mb-0 text-muted">
                        <small>{{ $result->waktu }} [{{ $result->proses }}]</small>
                    </p>
                    <p class="mb-0">{{ $result->keterangan }}</p>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    @endif

    @endif
</div>
