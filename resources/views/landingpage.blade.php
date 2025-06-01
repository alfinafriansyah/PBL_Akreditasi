<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{url('img/jti.png')}}">
    <link rel="icon" type="image/png" href="img/jti.png">
    <title>
        Landing Page - Sistem Akreditasi
    </title>
    <!-- Fonts and icons -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700,900" />

    <!-- Nucleo Icons -->
    <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />

    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/v4-shims.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/fontawesome.min.css" rel="stylesheet">

    <!-- Material Icons -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0" />

    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('assets/css/material-kit.css?v=3.1.0') }}" rel="stylesheet" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        /* Timeline Style */
        .timeline {
            position: relative;
            max-width: 1200px;
            margin: 0 auto;
        }

        .timeline::after {
            content: '';
            position: absolute;
            width: 6px;
            background-color: #4a8bdf;
            top: 0;
            bottom: 0;
            left: 50%;
            margin-left: -3px;
        }

        .timeline-container {
            padding: 10px 40px;
            position: relative;
            background-color: inherit;
            width: 50%;
        }

        .timeline-container::after {
            content: '';
            position: absolute;
            width: 25px;
            height: 25px;
            right: -17px;
            background-color: white;
            border: 4px solid #4a8bdf;
            top: 15px;
            border-radius: 50%;
            z-index: 1;
        }

        .left {
            left: 0;
        }

        .right {
            left: 50%;
        }

        .left::before {
            content: " ";
            height: 0;
            position: absolute;
            top: 22px;
            width: 0;
            z-index: 1;
            right: 30px;
            border: medium solid #f8f9fa;
            border-width: 10px 0 10px 10px;
            border-color: transparent transparent transparent #f8f9fa;
        }

        .right::before {
            content: " ";
            height: 0;
            position: absolute;
            top: 22px;
            width: 0;
            z-index: 1;
            left: 30px;
            border: medium solid #f8f9fa;
            border-width: 10px 10px 10px 0;
            border-color: transparent #f8f9fa transparent transparent;
        }

        .right::after {
            left: -16px;
        }

        .timeline-content {
            padding: 20px 30px;
            background-color: #f8f9fa;
            position: relative;
            border-radius: 6px;
        }

    </style>
</head>

