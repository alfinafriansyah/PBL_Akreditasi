<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4"
       id="sidenav-main"
       style="background-color: #F5EEDC; height: 100vh; overflow: hidden;">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
           aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="#">
            <img src="{{ asset('argon/assets/img/logo-ct-dark.png') }}" width="26px" height="26px" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold">Akreditasi</span>
        </a>
    </div>

    <hr class="horizontal dark mt-0">

    <div class="collapse navbar-collapse w-auto flex-grow-1" id="sidenav-scrollbar"
         style="overflow-y: auto; padding-bottom: 1rem;">
        <ul class="navbar-nav">

            <!-- Dashboard -->
            <li class="nav-item">
                <a class="nav-link {{ ($activeMenu == 'dashboard') ? 'active' : '' }}"
                   href="{{ route('admin.dashboard') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-tv-2 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>

            <!-- Kelola Akun Pengguna -->
            <li class="nav-item">
                <a class="nav-link {{ ($activeMenu == 'akunpengguna') ? 'active' : '' }}"
                   href="{{ route('admin.akunpengguna') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Kelola Akun Pengguna</span>
                </a>
            </li>

            <!-- Notifikasi -->
            <li class="nav-item">
                <a class="nav-link {{ ($activeMenu == 'datadosen') ? 'active' : '' }}"
                   href="{{ route('admin.datadosen') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-bell-55 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Data Dosen</span>
                </a>
            </li>


            <!-- Logout -->
            <li class="nav-item mt-3">
                <a href="{{ url('/logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                   class="nav-link">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-button-power text-danger text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Logout</span>
                </a>
                <form id="logout-form" action="{{ url('/logout') }}" method="GET" class="d-none">
                    @csrf
                </form>
            </li>

        </ul>
    </div>
</aside>
