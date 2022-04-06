<div>
    @if (session()->has('success'))
    <x-alert state="primary" color="white" title="Sukses !" :message="session('success')" />
    @endif

    @if (session()->has('failed'))
    <x-alert state="warning" color="white" title="Upsss..." :message="session('failed')" />
    @endif

    <h6 class="text-uppercase text-secondary">Daftar Roles</h6>
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
            @forelse ($roles as $role)
            <x-table.row>
                <x-table.cell :cell="$role->name" />
                <x-table.cell :cell="$role->guard_name" />
                <x-table.cell :cell="$role->created_at->format('D, d M Y')" />
                <x-table.cell>
                    <div class="btn-group" role="group">
                        <x-action-button href="{{ route('adm.access-level.role.edit', $role->id) }}">
                            <i class="bx bx-pencil"></i>
                        </x-action-button>
                        <x-remove.button wire:click="$set('destroyId',{{$role->id}})" />
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
            <x-pagination :table="$roles" />
        </x-slot>

    </x-table.with-filter>

    <x-remove.modal />
</div>
