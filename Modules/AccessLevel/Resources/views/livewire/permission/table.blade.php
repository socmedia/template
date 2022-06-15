<div>
    @if (session()->has('success'))
        <x-alert state="primary" color="white" title="Sukses !" :message="session('success')" />
    @endif

    @if (session()->has('failed'))
        <x-alert state="warning" color="white" title="Upsss..." :message="session('failed')" />
    @endif

    <h6 class="text-uppercase text-secondary">Daftar Permissions</h6>
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
            @forelse ($permissions as $permission)
                <x-table.row>
                    <x-table.cell :cell="$permission->name" />
                    <x-table.cell :cell="$permission->guard_name" />
                    <x-table.cell :cell="$permission->created_at->format('D, d M Y')" />
                    <x-table.cell>
                        <div class="btn-group" role="group">
                            @can('permissions.edit')
                                <x-action-button href="{{ route('adm.access-level.permission.edit', $permission->id) }}">
                                    <i class="bx bx-pencil"></i>
                                </x-action-button>
                            @endcan
                            @can('permissions.delete')
                                <x-remove.button wire:click="$set('destroyId',{{ $permission->id }})" />
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
            <x-pagination :table="$permissions" />
        </x-slot>

    </x-table.with-filter>

    <x-remove.modal />
</div>
