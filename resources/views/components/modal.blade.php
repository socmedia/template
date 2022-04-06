<div class="modal fade" id="{{ isset($modalId) ? $modalId : 'modal' }}" data-bs-backdrop="static"
    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="remove-modalLabel">{{ isset($modalTitle) ? $modalTitle : null }}</h5>
                @if (isset($close))
                {{ $close }}
                @endif
            </div>
            <div class="modal-body">
                @if (isset($modalBody))
                {{ $modalBody }}
                @endif
            </div>
            <div class="modal-footer">
                @if (isset($modalFooter))
                {{ $modalFooter }}
                @else
                <x-modal.dismiss-button> Tutup </x-modal.dismiss-button>
                @endif
            </div>
        </div>
    </div>
</div>
