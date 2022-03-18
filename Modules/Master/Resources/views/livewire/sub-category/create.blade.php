<div>
    @if (session()->has('success'))
    <x-alert state="primary" color="white" title="Sukses !" :message="session('success')" />
    @endif

    <x-form-card title="Tambah Sub Kategori">
        <form wire:submit.prevent="store">
            <div class="form-group row">
                <div class="col-md-6">
                    <label for="category">Kategori</label>
                    <select name="category" id="category" wire:model.defer="category" class="form-select">
                        <option value="">-- Pilih Kategori --</option>
                        @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                    @error('category')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-6 mb-3 mb-md-0">
                    <label for="name">Nama Sub Kategori</label>
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
                    <label for="parent">Induk</label>
                    <select name="parent" id="parent" wire:model.defer="parent" class="form-select">
                        <option value="">-- Pilih Induk --</option>
                        @foreach ($sub_categories as $sub_category)
                        <option value="{{$sub_category->id}}">{{$sub_category->name}}</option>
                        @endforeach
                    </select>
                    @error('parent')
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
                <x-button state="dark" loadingState="true" wireTarget="store" text="Simpan" />
            </div>
        </form>
    </x-form-card>
</div>
