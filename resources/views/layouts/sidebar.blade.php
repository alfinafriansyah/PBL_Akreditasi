<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-1 fixed-start ms-2"
       id="sidenav-main"
       style="background-color: #F5EEDC; height: 100vh; width: 250px; position: fixed; top: 0; left: 0; z-index: 1000;">
    <!-- Header -->
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
           aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="#">
            <img src="{{ asset('argon/assets/img/logo-ct-dark.png') }}" width="26px" height="26px"
                 class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold">Akreditasi</span>
        </a>
    </div>

    <hr class="horizontal dark mt-0 mb-2">

    <!-- Body Scrollable -->
    <div class="flex-grow-1 overflow-auto" id="sidenav-scrollbar" style="padding-bottom: 1rem;">
        <ul class="navbar-nav">

            <!-- Dashboard -->
            <li class="nav-item">
                <a class="nav-link {{ ($activeMenu == 'dashboard') ? 'active' : '' }}" href="{{ url('/dashboard') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-1 d-flex align-items-center justify-content-center">
                        <i class="ni ni-tv-2 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>



            <!-- Dropdown Kriteria -->
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center {{ Str::startsWith($activeMenu, 'kriteria') ? '' : 'collapsed' }}"
                   data-bs-toggle="collapse"
                   href="#submenuKriteria"
                   role="button"
                   aria-expanded="{{ Str::startsWith($activeMenu, 'kriteria') ? 'true' : 'false' }}"
                   aria-controls="submenuKriteria">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-calendar-grid-50 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text">Kriteria</span>

                </a>
                <div class="collapse {{ Str::startsWith($activeMenu, 'kriteria') ? 'show' : '' }}" id="submenuKriteria">
                    <ul class="nav flex-column ms-4 ps-2">
                        @for ($i = 1; $i <= 9; $i++)
                            <li class="nav-item">
                                <a class="nav-link {{ ($activeMenu == 'kriteria'.$i) ? 'active' : '' }}" href="{{ url('/kriteria'.$i) }}">
                                    Kriteria {{ $i }}
                                </a>
                            </li>
                        @endfor
                    </ul>
                </div>
            </li>

            <!-- Notifikasi -->
            <li class="nav-item">
                <a class="nav-link {{ ($activeMenu == 'notifikasi') ? 'active' : '' }}" href="{{ url('/notifikasi') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-1 d-flex align-items-center justify-content-center">
                        <i class="ni ni-bell-55 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Evaluasi</span>
                </a>
            </li>
        </ul>
    </div>

    <!-- Logout Tetap di Bawah -->
    <div class="border-top p-3">
        <a href="{{ url('/logout') }}"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
           class="nav-link text-secondary">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="ni ni-button-power text-secondary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Logout</span>
        </a>
        <form id="logout-form" action="{{ url('/logout') }}" method="GET" class="d-none">
            @csrf
        </form>
    </div>
</aside>