<body class="about-us bg-gray-100">
    <!-- Navbar Transparent -->
    <nav class="navbar navbar-expand-lg position-absolute top-0 z-index-3 w-100 shadow-none my-3 navbar-transparent">
        <div class="container">
            <!-- Branding -->
            <a class="navbar-brand text-white" href="#">Welcome to Sistem Akreditasi</a>

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
            <div class="collapse navbar-collapse w-100 pt-3 pb-2 py-lg-0" id="navigation">
                <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-3">
                    <!-- Beranda -->
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">
                            <i class="fa fa-home me-1"></i> Beranda
                        </a>
                    </li>

                    <!-- Dropdown Kriteria -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white d-flex align-items-center" href="#"
                            id="dropdownKriteria" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="material-symbols-rounded me-1">dashboard</i> Kriteria
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownKriteria">
                            <li><a class="dropdown-item" href="#">Kriteria 1 </a></li>
                            <li><a class="dropdown-item" href="#">Kriteria 2 </a></li>
                            <li><a class="dropdown-item" href="#">Kriteria 3 </a></li>
                            <li><a class="dropdown-item" href="#">Kriteria 4 </a></li>
                            <li><a class="dropdown-item" href="#">Kriteria 5 </a></li>
                            <li><a class="dropdown-item" href="#">Kriteria 6 </a></li>
                            <li><a class="dropdown-item" href="#">Kriteria 7 </a></li>
                            <li><a class="dropdown-item" href="#">Kriteria 8 </a></li>
                            <li><a class="dropdown-item" href="#">Kriteria 9 </a></li>
                        </ul>
                    </li>

                    <!-- Dropdown Informasi -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white d-flex align-items-center" href="#"
                            id="dropdownInformasi" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="material-symbols-rounded me-1">info</i> Informasi
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownInformasi">
                            <li><a class="dropdown-item" href="#">Informasi Umum</a></li>
                            <li><a class="dropdown-item" href="#">Profil Program Studi</a></li>
                            <li><a class="dropdown-item" href="#">Kontak</a></li>
                        </ul>
                    </li>

                    <!-- Website Polinema -->
                    <li class="nav-item">
                        <a class="nav-link text-white" href="https://www.polinema.ac.id/" target="_blank">
                            <i class="fa fa-globe me-1"></i> Website Polinema
                        </a>
                    </li>

                    <!-- Login Button -->
                    <li class="nav-item">
                        <a href="{{url('login')}}" target="_blank" class="btn btn-sm bg-white text-dark ms-2">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- End Navbar -->
    <!-- -------- Welcoming Bar ------- -->
    <header class="bg-gradient-dark">
        <div class="page-header min-vh-75" style="background-image: url('../img/background.png');">
            <span class="mask bg-gradient-dark opacity-6"></span>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 text-center mx-auto my-auto">
                        <h1 class="text-white">Selamat Datang!</h1>
                        <p class="lead mb-4 text-white opacity-8">
                            Di sini, Anda dapat memantau, mengelola,
                            dan melaporkan seluruh proses akreditasi dengan mudah.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- -------- END Welcoming Bar ------- -->
    <div class="card card-body shadow-xl mx-3 mx-md-4 mt-n6">
        <!-- Section with four info areas left & one card right with image and waves -->
        <section id="profil" class="about">
            <div class="container aos-init aos-animate" data-aos="fade-up">
                <header class="section-header">
                    <h2 style="text-align: center">Profil Akreditasi D4 Sistem Informasi Bisnis</h2>
                </header>
                <!-- Feature Tabs -->
                <div class="row feture-tabs aos-init aos-animate" data-aos="fade-up">
                    <div class="col-lg-6">
                        <!-- Tabs -->
                        <ul class="nav nav-pills mb-3">
                            <li>
                                <a class="nav-link getstarted active" data-bs-toggle="pill" href="#tab1">Profil</a>
                            </li>
                            <li>
                                <a class="nav-link getstarted" data-bs-toggle="pill" href="#tab2">Visi</a>
                            </li>
                            <li>
                                <a class="nav-link getstarted" data-bs-toggle="pill" href="#tab3">Misi</a>
                            </li>
                            <li>
                                <a class="nav-link getstarted" data-bs-toggle="pill" href="#tab4">Tujuan</a>
                            </li>
                            <li>
                                <a class="nav-link getstarted" data-bs-toggle="pill" href="#tab5">Sasaran</a>
                            </li>
                        </ul><!-- End Tabs -->

                        <!-- Tab Content -->
                        <div class="tab-content">

                            <div class="card card-info tab-pane fade show active align-text justify" id="tab1">
                                <p class=""></p>
                                <p><span class="example1">Berawal dari Fakultas Non Gelar Teknologi Universitas
                                        Brawijaya yang beroperasi setelah disahkannya Surat Keputusan Presiden Republik
                                        Indonesia No. 59 Tahun 1982, Politeknik Negeri Malang saat ini telah berkembang
                                        menjadi institusi pendidikan vokasi mandiri. Perubahan status tersebut tercantum
                                        dalam Surat Keputusan Menteri Pendidikan dan Kebudayaan No. 0313/O/1991.
                                        Politeknik Negeri Malang berupaya secara terus menerus untuk melakukan perubahan
                                        ke arah perbaikan, khususnya dalam bidang Pendidikan, Penelitian dan Pengabdian
                                        kepada Masyarakat yang berorientasi pada teknologi terapan. Usaha tersebut
                                        menunjukkan hasil yang positif, yang ditunjukkan dengan pencapaian akreditasi A
                                        pada tahun 2018 (SK 409/SK/BANPT/Akred/PT/XII/2018) dan akreditasi internasional
                                        ASIC (Acreditation Service for International School Collage and University) pada
                                        tahun 2020 untuk 20 program studi.</span></p>
                                <p><span class="example1">Program studi D4-SIB didirikan pada tahun 2010
                                        berdasarkanSuratKeputusanMenteriPendidikanNasionalno.50/D/O/2010.Padaawalnyaberdirinya,program
                                        studi D4 Sistem informasi bisnis berada di bawah jurusan Teknik Elektro,
                                        Politeknik NegeriMalang, sebelumpadaakhirnyamulaitahun2015,
                                        setelahdidirikannyajurusanTeknologiInformasi, program studi D4-SIB masuk ke
                                        dalamnya. Pada tahun 2018, program studi D4-SIBmendapatkan peringkat B untuk
                                        akreditasi program studi dari BAN-PT, berdasarkan SK
                                        Nomor1810/SK/BANPT/Akred/DiplIV/VII/2018.</span></p>
                                <p>&nbsp;</p>
                                <p></p>
                            </div>

                            <div class="card card-success tab-pane fade show" id="tab2">
                                <p class="">Menjadi Program Studi yang Unggul dalam Bidang Sistem informasi bisnis Baik
                                    di Tingkat Nasional Maupun Internasional</p>
                            </div>

                            <div class="card card-warning tab-pane fade show" id="tab3">
                                <p class=""></p>
                                <ol>
                                    <li>Melaksanakan pendidikan vokasi yang inovatif berdasarkan pada sistem pendidikan
                                        terapan dengan memanfaatkan kemajuan teknologi, sehingga mampu menghasilkan
                                        lulusan yang memiliki kompetensi di bidang sistem informasi bisnis dan siap
                                        bersaing di tingkat nasional dan global.</li>
                                    <li>Menyelenggarakan penelitian terapan berbasis produk dan jasa bidang Sistem
                                        informasi bisnis.</li>
                                    <li>Melaksanakan pengabdian masyarakat dengan menggunakan kemajuan bidang Sistem
                                        informasi bisnis untuk meningkatkan kesejahteraan.</li>
                                    <li>Mewujudkan kerjasama yang saling menguntungkan dengan berbagai pihak baik
                                        didalam maupun diluar negeri pada bidang sistem informasi bisnis</li>
                                </ol>
                                <p></p>
                            </div>
                            <div class="card card-primary tab-pane fade show" id="tab4">
                                <p class=""></p>
                                <ol style="list-style-type: undefined;">
                                    <li>Menghasilkan lulusan bidang sistem informasi bisnis yang sesuai kebutuhan,
                                        beretika dan bermoral baik, berpengetahuan dan berketerampilan tinggi, siap
                                        bekerja dan/atau berwirausaha yang mampu bersaing dalam skala nasional dan
                                        global;</li>
                                    <li>Menghasilkan penelitian terapan bidang sistem informasi bisnis yang berskala
                                        nasional dan internasional, meningkatkan efektivitas, efisiensi, dan
                                        produktivitas dalam dunia usaha dan industri, serta mengarah pada pencapaian Hak
                                        atas Kekayaan Intelektual (HaKI), perolehan paten, dan kesejahteraan masyarakat;
                                    </li>
                                    <li>Menghasilkan pengabdian kepada masyarakat yang dilaksanakan melalui penerapan
                                        dan penyebarluasan ilmu pengetahuan dan teknologi serta pemberian layanan hasil
                                        secara profesional dalam bidang sistem informasi bisnis sehingga bermanfaat
                                        secara langsung dalam meningkatkan kesejahteraan masyarakat;</li>
                                    <li>Menghasilkan sistem manajemen pendidikan bidang sistem informasi bisnis yang
                                        memenuhi prinsip-prinsip tata kelola yang baik;</li>
                                    <li>Terwujudnya kerja sama yang saling menguntungkan dengan berbagai pihak baik di
                                        dalam maupun di luar negeri pada bidang sistem informasi bisnis untuk
                                        meningkatkan daya saing.</li>
                                </ol>
                                <p>X</p>
                                <p></p>
                            </div>
                            <div class="card card-danger tab-pane fade show" id="tab5">
                                <p class=""></p>
                                <ol style="list-style-type: undefined;">
                                    <li>Meningkatnya akses relevansi, kuantitas, dan kualitas Pendidikan Program Studi
                                        D4 - SIB</li>
                                    <li>Meningkatnya relevansi dan kualitas kegiatan pembelajaran di Program Studi D4 -
                                        SIB</li>
                                    <li>Meningkatnya kualitas hasil kegiatan kemahasiswaan D4 - SIB dan inisiasi&nbsp;
                                        pembinaan karier untuk pembekalan lulusan.</li>
                                    <li>Meningkatnya relevansi, kuantitas, kualitas, dan kemanfaatan hasil penelitian
                                        seluruh&nbsp;&nbsp;&nbsp; sivitas akademika.</li>
                                    <li>Meningkatnya relevansi, kuantitas, kualitas, dan kemanfaatan hasil pengabdian
                                        kepada masyarakat untuk kesejahteraan masyarakat.</li>
                                </ol>
                                <p></p>
                            </div>
                            <!-- End Tab 5 Content -->

                        </div>

                    </div>
                    <div class="col-lg-6 mt-lg-2 d-flex">
                        <img src="https://jti.polinema.ac.id/wp-content/uploads/2024/08/WhatsApp-Image-2024-07-03-at-21.52.40.jpeg"
                            class="img-fluid" alt="">
                    </div>

                </div>
                <!-- End Feature Tabs -->
            </div>

        </section>

        <!-- -------- START Testimonials -------- -->
        <section class="py-7">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 mx-auto text-center">
                        <h2 class="mb-4">Apa Kata Mereka?</h2>
                        <div class="card card-plain">
                            <div class="card-body">
                                <p class="lead">
                                    "Sistem ini sangat membantu proses persiapan akreditasi kami, semua dokumen menjadi
                                    terorganisir dengan baik."
                                </p>
                                <h5 class="mt-4 mb-0">Ketua Program Studi</h5>
                                <p class="text-sm">D4 Sistem Informasi Bisnis</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- -------- END Testimonials -------- -->
    </div>

    <!-- -------- START CTA -------- -->
    <section class="py-7 bg-gradient-dark position-relative">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center">
                    <h2 class="text-white mb-4">Siap Memulai Proses Akreditasi?</h2>
                    <p class="text-white opacity-8 mb-4">Login sekarang untuk mengakses semua fitur sistem akreditasi
                        kami.</p>
                    <a href="{{url('login')}}" target="_blank" class="btn btn-white btn-lg">Login Sekarang</a>
                </div>
            </div>
        </div>
    </section>
    <!-- -------- END CTA -------- -->

    <footer class="footer pt-5 mt-5">
        <div class="container">
            <div class=" row">
                <div class="col-md-3 mb-4 ms-auto">
                    <div class="text-justify">
                        <a href="https://jti.polinema.ac.id/" class="navbar-brand text-white d-inline-block mb-2">
                            <img src="../img/jti.png" alt="main_logo" class="footer-logo" style="max-height: 50px;">
                        </a>
                        <h6 class="font-weight-bold mb-1">JTI Polinema</h6>
                        <a class="nav-link p-0 d-inline-flex align-items-center justify-content-center text-dark"
                            href="https://jti.polinema.ac.id/" target="_blank">
                            <i class="fas fa-external-link-alt me-1"></i>
                            <span>Kunjungi Kami</span>
                        </a>
                    </div>
                </div>
                <!-- Kolom Kontak -->
