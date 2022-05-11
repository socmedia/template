<div>
    @if (session()->has('success'))
        <x-alert state="primary" color="white" title="Sukses !" :message="session('success')" />
    @endif

    <h6 class="text-uppercase text-secondary">Tambah Dokumentasi</h6>
    <hr>

    <form wire:submit.prevent="update">

        <div class="row">
            <div class="col-md-3 mb-3 mb-md-0">
                <ul class="list-group sidebar">
                    <li class="list-group-item d-flex">
                        <i class="bx bx-star font-18 align-middle me-2"></i>
                        <div>
                            <p>Utama</p>
                            <small>Masukkan nama kategori yang akan ditambahkan.</small>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body p-4">

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="is_child"
                                wire:model="is_child">
                            <label class="form-check-label" for="is_child">
                                Jadikan sub dokumentasi
                            </label>
                        </div>

                        @if ($is_child)
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="documentation">Dokumentasi</label>
                                    <select name="parent" id="parent" wire:model="parent" class="form-select">
                                        <option value="">-- Pilih Dokumentasi --</option>
                                        @foreach ($sub_documentations as $documentation)
                                            <option value="{{ $documentation->id }}">
                                                {{ $documentation->page_title }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('documentation')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3 mb-3 mb-md-0">
                <ul class="list-group sidebar">
                    <li class="list-group-item d-flex">
                        <i class="bx bx-book font-18 align-middle me-2"></i>
                        <div>
                            <p>Dokumentasi</p>
                            <small>Masukkan judul dan konten dokumentasi yang akan ditambahkan.</small>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body p-4">
                        <div class="form-group row">
                            <div class="col-md-6 mb-3 mb-md-0">
                                <label for="page_title">Judul Dokumentasi</label>
                                <input type="text" class="form-control" name="page_title" id="page_title"
                                    wire:model.lazy="page_title">
                                @error('page_title')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="slug_page_title">Slug</label>
                                <input type="text" class="form-control" name="slug_page_title" id="slug_page_title"
                                    wire:model.defer="slug_page_title">
                                @error('slug_page_title')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row" wire:ignore>
                            <label for="content">Konten</label>
                            <livewire:trix :value="$content"></livewire:trix>

                            @error('content')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="publish" id="publish"
                                wire:model="publish">
                            <label class="form-check-label" for="publish">
                                Publish Postingan
                            </label>

                            @error('publised')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="text-end">
                    <x-button state="dark" loadingState="true" wireTarget="update" text="Simpan" />
                </div>
            </div>
        </div>
    </form>
</div>
