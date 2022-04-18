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
                        <i class="bx bx-news font-18 align-middle me-2"></i>
                        <div>
                            <p>Tentang Postingan</p>
                            <small>Tambahkan gambar dan judul postingan yang akan ditampilkan ke publik.</small>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body p-4">

                        <div class="form-group">
                            <livewire:image-upload :images="$thumbnail" height="200px" :oldImages="$oldThumbnail" />

                            @error('thumbnail')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="title">Judul</label>
                            <input id="title" type="text" class="form-control" name="title" value="{{old('title')}}"
                                wire:model.lazy="title">

                            @error('title')
                            <small class="text-danger">
                                {{$message}}
                            </small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="slug_title">Slug</label>
                            <div class="input-group">
                                <small class="input-group-text text-muted">{{ url('/berita') }}/</small>
                                <input id="slug_title" type="text" class="form-control text" name="slug_title"
                                    value="{{old('slug')}}" wire:model.lazy="slug_title">
                            </div>

                            @error('slug_title')
                            <small class="text-danger">{{$message}}</small>
                            @else
                            <small class="text-muted">
                                <em>*Judul singkat untuk link yang dapat diakses oleh publik</em>
                            </small>
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

                        @if (in_array('subject', $allowed_column))
                        <div class="form-group">
                            <label for="">Subjek</label>
                            <textarea class="form-control" name="subject" autocomplete="subject"
                                style="height: 100px; resize:none" wire:model="subject"></textarea>

                            @error('subject')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        @endif

                        <div class="form-group" wire:ignore>
                            <label for="description">Konten</label>
                            <livewire:trix :value="$description"></livewire:trix>

                            @error('description')
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
                            <p>Pengaturan</p>
                            <small>Pengaturan kategori, jenis, tag postingan beserta visibilitas postingan.</small>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body p-4">

                        <div class="form-group row">
                            @if (in_array('category', $allowed_column))
                            <div class="col-md-6 mb-3 mb-md-0">
                                <label for="category">Kategori</label>
                                <select class="form-control" title="Kategori" name="category" id="category"
                                    wire:model="category">
                                    <option value="">Pilih Kategori</option>
                                    @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}} </option>
                                    @endforeach
                                </select>

                                @error('category')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            @endif

                            <div class="col-md-6 mb-3 mb-md-0">
                                <label for="type">Tipe Postingan</label>
                                <select class="form-control" title="Kategori" name="type" id="type" wire:model="type">
                                    <option value="">Pilih Tipe</option>
                                    @foreach ($types as $type)
                                    <option value="{{$type->id}}">{{$type->name}} </option>
                                    @endforeach
                                </select>

                                @error('category')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>

                        @if (in_array('tags', $allowed_column))
                        <div class="form-group row">
                            <label for="tags">Tag</label>
                            <div class="d-flex flex-wrap">
                                @foreach ($tags as $index => $tag)
                                <x-badge icon="" state="primary mb-2 custom-badge">
                                    {{ $tag }}
                                    <x-button-close wire:click="removeTag('{{ $index }}')" />
                                </x-badge>
                                @endforeach
                                <div class="col-4 col-md-3 me-2">
                                    <div class="input-group">
                                        <input type="text" name="tags" id="tags" class="form-control form-control-sm"
                                            wire:model="tag">
                                        <button type="button" wire:click="addTag"
                                            class="btn btn-btn-sm btn-outline-primary">+</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                @error('tagsInString')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        @endif

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="publish" id="publish"
                                wire:model="publish">
                            <label class="form-check-label" for="publish">
                                Publish Postingan
                            </label>

                            @error('publised')
                            <small class="text-danger">{{$message}}</small>
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
    <script src="{{ asset('assets/app/js/additional.js') }}"></script>
</div>
