<div>
    @if (session()->has('success'))
        <x-alert state="primary" color="white" title="Sukses !" :message="session('success')" />
    @endif

    @if (session()->has('failed'))
        <x-alert state="warning" color="white" title="Upsss..." :message="session('failed')" />
    @endif

    <h6 class="text-uppercase text-secondary">Daftar Partner</h6>
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
                <select wire:model.defer="is_active" class="form-select h-100">
                    <option value="">-- Ditampilkan --</option>
                    <option value="true">Ya</option>
                    <option value="false">Tidak</option>
                </select>
            </div>
        </x-slot>

        <x-slot name="table_body">
            @forelse ($clients as $client)
                <x-table.row wire:sortable.item="{{ $client->id }}" wire:key="client-{{ $client->id }}">
                    <x-table.cell wire:sortable.handle title="Tahan untuk memindahkan posisi" class="cursor-grab">
                        <img height="70" src="{{ $client->media_path ?: cache('default_thumbnail_square') }}" alt="">
                    </x-table.cell>
                    <x-table.cell wire:sortable.handle title="Tahan untuk memindahkan posisi" class="cursor-grab"
                        :cell="$client->name" />
                    <x-table.cell :cell="$client->position" />
                    <x-table.cell>
                        <div class="cursor-pointer" wire:click="showOrHide('{{ $client->id }}')">
                            <x-badge icon="" state="{{ $client->is_active ? 'success' : 'warning' }}">
                                {{ $client->is_active ? 'Ditampilkan' : 'Disembunyikan' }}
                            </x-badge>
                        </div>
                    </x-table.cell>
                    <x-table.cell>
                        <div class="btn-group" role="group">
                            @can('partner.edit')
                                <x-action-button href="{{ route('adm.marketing.partner.edit', $client->id) }}">
                                    <i class="bx bx-pencil"></i>
                                </x-action-button>
                            @endcan
                            @can('partner.delete')
                                <x-action-button data-bs-toggle="modal" data-bs-target="#remove-modal"
                                    wire:click="$set('destroyId','{{ $client->id }}')">
                                    <i class="bx bx-trash"></i>
                                </x-action-button>
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
            <x-pagination :table="$clients" />
        </x-slot>

    </x-table.with-filter>

    <x-remove.modal />

</div>
