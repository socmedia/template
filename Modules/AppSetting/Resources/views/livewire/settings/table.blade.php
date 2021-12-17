<div>
    @if (session()->has('success'))
    <x-alert state="primary" color="white" title="Sukses !" :message="session('success')" />
    @endif

    @if (session()->has('failed'))
    <x-alert state="warning" color="white" title="Upsss..." :message="session('failed')" />
    @endif

    <x-form-card title="Pengaturan Halaman">
        <div class="row">
            <div class="col mb-3 mb-md-0">
                <ul class="list-group" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    @foreach ($groups as $group)
                    <li class="list-group-item {{ $activeTabs != $group ?: 'bg-secondary' }}">
                        <button
                            class="btn btn-default btn-block shadow-none {{ $activeTabs != $group ?: 'text-white' }}"
                            id="v-pills-{{ $group }}-tab" data-bs-toggle="pill" data-bs-target="#v-pills-{{ $group }}"
                            type="button" role="tab" aria-controls="v-pills-{{ $group }}" aria-selected="true"
                            wire:click="$set('activeTabs', '{{$group}}')">
                            <span class="text-capitalize">{{ str_replace('_', ' ', $group) }}</span>
                        </button>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-8">
                <div class="tab-content" id="v-pills-tabContent">

                    @foreach ($groups as $group)
                    <div class="tab-pane fade {{ $activeTabs == $group ? 'show active' : '' }}"
                        id="v-pills-{{ $group }}" role="tabpanel" aria-labelledby="v-pills-{{ $group }}-tab">

                        @foreach ($settingsByGroup as $index => $settings)

                        @if($index == $group)
                        @foreach ($settings as $settingIndex => $setting)

                        @if ($setting['type'] == 'image')
                        <form
                            wire:submit.prevent="update('{{$setting['id']}}', 'settingsByGroup.{{ $index }}.{{ $settingIndex }}.value', 'images.{{ $index }}.{{ $settingIndex }}.value')">
                            @endif

                            @if ($setting['type'] == 'image')
                            <figure>
                                <img src="{{$setting['value']}}" height="60px" />
                            </figure>
                            @endif

                            <div class="form-group">

                                <label for="{{ $setting['key'] }}" class="text-capitalize">{{ str_replace('_', ' ',
                                    $setting['key']) }}</label>
                                <div class="input-group">

                                    @if ($setting['type'] == 'string')
                                    <input type="text" class="form-control" id="{{ $setting['key'] }}"
                                        wire:model.defer="settingsByGroup.{{ $index }}.{{ $settingIndex }}.value">

                                    @elseif ($setting['type'] == 'image')
                                    <input type="file" accept="image/*" class="form-control" id="{{ $setting['key'] }}"
                                        wire:model="images.{{ $index }}.{{ $settingIndex }}.value">
                                    @endif

                                    <div class="input-group-prepend">
                                        <button class="btn btn-dark"><i class="bx bx-check"></i></button>
                                    </div>

                                </div>

                                @error('images.'. $index .'.'. $settingIndex .'.value')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror

                                <small class="text-muted" wire:loading
                                    wire:target="images.{{ $index }}.{{ $settingIndex }}.value">
                                    <em>Uploading..</em>
                                </small>
                            </div>
                        </form>
                        @endforeach
                        @endif

                        @endforeach

                    </div>
                    @endforeach

                </div>
            </div>
        </div>

        {{-- @dump(cache()->get('app_settings')) --}}
    </x-form-card>
</div>
