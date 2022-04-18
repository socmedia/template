<div>
    @if (session()->has('success'))
    <x-alert state="primary" color="white" title="Sukses !" :message="session('success')" />
    @endif

    @if (session()->has('failed'))
    <x-alert state="warning" color="white" title="Upsss..." :message="session('failed')" />
    @endif

    <h6 class="text-uppercase text-secondary">Daftar Jenis Postingan</h6>
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
            @forelse ($types as $type)
            <x-table.row>
                <x-table.cell :cell="$type->name" />
                <x-table.cell :cell="$type->slug_name" />
                <x-table.cell>
                    @if (is_array(json_decode($type->allow_column)))
                    @foreach (json_decode($type->allow_column) as $column)
                    <small class="px-2 py-1 bg-secondary text-white rounded-pill">{{ $column }}</small>
                    @endforeach
                    @elseif (!$type->allow_column)
                    {{ '-' }}
                    @endif
                </x-table.cell>
                <x-table.cell>
                    <div class="btn-group" role="group">
                        <x-action-button href="{{ route('adm.post-type.edit', $type->id) }}">
                            <i class="bx bx-pencil"></i>
                        </x-action-button>
                        <x-remove.button wire:click="$set('destroyId',{{$type->id}})" />
                    </div>
                </x-table.cell>
            </x-table.row>
            @empty
            <x-table.row>
                <x-table.cell class="text-center" colspan="{{ count($headers) }}">Data tidak ditemukan.</x-table.cell>
            </x-table.row>
            @endforelse
        </x-slot>

        <x-slot name="pagination">
            <x-pagination :table="$types" />
        </x-slot>

    </x-table.with-filter>

    <x-remove.modal />
</div>
