<div>
    <div class="row">
        <div class="col-md-3 mb-3 mb-md-0">
            <ul class="list-group sidebar">
                <li class="list-group-item d-flex">
                    <i class="bx bx-paint font-18 align-middle me-2"></i>
                    <div>
                        <p>Tema Dashboard</p>
                        <small>Pilih tema sesuai keinginan anda.</small>
                    </div>
                </li>
            </ul>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body p-4">

                    <div class="switcher-body">
                        <h6 class="mb-3">Theme Styles</h6>

                        <div class="row ps-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="theme" id="t-lightmode"
                                    wire:click="changeTheme('light-theme')" {{ $preferences['theme']=='light-theme'
                                    ? 'checked' : '' }}>
                                <label class="form-check-label" for="t-lightmode">Light</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="theme" id="t-darkmode"
                                    wire:click="changeTheme('dark-theme')" {{ $preferences['theme']=='dark-theme'
                                    ? 'checked' : '' }}>
                                <label class="form-check-label" for="t-darkmode">Dark</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="theme" id="t-semidark"
                                    wire:click="changeTheme('semi-dark')" {{ $preferences['theme']=='semi-dark'
                                    ? 'checked' : '' }}>
                                <label class="form-check-label" for="t-semidark">Semi Dark</label>
                            </div>
                        </div>

                        <hr>
                        <h6 class="mb-3">Header Colors</h6>
                        <div class="header-colors-indigators">
                            <div class="row row-cols-auto g-3">
                                <div class="col">
                                    <div class="indigator {{ str_contains($preferences['header'], 'headercolor1') ? 'active' : '' }} headercolor1"
                                        id="headercolor1" wire:click="changeHeader('headercolor1')"></div>
                                </div>
                                <div class="col">
                                    <div class="indigator {{ str_contains($preferences['header'], 'headercolor2') ? 'active' : '' }} headercolor2"
                                        id="headercolor2" wire:click="changeHeader('headercolor2')"></div>
                                </div>
                                <div class="col">
                                    <div class="indigator {{ str_contains($preferences['header'], 'headercolor3') ? 'active' : '' }} headercolor3"
                                        id="headercolor3" wire:click="changeHeader('headercolor3')"></div>
                                </div>
                                <div class="col">
                                    <div class="indigator {{ str_contains($preferences['header'], 'headercolor4') ? 'active' : '' }} headercolor4"
                                        id="headercolor4" wire:click="changeHeader('headercolor4')"></div>
                                </div>
                                <div class="col">
                                    <div class="indigator {{ str_contains($preferences['header'], 'headercolor5') ? 'active' : '' }} headercolor5"
                                        id="headercolor5" wire:click="changeHeader('headercolor5')"></div>
                                </div>
                                <div class="col">
                                    <div class="indigator {{ str_contains($preferences['header'], 'headercolor6') ? 'active' : '' }} headercolor6"
                                        id="headercolor6" wire:click="changeHeader('headercolor6')"></div>
                                </div>
                                <div class="col">
                                    <div class="indigator {{ str_contains($preferences['header'], 'headercolor7') ? 'active' : '' }} headercolor7"
                                        id="headercolor7" wire:click="changeHeader('headercolor7')"></div>
                                </div>
                                <div class="col">
                                    <div class="indigator {{ str_contains($preferences['header'], 'headercolor8') ? 'active' : '' }} headercolor8"
                                        id="headercolor8" wire:click="changeHeader('headercolor8')"></div>
                                </div>
                                <div class="col">
                                    <div class="indigator reset {{ !$preferences['header'] ? 'active' : '' }}"
                                        title="Reset" wire:click="changeHeader(null)"></div>
                                </div>
                            </div>
                        </div>

                        <hr>
                        <h6 class="mb-3">Sidebar Colors</h6>
                        <div class="header-colors-indigators">
                            <div class="row row-cols-auto g-3">
                                <div class="col">
                                    <div class="indigator {{ str_contains($preferences['sidebar'], 'sidebarcolor1') ? 'active' : '' }} sidebarcolor1"
                                        id="sidebarcolor1" wire:click="changeSidebar('sidebarcolor1')"></div>
                                </div>
                                <div class="col">
                                    <div class="indigator {{ str_contains($preferences['sidebar'], 'sidebarcolor2') ? 'active' : '' }} sidebarcolor2"
                                        id="sidebarcolor2" wire:click="changeSidebar('sidebarcolor2')"></div>
                                </div>
                                <div class="col">
                                    <div class="indigator {{ str_contains($preferences['sidebar'], 'sidebarcolor3') ? 'active' : '' }} sidebarcolor3"
                                        id="sidebarcolor3" wire:click="changeSidebar('sidebarcolor3')"></div>
                                </div>
                                <div class="col">
                                    <div class="indigator {{ str_contains($preferences['sidebar'], 'sidebarcolor4') ? 'active' : '' }} sidebarcolor4"
                                        id="sidebarcolor4" wire:click="changeSidebar('sidebarcolor4')"></div>
                                </div>
                                <div class="col">
                                    <div class="indigator {{ str_contains($preferences['sidebar'], 'sidebarcolor5') ? 'active' : '' }} sidebarcolor5"
                                        id="sidebarcolor5" wire:click="changeSidebar('sidebarcolor5')"></div>
                                </div>
                                <div class="col">
                                    <div class="indigator {{ str_contains($preferences['sidebar'], 'sidebarcolor6') ? 'active' : '' }} sidebarcolor6"
                                        id="sidebarcolor6" wire:click="changeSidebar('sidebarcolor6')"></div>
                                </div>
                                <div class="col">
                                    <div class="indigator {{ str_contains($preferences['sidebar'], 'sidebarcolor7') ? 'active' : '' }} sidebarcolor7"
                                        id="sidebarcolor7" wire:click="changeSidebar('sidebarcolor7')"></div>
                                </div>
                                <div class="col">
                                    <div class="indigator {{ str_contains($preferences['sidebar'], 'sidebarcolor8') ? 'active' : '' }} sidebarcolor8"
                                        id="sidebarcolor8" wire:click="changeSidebar('sidebarcolor8')"></div>
                                </div>
                                <div class="col">
                                    <div class="indigator reset {{ !$preferences['sidebar'] ? 'active' : '' }}"
                                        title="Reset" wire:click="changeSidebar(null)"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
