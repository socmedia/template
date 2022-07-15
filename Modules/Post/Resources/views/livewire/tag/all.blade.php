<div>
    @if (session()->has('success'))
        <x-alert state="primary" color="white" title="Sukses !" :message="session('success')" />
    @endif

    @if (session()->has('failed'))
        <x-alert state="warning" color="white" title="Upsss..." :message="session('failed')" />
    @endif

    <h6 class="text-uppercase text-secondary">Daftar Tag</h6>
    <hr>

    <div class="row mb-3">

        <div class="col-md-3 mb-3">
            <div class="card">
                <div class="card-body p-4">
                    @can('tag.create|tag.edit')
                        <form wire:submit.prevent="store">
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="name">Nama Tag</label>
                                    <input type="text" class="form-control" name="name" id="name"
                                           wire:model.defer="name">
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror

                                </div>
                            </div>
                            <div class="form-check">
                                <div class="col-md-12">
                                    <input class="form-check-input" type="checkbox" name="hot_topic" id="hot_topic"
                                           wire:model.defer="hot_topic">
                                    <label class="form-check-label" for="hot_topic">
                                        Apakah hot topic ?
                                    </label>

                                    @error('publised')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-check mb-3">
                                <div class="col-md-12">
                                    <input class="form-check-input" type="checkbox" name="is_featured" id="is_featured"
                                           wire:model.defer="is_featured">
                                    <label class="form-check-label" for="is_featured">
                                        Apakah tag unggulan ?
                                    </label>

                                    @error('publised')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="text-end">
                                        <x-button state="dark" loadingState="true" wireTarget="store"
                                                  text="{{ $mode == 'edit' ? 'Simpan Perubahan' : 'Simpan' }}" />
                                    </div>
                                </div>
                            </div>
                        </form>
                    @else
                        <p class="text-center">Anda tidak memiliki akses untuk menambahkan/mengubah Tag.</p>
                    @endcan
                </div>
            </div>
        </div>

        <div class="col-md-9">
            <x-table.with-filter :pagination="true" sortable="updateOrder">

                <x-slot name="table_headers">
                    @foreach ($headers as $header)
                        <x-table.cell cell="{{ $header['cell_name'] }}" isHeader="true" :sortable="$header['sortable']"
                                      sortableOrder="{{ $header['column_name'] == $sort ? $order : null }}"
                                      wire:click="sort('{{ $header['column_name'] }}')" />
                    @endforeach
                </x-slot>
                <x-slot name="table_body">
                    @forelse ($tags as $tag)
                        <x-table.row>
                            <x-table.cell>
                                {{ $tag->name }}
                                @if ($tag->is_featured == 1)
                                    <span class="p-1"><i class='bx bxs-check-circle text-success'></i></span>
                                @endif
                                @if ($tag->hot_topic == 1)
                                    <span class="badge bg-danger p-1"><small>Hot</small></span>
                                @endif
                            </x-table.cell>
                            <x-table.cell :cell="$tag->slug_name" />
                            <x-table.cell :cell="$tag->created_at->format('d M Y')" />
                            <x-table.cell>
                                <div class="btn-group" role="group">
                                    @can('tag.edit')
                                        <x-action-button wire:click="update('{{ $tag->id }}')">
                                            <i class="bx bx-pencil"></i>
                                        </x-action-button>
                                    @endcan
                                    @can('tag.delete')
                                        <x-remove.button wire:click="$set('destroyId','{{ $tag->id }}')" />
                                    @endcan
                                </div>
                            </x-table.cell>
                        </x-table.row>
                    @empty
                        <x-table.row>
                            <x-table.cell class="text-center" colspan="{{ count($headers) }}">Data tidak ditemukan.
                            </x-table.cell>
                        </x-table.row>
                    @endforelse
                </x-slot>

                <x-slot name="pagination">
                    <x-pagination :table="$tags" />
                </x-slot>

            </x-table.with-filter>
        </div>
    </div>


    <x-remove.modal />
</div>
