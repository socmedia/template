<div>
    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#confirm-password">
        {{ $text }}
    </button>


    <div class="modal fade" id="confirm-password" tabindex="-1" aria-hidden="true" style="display: none;"
        data-bs-backdrop="static" data-bs-keyboard="false" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form wire:submit.prevent="confirm">
                    @csrf
                    <input type="hidden" wire:model="email">
                    <div class="modal-body text-start">
                        <h5 class="modal-title">Confirm Password</h5>
                        <p class="text-muted">This is a secure area of the application. Please confirm your password
                            before continuing.</p>
                        <div class="my-4">
                            <label for="password" class="form-label">Password</label>
                            <input class="form-control" id="password" class="block mt-1 w-full" type="password"
                                wire:model.defer="password" />
                            @if($error)
                            <small class="text-danger">{{$error}}</small>
                            @endif
                        </div>
                        <div class="text-end">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                            <button class="btn btn-dark">Confirm</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
