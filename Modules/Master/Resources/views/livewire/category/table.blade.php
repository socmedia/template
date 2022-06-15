<div>
    @if (session()->has('success'))
        <x-alert state="primary" color="white" title="Sukses !" :message="session('success')" />
    @endif

    @if (session()->has('failed'))
        <x-alert state="warning" color="white" title="Upsss..." :message="session('failed')" />
    @endif

    <h6 class="text-uppercase text-secondary">Daftar Kategori</h6>
    <hr>

    <div class="row mb-3">

        <div class="col-md-3 mb-3">
            <div class="list-group">
                @foreach ($tableReferences as $reference)
                    <div
                        class="list-group-item text-capitalize {{ $table_reference == $reference->table_reference ? 'bg-dark text-white' : null }}">
                        <a class="{{ $table_reference == $reference->table_reference ? 'text-white' : 'text-dark' }}"
                            href="javascript:void(0)" wire:click="changeTab('{{ $reference->table_reference }}')">
                            {{ $reference->table_reference }}
                        </a>
                    </div>
                @endforeach
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

                <x-slot name="filters">
                    <div class="list-group-item border-0">
                        <select wire:model.defer="table_reference"
                            class="form-select form-select-sm text-capitalize h-100">
                            <option value="">-- Pilih Table Reference --</option>
                            @foreach ($tableReferences as $references)
                                <option class="text-capitalize" value="{{ strtolower($references->table_reference) }}">
                                    {{ $references->table_reference }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </x-slot>

                <x-slot name="table_body">
                    @forelse ($categories->where('table_reference', $table_reference) as $category)
                        <x-table.row wire:key="{{ $category->table_reference }}-{{ $category->id }}"
                            wire:sortable.item="{{ $category->id }}">
                            <x-table.cell wire:sortable.handle title="Tahan untuk memindahkan posisi"
                                class="cursor-grab">
                                @if ($category->with_icon)
                                    <span class="me-1 px-2"><i class="{{ $category->icon_class }}"></i></span>
                                @endif

                                @if ($category->with_image)
                                    <span class="me-1"><img src="{{ $category->media_path }}"
                                            style="width: 100%; max-width: 30px" alt=""></span>
                                @endif
                                {{ $category->name }}
                            </x-table.cell>
                            <x-table.cell wire:sortable.handle title="Tahan untuk memindahkan posisi"
                                class="cursor-grab" :cell="$category->slug_name" />
                            <x-table.cell :cell="$category->table_reference" />
                            <x-table.cell :cell="$category->position" />
                            <x-table.cell>
                                <div class="btn-group" role="group">
                                    @can('category.edit')
                                        <x-action-button href="{{ route('adm.master.category.edit', $category->id) }}">
                                            <i class="bx bx-pencil"></i>
                                        </x-action-button>
                                    @endcan
                                    @can('category.delete')
                                        <div class="btn-group" role="group">
                                            <button id="dropdown" type="button" class="btn btn-light btn-sm"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="bx bx-trash"></i>
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdown">

                                                @if ($onlyTrashed)
                                                    <li>
                                                        <a href="javascript:void(0)" class="dropdown-item"
                                                            wire:click="restore('{{ $category->id }}')">
                                                            Pulihkan
                                                        </a>
                                                    </li>
                                                @else
                                                    <li>
                                                        <a href="javascript:void(0)" class="dropdown-item"
                                                            wire:click="trash('{{ $category->id }}')">
                                                            Sampah
                                                        </a>
                                                    </li>
                                                @endif

                                                <li>
                                                    <a href="javascript:void(0)" class="dropdown-item"
                                                        data-bs-toggle="modal" data-bs-target="#remove-modal"
                                                        wire:click="$set('destroyId','{{ $category->id }}')">
                                                        Hapus Permanen
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    @endcan
                                </div>
                            </x-table.cell>
                        </x-table.row>
                    @empty
                        <x-table.row>
                            <x-table.cell class="text-center" colspan="{{ count($headers) }}">Data
                                tidak ditemukan
                                pada tabel
                                referensi {{ $table_reference }}.
                            </x-table.cell>
                        </x-table.row>
                    @endforelse

                </x-slot>

                <x-slot name="pagination">
                    <x-pagination :table="$categories" />
                </x-slot>

            </x-table.with-filter>
        </div>
    </div>


    <x-remove.modal />
</div>
