<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{url('img/jti.png')}}">
    <link rel="icon" type="image/png" href="img/jti.png">
    <title>
        Sistem Informasi Akreditasi JTI
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

        @keyframes slideUp {
            from {
                transform: translateY(50px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
        .animate-slide-up {
            animation: slideUp 0.8s ease-out forwards;
        }
        html {
            scroll-behavior: smooth;
        }
    </style>
</head>

{{--body class ini mengatur bg di paling belakang dari content--}}
<body class="about-us bg-gray-100">
<!-- Navbar -->
@include('componentLanding.navbar')
<!-- End Navbar -->
    <!-- -------- Welcoming Bar ------- -->
@include('componentLanding.header')
<!-- -------- END Welcoming Bar ------- -->
<!-- -------- START CTA -------- -->
<section class="py-7 position-relative" style="background-color:#FFFFFF; overflow: hidden; height: 700px" id="informasi-umum">
    <div>
        <section id="profil" class="about">
            <div class="container aos-init aos-animate" data-aos="fade-up">
                <div class="row feture-tabs aos-init aos-animate gx-8" data-aos="fade-up">
                <div class="col-lg-6">
                        <ul class="nav nav-pills mb-3">
                            <li><a class="nav-link getstarted active" data-bs-toggle="pill" href="#tab1">Profil</a></li>
                            <li><a class="nav-link getstarted" data-bs-toggle="pill" href="#tab2">Visi</a></li>
                            <li><a class="nav-link getstarted" data-bs-toggle="pill" href="#tab3">Misi</a></li>
                            <li><a class="nav-link getstarted" data-bs-toggle="pill" href="#tab4">Tujuan</a></li>
                            <li><a class="nav-link getstarted" data-bs-toggle="pill" href="#tab5">Sasaran</a></li>
                        </ul>

                        <div class="tab-content" style="max-height: 400px; overflow-y: auto;">
                        <div class="card tab-pane fade show active" id="tab1">
                                <p>Berawal dari Fakultas Non Gelar Teknologi Universitas Brawijaya yang beroperasi setelah disahkannya Surat Keputusan Presiden Republik Indonesia No. 59 Tahun 1982, Politeknik Negeri Malang saat ini telah berkembang menjadi institusi pendidikan vokasi mandiri.</p>
                                <p>Perubahan status tersebut tercantum dalam Surat Keputusan Menteri Pendidikan dan Kebudayaan No. 0313/O/1991. Politeknik Negeri Malang berupaya secara terus menerus untuk melakukan perubahan ke arah perbaikan, khususnya dalam bidang Pendidikan, Penelitian dan Pengabdian kepada Masyarakat yang berorientasi pada teknologi terapan.</p>
                                <p>Usaha tersebut menunjukkan hasil yang positif, yang ditunjukkan dengan pencapaian akreditasi A pada tahun 2018 (SK 409/SK/BAN-PT/Akred/PT/XII/2018) dan akreditasi internasional ASIC (Accreditation Service for International School College and University) pada tahun 2020 untuk 20 program studi.</p>
                                <p>Program studi D4-SIB didirikan pada tahun 2010 berdasarkan Surat Keputusan Menteri Pendidikan Nasional No. 50/D/O/2010. Awalnya program studi D4 Sistem Informasi Bisnis berada di bawah jurusan Teknik Elektro Politeknik Negeri Malang, sebelum akhirnya mulai aktif tahun 2015 setelah didirikannya jurusan Teknologi Informasi.</p>
                                <p>Pada tahun 2018, program studi D4-SIB mendapatkan peringkat B untuk akreditasi program studi dari BAN-PT, berdasarkan SK Nomor 1810/SK/BAN-PT/Akred/Dipl-IV/VII/2018.</p>
                            </div>

                            <div class="card tab-pane fade" id="tab2">
                                <p>Menjadi Program Studi yang Unggul dalam Bidang Sistem Informasi Bisnis baik di Tingkat Nasional maupun Internasional.</p>
                            </div>

                            <div class="card tab-pane fade" id="tab3">
                                <ol>
                                    <li>Melaksanakan pendidikan vokasi yang inovatif berbasis sistem pendidikan terapan dan teknologi.</li>
                                    <li>Menyelenggarakan penelitian terapan berbasis produk dan jasa di bidang Sistem Informasi Bisnis.</li>
                                    <li>Melaksanakan pengabdian masyarakat menggunakan kemajuan sistem informasi bisnis untuk kesejahteraan.</li>
                                    <li>Mewujudkan kerjasama saling menguntungkan dengan berbagai pihak di dalam dan luar negeri.</li>
                                </ol>
                            </div>

                            <div class="card tab-pane fade" id="tab4">
                                <ol>
                                    <li>Menghasilkan lulusan yang beretika, bermoral, kompeten, dan siap kerja/berwirausaha di bidang Sistem Informasi Bisnis.</li>
                                    <li>Menghasilkan penelitian terapan yang mendukung industri, berorientasi pada HaKI dan kesejahteraan masyarakat.</li>
                                    <li>Melaksanakan pengabdian kepada masyarakat melalui ilmu pengetahuan dan teknologi.</li>
                                    <li>Menghasilkan sistem manajemen pendidikan yang memenuhi prinsip tata kelola yang baik.</li>
                                    <li>Membangun kerjasama strategis dengan pihak nasional dan internasional.</li>
                                </ol>
                            </div>

                            <div class="card tab-pane fade" id="tab5">
                                <ol>
                                    <li>Meningkatkan akses, relevansi, dan kualitas pendidikan Program Studi D4-SIB.</li>
                                    <li>Meningkatkan kualitas pembelajaran dan kemahasiswaan.</li>
                                    <li>Meningkatkan pembinaan karier dan kesiapan lulusan.</li>
                                    <li>Meningkatkan jumlah dan mutu penelitian yang bermanfaat bagi masyarakat.</li>
                                    <li>Meningkatkan pengabdian masyarakat yang berdampak pada kesejahteraan sosial.</li>
                                </ol>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 mt-lg-2 d-flex align-items-center justify-content-center">
                        <div class="w-100" style="max-width: 700px; min-height: 500px;">
                            <img src="https://jti.polinema.ac.id/wp-content/uploads/2024/08/WhatsApp-Image-2024-07-03-at-21.52.40.jpeg"
                                 style="width: 100%; height: 500px; object-fit: cover; border-radius: 16px; box-shadow: 0 4px 12px rgba(0,0,0,0.15);"
                                 alt="Gambar Profil Akreditasi">
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</section>
{{--content apa kata mereka--}}
@include('componentLanding.tentangkami')

    <!-- -------- START CTA -------- -->
<section class="position-relative" style="background-color:#DDA853; height: 700px;">
    <div class="container h-100 d-flex justify-content-center align-items-center">
        <div class="text-center slide-trigger opacity-0">
            <h2 class="text-white fw-bold mb-4">Siap Memulai Proses Akreditasi?</h2>
            <p class="text-white opacity-75 mb-4">
                Login sekarang untuk mengakses semua fitur sistem akreditasi kami.
            </p>
            <a href="{{ url('login') }}" target="_blank" class="btn btn-dark btn-lg">
                Login Sekarang
            </a>
        </div>
    </div>
</section>

    <!-- -------- END CTA -------- -->
@include('componentLanding.footer')

{{--script ini untuk memberikan efek slide saat user ke card ini --}}
<script>
    function isInViewport(element) {
        const rect = element.getBoundingClientRect();
        return (
            rect.top <= (window.innerHeight || document.documentElement.clientHeight) &&
            rect.bottom >= 0
        );
    }

    function handleScrollAnimation() {
        const elements = document.querySelectorAll('.slide-trigger');

        elements.forEach(el => {
            if (isInViewport(el)) {
                el.classList.add('animate-slide-up');
                el.classList.remove('opacity-0');
            } else {
                el.classList.remove('animate-slide-up');
                el.classList.add('opacity-0');
            }
        });
    }

    document.addEventListener('DOMContentLoaded', handleScrollAnimation);
    window.addEventListener('scroll', handleScrollAnimation);
</script>
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
