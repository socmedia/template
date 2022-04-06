<div>
    @if (session()->has('success'))
    <x-alert state="primary" color="white" title="Sukses !" :message="session('success')" />
    @endif
    <h6 class="text-uppercase text-secondary">Tambah Sub Kategori</h6>
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
                            <input class="form-check-input" type="checkbox" value="" id="is_parent"
                                wire:model="is_parent">
                            <label class="form-check-label" for="is_parent">
                                Jadikan parent sub kategori
                            </label>
                        </div>

                        @if ($is_parent)
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="category">Kategori</label>
                                <select name="category" id="category" wire:model.defer="category"
                                    class="form-select text-capitalize">
                                    <option value="">-- Pilih Kategori --</option>
                                    @foreach ($groupedCategories as $i => $categories)
                                    <optgroup class="text-capitalize" label="{{ $i }}">
                                        @foreach ($categories as $category)
                                        <option class="text-capitalize" value="{{$category['id']}}">
                                            {{$category['name']}}
                                        </option>
                                        @endforeach
                                    </optgroup>
                                    @endforeach
                                </select>
                                @error('category')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        @else
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="category">Sub Kategori</label>
                                <select name="parent" id="parent" wire:model="parent" class="form-select">
                                    <option value="">-- Pilih Sub Kategori --</option>
                                    @foreach ($sub_categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                                @error('category')
                                <small class="text-danger">{{$message}}</small>
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
                        <i class="bx bx-category font-18 align-middle me-2"></i>
                        <div>
                            <p>Sub Kategori</p>
                            <small>Masukkan nama sub kategori yang akan ditambahkan.</small>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body p-4">
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
                            <p>Pengaturan Kategori</p>
                            <small>Pengaturan lanjutan untuk tabel. Anda bisa memilih untuk menggunakan icon atau gambar
                                pada kategori tersebut.</small>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body p-4">
                        <div class="form-group row">
                            <div class="col-md-6 mb-3 mb-md-0">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="with" id="with" wire:model="with"
                                        value="">
                                    <label class="form-check-label" for="with2">
                                        Tanpa icon atau gambar
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="with_icon" id="with_icon"
                                        wire:model="with" value="icon">
                                    <label class="form-check-label" for="with_icon">
                                        Dengan icon
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="with_image" id="with_image"
                                        wire:model="with" value="image">
                                    <label class="form-check-label" for="with_image">
                                        Dengan gambar
                                    </label>
                                </div>
                                @error('table_reference')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if ($with == 'icon')
        <div class="row">
            <div class="col-md-3 mb-3 mb-md-0">
                <ul class="list-group sidebar">
                    <li class="list-group-item d-flex">
                        <i class="bx bx-bot font-18 align-middle me-2"></i>
                        <div>
                            <p>Icon Kategori</p>
                            <small>Pilih icon yang akan digunakan pada kategori yang ditambahkan.</small>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body p-4">
                        <div class="form-group row">
                            <div class="col-md-6 mb-3 mb-md-0">
                                <label for="icon_type">Jenis Icon</label>
                                <select id="icon_type" class="form-select text-capitalize" wire:model="icon_type">
                                    <option value="">Pilih Jenis Icon</option>
                                    @foreach ($boxicons as $type)
                                    <option class="text-capitalize" value="{{ $type }}">{{ $type }}</option>
                                    @endforeach
                                </select>
                            </div>

                            @if ($icon)
                            <div class="col-4">
                                <label for="icon_type">Icon Terpilih</label>
                                <div class="fs-4 text-muted"><i class="{{ $icon }}"></i></div>
                            </div>
                            @endif
                        </div>

                        <div class="form-group row" style="max-height: 250px; overflow-y: scroll">
                            @foreach ($icons as $item)
                            <div class="col">
                                <a href="javascript:void(0)" wire:click="setIcon('{{ $item }}')"
                                    class="p-1 {{ $icon == $item ? 'text-white bg-primary rounded' : 'text-muted' }}">
                                    <span class="fs-6">
                                        <i class="{{ $item }}"></i>
                                    </span>
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

        @if ($with == 'image')
        <div class="row">
            <div class="col-md-3 mb-3 mb-md-0">
                <ul class="list-group sidebar">
                    <li class="list-group-item d-flex">
                        <i class="bx bx-image font-18 align-middle me-2"></i>
                        <div>
                            <p>Gambar Kategori</p>
                            <small>Usahakan ukuran file tidak lebih dari 50kb, dengan ukuran 200x200 dan dengan rasio
                                1:1.</small>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body p-4">
                        <div class="form-group row">
                            <div class="col-6">
                                <livewire:image-upload :images="$image" :oldImages="$image" height="130px" />

                                @error('image')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="text-end">
                    <x-button state="dark" loadingState="true" wireTarget="update" text="Simpan" />
                </div>
            </div>
        </div>
    </form>
</div>
