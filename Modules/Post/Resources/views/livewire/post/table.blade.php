<div>
    @if (session()->has('success'))
    <x-alert state="primary" color="white" title="Sukses !" :message="session('success')" />
    @endif

    @if (session()->has('failed'))
    <x-alert state="warning" color="white" title="Upsss..." :message="session('failed')" />
    @endif

    <h6 class="text-uppercase text-secondary">Semua Postingan</h6>
    <hr>
    <x-table.with-filter :pagination="true">

        <x-slot name="table_headers">
            @foreach ($headers as $header)
            <x-table.cell cell="{{ $header['cell_name'] }}" isHeader="true" :sortable="$header['sortable']"
                sortableOrder="{{ $header['column_name'] == $sort ? $order : null }}"
                wire:click="sort('{{ $header['column_name'] }}')" />
            @endforeach
        </x-slot>

        <x-slot name="filters">

            <div class="list-group-item border-0">
                <select name="type" id="type" class="form-select" wire:model.defer="type">
                    <option value="">Semua Tipe</option>
                    @foreach ($types as $type)
                    <option value="{{ $type->slug_name }}">
                        {{ $type->name }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="list-group-item border-0">

                <select name="category" id="category" class="form-select" wire:model.defer="category">
                    <option value="">Semua Kategori</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->slug_name }}">
                        {{ $category->name }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="list-group-item border-0">
                <select name="status" id="status" class="form-select" wire:model.defer="status">
                    <option value="">Semua Status</option>
                    @foreach ($statuses as $status)
                    <option value="{{ $status['slug_name'] }}">
                        {{ $status['name'] }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="list-group-item border-0">
                <select name="sort" id="sort" class="form-select" wire:model.defer="sort">
                    <option value="title">Judul</option>
                    <option value="created_at">Tanggal Pembuatan</option>
                </select>
            </div>

            <div class="list-group-item border-0">
                <select name="order" id="order" class="form-select" wire:model.defer="order">
                    <option value="asc">Asc</option>
                    <option value="desc">Desc</option>
                </select>
            </div>

        </x-slot>

        <x-slot name="table_body">
            @forelse ($posts as $post)
            <x-table.row>
                <x-table.cell>
                    <img src="{{ $post->thumbnail }}" style="width: 100%; max-width: 200px" alt="">
                </x-table.cell>
                <x-table.cell>
                    <p class="mb-2 fw-bold fs-6" style="width: 400px; white-space: break-spaces;">{{ $post->title }}</p>
                    <p class="text-muted" style="width: 400px; white-space: break-spaces;">{{ $post->subject }}</p>

                    <div class="border-top mt-2 py-1 d-flex justify-content-between">
                        <div>
                            <small class="with-icon"> <i class="bx bx-timer"></i> {{ $post->reading_time }}</small>
                            <span>|</span>
                            <small>Author, <strong>{{ $post->writer ? $post->writer->name : null }}</strong></small>
                        </div>

                        <div>
                            <small class="with-icon me-2 text-success">
                                <i class="bx bx-paper-plane"></i> {{ $post->number_of_views }}
                            </small>
                            <small class="with-icon me-2 text-primary">
                                <i class="lni lni-eye"></i> {{ $post->number_of_shares }}
                            </small>
                            <small class="with-icon text-muted">
                                <i class='bx bx-comment-dots'></i> {{ $post->comments_count }}
                            </small>
                        </div>
                    </div>
                </x-table.cell>
                <x-table.cell class="text-center">
                    @if ($post->type)
                    <small class="px-2 py-1 me-1 bg-warning text-white rounded-pill">
                        {{ $post->type ? $post->type->name: null }}
                    </small>
                    @endif

                    @if ($post->category)
                    <small class="px-2 py-1 bg-secondary text-white rounded-pill">
                        {{ $post->category ? $post->category->name : null }}
                    </small>
                    @endif
                </x-table.cell>
                <x-table.cell>

                    @if ($post->archived_at)
                    <small class="px-2 py-1 me-1 bg-dark text-white rounded-pill">
                        Diarsipkan
                    </small>
                    @elseif ($post->published_at)
                    <small class="px-2 py-1 me-1 bg-primary text-white rounded-pill">
                        Publish
                    </small>
                    @elseif (!$post->published_at)
                    <small class="px-2 py-1 me-1 bg-secondary text-white rounded-pill">
                        Draft
                    </small>
                    @endif
                </x-table.cell>

                <x-table.cell>
                    <div class="btn-group" role="group">
                        <x-action-button href="javascript:void(0)" wire:click="archive('{{ $post->id }}')"
                            title="{{ !$post->archived_at ? 'Arsipkan' : 'Pulihkan' }}">
                            <i class="bx bx-{{ !$post->archived_at ? 'archive-in' : 'upload' }}"></i>
                        </x-action-button>
                        <x-action-button href="{{ route('front.post.show', ['slug_title' => $post->slug_title]) }}"
                            target="_blank" title="Lihat Postingan">
                            <i class="bx bx-show"></i>
                        </x-action-button>
                        <x-action-button href="{{ route('adm.post.edit', $post->id) }}" title="Edit Postingan">
                            <i class="bx bx-pencil"></i>
                        </x-action-button>
                        <x-remove.button title="Hapus Postingan" wire:click="$set('destroyId', '{{$post->id}}')" />
                    </div>
                </x-table.cell>

            </x-table.row>
            @empty
            <div class="col-12 pt-5 pb-3">
            </div>
            <x-table.row>
                <x-table.cell colspan="{{ count($headers) }}">
                    <p class="text-center">Postingan yang anda cari tidak kami temukan.</p>
                </x-table.cell>

            </x-table.row>
            @endforelse

        </x-slot>

        <x-slot name="pagination">
            <x-pagination :table="$posts" />
        </x-slot>

    </x-table.with-filter>

    <x-remove.modal />
</div>
