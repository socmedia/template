@php
use App\Constants\AdminAvaMenus;
@endphp

<!--start header -->
<header>
    <div class="topbar d-flex align-items-center">
        <nav class="navbar navbar-expand">
            <div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
            </div>
            <div class="user-box dropdown ms-auto">
                <a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#"
                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="avatar sm d-flex justify-content-center mx-auto">
                        <img src="{{ user('avatar_url') }}">
                    </div>
                    <div class="user-info ps-3">
                        <p class="user-name mb-0">{{ user('name') }}</p>
                        <p class="designattion mb-0">{{ user()->getRoleNames()->first() }}</p>
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    @foreach (AdminAvaMenus::getAll() as $menu)

                    @if ($menu['visible'])
                    @role($menu['role'])
                    <li>
                        <a class="dropdown-item" href="{{ $menu['path'] }}">
                            <i class="{{ $menu['icon'] }}"></i><span>{{ $menu['display_name'] }}</span>
                        </a>
                    </li>
                    @endrole
                    @endif

                    @endforeach
                    <li>
                        <div class="dropdown-divider mb-0"></div>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class='bx bx-log-out-circle'></i><span>Logout</span></a>
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>
<!--end header -->
