<div>
    @if (session()->has('success'))
    <x-alert state="primary" color="white" title="Sukses !" :message="session('success')" />
    @endif

    @if (session()->has('failed'))
    <x-alert state="warning" color="white" title="Upsss..." :message="session('failed')" />
    @endif

    <h6 class="text-uppercase text-secondary">Daftar Sub Kategori</h6>
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
                <select wire:model.defer="category" class="form-select form-select-sm h-100">
                    <option value="">Pilih Kategori</option>
                    @foreach ($categories as $category)
                    <option value="{{strtolower($category->name)}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
        </x-slot>

        <x-slot name="table_body">

            @forelse ($sub_categories as $sub_category)
            <x-table.row>
                <x-table.cell :cell="$sub_category->category ? $sub_category->category->name : '-'" />
                <x-table.cell>
                    @if ($sub_category->with_icon)
                    <span class="me-1 px-2"><i class="{{ $sub_category->icon_class }}"></i></span>
                    @endif

                    @if ($sub_category->with_image)
                    <span class="me-1"><img src="{{ $sub_category->media_path }}" style="width: 100%; max-width: 30px"
                            alt=""></span>
                    @endif

                    {{$sub_category->name}}
                </x-table.cell>
                <x-table.cell :cell="$sub_category->slug_name" />
                <x-table.cell :cell="$sub_category->subCategoryParent ? $sub_category->subCategoryParent->name : '-'" />
                <x-table.cell :cell="$sub_category->position" />
                <x-table.cell>
                    <x-modal.button class="btn btn-link btn-sm shadow-none"
                        wire:click="show('{{ $sub_category->id }}')">
                        {{ $sub_category->childs->count() . ' Buah' }}
                    </x-modal.button>
                </x-table.cell>
                <x-table.cell>
                    <div class="btn-group" role="group">
                        <x-action-button href="{{ route('adm.master.sub-category.edit', $sub_category->id) }}">
                            <i class="bx bx-pencil"></i>
                        </x-action-button>
                        <div class="btn-group" role="group">
                            <button id="dropdown" type="button" class="btn btn-light btn-sm" data-bs-toggle="dropdown"
                                aria-expanded="false">
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
                <x-table.cell class="text-center" colspan="{{ count($headers) }}">
                    Data tidak ditemukan.
                </x-table.cell>
            </x-table.row>
            @endforelse

        </x-slot>

        <x-slot name="pagination">
            <x-pagination :table="$sub_categories" />
        </x-slot>

    </x-table.with-filter>

    <x-modal modalTitle="{{ $modalTitle }}">
        <x-slot name="close">
            <x-button-close wire:click="resetModal" data-bs-dismiss="modal"></x-button-close>
        </x-slot>

        <x-slot name="modalBody">
            @if ($childs)
            <ul class="list-group" wire:sortable="updateOrder">
                @forelse ($childs as $child)
                <li class="list-group-item" wire:key="{{ $child->id }}" wire:sortable.item="{{ $child->id }}">
                    <div class="row">
                        <div class="col text-start cursor-grab" wire:sortable.handle
                            title="Tahan untuk memindahkan posisi">

                            <div class="d-flex">
                                <div class="align-self-center">
                                    @if ($child->with_icon)
                                    <span class="me-1 px-2"><i class="{{ $child->icon_class }}"></i></span>
                                    @endif

                                    @if ($child->with_image)
                                    <span class="me-1"><img src="{{ $child->media_path }}"
                                            style="width: 100%; max-width: 30px" alt=""></span>
                                    @endif
                                </div>
                                <div>
                                    <p class="mb-0">{{ $child->name }}</p>
                                    <small><em>Slug: {{ $child->slug_name }}</em></small>
                                </div>
                            </div>
                        </div>
                        <div class="col-1 align-self-center text-center">
                            {{ $child->position }}
                        </div>
                        <div class="col align-self-center text-end">
                            <div class="btn-group" role="group">
                                <x-action-button href="{{ route('adm.master.sub-category.edit', $child->id) }}">
                                    <i class="bx bx-pencil fs-6"></i>
                                </x-action-button>
                                <div class="btn-group" role="group">
                                    <button id="dropdown" type="button" class="btn btn-light btn-sm"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bx bx-trash fs-6"></i>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdown">

                                        @if ($onlyTrashed)
                                        <li>
                                            <a href="javascript:void(0)" class="dropdown-item"
                                                wire:click="restore('{{$child->id}}')">
                                                Pulihkan
                                            </a>
                                        </li>
                                        @else
                                        <li>
                                            <a href="javascript:void(0)" class="dropdown-item"
                                                wire:click="trash('{{$child->id}}')">
                                                Sampah
                                            </a>
                                        </li>
                                        @endif

                                        <li>
                                            <a href="javascript:void(0)" class="dropdown-item" data-bs-toggle="modal"
                                                data-bs-target="#remove-modal"
                                                wire:click="$set('destroyId','{{$child->id}}')">
                                                Hapus Permanen
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                @empty
                <li class="list-group-item">
                    <p class="text-center mb-0">Child belum tersedia.</p>
                </li>
                @endforelse
            </ul>
            @else
            <div class="text-center">
                <div class="spinner-border spinner-border-sm text-dark" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
            @endif
        </x-slot>

        <x-slot name="modalFooter">
            <x-modal.dismiss-button wire:click="resetModal"> Tutup </x-modal.dismiss-button>
        </x-slot>
    </x-modal>
    <x-remove.modal />
</div>

{{-- @if (!$sub_category->childs->isEmpty())
<tbody>
    <x-table.row>
        <x-table.cell class="text-center" colspan="{{ count($headers) }}">

        </x-table.cell>
    </x-table.row>
</tbody>
@endif --}}
