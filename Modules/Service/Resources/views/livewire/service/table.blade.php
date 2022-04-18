<div>
    @if (session()->has('success'))
    <x-alert state="primary" color="white" title="Sukses !" :message="session('success')" />
    @endif

    @if (session()->has('failed'))
    <x-alert state="warning" color="white" title="Upsss..." :message="session('failed')" />
    @endif

    <h6 class="text-uppercase text-secondary">Daftar Kategori</h6>
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

            <tbody wire:sortable="updateOrder">
                @forelse ($services as $service)
                <x-table.row wire:key="service-{{ $service->id }}" wire:sortable.item="{{ $service->id }}">
                    <x-table.cell wire:sortable.handle title="Tahan untuk memindahkan posisi" class="cursor-grab">
                        @if ($service->thumbnail)
                        <span class="me-1">
                            <img src="{{ $service->thumbnail }}" style="width: 100%; max-width: 80px" alt="">
                        </span>
                        @endif
                        {{ $service->name }}
                    </x-table.cell>
                    <x-table.cell wire:sortable.handle title="Tahan untuk memindahkan posisi" class="cursor-grab"
                        :cell="$service->slug_name" />
                    <x-table.cell :cell="$service->position" />
                    <x-table.cell>
                        <div class="btn-group" role="group">
                            <x-action-button href="{{ route('adm.service.edit', $service->id) }}">
                                <i class="bx bx-pencil"></i>
                            </x-action-button>
                            <div class="btn-group" role="group">
                                <button id="dropdown" type="button" class="btn btn-light btn-sm"
                                    wire:click="$set('destroyId','{{$service->id}}')">
                                    <i class="bx bx-trash"></i>
                                </button>
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
            </tbody>

        </x-slot>

        <x-slot name="pagination">
            <x-pagination :table="$services" />
        </x-slot>

    </x-table.with-filter>

    <x-remove.modal />
</div>
