<div class="row">
    <div class="col-md-6 mb-3 align-self-center">

        @if (count($table) != 0)
        <p class="m-0">Showing {{ $table->count() }} of {{ $table->total() }}</p>
        @endif
    </div>
    <div class="col-md-6 mb-3 justify-self-end">
        {{ count($table) < 1 ? '' : $table->onEachSide(1)->links('livewire::bootstrap') }}
    </div>
</div>
