<!-- AOS CSS (di <head>) -->
<link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

<section class="py-5 bg-white" id="informasi-umum">
    <div class="container">
        <div class="row g-5">

            <!-- Atas: Gambar kiri, teks kanan -->
            <div class="col-md-6" data-aos="slide-up">
                <img src="img/ilust1.png" alt="Login" class="img-fluid rounded-4 w-100 h-100 object-fit-cover float-animate">
            </div>
            <div class="col-md-6 d-flex align-items-center" data-aos="fade-left">
                <div class="p-4 rounded-4 shadow-sm w-100 hover-card">
                    <h5 class="fw-bold text-dark">Lingkup</h5>
                    <p class="text-muted small mb-0">
                        Website Akreditasi Program Studi Sistem Informasi Bisnis Politeknik Negeri Malang adalah aplikasi berbasis web yang dirancang untuk memfasilitasi pengelolaan dan pemantauan dokumen serta data terkait proses akreditasi program studi.
                        <br><br>
                        Sistem ini bertujuan untuk menyajikan informasi secara terstruktur, meningkatkan efisiensi dalam pengelolaan data akreditasi, serta memudahkan koordinasi antar pihak terkait.
                    </p>
                </div>
            </div>

            <!-- Tengah: Teks kiri, gambar kanan -->
            <div class="col-md-6 d-flex align-items-center" data-aos="fade-right">
                <div class="p-4 rounded-4 shadow-sm w-100 hover-card">
                    <ul class="small text-muted ps-3 mb-0">
                        <h5 class="fw-bold text-dark">Informasi Penggunaan</h5>
                        Berdasarkan analisis kebutuhan pengguna, Sistem Informasi Akreditasi Prodi ini diharapkan memiliki antarmuka website yang modern, intuitif, dan nyaman secara visual.
                        <br> <br>
                        Sistem ini juga dilengkapi dengan dashboard yang dikembangkan khusus sesuai dengan peran pengguna, yaitu: (Admin,Kriteria, Koordinator Akreditasi, KPS/KAJUR, KJM, SPI Direktur) di mana masing-masing peran dari user di atas memiliki akses dan fitur yang relevan dan saling berkaitan dan bertahap.
                    </ul>
                </div>
            </div>
            <div class="col-md-6" data-aos="slide-up">
                <img src="img/ilust3.png" alt="Pantau Status" class="img-fluid rounded-4 w-100 h-100 object-fit-cover float-animate">
            </div>
        </div>
    </div>
</section>

<!-- AOS Script -->
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
    AOS.init({ duration: 900, easing: 'ease-in-out', once: true });
</script>

<!-- Tambahan CSS -->
<style>
    .object-fit-cover {
        object-fit: cover;
        height: 100%;
        min-height: 280px;
        transition: transform 0.5s ease, box-shadow 0.5s ease;
    }

    @media (max-width: 767.98px) {
        .object-fit-cover {
            height: auto;
            min-height: auto;
        }
    }

    /* Animasi mengambang (seperti di air) */
    @keyframes float {
        0%   { transform: translateY(0px); }
        50%  { transform: translateY(-10px); }
        100% { transform: translateY(0px); }
    }

    .float-animate {
        animation: float 3.5s ease-in-out infinite;
    }

    /* Efek hover pada card */
    .hover-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .hover-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
    }
</style>
