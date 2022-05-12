<div>
    @if (session()->has('success'))
        <x-alert state="primary" color="white" title="Sukses !" :message="session('success')" />
    @endif

    @if (session()->has('failed'))
        <x-alert state="warning" color="white" title="Upsss..." :message="session('failed')" />
    @endif

    <h6 class="text-uppercase text-secondary">Daftar Dokumentasi</h6>
    <hr>

    <x-table.with-filter :pagination="true" sortable="updateOrder" sortableGroup="documentation">

        <x-slot name="table_headers">
            @foreach ($headers as $header)
                <x-table.cell cell="{{ $header['cell_name'] }}" isHeader="true" :sortable="$header['sortable']"
                    sortableOrder="{{ $header['column_name'] == $sort ? $order : null }}"
                    wire:click="sort('{{ $header['column_name'] }}')" />
            @endforeach
        </x-slot>

        <x-slot name="table_body">

            @forelse ($documentations as $documentation)
                <x-table.row wire:key="{{ $documentation->id }}" wire:sortable.item="{{ $documentation->id }}">

                    <x-table.cell :cell="$documentation->page_title" wire:sortable.handle title="Tahan untuk memindahkan posisi"
                        class="cursor-grab" />

                    <x-table.cell :cell="$documentation->slug_page_title" wire:sortable.handle title="Tahan untuk memindahkan posisi"
                        class="cursor-grab" />

                    <x-table.cell :cell="$documentation->position" />
                    <x-table.cell>
                        <x-modal.button class="btn btn-link btn-sm shadow-none"
                            wire:click="show('{{ $documentation->id }}')">
                            {{ $documentation->childs->count() . ' Buah' }}
                        </x-modal.button>
                    </x-table.cell>
                    <x-table.cell>
                        <div class="btn-group" role="group">
                            <x-action-button href="{{ route('adm.docs.edit', $documentation->id) }}">
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
                                                wire:click="restore('{{ $documentation->id }}')">
                                                Pulihkan
                                            </a>
                                        </li>
                                    @else
                                        <li>
                                            <a href="javascript:void(0)" class="dropdown-item"
                                                wire:click="trash('{{ $documentation->id }}')">
                                                Sampah
                                            </a>
                                        </li>
                                    @endif

                                    <li>
                                        <a href="javascript:void(0)" class="dropdown-item" data-bs-toggle="modal"
                                            data-bs-target="#remove-modal"
                                            wire:click="$set('destroyId','{{ $documentation->id }}')">
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
            <x-pagination :table="$documentations" />
        </x-slot>

    </x-table.with-filter>

    <x-modal modalTitle="{{ $modalTitle }}">
        <x-slot name="close">
            <x-button-close wire:click="resetModal" data-bs-dismiss="modal"></x-button-close>
        </x-slot>

        <x-slot name="modalBody">
            @if ($childs)
                <ul class="list-group" wire:sortable="updateOrder" wire:sortable-group="child">
                    @forelse ($childs as $child)
                        <li class="list-group-item" wire:key="child-{{ $child->id }}"
                            wire:sortable.item="child-{{ $child->id }}">
                            <div class="row">
                                <div class="col text-start cursor-grab" wire:sortable.handle
                                    title="Tahan untuk memindahkan posisi">

                                    <div class="d-flex">
                                        <div class="align-self-center">
                                            @if ($child->with_icon)
                                                <span class="me-1 px-2">
                                                    <i class="{{ $child->icon_class }}"></i>
                                                </span>
                                            @endif

                                            @if ($child->with_image)
                                                <span class="me-1">
                                                    <img src="{{ $child->media_path }}"
                                                        style="width: 100%; max-width: 30px" alt="">
                                                </span>
                                            @endif
                                        </div>
                                        <div>
                                            <p class="mb-0">{{ $child->page_title }}</p>
                                            <small><em>Slug: {{ $child->slug_page_title }}</em></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-1 align-self-center text-center">
                                    {{ $child->position }}
                                </div>
                                <div class="col align-self-center text-end">
                                    <div class="btn-group" role="group">
                                        <x-action-button href="{{ route('adm.docs.edit', $child->id) }}">
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
                                                            wire:click="restore('{{ $child->id }}')">
                                                            Pulihkan
                                                        </a>
                                                    </li>
                                                @else
                                                    <li>
                                                        <a href="javascript:void(0)" class="dropdown-item"
                                                            wire:click="trash('{{ $child->id }}')">
                                                            Sampah
                                                        </a>
                                                    </li>
                                                @endif

                                                <li>
                                                    <a href="javascript:void(0)" class="dropdown-item"
                                                        data-bs-toggle="modal" data-bs-target="#remove-modal"
                                                        wire:click="$set('destroyId','{{ $child->id }}')">
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
