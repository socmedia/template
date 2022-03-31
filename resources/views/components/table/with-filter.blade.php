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
                    {{ $filters }}

                    @if (!array_key_exists('reset_filters', $disabled))
                    <div class="list-group px-3 mb-2">
                        <x-button state="dark" loadingState="true" wireTarget="searchFilters">
                            <x-slot name="text">
                                <i class="bx bx-search fs-6"></i>
                                Pencarian
                            </x-slot>
                        </x-button>
                    </div>
                    @endif

                </form>

                @if (!array_key_exists('reset_filters', $disabled))
                <div class="list-group px-3">
                    <button class="btn btn-block btn-light text-secondary py-2" type="button" wire:click="resetFilters">
                        <i class="bx bx-reset fs-6"></i>
                        Reset Filter
                    </button>
                </div>
                @endif

            </div>
        </div>
    </div>
    <div class="chat-header">

        @if (!array_key_exists('search', $disabled))
        <div class="row text-end">
            <div class="col-sm-8 col-md-6 col-lg-4 ms-auto">
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
        @endif

    </div>

    <div class="chat-content">
        <x-table>
            <x-table.header>
                <x-table.row>
                    {{ $table_headers }}
                </x-table.row>
            </x-table.header>

            <x-table.body>
                {{ $table_body }}
            </x-table.body>
        </x-table>
    </div>

    @if ($pagination)
    <div class="chat-footer">
        {{ $pagination }}
    </div>
    @endif

    <!--start chat overlay-->
    <div class="overlay chat-toggle-btn-mobile"></div>
    <!--end chat overlay-->
</div>
