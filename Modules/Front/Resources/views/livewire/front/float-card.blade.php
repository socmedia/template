<div>
    <div class="card border-0 main-card">
        <div class="card-header bg-danger text-white px-4 py-3">
            <ul class="d-flex">
                <li class="{{ $tabs['tracking'] ? 'active' : null}}">
                    <a href="javascript:void(0)" wire:click="changeTab('tracking')">Tracking</a>
                </li>
                <li class="{{ $tabs['shipping_rate'] ? 'active' : null}}">
                    <a href="javascript:void(0)" wire:click="changeTab('shipping_rate')">Cek Harga</a>
                </li>
                <li class="{{ $tabs['agents'] ? 'active' : null}}">
                    <a href="javascript:void(0)" wire:click="changeTab('agents')">Agen Rosalia Express</a>
                </li>
            </ul>
        </div>
        <div class="card-body main-card-body" wire:target="changeTab" wire:loading.class="skeleton">

            @if ($tabs['tracking'])
            <livewire:front::float-card.tracking :isHomePage="$isHomePage" />
            @endif

            @if ($tabs['shipping_rate'])
            <livewire:front::float-card.shipping-rate :isHomePage="$isHomePage" />
            @endif

            @if ($tabs['agents'])
            <livewire:front::float-card.agent-location :isHomePage="$isHomePage" />
            @endif

        </div>
    </div>

</div>
