<div>
    @if (session()->has('success'))
    <x-alert state="primary" color="white" title="Sukses !" :message="session('success')" />
    @endif

    @if (session()->has('failed'))
    <x-alert state="warning" color="white" title="Gagal !" :message="session('failed')" />
    @endif

    <form wire:submit.prevent="store">

        <div class="row">
            <div class="col-md-3 mb-3 mb-md-0">
                <ul class="list-group sidebar">
                    <li class="list-group-item d-flex">
                        <i class="bx bx-image font-18 align-middle me-2"></i>
                        <div>
                            <p>Informasi Banner</p>
                            <small>Pilih banner yang akan diunggah, masukkan nama banner dan alt banner untuk
                                visibilitas pada SEO.</small>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-md-7">
                <div class="card">
                    <div class="card-body p-4">
                        <div class="bg-image rounded {{ $background_position }} mb-3"
                            style="background-image: url({{!$thumbnail ? cache('default_thumbnail_16_9') : $thumbnail->temporaryUrl()}}); padding-top: 33.3%">
                        </div>

                        <div class="form-group row">
                            <div class="col-md-8 mb-3 mb-md-0">
                                <label for="thumbnail">{{ !$thumbnail ? 'Pilih thumbnail' : ''}}</label>
                                <input class="form-control form-control-sm" id="thumbnail" type="file" name="thumbnail"
                                    accept="image/*" autocomplete="thumbnail" autofocus name="thumbnail"
                                    wire:model="thumbnail">

                                @error('thumbnail')
                                <small class="text-danger">{{$message}}</small>
                                @else
                                @if (!$thumbnail)
                                <small class="text-center text-secondary">
                                    <em>Format: .png, .jpg, .jpeg. Ratio: 1:3</em>
                                </small>
                                @endif
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="background_position">Posisi Background</label>

                                <select name="background_position" id="background_position" class="form-select"
                                    wire:model="background_position">
                                    <option value="">Pilih Posisi Background</option>
                                    @foreach ($backgroundPositions as $position)
                                    <option value="{{ $position['value'] }}">{{ $position['label'] }}</option>
                                    @endforeach
                                </select>

                                @error('background_position')
                                <small class="text-danger">{{$message}}</small>
                                @enderror

                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 mb-3 mb-md-0">
                                <label for="name">Nama</label>
                                <input id="name" type="text" class="form-control" name="name" wire:model.lazy="name">

                                @error('name')
                                <small class="text-danger">
                                    {{$message}}
                                </small>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3 mb-md-0">
                                <label for="alt">Teks Alt.</label>
                                <input id="alt" type="text" class="form-control text" name="alt" wire:model="alt">

                                @error('alt')
                                <small class="text-danger">{{$message}}</small>
                                @else
                                <small class="text-muted">
                                    <em>*Nama yang akan ditampilkan ketika gambar gagal dimuat</em>
                                </small>
                                @enderror
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>

        @if ($with_caption)
        <div class="row">
            <div class="col-md-3 mb-3 mb-md-0">
                <ul class="list-group sidebar">
                    <li class="list-group-item d-flex">
                        <i class="bx bx-captions font-18 align-middle me-2"></i>
                        <div>
                            <p>Caption</p>
                            <small>Masukkan teks singkat yang digunakan untuk melengkapi suatu gambar.</small>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-md-7">
                <div class="card">
                    <div class="card-body p-4">

                        <div class="form-group">
                            <label for="caption_title">Judul Caption</label>
                            <input id="caption_title" type="text" class="form-control" name="caption_title"
                                wire:model.defer="caption_title">

                            @error('caption_title')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="caption_text">Deskripsi Caption</label>
                            <textarea id="caption_text" type="text" class="form-control" name="caption_text"
                                wire:model.defer="caption_text"></textarea>

                            @error('caption_text')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>

                    </div>
                </div>
            </div>
        </div>
        @endif

        @if ($with_button)
        <div class="row">
            <div class="col-md-3 mb-3 mb-md-0">
                <ul class="list-group sidebar">
                    <li class="list-group-item d-flex">
                        <i class="bx bx-joystick-button font-18 align-middle me-2"></i>
                        <div>
                            <p>Button</p>
                            <small>Tambahkan button untuk mereferensikan ke halaman yang akan dituju</small>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-md-7">
                <div class="card">
                    <div class="card-body p-4">

                        <div class="form-group">
                            <label for="button_text">Teks Button</label>
                            <input id="button_text" type="text" class="form-control" name="button_text"
                                wire:model.defer="button_text">

                            @error('button_text')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="button_link">Link Button</label>
                            <input id="button_link" type="text" class="form-control" name="button_link"
                                wire:model.defer="button_link">

                            @error('button_link')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>

                    </div>
                </div>
            </div>
        </div>
        @endif

        <div class="row">
            <div class="col-md-3 mb-3 mb-md-0">
                <ul class="list-group sidebar">
                    <li class="list-group-item d-flex">
                        <i class="bx bx-cog font-18 align-middle me-2"></i>
                        <div>
                            <p>Pengaturan Banner</p>
                            <small>
                                Anda bisa mengatur url banner, posisi banner, banner ditampilkan atau tidak, dll.
                            </small>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-md-7">
                <div class="card">
                    <div class="card-body p-4">

                        <div class="form-group">
                            <label for="reference_url">Link Banner</label>
                            <input id="reference_url" type="url" class="form-control text" name="reference_url"
                                wire:model.defer="reference_url">

                            @error('reference_url')
                            <small class="text-danger">{{$message}}</small>
                            @else
                            <small class="text-muted">
                                <em>*Ketika banner di klik, akan diarahkan ke link yang tertulis</em>
                            </small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="is_active"
                                    wire:model.defer="is_active">
                                <label class="form-check-label" for="is_active">
                                    Aktifkan di homepage?
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="with_caption"
                                    wire:model="with_caption">
                                <label class="form-check-label" for="with_caption">
                                    Tambahkan caption?
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="with_button"
                                    wire:model="with_button">
                                <label class="form-check-label" for="with_button">
                                    Tambahkan button?
                                </label>
                            </div>

                            @error('reference_url')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>

                        <div class="form-group text-end">
                            <x-button state="dark" loadingState="true" wireTarget="store" text="Simpan" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script src="{{ asset('assets/app/js/additional.js') }}"></script>
</div>
