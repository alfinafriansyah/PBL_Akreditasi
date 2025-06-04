<!-- Navbar Transparent -->
<nav class="navbar navbar-expand-lg position-absolute top-0 z-index-2 w-100 shadow-none py-3 navbar-transparent">
    <div class="container d-flex align-items-center justify-content-between">
        <!-- Branding -->
        <a class="navbar-brand text-white fw-bold fs-5 mt-3" href="#">Sistem Akreditasi</a>

        <!-- Toggle button (for mobile) -->
        <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse"
                data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon mt-2">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
            </span>
        </button>

        <!-- Navigation Items -->
        <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav ms-auto align-items-center gap-3">
                <!-- Dropdown Kriteria -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white d-flex align-items-center" href="#"
                       id="dropdownKriteria" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="material-symbols-rounded me-1">dashboard</i> Kriteria
                    </a>
                    <ul class="dropdown-menu dropdown-menu-white" aria-labelledby="dropdownKriteria" style="z-index:5000; position:absolute;">
                        <li><a class="dropdown-item" href="#">Kriteria 1</a></li>
                        <li><a class="dropdown-item" href="#">Kriteria 2</a></li>
                        <li><a class="dropdown-item" href="#">Kriteria 3</a></li>
                        <li><a class="dropdown-item" href="#">Kriteria 4</a></li>
                        <li><a class="dropdown-item" href="#">Kriteria 5</a></li>
                        <li><a class="dropdown-item" href="#">Kriteria 6</a></li>
                        <li><a class="dropdown-item" href="#">Kriteria 7</a></li>
                        <li><a class="dropdown-item" href="#">Kriteria 8</a></li>
                        <li><a class="dropdown-item" href="#">Kriteria 9</a></li>
                    </ul>
                </li>

                <!-- Dropdown Informasi -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white d-flex align-items-center" href="#"
                       id="dropdownInformasi" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="material-symbols-rounded me-1">info</i> Informasi
                    </a>
                    <ul class="dropdown-menu dropdown-menu-white" aria-labelledby="dropdownInformasi">
                        <li><a class="dropdown-item" href="#informasi-umum">Informasi Umum</a></li>
                        <li><a class="dropdown-item" href="#testimoni">Testimoni</a></li>
                        <li><a class="dropdown-item" href="#kontak">Kontak</a></li>
                    </ul>
                </li>

                <!-- Website Polinema -->
                <li class="nav-item">
                    <a class="nav-link text-white d-flex align-items-center" href="https://www.polinema.ac.id/" target="_blank">
                        <i class="fa fa-globe me-1"></i> Website Polinema
                    </a>
                </li>

                <!-- Login Button -->
                <li class="nav-item mt-3">
                    <a href="{{url('/login')}}" target="_blank" class="btn btn-sm bg-white text-dark">Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
