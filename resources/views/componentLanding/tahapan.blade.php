<section class="py-5" style="background-color: #ffffff;" id="more-info">
    <div class="container py-5">
        <h2 class="fw-bold mb-3">Apa saja fitur yang kami hadirkan di dalam website ini </h2>
        <p class="text-muted mb-5">Berikut adalah fitur-fitur yang kami tawarkan dalam website ini</p>

        <div class="position-relative ps-4">
            <!-- Garis vertikal -->
            <div class="timeline-line"></div>

            <!-- STEP 1 -->
            <div class="mb-5 d-flex align-items-start" data-aos="fade-up" data-aos-delay="0">
                <div class="timeline-dot bg-primary-custom"></div>
                <div class="ms-4">
                    <h5 class="fw-bold">Masuk ke laman beranda</h5>
                    <p class="text-muted mb-0">
                        Pengguna awal mulanya masuk ke landing page
                    </p>
                </div>
            </div>

            <!-- STEP 2 -->
            <div class="mb-5 d-flex align-items-start" data-aos="fade-up" data-aos-delay="100">
                <div class="timeline-dot bg-primary-custom"></div>
                <div class="ms-4">
                    <h5 class="fw-bold">Autentikasi User</h5>
                    <p class="text-muted mb-0">
                        Sistem akan mencocokkan data yang dimasukkan dengan data di database. Jika sesuai, pengguna diberikan akses.
                    </p>
                </div>
            </div>

            <!-- STEP 3 -->
            <div class="mb-5 d-flex align-items-start" data-aos="fade-up" data-aos-delay="200">
                <div class="timeline-dot bg-primary-custom"></div>
                <div class="ms-4">
                    <h5 class="fw-bold">Input Kriteria Penilaian</h5>
                    <p class="text-muted mb-0">
                        User akan diberikan form untuk mengisi <strong>kriteria 1 hingga 9</strong> sesuai dengan peran dan akses yang dimiliki saat login.
                    </p>
                </div>
            </div>

            <!-- STEP 4 -->
            <div class="mb-5 d-flex align-items-start" data-aos="fade-up" data-aos-delay="300">
                <div class="timeline-dot bg-primary-custom"></div>
                <div class="ms-4">
                    <h5 class="fw-bold">Validasi Data</h5>
                    <p class="text-muted mb-0">
                        Data yang diinputkan akan divalidasi oleh <strong>Koordinator, KPS Kajur, KJM, dan Direktur SPI</strong> sesuai alur dan ada tingkatan validasi yang jelas dan berurutan.
                    </p>
                </div>
            </div>

            <!-- STEP 5 -->
            <div class="mb-5 d-flex align-items-start" data-aos="fade-up" data-aos-delay="400">
                <div class="timeline-dot bg-primary-custom"></div>
                <div class="ms-4">
                    <h5 class="fw-bold">Notifikasi Revisi</h5>
                    <p class="text-muted mb-0">
                        Sistem akan mengirimkan <strong>notifikasi otomatis</strong> kepada user terkait jika terdapat <strong>catatan atau revisi</strong> dari pihak validator.
                    </p>
                </div>
            </div>

            <!-- STEP 6 -->
            <div class="mb-5 d-flex align-items-start" data-aos="fade-up" data-aos-delay="500">
                <div class="timeline-dot bg-primary-custom"></div>
                <div class="ms-4">
                    <h5 class="fw-bold">Export PDF</h5>
                    <p class="text-muted mb-0">
                        Sistem akan membuat export data kriteria yang sudah tervalidasi pada tingkatan <strong>Direktur dan SPI</strong>. Fitur ini dapat diakses oleh <strong>Koordinator, KPS, Kajur, KJM, Direktur, dan SPI</strong>.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- AOS Script -->
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
    AOS.init({ duration: 800, easing: 'ease-in-out', once: false });
</script>

<!-- CSS Tambahan -->
<style>
    .object-fit-cover {
        object-fit: cover;
        height: 100%;
        min-height: 380px;
    }

    @media (max-width: 991.98px) {
        .object-fit-cover {
            height: auto;
            min-height: auto;
        }
    }

    .timeline-line {
        position: absolute;
        top: 0;
        bottom: 0;
        left: 6px;
        width: 2px;
        background-color: #27548A;
    }

    .timeline-dot {
        width: 14px;
        height: 14px;
        border-radius: 50%;
        border: 3px solid white;
        position: relative;
        z-index: 1;
    }

    .bg-primary-custom {
        background-color: #27548A !important;
    }

    @media (max-width: 768px) {
        .timeline-line {
            left: 6px;
        }

        .timeline-dot {
            margin-top: 4px;
        }
    }
</style>

