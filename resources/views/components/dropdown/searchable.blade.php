<div class="dropdown w-100 dropdown-searchable">
    <a class="dropdown-toggle dropdown-toggle-nocaret btn btn-light w-100 d-flex justify-content-between align-items-center"
        href="#" data-bs-toggle="dropdown" aria-expanded="true">
        <span class="text-capitalize">{{ str_replace('-', ' ', str_replace('_', ' ', $text)) }}</span>

        <i class="bx bx-chevron-down font-22 text-option"></i>
    </a>
    <ul class="dropdown-menu" data-popper-placement="bottom-start">

        <li class="p-2">
            <input type="text" class="form-control" placeholder="Cari {{ strtolower($text) }}" autofocus
                id="dropdown-search-input">
        </li>

        <div class="dropdown-result">

            @if ($withNullValue)
            <x-dropdown.searchable.item class="{{ $activeDropdown == null ? 'active' : '' }}"
                wire:click="$set('{{ $prop }}', null)">
                Semua {{ str_replace('-', ' ', str_replace('_', ' ', $prop)) }}
            </x-dropdown.searchable.item>
            @endif

            @if (count($datas) > 0 || $datas)

            @foreach ($datas as $data)
            <x-dropdown.searchable.item class="{{ $activeDropdown == strtolower($data->name) ? 'active' : '' }}"
                wire:click="$set('{{ $prop }}', '{{ slug($data->name) }}')">
                {{ $data ? $data->name : '-' }}
            </x-dropdown.searchable.item>
            @endforeach

            @else
            {{ $slot }}
            @endif
        </div>
    </ul>
</div>
