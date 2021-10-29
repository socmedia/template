<div class="main-body">
    <hr>

    <div class="card bg-transparent shadow-none">
        <div class="card-body bg-transparent">
            <div class="row">
                <div class="col-md-3 mb-3 mb-md-0">
                    <livewire:user::profile.sidebar :active="$active" />
                </div>
                <div class="col align-self-stretch ">

                    @if ($active === 'overview')
                    <livewire:user::profile.overview />
                    @endif

                    @if ($active === 'information')
                    <livewire:user::profile.information />
                    @endif

                    @if ($active === 'account')
                    <livewire:user::profile.account />
                    @endif

                    @if ($active === 'settings')
                    <livewire:user::profile.setting />
                    @endif

                    @if ($active === 'preferences')
                    <livewire:user::profile.preference />
                    @endif

                    @if ($active === 'security')
                    <livewire:user::profile.security />
                    @endif
                </div>
            </div>

        </div>
    </div>
</div>
