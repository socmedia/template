<div>
    @if (session()->has('success'))
        <x-alert state="primary" color="white" title="Sukses !" :message="session('success')" />
    @endif

    @if (session()->has('failed'))
        <x-alert state="warning" color="white" title="Gagal !" :message="session('failed')" />
    @endif

    <div class="row">
        <div class="col-md-8 mb-3 mb-md-0">
            <ul class="list-group sidebar mb-3">
                <li class="list-group-item d-flex">
                    <i class="bx bx-news font-18 align-middle me-2"></i>
                    <div class="col-md-6">
                        <p>Tentang Postingan</p>
                        <small>Pilih postingan yang tersedia untuk publik. Anda bisa menambahkan
                            beberapa postingan yang tersedia sekaligus.</small>
                    </div>
                </li>
            </ul>

            <div class="card mb-2">
                <div class="card-body p-4">

                    <div class="form-group">
                        <label for="search">Pencarian Postingan</label>
                        <input id="search" type="text" class="form-control" name="search"
                               wire:model.lazy="search">
                    </div>

                </div>
            </div>

            @forelse ($result as $post)
                <div class="card mb-2">
                    <div class="card-body p-2">
                        <a href="javascript:void(0)" class="d-flex" wire:click="addPost('{{ $post->id }}')"
                           title="Tambahkan ke list">
                            <div class="flex-shrink-0">
                                <img src="{{ $post->thumbnail ? url($post->thumbnail) : 'https://via.placeholder.com/600x400/181818/ddd?text=soclyfe.com' }}"
                                     style="width: 100%; max-width: 80px" alt="">
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <p class="mb-0 fw-bold fs-6" style="width: 400px; white-space: normal;">
                                    {{ $post->title }}</p>
                                <p class="mb-0 text-muted" style="white-space: normal;">
                                    {{ $post->subject }}</p>
                            </div>
                        </a>
                    </div>
                </div>
            @empty
                <div class="card">
                    <div class="card-body text-center p-4">
                        Postingan tidak ditemukan.
                    </div>
                </div>
            @endforelse
        </div>

        <div class="col-md-4">
            <ul class="list-group sidebar mb-3">
                <li class="list-group-item d-flex">
                    <i class="bx bx-cog font-18 align-middle me-2"></i>
                    <div>
                        <p>Pengaturan</p>
                        <small>Pengaturan kategori, jenis, tag postingan beserta visibilitas
                            postingan.</small>
                    </div>
                </li>
            </ul>

            <div class="card">
                <div class="card-body p-4">

                    <form wire:submit.prevent="store">
                        <div class="form-group">
                            <ul class="list-group">
                                @forelse ($choosenList as $index => $list)
                                    <li class="list-group-item">
                                        <a class="d-flex" href="javascript:void(0)" title="Hapus dari list"
                                           wire:click="removePost('{{ $index }}')">
                                            <div class="flex-shrink-0">
                                                <img src="{{ $list['thumbnail'] }}"
                                                     style="width: 100%; max-width: 80px" alt="">
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <p class="mb-0 fw-bold fs-6" style="white-space: normal;">
                                                    {{ $list['title'] }}</p>
                                            </div>
                                        </a>
                                    </li>
                                @empty
                                    <li class="list-group-item text-center">Belum ada postingan yang dipilih.</li>
                                @endforelse
                            </ul>
                        </div>

                        <div class="text-end">
                            <x-button state="dark" loadingState="true" wireTarget="store" text="Simpan" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/app/js/additional.js') }}"></script>
</div>
