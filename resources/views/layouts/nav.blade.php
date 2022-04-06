<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{ cache('default_logo_16_9') }}" height="50" alt="logo icon">
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
        </div>
    </div>

    <ul class="metismenu" id="menu">
        <li class="{{ activeRouteIs('adm.index') }}">
            <a href="{{ route('adm.index') }}">
                <div class="parent-icon"><i class='bx bx-home-circle'></i></div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>

        <li class="menu-label">Master</li>
        <li class="{{ activeRouteIs('adm.master.*') }}">
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class="bx bx-data"></i>
                </div>
                <div class="menu-title">Master Data</div>
            </a>
            <ul>
                <li class="{{ activeRouteIs('adm.master.category.*') }}">
                    <a href="{{ route('adm.master.category.index') }}">
                        <i class="bx bx-right-arrow-alt"></i>Kategori
                    </a>
                </li>
                <li class="{{ activeRouteIs('adm.master.sub-category.*') }}">
                    <a href="{{ route('adm.master.sub-category.index') }}">
                        <i class="bx bx-right-arrow-alt"></i>Sub Kategori
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-label">Marketing</li>
        <li class="{{ activeRouteIs('adm.marketing.banner.*') }}">
            <a href="{{ route('adm.marketing.banner.index') }}">
                <div class="parent-icon"><i class='bx bx-image'></i></div>
                <div class="menu-title">Banner</div>
            </a>
        </li>
        <li class="{{ activeRouteIs('adm.marketing.faq.*') }}">
            <a href="{{ route('adm.marketing.faq.index') }}">
                <div class="parent-icon"><i class='bx bx-message-dots'></i></div>
                <div class="menu-title">FAQ</div>
            </a>
        </li>

        <li class="menu-label">Konten</li>
        <li class="{{ activeRouteIs('adm.post.*') }}">
            <a href="{{ route('adm.post.index') }}">
                <div class="parent-icon"><i class='bx bx-news'></i></div>
                <div class="menu-title">Postingan</div>
            </a>
        </li>

        <li class="menu-label">Access Level</li>
        <li class="{{ activeRouteIs('adm.access-level.user.*') }}">
            <a href="{{ route('adm.access-level.user.index') }}">
                <div class="parent-icon"><i class='bx bx-user'></i></div>
                <div class="menu-title">Users</div>
            </a>
        </li>

        @role('Developer')
        <li class="{{ activeRouteIs('adm.access-level.role.*') }}">
            <a href="{{ route('adm.access-level.role.index') }}">
                <div class="parent-icon"><i class='bx bx-shield'></i></div>
                <div class="menu-title">Roles</div>
            </a>
        </li>
        <li class="{{ activeRouteIs('adm.access-level.permission.*') }}">
            <a href="{{ route('adm.access-level.permission.index') }}">
                <div class="parent-icon"><i class='bx bx-shield-quarter'></i></div>
                <div class="menu-title">Permission</div>
            </a>
        </li>
        @endrole
    </ul>
</div>
