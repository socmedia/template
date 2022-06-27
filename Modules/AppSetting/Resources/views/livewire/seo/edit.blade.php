<div>
    @if (session()->has('success'))
        <x-alert state="primary" color="white" title="Sukses !" :message="session('success')" />
    @endif

    @if (session()->has('failed'))
        <x-alert state="warning" color="white" title="Gagal !" :message="session('failed')" />
    @endif

    <form wire:submit.prevent="update">

        <div class="row">
            <div class="col-md-3 mb-3 mb-md-0">
                <ul class="list-group sidebar">
                    <li class="list-group-item d-flex">
                        <i class="bx bx-paragraph font-18 align-middle me-2"></i>
                        <div>
                            <p>Konten</p>
                            <small>Tuliskan deskripsi singkat beserta penjelasannya pada form disamping.</small>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body p-4">

                        <div class="form-group row">
                            <div class="col-md-6 mb-3 mb-md-0">
                                <label for="key">Key</label>
                                <div class="form-control bg-light">{{ $key }}</div>
                            </div>
                            <div class="col-md-6 mb-3 mb-md-0">
                                <label for="key">Alias</label>
                                <div class="form-control bg-light">{{ $alias }}</div>
                            </div>
                        </div>

                        <div class="form-group">
                            @if ($type == 'string')
                                <label for="value">Value</label>
                                <textarea class="form-control" name="value" autocomplete="value" style="height: 100px; resize:none"
                                          wire:model.defer="value"></textarea>
                            @elseif ($type == 'image')
                                <livewire:image-upload :images="$value" :oldImages="$oldValue" height="200px" />
                            @endif
                            @error('value')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
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
                            <p>Utama</p>
                            <small>Berikan key dan value untuk atribut yang akan diatur dalam aplikasi ini.</small>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body p-4">

                        <div class="form-group row">
                            <div class="col-md-4 mb-3 mb-md-0">
                                <label for="group">Group</label>
                                <div class="form-control bg-light text-uppercase">{{ $group }}</div>
                            </div>
                            <div class="col-md-4 mb-3 mb-md-0">
                                <label for="type">Tipe Value</label>
                                <div class="form-control bg-light">{{ Str::title($type) }}</div>
                            </div>
                            <div class="col-md-4 mb-3 mb-md-0">
                                <label for="form_type">Jenis Form</label>
                                <div class="form-control bg-light">{{ Str::title($form_type) }}</div>
                            </div>
                        </div>


                        <div class="text-end">
                            <x-button state="dark" loadingState="true" wireTarget="update" text="Simpan" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
