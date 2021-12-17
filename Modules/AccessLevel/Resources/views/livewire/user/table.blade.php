<div>
    @if (session()->has('success'))
    <x-alert state="primary" color="white" title="Sukses !" :message="session('success')" />
    @endif

    @if (session()->has('failed'))
    <x-alert state="warning" color="white" title="Upsss..." :message="session('failed')" />
    @endif

    <x-form-card title="Daftar Users">
        <x-filter :filters="$filters" class="justify-content-end">
            <div class="col-md-4 mb-3">
                <input type="text" class="form-control form-control-sm" wire:model.debounce.250ms="search"
                    placeholder="Cari user disini...">
            </div>
            <div class="col-md-2 mb-3">
                <select wire:model="role" class="form-select form-select-sm h-100">
                    <option value="">-- Pilih Role --</option>
                    @foreach ($roles as $role)
                    <option value="{{strtolower($role->name)}}">{{$role->name}}</option>
                    @endforeach
                </select>
            </div>
        </x-filter>

        <x-table class="pb-5">
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
                    <x-table.cell :cell="$user->roles->first()->name" />
                    <x-table.cell :cell="$user->created_at->format('D, d M Y')" />
                    <x-table.cell>
                        <div class="btn-group" role="group">
                            <x-action-button href="{{ route('adm.access-level.user.edit', $user->id) }}">
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
                                            wire:click="restore('{{$user->id}}')">
                                            Pulihkan
                                        </a>
                                    </li>
                                    @else
                                    <li>
                                        <a href="javascript:void(0)" class="dropdown-item"
                                            wire:click="trash('{{$user->id}}')">
                                            Sampah
                                        </a>
                                    </li>
                                    @endif

                                    <li>
                                        <a href="javascript:void(0)" class="dropdown-item" data-bs-toggle="modal"
                                            data-bs-target="#remove-modal"
                                            wire:click="$set('destroyId','{{$user->id}}')">
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
                    <x-table.cell class="text-center" colspan="6">Data tidak ditemukan.</x-table.cell>
                </x-table.row>
                @endforelse
            </x-table.body>
        </x-table>

        <x-remove.modal />

        <x-pagination :table="$users" />
    </x-form-card>
</div>
