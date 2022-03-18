<div>
    @if (session()->has('success'))
    <x-alert state="primary" color="white" title="Sukses !" :message="session('success')" />
    @endif

    @if (session()->has('failed'))
    <x-alert state="warning" color="white" title="Upsss..." :message="session('failed')" />
    @endif

    <x-form-card title="Daftar Sub Kategori">
        <x-filter :filters="$filters" class="justify-content-end">
            <div class="col-md-4 mb-3">
                <input type="text" class="form-control form-control-sm" wire:model.debounce.250ms="search"
                    placeholder="Cari sub kategori disini...">
            </div>
            <div class="col-md-2 mb-3">
                <select wire:model="category" class="form-select form-select-sm h-100">
                    <option value="">Pilih Kategori</option>
                    @foreach ($categories as $category)
                    <option value="{{strtolower($category->name)}}">{{$category->name}}</option>
                    @endforeach
                </select>
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
                @forelse ($sub_categories as $sub_category)
                <x-table.row>
                    <x-table.cell :cell="$sub_category->category ? $sub_category->category->name : '-'" />
                    <x-table.cell :cell="$sub_category->name" />
                    <x-table.cell :cell="$sub_category->slug_name" />
                    <x-table.cell :cell="$sub_category->parent ? $sub_category->parent : '-'" />
                    <x-table.cell :cell="$sub_category->position" />
                    <x-table.cell>
                        <div class="btn-group" role="group">
                            <x-action-button href="{{ route('adm.master.sub-category.edit', $sub_category->id) }}">
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
                                            wire:click="restore('{{$sub_category->id}}')">
                                            Pulihkan
                                        </a>
                                    </li>
                                    @else
                                    <li>
                                        <a href="javascript:void(0)" class="dropdown-item"
                                            wire:click="trash('{{$sub_category->id}}')">
                                            Sampah
                                        </a>
                                    </li>
                                    @endif

                                    <li>
                                        <a href="javascript:void(0)" class="dropdown-item" data-bs-toggle="modal"
                                            data-bs-target="#remove-modal"
                                            wire:click="$set('destroyId','{{$sub_category->id}}')">
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
                    <x-table.cell class="text-center" colspan="6">Data tidak ditemukan.</x-table.cell>
                </x-table.row>
                @endforelse
            </x-table.body>
        </x-table>

        <x-remove.modal />

        <x-pagination :table="$sub_categories" />
    </x-form-card>
</div>
