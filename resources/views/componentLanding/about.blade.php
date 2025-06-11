<section class="py-5" style="background-color: #DBE2EF;" id="more-info">
    <div class="container">
        <div class="row align-items-center g-5 flex-lg-nowrap">

            <!-- Text Section -->
            <div class="col-lg-6" data-aos="fade-right">
                <p class="text-uppercase text-muted fw-semibold mb-2">Tentang Kami</p>
                <h2 class="fw-bold text-dark mb-3">Sistem informasi akreditasi jurusan teknologi informasi Polinema</h2>
                <p class="fst-italic text-dark mb-4">
                    Sistem akreditasi ini dirancang untuk mendukung semua pihak terkait dalam proses akreditasi Polinema secara digital dan mudah untuk digunakan.
                </p>
                <ul class="list-unstyled text-dark mb-4">
                    <li class="mb-2"><i class="bi bi-check-circle-fill text-dark me-2"></i> UI Simple dan Modern</li>
                    <li class="mb-2"><i class="bi bi-check-circle-fill text-dark me-2"></i> CRUD Sistem yang Efisien</li>
                    <li><i class="bi bi-check-circle-fill text-dark me-2"></i> Filtering Data yang Informatif</li>
                </ul>
            </div>

            <!-- Image Layout Section -->
            <div class="col-lg-6" data-aos="fade-left">
                <div class="row g-3">
                    <!-- Gambar besar kiri -->
                    <div class="col-12 col-lg-6">
                        <div class="img-frame">
                            <img src="img/background.png" alt="Input Kriteria" class="img-fluid rounded-4 object-fit-cover hover-zoom">
                        </div>
                    </div>

                    <!-- Dua gambar kecil kanan -->
                    <div class="col-12 col-lg-6 d-flex flex-column gap-3">
                        <div class="img-frame">
                            <img src="img/graha.png" alt="Login" class="img-fluid rounded-4 hover-zoom">
                        </div>
                        <div class="img-frame">
                            <img src="img/pantaustatus.png" alt="Pantau Status" class="img-fluid rounded-4 hover-zoom">
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- AOS Script -->
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
    AOS.init({ duration: 800, easing: 'ease-in-out', once: true });
</script>

<!-- CSS Tambahan -->
<style>
    .object-fit-cover {
        object-fit: cover;
        height: 100%;
        min-height: 380px;
    }

    .img-frame {
        border-radius: 1rem;
        overflow: hidden;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .hover-zoom {
        transition: transform 0.3s ease;
    }

    .img-frame:hover .hover-zoom {
        transform: scale(1.05);
    }

    @media (max-width: 991.98px) {
        .object-fit-cover {
            height: auto;
            min-height: auto;
        }
        .img-frame {
            margin-bottom: 1rem;
        }
    }
</style>
