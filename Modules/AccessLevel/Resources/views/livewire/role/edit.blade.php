<div>
    @if (session()->has('success'))
    <x-alert state="primary" color="white" title="Sukses !" :message="session('success')" />
    @endif

    <x-form-card title="Tambah Role">
        <form wire:submit.prevent="update">
            <div class="form-group row">
                <div class="col-md-8 mb-3 mb-md-0">
                    <label for="name">Nama Role</label>
                    <input type="text" class="form-control" name="name" id="name" wire:model.defer="name">
                    @error('name')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="">Guard</label>
                    <div class="form-control bg-light">{{$guard}}</div>
                </div>
            </div>

            <div class="text-end">
                <x-button state="dark" loadingState="true" wireTarget="store" text="Save changes" />
            </div>
        </form>
    </x-form-card>
</div>
