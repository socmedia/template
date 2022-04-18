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
                            <p>Tentang layanan</p>
                            <small>Tambahkan gambar dan judul postingan yang akan ditampilkan ke publik.</small>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body p-4">

                        <div class="form-group">
                            <livewire:image-upload :images="$thumbnail" :oldImages="$oldThumbnail" height="200px" />

                            @error('thumbnail')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="name">Judul</label>
                            <input id="name" type="text" class="form-control" name="name" value="{{old('name')}}"
                                wire:model.lazy="name">

                            @error('name')
                            <small class="text-danger">
                                {{$message}}
                            </small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="slug_name">Slug</label>
                            <div class="input-group">
                                <small class="input-group-text text-muted">{{ url('/layanan') }}/</small>
                                <input id="slug_name" type="text" class="form-control text" name="slug_name"
                                    value="{{old('slug')}}" wire:model.lazy="slug_name">
                            </div>

                            @error('slug_name')
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

                        <div class="form-group" wire:ignore>
                            <label for="description">Deskripsi</label>
                            <textarea name="description" id="description" rows="3"
                                class="form-control">{!! $description !!}</textarea>
                        </div>

                        <div class="form-group" wire:ignore>
                            <label for="duration">Durasi</label>
                            <textarea name="duration" id="duration" rows="3"
                                class="form-control">{!! $duration !!}</textarea>
                        </div>

                        <div class="form-group" wire:ignore>
                            <label for="terms_n_conditions">Syarat & Ketentuan</label>
                            <textarea name="terms_n_conditions" id="terms_n_conditions" rows="3"
                                class="form-control">{!! $terms_n_conditions !!}</textarea>
                        </div>

                        <div class="text-end">
                            <x-button state="dark" loadingState="true" wireTarget="update" text="Simpan" />
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </form>

    <script src="https://cdn.tiny.cloud/1/re9dlkpt1x7b7cv767ziis3jvg5s7pu2twkppl3h5bocq44p/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script>
        function init(){
            const description = tinymce.init({
                selector: '#description',
                setup : function(editor) {
                    editor.on('blur', function(e) {
                        @this.set('description', editor.getContent())
                    });
                },
            });

            const duration = tinymce.init({
                selector: '#duration',
                setup : function(editor) {
                    editor.on('blur', function(e) {
                        @this.set('duration', editor.getContent())
                    });
                },
            });

            const terms_n_conditions = tinymce.init({
                selector: '#terms_n_conditions',
                setup : function(editor) {
                    editor.on('blur', function(e) {
                        @this.set('terms_n_conditions', editor.getContent())
                    });
                },
            });
        }

        init()

        document.addEventListener('init', function () {
            tinyMCE.execCommand('mceRemoveEditor', false, 'description');
            tinyMCE.execCommand('mceRemoveEditor', false, 'duration');
            tinyMCE.execCommand('mceRemoveEditor', false, 'terms_n_conditions');
            init()

            setTimeout(() => {
                $('.tox.tox-silver-sink.tox-tinymce-aux').remove()
            }, 1500);
        })
    </script>
</div>
