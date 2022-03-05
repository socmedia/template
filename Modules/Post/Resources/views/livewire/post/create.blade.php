<div>
    @if (session()->has('success'))
    <x-alert state="primary" color="white" title="Sukses !" :message="session('success')" />
    @endif

    @if (session()->has('failed'))
    <x-alert state="warning" color="white" title="Gagal !" :message="session('failed')" />
    @endif

    <x-form-card title="Tambah Postingan">
        <form wire:submit.prevent="store">

            <div class="row">
                <div class="col-lg-4 mb-3 mb-lg-0">
                    <article class="vertical">
                        <figure>
                            <img
                                src="{{!$thumbnail ? asset('assets/default/images/image_not_found.png') : $thumbnail->temporaryUrl()}}">
                        </figure>
                    </article>

                    <div class="form-group">
                        <label for="thumbnail">{{ !$thumbnail ? 'Pilih thumbnail' : ''}}</label>
                        <input class="form-control form-control-sm" id="thumbnail" type="file" name="thumbnail"
                            accept="image/*" autocomplete="thumbnail" autofocus name="thumbnail" wire:model="thumbnail">

                        @error('thumbnail')
                        <small class="text-danger">{{$message}}</small>
                        @else
                        @if (!$thumbnail)
                        <small class="text-center text-secondary">
                            <em>Format: .png, .jpg, .jpeg</em>
                        </small>
                        @endif
                        @enderror
                    </div>

                    <div class="form-group">
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

                    <div class="text-end">
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-dark px-3 d-flex align-items-center dropdown-toggle"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Simpan
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdown">
                                @foreach ($statuses as $status)
                                <button class="dropdown-item" wire:click="$set('status', '{{$status->slug_name}}')">
                                    {{ $status->name }}
                                </button>
                                @endforeach
                            </ul>
                        </div>

                    </div>

                </div>

                <div class="col-lg-8">
                    <div class="form-group">
                        <label for="title">Judul</label>
                        <input id="title" type="text" class="form-control" name="title" value="{{old('title')}}"
                            wire:model="title">

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
                                value="{{old('slug')}}" wire:model="slug_title">
                        </div>

                        @error('slug_title')
                        <small class="text-danger">{{$message}}</small>
                        @else
                        <small class="text-muted">
                            <em>*Judul singkat untuk link yang dapat diakses oleh publik</em>
                        </small>
                        @enderror
                    </div>

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
                                    <input type="text" name="tags" id="tags" class="form-control" wire:model="tag">
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


                    <div class="form-group">
                        <label for="">Subjek</label>
                        <textarea class="form-control" name="subject" autocomplete="subject"
                            style="height: 200; resize:none" wire:model="subject"></textarea>

                        @error('subject')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="form-group" wire:ignore>
                        <label for="description">Konten</label>
                        <livewire:trix></livewire:trix>

                        @error('description')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>
        </form>
    </x-form-card>
    <script src="{{ asset('assets/app/js/additional.js') }}"></script>
</div>
