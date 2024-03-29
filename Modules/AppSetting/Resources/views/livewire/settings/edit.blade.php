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
                                <input type="text" class="form-control" name="key" id="key"
                                       wire:model.defer="key">
                                @error('key')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="alias">Alias</label>
                                <input type="text" class="form-control" name="alias" id="alias"
                                       wire:model.defer="alias">
                                @error('alias')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="value">Value</label>
                            @if ($type == 'string' && $form_type != 'editor')
                                <textarea class="form-control" name="value" autocomplete="value" style="height: 100px; resize:none"
                                          wire:model.defer="value"></textarea>
                            @elseif ($type == 'string' && $form_type == 'editor')
                                <livewire:editor :value="$value" />
                            @elseif ($type == 'image')
                                <livewire:filepond.image :images="$value" :oldImages="$oldValue" />
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
                                <input list="groups" class="form-control" name="group" id="group"
                                       wire:model.defer="group">

                                <datalist id="groups">
                                    @foreach ($groups as $group)
                                        <option value="{{ $group->group }}" />
                                    @endforeach
                                </datalist>

                                @error('group')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3 mb-md-0">
                                <label for="type">Tipe Value</label>
                                <select class="form-select" title="Tipe Value" name="type" id="type"
                                        wire:model="type">
                                    <option value="" disabled selected>Pilih Tipe</option>
                                    @foreach ($types as $type)
                                        <option value="{{ $type }}">{{ Str::title($type) }} </option>
                                    @endforeach
                                </select>

                                @error('type')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3 mb-md-0">
                                <label for="form_type">Jenis Form</label>
                                <select class="form-select" title="Jenis Form" name="form_type" id="form_type"
                                        wire:model="form_type">
                                    <option value="" disabled selected>Pilih Jenis Form</option>
                                    @foreach ($form_types as $form)
                                        <option value="{{ $form }}">{{ Str::title($form) }} </option>
                                    @endforeach
                                </select>

                                @error('form_type')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
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
