@php
    use App\Models\KriteriaModel;

    $roleKode = Auth::user()->role->role_kode ?? '';
    $kriteria_id = Auth::user()->role->role_id ?? '';
    $kriteria = KriteriaModel::where('kriteria_id', $kriteria_id)->first();
@endphp
<!-- Sidebar -->
<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4"
       id="sidenav-main"
       style="background-color: #F5EEDC; {{--height: 100vh; width: 180px; position: fixed; top: 0; left: 0; z-index: 1000;--}}">
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
            @if (Str::startsWith($roleKode, 'KRT'))
                <li class="nav-item">
                    <a class="nav-link {{ $activeMenu == 'dashboard_kriteria' ? 'active' : '' }}"
                        href="{{ url('/kriteria/dashboard') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-1 d-flex align-items-center justify-content-center">
                            <i class="ni ni-tv-2 text-dark text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Dashboard</span>
                    </a>
                </li>
            @elseif($roleKode == 'KOOR')
                <li class="nav-item">
                    <a class="nav-link {{ $activeMenu == 'dashboard_koordinator' ? 'active' : '' }}"
                        href="{{ url('/koordinator/dashboard') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-1 d-flex align-items-center justify-content-center">
                            <i class="ni ni-tv-2 text-dark text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Dashboard</span>
                    </a>
                </li>
            @elseif($roleKode == 'KPSKAJUR')
                <li class="nav-item">
                    <a class="nav-link {{ $activeMenu == 'dashboard_kpskajur' ? 'active' : '' }}"
                        href="{{ url('/kpskajur/dashboard') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-1 d-flex align-items-center justify-content-center">
                            <i class="ni ni-tv-2 text-dark text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Dashboard</span>
                    </a>
                </li>
            @elseif($roleKode == 'KJM')
                <li class="nav-item">
                    <a class="nav-link {{ ($activeMenu == 'dashboard_kjm') ? 'active' : '' }}" href="{{ url('/kjm/dashboard') }}">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-1 d-flex align-items-center justify-content-center">
                            <i class="ni ni-tv-2 text-dark text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Dashboard</span>
                    </a>
                </li>
            @elseif($roleKode == 'DIR')
                <li class="nav-item">
                    <a class="nav-link {{ $activeMenu == 'dashboard_direktur' ? 'active' : '' }}"
                        href="{{ url('/direktur/dashboard') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-1 d-flex align-items-center justify-content-center">
                            <i class="ni ni-tv-2 text-dark text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Dashboard</span>
                    </a>
                </li>
            @else
            @endif

            <!-- Daftar Kriteria -->
            @if(Str::startsWith($roleKode, 'KRT'))
                @for ($i = 1; $i <= 9; $i++)
                    @if($roleKode == 'KRT'.$i)
                        <li class="nav-item">
                            <a class="nav-link {{ ($activeMenu == 'kriteria'.$i) ? 'active' : '' }}" href="{{ url('/kriteria'.$i) }}">
                                <div class="icon icon-shape icon-sm border-radius-md text-center me-1 d-flex align-items-center justify-content-center">
                                    <i class="ni ni-single-copy-04 text-dark text-sm opacity-10"></i>
                                </div>
                                <span class="nav-link-text ms-1">Data Kriteria {{ $i }}</span>
                            </a>
                        </li>
                    @endif
                @endfor
            @endif

            <!-- Validasi Koordinator -->
            @if ($roleKode == 'KOOR')
                <li class="nav-item">
                    <a class="nav-link {{ ($activeMenu == 'validasi_koordinator') ? 'active' : '' }}" href="{{ url('/validasi/koordinator') }}">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-1 d-flex align-items-center justify-content-center">
                            <i class="ni ni-folder-17 text-dark text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Validasi Koordinator</span>
                    </a>
                </li>
            @endif

            <!-- Validasi KPS / Kajur -->
            @if ($roleKode == 'KPSKAJUR')
                <li class="nav-item">
                    <a class="nav-link {{ ($activeMenu == 'validasi_kpskajur') ? 'active' : '' }}" href="{{ url('/validasi/kpskajur') }}">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-1 d-flex align-items-center justify-content-center">
                            <i class="ni ni-folder-17 text-dark text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Validasi KPS / Kajur</span>
                    </a>
                </li>
            @endif

            <!-- Validasi KJM -->
            @if ($roleKode == 'KJM')
                <li class="nav-item">
                    <a class="nav-link {{ ($activeMenu == 'validasi_kjm') ? 'active' : '' }}" href="{{ url('/validasi/kjm') }}">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-1 d-flex align-items-center justify-content-center">
                            <i class="ni ni-folder-17 text-dark text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Validasi KJM</span>
                    </a>
                </li>
            @endif

            <!-- Validasi Direktur -->
            @if ($roleKode == 'DIR')
                <li class="nav-item">
                    <a class="nav-link {{ ($activeMenu == 'validasi_direktur') ? 'active' : '' }}" href="{{ url('/validasi/direktur') }}">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-1 d-flex align-items-center justify-content-center">
                            <i class="ni ni-folder-17 text-dark text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Validasi Direktur</span>
                    </a>
                </li>
            @endif

            <!-- Notifikasi -->
            @if(Str::startsWith($roleKode, 'KRT'))
                @if($kriteria->status_id == 2)
                    <li class="nav-item">
                        <a class="nav-link {{ $activeMenu == 'notifikasi' ? 'active' : '' }}"
                            href="{{ url('/kriteria' . $kriteria_id . '/notifikasi') }}">
                            <div
                                class="icon icon-shape icon-sm border-radius-md text-center me-1 d-flex align-items-center justify-content-center">
                                <i class="ni ni-bell-55 text-dark text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Evaluasi
                                <span class="p-1 bg-danger border border-light rounded-circle" style="display:inline-block; vertical-align: middle; margin-bottom: 15px;"></span>
                            </span>
                        </a>
                    </li>
                @endif
            @endif
        </ul>
    </div>

    <!-- Logout Tetap di Bawah -->
    <div class="border-top p-3 sidebar-logout">
        <a href="{{ url('/logout') }}"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
           class="nav-link text-secondary d-flex align-items-center">
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
