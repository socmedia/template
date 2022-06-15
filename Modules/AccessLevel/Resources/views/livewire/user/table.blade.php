<div>
    @if (session()->has('success'))
        <x-alert state="primary" color="white" title="Sukses !" :message="session('success')" />
    @endif

    @if (session()->has('failed'))
        <x-alert state="warning" color="white" title="Upsss..." :message="session('failed')" />
    @endif

    <h6 class="text-uppercase text-secondary">Daftar Users</h6>
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
                <select wire:model.defer="role" class="form-select form-select-sm h-100">
                    <option value="">-- Pilih Role --</option>
                    @foreach ($roles as $role)
                        <option value="{{ strtolower($role->name) }}">{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="list-group-item border-0">
                <select wire:model.defer="email_verified" class="form-select form-select-sm h-100">
                    <option value="">-- Semua Status Akun --</option>
                    <option value="true">Email terverifikasi</option>
                    <option value="false">Email belum terverifikasi</option>
                </select>
            </div>
        </x-slot>

        <x-slot name="table_body">
            @forelse ($users as $user)
                <x-table.row>
                    <x-table.cell :cell="$user->name" />
                    <x-table.cell :cell="$user->email" />
                    <x-table.cell>
                        @if ($user->email_verified_at)
                            <x-badge state="success" icon="bx bx-check">Ya</x-badge>
                        @else
                            <x-badge state="warning" icon="bx bx-info-circle">Belum</x-badge>
                        @endif
                    </x-table.cell>
                    <x-table.cell :cell="$user->roles->first() ? $user->roles->first()->name : '-'" />
                    <x-table.cell :cell="$user->created_at->format('D, d M Y')" />
                    <x-table.cell>
                        <div class="btn-group" role="group">
                            @can('users.edit')
                                <x-action-button href="{{ route('adm.access-level.user.edit', $user->id) }}">
                                    <i class="bx bx-pencil"></i>
                                </x-action-button>
                            @endcan
                            @can('users.delete')
                                <div class="btn-group" role="group">
                                    <button id="dropdown" type="button" class="btn btn-light btn-sm"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bx bx-trash"></i>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdown">

                                        @if ($onlyTrashed)
                                            <li>
                                                <a href="javascript:void(0)" class="dropdown-item"
                                                    wire:click="restore('{{ $user->id }}')">
                                                    Pulihkan
                                                </a>
                                            </li>
                                        @else
                                            <li>
                                                <a href="javascript:void(0)" class="dropdown-item"
                                                    wire:click="trash('{{ $user->id }}')">
                                                    Sampah
                                                </a>
                                            </li>
                                        @endif

                                        <li>
                                            <a href="javascript:void(0)" class="dropdown-item" data-bs-toggle="modal"
                                                data-bs-target="#remove-modal"
                                                wire:click="$set('destroyId','{{ $user->id }}')">
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
                    <x-table.cell class="text-center" colspan="6">Data tidak ditemukan.</x-table.cell>
                </x-table.row>
            @endforelse
        </x-slot>

        <x-slot name="pagination">
            <x-pagination :table="$users" />
        </x-slot>

    </x-table.with-filter>

    <x-remove.modal />
</div>
