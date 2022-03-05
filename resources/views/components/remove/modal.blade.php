<div class="modal delete-modal fade" id="remove-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true" wire:ignore>
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="remove-modalLabel">Hapus data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Data akan dihapus secara permanen. Anda yakin akan menghapus data ini ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light btn-sm" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-outline-danger btn-sm" id="remove-button" data-bs-dismiss="modal"
                    wire:click="destroy">Hapus</button>
            </div>
        </div>
    </div>
</div>
