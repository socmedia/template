<div>
    @if (session()->has('success'))
        <x-alert state="primary" color="white" title="Sukses !" :message="session('success')" />
    @endif

    @if (session()->has('failed'))
        <x-alert state="warning" color="white" title="Upsss..." :message="session('failed')" />
    @endif

    <h6 class="text-uppercase text-secondary">Semua Headline</h6>
    <hr>
    <x-table.with-filter :pagination="true">

        <x-slot name="table_headers">
            @foreach ($headers as $header)
                <x-table.cell cell="{{ $header['cell_name'] }}" isHeader="true" :sortable="$header['sortable']"
                              sortableOrder="{{ $header['column_name'] == $sort ? $order : null }}"
                              wire:click="sort('{{ $header['column_name'] }}')" />
            @endforeach
        </x-slot>

        <x-slot name="table_body">
            @forelse ($featuredPosts as $featured)
                <x-table.row>
                    <x-table.cell>
                        <div class="d-flex">
                            <div class="flex-shrink-0">
                                <img src="{{ $featured->post->thumbnail }}" style="width: 100%; max-width: 80px"
                                     alt="">
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <p class="mb-0 fw-bold fs-6" style="width: 400px; white-space: normal;">
                                    {{ $featured->post->title }}</p>
                                <p class="mb-0 text-muted" style="white-space: normal;">
                                    {{ $featured->post->subject }}</p>
                            </div>
                        </div>
                    </x-table.cell>
                    <x-table.cell class="text-center">
                        @if ($featured->post->type)
                            <small class="px-2 py-1 me-1 bg-warning text-white rounded-pill">
                                {{ $featured->post->type ? $featured->post->type->name : null }}
                            </small>
                        @endif

                        @if ($featured->post->category)
                            <small class="px-2 py-1 bg-secondary text-white rounded-pill">
                                {{ $featured->post->category ? $featured->post->category->name : null }}
                            </small>
                        @endif
                    </x-table.cell>
                    <x-table.cell>
                        <div class="btn-group" role="group">
                            @can('featuredpost.delete')
                                <x-remove.button title="Hapus Headline"
                                                 wire:click="$set('destroyId', '{{ $featured->id }}')" />
                            @endcan
                        </div>
                    </x-table.cell>

                </x-table.row>
            @empty
                <div class="col-12 pt-5 pb-3">
                </div>
                <x-table.row>
                    <x-table.cell colspan="{{ count($headers) }}">
                        <p class="text-center">Headline yang anda cari tidak kami temukan.</p>
                    </x-table.cell>

                </x-table.row>
            @endforelse

        </x-slot>

        <x-slot name="pagination">
            <x-pagination :table="$featuredPosts" />
        </x-slot>

    </x-table.with-filter>

    <x-remove.modal />
</div>
