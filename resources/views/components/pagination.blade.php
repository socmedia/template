<div class="row">
    <div class="col-md-6 mb-3 align-self-center">
        <div class="d-flex align-items-center">

            @if ($withPerPage)
            <x-dropdown text="{{ $perPage }}"
                additionalClass="text-muted d-flex align-items-center small bg-white border border-muted px-2 py-1 me-2 rounded"
                icon="bx bx-chevron-down" iconSize="" color="text-muted">
                <x-dropdown.item href="javascript:void(0)" wire:click="perPage(10)">10</x-dropdown.item>
                <x-dropdown.item href="javascript:void(0)" wire:click="perPage(25)">25</x-dropdown.item>
                <x-dropdown.item href="javascript:void(0)" wire:click="perPage(50)">50</x-dropdown.item>
                <x-dropdown.item href="javascript:void(0)" wire:click="perPage(100)">100</x-dropdown.item>
                <x-dropdown.item href="javascript:void(0)" wire:click="perPage(500)">500</x-dropdown.item>
            </x-dropdown>
            @endif

            @if (count($table) != 0)
            <small>Showing {{ $startTotal . '-' . $total }} of {{ $table->total() }}</small>
            @endif
        </div>
    </div>
    <div class="col-md-6 mb-3 justify-self-end align-items-center">
        {{ count($table) < 1 ? '' : $table->onEachSide(1)->links('livewire::bootstrap') }}
    </div>
</div>
