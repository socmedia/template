<div>
    <ul class="list-group sidebar">
        <span class="menu-label">Profile</span>
        <li class="list-group-item {{$active != 'overview' ?: 'active'}}">
            <a href="javascript:(0);" wire:click="changeSidebar('overview')">Your Profile</a>
        </li>
    </ul>
    <ul class="list-group sidebar">
        <span class="menu-label">Profile Settings</span>
        <li class="list-group-item {{$active != 'information' ?: 'active'}}">
            <a href="javascript:(0);" wire:click="changeSidebar('information')">
                <i class="bx bx-user-circle font-18 align-middle me-2"></i>
                <div>
                    <p>Information</p>
                    <small>Personal data, Public information</small>
                </div>
            </a>
        </li>
        <li class="list-group-item {{$active != 'account' ?: 'active'}}">
            <a href="javascript:(0);" wire:click="changeSidebar('account')">
                <i class="bx bx-shield font-18 align-middle me-2"></i>
                <div>
                    <p>Account</p>
                    <small>Your account</small>
                </div>
            </a>
        </li>
        <li class="list-group-item {{$active != 'settings' ?: 'active'}}">
            <a href="javascript:(0);" wire:click="changeSidebar('settings')">
                <i class="bx bx-check-shield font-18 align-middle me-2"></i>
                <div>
                    <p>Settings</p>
                    <small>Privacy, Social media</small>
                </div>
            </a>
        </li>
        <li class="list-group-item {{$active != 'preferences' ?: 'active'}}">
            <a href="javascript:(0);" wire:click="changeSidebar('preferences')">
                <i class="bx bx-paint font-18 align-middle me-2"></i>
                <div>
                    <p>Preferences</p>
                    <small>Themes</small>
                </div>
            </a>
        </li>
        <li class="list-group-item {{$active != 'security' ?: 'active'}}">
            <a href="javascript:(0);" wire:click="changeSidebar('security')">
                <i class="bx bx-lock font-18 align-middle me-2"></i>
                <div>
                    <p>Security</p>
                    <small>Change Password, Login info, Remove account</small>
                </div>
            </a>
        </li>
    </ul>
</div>
