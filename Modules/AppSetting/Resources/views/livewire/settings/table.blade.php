<div>
    @if (session()->has('success'))
    <x-alert state="primary" color="white" title="Sukses !" :message="session('success')" />
    @endif

    @if (session()->has('failed'))
    <x-alert state="warning" color="white" title="Upsss..." :message="session('failed')" />
    @endif

    <h6 class="text-uppercase text-secondary">Daftar Setting</h6>
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
                <select class="form-control text-capitalize" wire:model.defer="group">
                    <option value="">Semua Group</option>
                    @foreach ($groups as $group)
                    <option class="text-capitalize" value="{{ $group->group }}">
                        {{ Str::title(unslug($group->group)) }}
                    </option>
                    @endforeach
                </select>
            </div>
        </x-slot>

        <x-slot name="table_body">
            @forelse ($settings as $setting)
            <x-table.row>
                <x-table.cell :cell="$setting->group" />
                <x-table.cell>
                    <details>
                        <summary>{{$setting->key}}</summary>

                        <div class="card bg-transparent border shadow-none">
                            <div class="card-body">
                                @if ($setting->type == 'image' && $setting->value)
                                <img src="{{ url($setting->value) }}" style="height: 80px" alt="">
                                @endif

                                @if ($setting->type == 'string')
                                <p>
                                <p class=" my-2" style="max-width: 200px; white-space: break-spaces;">
                                    {!!$setting->value !!}
                                </p>
                                </p>
                                @endif

                                @if (!$setting->value)
                                <p class="my-2">-</p>
                                @endif
                            </div>
                        </div>
                    </details>
                </x-table.cell>
                <x-table.cell :cell="$setting->type" />
                <x-table.cell :cell="$setting->form_type" />
                <x-table.cell>
                    <div class="btn-group" role="group">
                        <x-action-button href="{{ route('adm.settings.edit', $setting->id) }}">
                            <i class="bx bx-pencil"></i>
                        </x-action-button>
                        <x-remove.button wire:click="$set('destroyId',{{$setting->id}})" />
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
