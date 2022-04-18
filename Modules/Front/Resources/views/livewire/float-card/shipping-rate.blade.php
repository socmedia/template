<div>

    @if (session()->has('failed'))
    <div class="alert alert-warning border-0 bg-warning alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <h6 class="mb-0 text-white">Sayang sekali...</h6>
        <p class="mb-0 text-white"> {{session('failed')}} </p>
    </div>
    @endif

    <h3 class="font-weight-bold mb-0">Cek Harga</h3>
    <p>Isi form dibawah untuk mendapatkan harga layanan.</p>

    <form wire:submit.prevent="getRate">
        @if (!$cities->isEmpty())
        <div class="form-group row">
            <div class="col-md-6 mb-3 mb-md-0">
                <div wire:ignore>
                    <label for="form.from_city">Kota asal</label>
                    <select name="form.from_city" id="form.from_city" class="form-control"
                        data-searchable="form.from_city" style="width: 100%">
                        <option value="">Kota Asal</option>
                        @foreach ($cities as $city)
                        <option value="{{ $city->tlc }}">
                            ({{ $city->tlc }}) {{ $city->nama_kota }}
                        </option>
                        @endforeach
                    </select>
                </div>

                @error('form.from_city')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-md-6">
                <div wire:ignore>
                    <label for="form.from_city">Tujuan pengiriman</label>
                    <select name="form.to_city" id="form.to_city" class="form-control" data-searchable="form.to_city"
                        style="width: 100%">
                        <option value="">Tujuan Pengiriman</option>
                        @foreach ($cities as $city)
                        <option value="{{ $city->tlc }}">({{ $city->tlc }}) {{ $city->nama_kota }}
                        </option>
                        @endforeach
                    </select>
                </div>

                @error('form.to_city')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        @endif

        <div class="form-group row">

            @if (!$services->isEmpty())
            <div class="col-md-6 mb-3 mb-md-0">
                <div wire:ignore>
                    <label for="form.service">Layanan</label>
                    <select name="form.service" id="form.service" class="form-control" data-searchable="form.service"
                        style="width: 100%">
                        <option value="">Pilih Layanan</option>
                        <option value="all">Semua Layanan</option>
                        @foreach ($services as $service)
                        <option value="{{ $service->kode_service }}">
                            {{ title($service->jenis_service) }}
                        </option>
                        @endforeach
                    </select>
                </div>

                @error('form.service')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            @endif

            @if (!$packages->isEmpty())
            <div class="col-md-6">
                <div wire:ignore>
                    <label for="form.package">Jenis Paket</label>
                    <select name="form.package" id="form.package" class="form-control" data-searchable="form.package"
                        style="width: 100%">
                        <option value="">Jenis Paket</option>
                        @foreach ($packages as $package)
                        <option value="{{ $package->kode_paket }}">
                            {{ title($package->jenis_paket) }}
                        </option>
                        @endforeach
                    </select>
                </div>

                @error('form.package')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            @endif
        </div>

        <div class="form-group row">
            <div class="col-6 col-md-3 mb-3 mb-md-0">
                <label for="form.weight">Berat (Kg)</label>
                <input type="text" class="form-control" wire:model.defer="form.weight">

                @error('form.weight')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-6 col-md-3 mb-3 mb-md-0">
                <label for="form.length">Panjang (Cm)</label>
                <input type="text" class="form-control" wire:model.defer="form.length">

                @error('form.length')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-6 col-md-3 mb-3 mb-md-0">
                <label for="form.width">Lebar (Cm)</label>
                <input type="text" class="form-control" wire:model.defer="form.width">

                @error('form.width')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-6 col-md-3">
                <label for="form.height">Tinggi (Cm)</label>
                <input type="text" class="form-control" wire:model.defer="form.height">

                @error('form.height')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>

        <div class="form-group text-right">
            <button class="btn btn-danger">
                <i class="bx bx-search"></i>
                Periksa Harga
                <div class="spinner-wrapper" wire:target="getRate" wire:loading>
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                </div>
            </button>
        </div>
    </form>


    @if ($isHomePage)
    {{-- Modal --}}
    <div class="modal fade" id="result" tabindex="-1" role="dialog" aria-labelledby="resultTitle" aria-hidden="true"
        data-keyboard="false" data-backdrop="static" wire:ignore.self>
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Hasil Pencarian</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                        wire:click="resetRateResult">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pb-5">
                    @if (!$rateResult->isEmpty())

                    @if (count($rateResult) == 2)
                    <div class="row mb-3">
                        <div class="col">
                            <small class="text-muted">Pengiriman Dari</small>
                            <p class="mb-0 small">{{ $rateResult['form']->from_city }}</p>
                        </div>
                        <div class="col-2 text-center d-flex align-items-center">
                            <h5 class="mb-0"><i class='bx bx-right-arrow-alt d-flex'></i></h5>
                        </div>
                        <div class="col">
                            <small class="text-muted">Tujuan Pengiriman</small>
                            <p class="mb-0 small">{{ $rateResult['form']->to_city }}</p>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <tbody>
                                <tr class="fs-12">
                                    <td class="p-1 font-weight-bold" style="width: 100px">Layanan</td>
                                    <td class="p-1">{{ $rateResult['form']->service }}</td>
                                </tr>
                                <tr class="fs-12">
                                    <td class="p-1 font-weight-bold" style="width: 100px">Jenis Paket</td>
                                    <td class="p-1">{{ $rateResult['form']->package }}</td>
                                </tr>
                                <tr class="fs-12">
                                    <td class="p-1 font-weight-bold" style="width: 100px">Berat</td>
                                    <td class="p-1">{{ $rateResult['form']->weight }}</td>
                                </tr>
                                <tr class="fs-12">
                                    <td class="p-1 font-weight-bold" style="width: 100px">PxLxT</td>
                                    <td class="p-1">{{ $rateResult['form']->length . ' x '. $rateResult['form']->width .
                                        ' x '. $rateResult['form']->height }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    @if (!$rateResult['results']->isEmpty())
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead class="font-weight-bold">
                                <tr>
                                    <td class="py-2 px-3">Layanan</td>
                                    <td class="py-2 px-3">Keterangan</td>
                                    <td class="py-2 px-3">Harga</td>
                                    <td class="py-2 px-3">Estimasi</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rateResult['results'] as $result)

                                @php
                                $find = $services->where('kode_service', $result->kode_service)->first();
                                $service = $find ? $find->jenis_service : null;
                                @endphp

                                @if ($service)
                                <tr>
                                    <td class="py-2 px-3">{{ title($service) }}</td>
                                    <td class="py-2 px-3">
                                        <p class="mb-0">
                                            @if ($service == 'ARJUNA')
                                            Antar Sampai Tujuan Anda
                                            @elseif ($service == 'KRESNA')
                                            Kirim Reguler Ambil Agen
                                            @elseif ($service == 'BIMA')
                                            Besok Sampai Ambil Agen
                                            @else
                                            -
                                            @endif
                                        </p>
                                    </td>
                                    <td class="py-2 px-3">
                                        Rp. {{ number($result->calculated_price, 2) }}
                                    </td>
                                    <td class="py-2 px-3">
                                        <p class="mb-0">
                                            @if ($service == 'ARJUNA')

                                            @if (
                                            (Str::contains($result->zona_asal, 'T') || Str::contains($result->zona_asal,
                                            'B'))
                                            &&
                                            (Str::contains($result->zona_tujuan, 'T') ||
                                            Str::contains($result->zona_tujuan,
                                            'B'))
                                            )
                                            4-5 Hari

                                            @elseif (
                                            (Str::contains($result->zona_asal, 'T') || Str::contains($result->zona_asal,
                                            'S'))
                                            &&
                                            (Str::contains($result->zona_tujuan, 'T') ||
                                            Str::contains($result->zona_tujuan,
                                            'S'))
                                            )
                                            6-7 Hari

                                            @elseif (
                                            (Str::contains($result->zona_asal, 'B') || Str::contains($result->zona_asal,
                                            'S'))
                                            &&
                                            (Str::contains($result->zona_tujuan, 'B') ||
                                            Str::contains($result->zona_tujuan,
                                            'S'))
                                            )
                                            5-6 Hari
                                            @endif

                                            @elseif ($service == 'KRESNA')

                                            @if (
                                            (Str::contains($result->zona_asal, 'T') || Str::contains($result->zona_asal,
                                            'B'))
                                            &&
                                            (Str::contains($result->zona_tujuan, 'T') ||
                                            Str::contains($result->zona_tujuan,
                                            'B'))
                                            )
                                            3-4 Hari

                                            @elseif (
                                            (Str::contains($result->zona_asal, 'T') || Str::contains($result->zona_asal,
                                            'S'))
                                            &&
                                            (Str::contains($result->zona_tujuan, 'T') ||
                                            Str::contains($result->zona_tujuan,
                                            'S'))
                                            )
                                            5-6 Hari

                                            @elseif (
                                            (Str::contains($result->zona_asal, 'B') || Str::contains($result->zona_asal,
                                            'S'))
                                            &&
                                            (Str::contains($result->zona_tujuan, 'B') ||
                                            Str::contains($result->zona_tujuan,
                                            'S'))
                                            )
                                            4-5 Hari
                                            @endif

                                            @elseif ($service == 'BIMA')
                                            1 hari
                                            @else
                                            -
                                            @endif
                                        </p>
                                    </td>
                                </tr>
                                @endif

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif

                    @endif

                    @endif
                </div>
            </div>
        </div>
    </div>

    <script>
        $('[data-searchable]').on('select2:select', function (e) {
            const val = $(this).val();
            const prop = $(this).data('searchable');
            @this.emit('updatedDropdown', {
                component: prop,
                value: val
            })
        })
        document.addEventListener('show-modal', function() {
            $('#result').modal('show')
        })
    </script>
    @else

    @if (!$rateResult->isEmpty())
    <hr>

    <div class="row">
        <div class="col-12">
            <div class="p-3 bg-light rounded-lg">
                <h6 class="mb-0">Hasil Pencarian.</h6>
            </div>

            @if (count($rateResult) == 2)
            <div class="row mb-3 mt-4 mb-3">
                <div class="col">
                    <small class="text-muted">Pengiriman Dari</small>
                    <p class="mb-0 small">{{ $rateResult['form']->from_city }}</p>
                </div>
                <div class="col-2 text-center d-flex align-items-center">
                    <h5 class="mb-0"><i class='bx bx-right-arrow-alt d-flex'></i></h5>
                </div>
                <div class="col">
                    <small class="text-muted">Tujuan Pengiriman</small>
                    <p class="mb-0 small">{{ $rateResult['form']->to_city }}</p>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-borderless">
                    <tbody>
                        <tr class="fs-12">
                            <td class="p-1 font-weight-bold" style="width: 100px">Layanan</td>
                            <td class="p-1">{{ $rateResult['form']->service }}</td>
                        </tr>
                        <tr class="fs-12">
                            <td class="p-1 font-weight-bold" style="width: 100px">Jenis Paket</td>
                            <td class="p-1">{{ $rateResult['form']->package }}</td>
                        </tr>
                        <tr class="fs-12">
                            <td class="p-1 font-weight-bold" style="width: 100px">Berat</td>
                            <td class="p-1">{{ $rateResult['form']->weight }}</td>
                        </tr>
                        <tr class="fs-12">
                            <td class="p-1 font-weight-bold" style="width: 100px">PxLxT</td>
                            <td class="p-1">{{ $rateResult['form']->length . ' x '. $rateResult['form']->width .
                                ' x '. $rateResult['form']->height }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            @if (!$rateResult['results']->isEmpty())
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead class="font-weight-bold">
                        <tr>
                            <td class="py-2 px-3">Layanan</td>
                            <td class="py-2 px-3">Keterangan</td>
                            <td class="py-2 px-3">Harga</td>
                            <td class="py-2 px-3">Estimasi</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rateResult['results'] as $result)

                        @php
                        $find = $services->where('kode_service', $result->kode_service)->first();
                        $service = $find ? $find->jenis_service : null;
                        @endphp

                        @if ($service)
                        <tr>
                            <td class="py-2 px-3">{{ title($service) }}</td>
                            <td class="py-2 px-3">
                                <p class="mb-0">
                                    @if ($service == 'ARJUNA')
                                    Antar Sampai Tujuan Anda
                                    @elseif ($service == 'KRESNA')
                                    Kirim Reguler Ambil Agen
                                    @elseif ($service == 'BIMA')
                                    Besok Sampai Ambil Agen
                                    @else
                                    -
                                    @endif
                                </p>
                            </td>
                            <td class="py-2 px-3">
                                Rp. {{ number($result->calculated_price, 2) }}
                            </td>
                            <td class="py-2 px-3">
                                <p class="mb-0">
                                    @if ($service == 'ARJUNA')

                                    @if (
                                    (Str::contains($result->zona_asal, 'T') || Str::contains($result->zona_asal, 'B'))
                                    &&
                                    (Str::contains($result->zona_tujuan, 'T') || Str::contains($result->zona_tujuan,
                                    'B'))
                                    )
                                    4-5 Hari

                                    @elseif (
                                    (Str::contains($result->zona_asal, 'T') || Str::contains($result->zona_asal, 'S'))
                                    &&
                                    (Str::contains($result->zona_tujuan, 'T') || Str::contains($result->zona_tujuan,
                                    'S'))
                                    )
                                    6-7 Hari

                                    @elseif (
                                    (Str::contains($result->zona_asal, 'B') || Str::contains($result->zona_asal, 'S'))
                                    &&
                                    (Str::contains($result->zona_tujuan, 'B') || Str::contains($result->zona_tujuan,
                                    'S'))
                                    )
                                    5-6 Hari
                                    @endif

                                    @elseif ($service == 'KRESNA')

                                    @if (
                                    (Str::contains($result->zona_asal, 'T') || Str::contains($result->zona_asal, 'B'))
                                    &&
                                    (Str::contains($result->zona_tujuan, 'T') || Str::contains($result->zona_tujuan,
                                    'B'))
                                    )
                                    3-4 Hari

                                    @elseif (
                                    (Str::contains($result->zona_asal, 'T') || Str::contains($result->zona_asal, 'S'))
                                    &&
                                    (Str::contains($result->zona_tujuan, 'T') || Str::contains($result->zona_tujuan,
                                    'S'))
                                    )
                                    5-6 Hari

                                    @elseif (
                                    (Str::contains($result->zona_asal, 'B') || Str::contains($result->zona_asal, 'S'))
                                    &&
                                    (Str::contains($result->zona_tujuan, 'B') || Str::contains($result->zona_tujuan,
                                    'S'))
                                    )
                                    4-5 Hari
                                    @endif

                                    @elseif ($service == 'BIMA')
                                    1 hari
                                    @else
                                    -
                                    @endif
                                </p>
                            </td>
                        </tr>
                        @endif

                        @endforeach
                    </tbody>
                </table>
            </div>
            @endif

            @endif

        </div>
    </div>
    @endif

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            $('[data-searchable]').on('select2:select', function (e) {
                const val = $(this).val();
                const prop = $(this).data('searchable');
                @this.emit('updatedDropdown', {
                    component: prop,
                    value: val
                })
            })
            document.addEventListener('show-modal', function() {
                $('#result').modal('show')
            })
        })
    </script>
    @endif
</div>
