<div>
    @if (session()->has('success'))
    <x-alert state="primary" color="white" title="Sukses !" :message="session('success')" />
    @endif

    @if (session()->has('failed'))
    <x-alert state="warning" color="white" title="Upsss..." :message="session('failed')" />
    @endif

    <x-form-card title="Daftar Kategori">
        <x-filter :filters="$filters" class="justify-content-end">
            <div class="col-md-4 mb-3">
                <input type="text" class="form-control form-control-sm" wire:model.debounce.250ms="search"
                    placeholder="Cari kategori disini...">
            </div>
        </x-filter>

        <x-table class="pb-5">
            <x-table.header>
                <x-table.row>
                    @foreach ($headers as $header)
                    <x-table.cell cell="{{$header['cell_name']}}" isHeader="true" :sortable="$header['sortable']"
                        sortableOrder="{{$header['column_name'] == $sort ? $order : null}}"
                        wire:click="sort('{{$header['column_name']}}')" />
                    @endforeach
                </x-table.row>
            </x-table.header>

            <x-table.body>
                @forelse ($categories as $category)
                <x-table.row>
                    <x-table.cell :cell="$category->name" />
                    <x-table.cell :cell="$category->slug_name" />
                    <x-table.cell :cell="$category->table_reference" />
                    <x-table.cell :cell="$category->position" />
                    <x-table.cell>
                        <div class="btn-group" role="group">
                            <x-action-button href="{{ route('adm.master.category.edit', $category->id) }}">
                                <i class="bx bx-pencil"></i>
                            </x-action-button>
                            <div class="btn-group" role="group">
                                <button id="dropdown" type="button" class="btn btn-light btn-sm"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bx bx-trash"></i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdown">

                                    @if ($onlyTrashed)
                                    <li>
                                        <a href="javascript:void(0)" class="dropdown-item"
                                            wire:click="restore('{{$category->id}}')">
                                            Pulihkan
                                        </a>
                                    </li>
                                    @else
                                    <li>
                                        <a href="javascript:void(0)" class="dropdown-item"
                                            wire:click="trash('{{$category->id}}')">
                                            Sampah
                                        </a>
                                    </li>
                                    @endif

                                    <li>
                                        <a href="javascript:void(0)" class="dropdown-item" data-bs-toggle="modal"
                                            data-bs-target="#remove-modal"
                                            wire:click="$set('destroyId','{{$category->id}}')">
                                            Hapus Permanen
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </x-table.cell>
                </x-table.row>
                @empty
                <x-table.row>
                    <x-table.cell class="text-center" colspan="5">Data tidak ditemukan.</x-table.cell>
                </x-table.row>
                @endforelse
            </x-table.body>
        </x-table>

        <x-remove.modal />

        <x-pagination :table="$categories" />
    </x-form-card>
</div>
