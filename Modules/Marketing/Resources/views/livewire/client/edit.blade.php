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
                        <i class="bx bx-cog font-18 align-middle me-2"></i>
                        <div>
                            <p>Pengaturan client</p>
                            <small>Pengaturan kategori dan visibilitas untuk client</small>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-md-7">
                <div class="card">
                    <div class="card-body p-4">
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="is_active"
                                    wire:model.defer="is_active">
                                <label class="form-check-label" for="is_active">
                                    Aktifkan di homepage?
                                </label>
                            </div>

                            @error('is_active')
                            <small class="text-danger">{{$message}}</small>
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
                        <i class="bx bx-info-circle font-18 align-middle me-2"></i>
                        <div>
                            <p>Informasi client</p>
                            <small>Berikan pertanyaan dan jawaban yang sering ditanyakan.</small>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-md-7">
                <div class="card">
                    <div class="card-body p-4">

                        <div class="form-group row">
                            <div class="col-4">
                                <label>Foto</label>
                                <livewire:image-upload :images="$image" :oldImages="$oldImage" height="80px" />

                                @error('image')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input id="name" type="text" class="form-control" name="name" wire:model.defer="name">

                            @error('name')
                            <small class="text-danger">
                                {{$message}}
                            </small>
                            @enderror
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
