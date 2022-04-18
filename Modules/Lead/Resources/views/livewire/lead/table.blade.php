<div>
    @if (session()->has('success'))
    <x-alert state="primary" color="white" title="Sukses !" :message="session('success')" />
    @endif

    @if (session()->has('failed'))
    <x-alert state="warning" color="white" title="Upsss..." :message="session('failed')" />
    @endif

    <h6 class="text-uppercase text-secondary">Semua Leads</h6>
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
                <select name="status" id="status" class="form-select" wire:model.defer="status">
                    <option value="">Semua Status</option>
                    @foreach ($lead_statuses as $status)
                    <option value="{{ $status['slug_name'] }}">
                        {{ $status['name'] }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="list-group-item border-0">
                <select name="is_readed" id="is_readed" class="form-select" wire:model.defer="is_readed">
                    <option value="">Semua Status Keterbacaan</option>
                    <option value="true">Ya</option>
                    <option value="false">Tidak</option>
                </select>
            </div>

        </x-slot>

        <x-slot name="table_body">
            @forelse ($leads as $result)
            <x-table.row>
                <x-table.cell :cell="$result->name" />
                <x-table.cell :cell="$result->email" />
                <x-table.cell :cell="$result->phone" />

                <x-table.cell class="text-center">
                    @if ($result->is_readed)
                    <small class="px-2 py-1 me-1 bg-success text-white rounded-pill cursor-pointer"
                        wire:click="isReaded({{ $result->id }})">Dibaca</small>
                    @else
                    <small class="px-2 py-1 me-1 bg-dark text-white rounded-pill cursor-pointer"
                        wire:click="isReaded({{ $result->id }})">Belum Dibaca</small>
                    @endif
                </x-table.cell>

                <x-table.cell class="text-center">
                    @if ($result->status == 'Belum Diproses')
                    <small class="px-2 py-1 me-1 bg-secondary text-white rounded-pill">
                        {{ $result->status }}
                    </small>
                    @endif
                    @if ($result->status == 'Diproses')
                    <small class="px-2 py-1 me-1 bg-info text-white rounded-pill">
                        {{ $result->status }}
                    </small>
                    @endif
                    @if ($result->status == 'Selesai')
                    <small class="px-2 py-1 me-1 bg-success text-white rounded-pill">
                        {{ $result->status }}
                    </small>
                    @endif
                </x-table.cell>

                <x-table.cell>
                    <div class="btn-group" role="group">
                        <x-action-button wire:click="show('{{$result->id}}')" title="Lihat Lead">
                            <i class="bx bx-show"></i>
                        </x-action-button>
                        {{--
                        <x-remove.button title="Hapus Lead" wire:click="$set('destroyId', '{{$result->id}}')" /> --}}
                    </div>
                </x-table.cell>

            </x-table.row>

            @if ($lead)
            @if ($lead->id == $result->id)
            <x-table.row>
                <x-table.cell colspan="{{ count($headers) - 3 }}">
                    <div class="card shadow-none">
                        <div class="card-body">
                            <ul class="list-group">
                                <li class="list-group-item p-2">
                                    <p class="mb-1"><strong>Alamat:</strong></p>
                                    <p class="mb-0">{{ $result->address }}</p>
                                </li>
                                <li class="list-group-item p-2">
                                    <p class="mb-1"><strong>Pertanyaan:</strong></p>
                                    <p class="mb-0" style=" white-space: initial">
                                        {{ $result->question }}
                                    </p>
                                </li>
                                <li class="list-group-item p-2">
                                    <select name="new_status" id="new_status" class="form-select w-50"
                                        wire:model="new_status">
                                        <option value="">Semua Status</option>
                                        @foreach ($lead_statuses as $status)
                                        <option value="{{ $status['slug_name'] }}">
                                            {{ $status['name'] }}
                                        </option>
                                        @endforeach
                                    </select>
                                </li>
                            </ul>
                        </div>
                    </div>
                </x-table.cell>
            </x-table.row>
            @endif
            @endif

            @empty
            <x-table.row>
                <x-table.cell colspan="{{ count($headers) }}">
                    <p class="text-center">Lead yang anda cari tidak kami temukan.</p>
                </x-table.cell>

            </x-table.row>
            @endforelse
        </x-slot>

        <x-slot name="pagination">
            <x-pagination :table="$leads" />
        </x-slot>

    </x-table.with-filter>

    <x-remove.modal />
</div>
