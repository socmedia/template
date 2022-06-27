<div>
    @if (session()->has('success'))
        <x-alert state="primary" color="white" title="Sukses !" :message="session('success')" />
    @endif

    @if (session()->has('failed'))
        <x-alert state="warning" color="white" title="Upsss..." :message="session('failed')" />
    @endif

    <h6 class="text-uppercase text-secondary">Daftar Setting SEO</h6>
    <hr>

    <x-table.with-filter :pagination="true">

        <x-slot name="table_headers">
            @foreach ($headers as $header)
                <x-table.cell cell="{{ $header['cell_name'] }}" isHeader="true" :sortable="$header['sortable']"
                              sortableOrder="{{ $header['column_name'] == $sort ? $order : null }}"
                              wire:click="sort('{{ $header['column_name'] }}')" />
            @endforeach
        </x-slot>

        {{-- <x-slot name="filters">
            <div class="list-group-item border-0">
                <select class="form-control text-capitalize" wire:model.defer="group">
                    <option value="">Semua Group</option>
                    @foreach ($groups as $group)
                        <option class="text-capitalize" value="{{ $group->group }}">
                            {{ Str::title(unslug($group->group)) }}
                        </option>
                    @endforeach
                </select>
            </div>
        </x-slot> --}}

        <x-slot name="table_body">
            @forelse ($settings as $setting)
                <x-table.row>
                    <x-table.cell class="text-uppercase" :cell="$setting->group" />
                    <x-table.cell width="70%">
                        <button class="btn btn-sm btn-link" type="button" data-bs-toggle="collapse"
                                data-bs-target="#seo-{{ $loop->iteration }}" aria-expanded="false"
                                aria-controls="seo-{{ $loop->iteration }}">
                            {{ $setting->alias }}
                        </button>
                        <div class="collapse" id="seo-{{ $loop->iteration }}">
                            @if ($setting->type == 'string')
                                <p class="my-2" style="white-space: normal;">
                                    {{ $setting->value }}</p>
                            @endif

                            @if (!$setting->value)
                                <p class="my-2">-</p>
                            @endif
                        </div>
                    </x-table.cell>
                    <x-table.cell>
                        <div class="btn-group" role="group">
                            <x-action-button href="{{ route('adm.seo.edit', $setting->id) }}">
                                <i class="bx bx-pencil"></i>
                            </x-action-button>
                            {{-- <x-remove.button wire:click="$set('destroyId',{{ $setting->id }})" /> --}}
                        </div>
                    </x-table.cell>
                </x-table.row>

            @empty
                <x-table.row>
                    <x-table.cell class="text-center" colspan="9">Data tidak ditemukan.</x-table.cell>
                </x-table.row>
            @endforelse
        </x-slot>

        <x-slot name="pagination">
            <x-pagination :table="$settings" />
        </x-slot>

    </x-table.with-filter>

    <x-remove.modal />
</div>
