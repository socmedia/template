<div>
    @if (session()->has('success'))
        <x-alert state="primary" color="white" title="Sukses !" :message="session('success')" />
    @endif

    @if (session()->has('failed'))
        <x-alert state="warning" color="white" title="Upsss..." :message="session('failed')" />
    @endif

    <h6 class="text-uppercase text-secondary">Tambah Jenis</h6>
    <hr>

    <form wire:submit.prevent="update">

        <div class="row">
            <div class="col-md-3 mb-3 mb-md-0">
                <ul class="list-group sidebar">
                    <li class="list-group-item d-flex">
                        <i class="bx bx-category font-18 align-middle me-2"></i>
                        <div>
                            <p>Jenis Postingan</p>
                            <small>Masukkan nama jenis yang akan ditambahkan.</small>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body p-4">
                        <div class="form-group row">
                            <div class="col-md-6 mb-3 mb-md-0">
                                <label for="name">Nama Jenis</label>
                                <input type="text" class="form-control" name="name" id="name" wire:model.lazy="name">
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="slug_name">Slug</label>
                                <input type="text" class="form-control" name="slug_name" id="slug_name"
                                       wire:model.defer="slug_name">
                                @error('slug_name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3 mb-3 mb-md-0">
                <ul class="list-group sidebar">
                    <li class="list-group-item d-flex">
                        <i class="bx bx-cog font-18 align-middle me-2"></i>
                        <div>
                            <p>Pengaturan Form</p>
                            <small>Pilih data untuk mengatur kolom yang diperbolehkan pada postingan.</small>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body p-4">
                        <div class="form-group row">
                            <div class="col-md-6 mb-3 mb-md-0">
                                <label for="name">Pengaturan form post</label>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="all_column"
                                           wire:model="all_column">
                                    <label class="form-check-label" for="all_column">
                                        Semua kolom
                                    </label>
                                </div>

                                @foreach ($columns as $i => $column)
                                    <div class="form-check">

                                        @if ($column == 'required')
                                            <input class="form-check-input" type="checkbox" checked disabled>
                                        @else
                                            <input class="form-check-input" type="checkbox" value="{{ $i }}"
                                                   id="column-{{ $loop->iteration }}"
                                                   wire:model="allowed_column.{{ $loop->iteration - 1 }}">
                                        @endif

                                        <label class="form-check-label" for="column-{{ $loop->iteration }}">
                                            {{ $i }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
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
