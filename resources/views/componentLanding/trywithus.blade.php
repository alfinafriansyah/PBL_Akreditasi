<!-- Tambahkan AOS CSS di <head> jika belum -->
<link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

<section class="d-flex align-items-center justify-content-center text-center py-8" style="background-color: #ffffff; min-height: 100vh;" id="more-info">
    <div class="container">
        <h1 class="fw-bold display-5 mb-4" data-aos="fade-up">Akreditasi</h1>
        <p class="text-muted" data-aos="fade-up" data-aos-delay="200">Kenalkan kelompok kami </p>

        <div class="mt-5 fw-medium fs-5" data-aos="fade-up" data-aos-delay="300">
            <span class="me-3">Axelo Matthew Terang Barus <span class="text-danger">●</span></span>
            <span class="me-3">Alyssa Tifara Yuwono <span class="text-primary">●</span></span>
            <span class="me-3">Atsilah Amany Putri Harsuma <span class="text-success">●</span></span>
            <span class="me-3">Haura Archia Sarapova P.K <span class="text-success">●</span></span>
            <br class="d-block d-md-none"><br class="d-block d-md-none">
            <span class="me-3">Alfin Afriansyah <span class="text-success">●</span></span>
        </div>

        <div class="mt-5 pt-3 border-top text-center" data-aos="fade-up" data-aos-delay="400">
            <a href="#header" class="text-muted text-decoration-none">
                <small class="d-block mb-2">View more</small>
            </a>
            <ul class="list-unstyled text-muted">
                <li>Kelompok 4 </li>
                <li>inspired by <a href="https://www.landingfolio.com/">@landingfolio</a></li>
            </ul>
        </div>
    </div>
</section>

<!-- Tambahkan AOS Script di akhir sebelum </body> -->
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 800,
        easing: 'ease-in-out',
        once: true
    });
</script>

<!-- Tambahan Style -->
<style>
    section h1 {
        font-size: 2.5rem;
    }

    @media (min-width: 768px) {
        section h1 {
            font-size: 3rem;
        }
    }

    .btn-dark {
        font-weight: 500;
        font-size: 1rem;
    }

    span.text-danger,
    span.text-success,
    span.text-primary,
    span.text-warning,
    span.text-dark {
        font-size: 1.2rem;
        vertical-align: middle;
    }
</style>
