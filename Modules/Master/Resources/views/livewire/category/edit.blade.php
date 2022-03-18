<div>
    @if (session()->has('success'))
    <x-alert state="primary" color="white" title="Sukses !" :message="session('success')" />
    @endif

    <x-form-card title="Edit Kategori">
        <form wire:submit.prevent="update">
            <div class="form-group row">
                <div class="col-md-6 mb-3 mb-md-0">
                    <label for="name">Nama Kategori</label>
                    <input type="text" class="form-control" name="name" id="name" wire:model.lazy="name">
                    @error('name')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="slug_name">Slug</label>
                    <input type="text" class="form-control" name="slug_name" id="slug_name"
                        wire:model.defer="slug_name">
                    @error('slug_name')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-6 mb-3 mb-md-0">
                    <label for="table_reference">Tabel Referensi</label>
                    <input type="text" class="form-control" name="table_reference" id="table_reference"
                        wire:model.defer="table_reference">
                    @error('table_reference')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="position">Posisi</label>
                    <input type="text" class="form-control" name="position" id="position" wire:model.defer="position">
                    @error('position')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>

            <div class="text-end">
                <x-button state="dark" loadingState="true" wireTarget="update" text="Simpan" />
            </div>
        </form>
    </x-form-card>
</div>
