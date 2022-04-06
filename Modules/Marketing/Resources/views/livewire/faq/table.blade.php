<div>
    @if (session()->has('success'))
    <x-alert state="primary" color="white" title="Sukses !" :message="session('success')" />
    @endif

    @if (session()->has('failed'))
    <x-alert state="warning" color="white" title="Upsss..." :message="session('failed')" />
    @endif

    <h6 class="text-uppercase text-secondary">Daftar FAQ</h6>
    <hr>

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
                <select wire:model.defer="category" class="form-select h-100">
                    <option value="">-- Pilih Kategori --</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->slug_name }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="list-group-item border-0">
                <select wire:model.defer="is_show" class="form-select h-100">
                    <option value="">-- Ditampilkan --</option>
                    <option value="true">Ya</option>
                    <option value="false">Tidak</option>
                </select>
            </div>
        </x-slot>

        <x-slot name="table_body">
            @forelse ($faqs as $faq)
            <x-table.row wire:sortable.item="{{ $faq->id }}" wire:key="faq-{{ $faq->category->name }}-{{ $faq->id }}">
                <x-table.cell wire:sortable.handle title="Tahan untuk memindahkan posisi" class="cursor-grab"
                    style="vertical-align: top" :cell="$faq->category->name" />
                <x-table.cell wire:sortable.handle title="Tahan untuk memindahkan posisi" class="cursor-grab"
                    style="vertical-align: top" :cell="$faq->question" />
                <x-table.cell>
                    <p style="width: 350px; white-space: break-spaces">{{ $faq->answer }}</p>
                </x-table.cell>
                <x-table.cell :cell="$faq->position" />
                <x-table.cell style="vertical-align: top">
                    <div class="cursor-pointer" wire:click="showOrHide('{{$faq->id}}')">
                        <x-badge icon="" state="{{ $faq->is_show ? 'success' : 'warning'}}">
                            {{ $faq->is_show ? 'Ditampilkan' : 'Disembunyikan'}}
                        </x-badge>
                    </div>
                </x-table.cell>
                <x-table.cell style="vertical-align: top">
                    <div class="btn-group" role="group">
                        <x-action-button href="{{ route('adm.marketing.faq.edit', $faq->id) }}">
                            <i class="bx bx-pencil"></i>
                        </x-action-button>
                        <x-action-button data-bs-toggle="modal" data-bs-target="#remove-modal"
                            wire:click="$set('destroyId','{{$faq->id}}')">
                            <i class="bx bx-trash"></i>
                        </x-action-button>
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
            <x-pagination :table="$faqs" />
        </x-slot>

    </x-table.with-filter>

    <x-remove.modal />

</div>