<div class="col-md-3 col-sm-6 col-12 mb-4">
    <div>
        <h6 class="text-sm text-dark fw-bold">Kontak</h6>
        <ul class="flex-column ms-n3 nav">
            <li class="nav-item">
                <span class="nav-link text-body">
                    <i class="fas fa-phone me-2"></i> (0341) 404424 ext. 304
                </span>
            </li>
            <li class="nav-item">
                <span class="nav-link text-body">
                    <i class="fas fa-envelope me-2"></i> jti@polinema.ac.id
                </span>
            </li>
            <li class="nav-item">
                <a class="nav-link text-body" href="https://jti.polinema.ac.id/" target="_blank">
                    <i class="fas fa-globe me-2"></i> jti.polinema.ac.id
                </a>
            </li>
        </ul>
    </div>
</div>

<!-- Kolom Alamat -->
<div class="col-md-4 col-sm-6 col-12 mb-4">
    <div>
        <h6 class="text-sm text-dark fw-bold">Alamat Kampus</h6>
        <ul class="flex-column ms-n3 nav">
            <li class="nav-item">
                <span class="nav-link text-body">
                    <i class="fas fa-map-marker-alt me-2"></i>
                    Jl. Soekarno Hatta No. 9<br>
                    Gedung Teknik Informatika Lt. 1-3<br>
                    Politeknik Negeri Malang
                </span>
            </li>
            <li class="nav-item">
                <a class="nav-link text-body" href="https://maps.app.goo.gl/MYy8poZLehVzhg4f8" target="_blank">
                    <i class="fas fa-map me-2"></i> Lihat di Google Maps
                </a>
            </li>
        </ul>
    </div>
</div>

                <div class="col-12">
                    <div class="text-center">
                        <p class="text-dark my-4 text-sm font-weight-normal">
                            All rights reserved. Copyright © <script>
                                document.write(new Date().getFullYear())

                            </script> Kelompok 4 Better Version</a>.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Core JS Files -->
    <script src="{{ asset('assets/js/core/popper.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/core/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}"></script>

    <!-- Material Kit JS -->
    <script src="{{ asset('assets/js/material-kit.min.js?v=3.1.0') }}" type="text/javascript"></script>

    <script>
        AOS.init();

    </script>
</body>

</html>
