<div>
    @if (session()->has('success'))
    <x-alert state="primary" color="white" title="Sukses !" :message="session('success')" />
    @endif

    @if (session()->has('failed'))
    <x-alert state="warning" color="white" title="Upsss..." :message="session('failed')" />
    @endif

    <h6 class="text-uppercase text-secondary">Daftar Setting</h6>
    <hr>

    <div class="chat-wrapper for-table mb-5" wire:ignore.self>
        <div class="chat-sidebar">
            <div class="chat-sidebar-content">
                <div class="text-uppercase fw-bold px-3 py-4 d-flex justify-content-between align-items-center">
                    <span>filter</span>
                    <div class="chat-toggle-btn text-secondary">
                        <i class="bx bx-x"></i>
                    </div>
                </div>
                <div class="list-group list-group-flush">
                    <form wire:submit.prevent="searchFilters">
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

                        <div class="list-group px-3 mb-2">
                            <button class="btn btn-block btn-secondary py-2" type="submit">
                                <i class="bx bx-search fs-6"></i>
                                Pencarian
                            </button>
                        </div>

                    </form>
                    <div class="list-group px-3">
                        <button class="btn btn-block btn-light text-secondary py-2" type="button"
                            wire:click="resetFilters">
                            <i class="bx bx-reset fs-6"></i>
                            Reset Filter
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="chat-header">
            <div class="row text-end">
                <div class="col-sm-8 col-md-6 ms-auto">
                    <div class="input-group">
                        <div class="input-group-text bg-transparent">
                            <div class="chat-toggle-btn text-secondary">
                                <i class="bx bxs-filter-alt"></i>
                            </div>
                        </div>

                        <input type="text" class="form-control form-control-sm" wire:model.lazy="search"
                            placeholder="Pencarian">
                    </div>
                </div>
            </div>

        </div>

        <div class="chat-content">
            <x-table>
                <x-table.header>
                    <x-table.row>
                        @foreach ($headers as $header)
                        <x-table.cell cell="{{ $header['cell_name'] }}" isHeader="true" :sortable="$header['sortable']"
                            sortableOrder="{{ $header['column_name'] == $sort ? $order : null }}"
                            wire:click="sort('{{ $header['column_name'] }}')" />
                        @endforeach
                    </x-table.row>
                </x-table.header>

                <x-table.body>
                    @forelse ($settings as $setting)
                    <x-table.row>
                        <x-table.cell :cell="$setting->group" />
                        <x-table.cell>
                            <details>
                                <summary>{{$setting->key}}</summary>

                                <div class="card bg-transparent border shadow-none p-2">
                                    @if ($setting->type == 'image' && $setting->value)
                                    <img src="{{ url($setting->value) }}" style="width: fit-content; height: 80px"
                                        alt="">
                                    @endif

                                    @if ($setting->type == 'string')
                                    <p class="my-2" style="max-width: 200px; white-space: break-spaces;">{{
                                        $setting->value }}</p>
                                    @endif

                                    @if (!$setting->value)
                                    <p class="my-2">-</p>
                                    @endif
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


                </x-table.body>
            </x-table>
        </div>

        <div class="chat-footer">
            <x-pagination :table="$settings" />
        </div>

        <!--start chat overlay-->
        <div class="overlay chat-toggle-btn-mobile"></div>
        <!--end chat overlay-->
    </div>


    <x-remove.modal />

</div>
