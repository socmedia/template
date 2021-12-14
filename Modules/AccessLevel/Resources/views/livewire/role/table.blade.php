<div>
    <x-form-card title="Daftar Roles">
        <x-filter :filters="$filters" class="justify-content-end">
            <div class="col-md-4 mb-3">
                <input type="text" class="form-control" wire:model.debounce.250ms="search"
                    placeholder="Cari role disini...">
            </div>
        </x-filter>

        <x-table>
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
                            <x-action-button href="javascript:void(0)">
                                <i class="bx bx-trash"></i>
                            </x-action-button>
                        </div>
                    </x-table.cell>
                </x-table.row>
                @empty
                <x-table.row>
                    <x-table.cell class="text-center" colspan="4">Data tidak ditemukan.</x-table.cell>
                </x-table.row>
                @endforelse
            </x-table.body>
        </x-table>

        <x-pagination :table="$roles" />
    </x-form-card>
</div>
