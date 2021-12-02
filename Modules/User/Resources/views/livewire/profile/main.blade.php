<div class="main-body">
    <hr>

    <div class="card bg-transparent shadow-none">
        <div class="card-body bg-transparent">
            <div class="row">
                <div class="col-md-3 mb-3 mb-md-0">
                    <livewire:user::profile.child.sidebar :active="$sub" />
                </div>
                <div class="col-md-8 align-self-stretch ">

                    @if ($sub === 'overview')
                    <livewire:user::profile.child.overview />
                    @endif

                    @if ($sub === 'information')
                    <livewire:user::profile.child.information />
                    @endif

                    @if ($sub === 'account')
                    <livewire:user::profile.child.account />
                    @endif

                    @if ($sub === 'settings')
                    <livewire:user::profile.child.setting />
                    @endif

                    @if ($sub === 'preferences')
                    <livewire:user::profile.child.preference />
                    @endif

                    @if ($sub === 'security')
                    <livewire:user::profile.child.security />
                    @endif
                </div>
            </div>

        </div>
    </div>
</div>
