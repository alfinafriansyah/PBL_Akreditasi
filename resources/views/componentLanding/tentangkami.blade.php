<!-- AOS CSS (Letakkan di <head>) -->
<link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

<div class="py-9 position-relative" style="background-color: #FFFFFF; min-height: 700px;" id="more-info">
    <h2 class="text-center fw-bold mb-3" data-aos="fade-down">
        Sistem Akreditasi untuk membantu sistem <br>
        akreditasi di Politeknik Negeri Malang
    </h2>
    <div class="text-center text-secondary mb-4" data-aos="fade-up" data-aos-delay="200">
        ✔️ UI Simple &nbsp;&nbsp;
        ✔️ CRUD &nbsp;&nbsp;
        ✔️ FILTERING
    </div>

    <!-- Container -->
    <div class="container py-5" data-aos="slide-up">
        <div class="row g-4">
            <!-- Card 1 -->
            <div class="col-md-4" >
                <div class="card border-0 shadow-sm h-100 rounded-4">
                    <img src="img/loginpage.png" class="card-img-top rounded-top-4" alt="Front App">
                    <div class="card-body">
                        <h5 class="fw-semibold">Login </h5>
                        <p class="text-muted mb-3">Langkah autentikasi sebelum masuk ke dashboard user</p>
                        <ul class="list-unstyled text-muted small">
                            <li><i class="bi bi-chevron-right me-1"></i> Simple UI </li>
                            <li><i class="bi bi-chevron-right me-1"></i> Clean Design</li>
                            <li><i class="bi bi-chevron-right me-1"></i> Easy to use </li>
                        </ul>
                    </div>
                    <div class="card-footer bg-white border-0">
                        <a href="#" class="text-primary text-decoration-none fw-medium">
                            Learn more <i class="bi bi-arrow-right-short"></i>
                        </a>
                    </div>
                </div>
            </div>
            <!-- Card 2 -->
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100 rounded-4">
                    <img src="img/pantaustatus.png" class="card-img-top rounded-top-4" alt="Front Chat">
                    <div class="card-body">
                        <h5 class="fw-semibold">Pantau Status data kriteria</h5>
                        <p class="text-muted mb-3">Untuk user Kriteria1-9 dan Koordinator,KpsKajur,Kjm,DirekturSpi</p>
                        <ul class="list-unstyled text-muted small">
                            <li><i class="bi bi-chevron-right me-1"></i> Simple UI & Warna yang menenangkan</li>
                            <li><i class="bi bi-chevron-right me-1"></i> Management status yg baik dan bisa di baca dengan baik</li>
                            <li><i class="bi bi-chevron-right me-1"></i> Informatif</li>
                        </ul>
                    </div>
                    <div class="card-footer bg-white border-0">
                        <a href="#" class="text-primary text-decoration-none fw-medium">
                            Learn more <i class="bi bi-arrow-right-short"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100 rounded-4">
                    <img src="img/inputkriteria.png" class="card-img-top rounded-top-4" alt="Front Calendar">
                    <div class="card-body">
                        <h5 class="fw-semibold">Input Kriteria</h5>
                        <p class="text-muted mb-3">Sesuai ketentukan untuk kebutuhan akreditasi Polinema</p>
                        <ul class="list-unstyled text-muted small">
                            <li><i class="bi bi-chevron-right me-1"></i>  Warna yang baik dan UI yang pas</li>
                            <li><i class="bi bi-chevron-right me-1"></i> Menggunakan Text Editor</li>
                            <li><i class="bi bi-chevron-right me-1"></i> Memiliki input document pendukung</li>
                        </ul>
                    </div>
                    <div class="card-footer bg-white border-0">
                        <a href="#" class="text-primary text-decoration-none fw-medium">
                            Learn more <i class="bi bi-arrow-right-short"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Testimoni Section -->
<div class="py-9 position-relative" style="background-color: #FFFFFF; min-height: 700px;">
    <section class="py-5" id="testimoni">
        <div class="container">
            <h2 class="text-center mb-5 fw-bold">Apa Kata Mereka?</h2>
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6">
                    <div class="card testimonial-card text-center p-4 mx-auto">
                        <div class="testimonial-avatar mx-auto mb-3">
                        </div>
                        <p class="lead testimonial-text mb-3" id="testimonialText">
                            "Sistem ini sangat membantu proses persiapan akreditasi kami, semua dokumen menjadi terorganisir dengan baik."
                        </p>
                        <h6 class="fw-bold mb-1" id="testimonialAuthor">Ketua Program Studi</h6>
                        <small class="text-muted" id="testimonialRole">D4 Sistem Informasi Bisnis</small>

                        <!-- Pagination -->
                        <div class="testimonial-pagination mt-3">
                            <span class="dot active" data-index="0"></span>
                            <span class="dot" data-index="1"></span>
                            <span class="dot" data-index="2"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<style>
    .card-img-top {
        width: 100%;
        height: 150px;
        object-fit: cover;
        object-position: center;
        border-radius: 0.375rem 0.375rem 0 0;
    }

    .testimonial-card {
        border: 1px solid #eee;
        border-radius: 16px;
        transition: transform 0.3s ease;
        background: #fff;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.05);
    }

    .testimonial-card:hover {
        transform: translateY(-5px);
    }

    .testimonial-avatar {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        background: linear-gradient(145deg, #f3f4f6, #ffffff);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        color: #6c757d;
    }

    .testimonial-pagination {
        display: flex;
        justify-content: center;
        gap: 8px;
    }

    .dot {
        width: 10px;
        height: 10px;
        background-color: #ccc;
        border-radius: 50%;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .dot.active {
        background-color: #007bff;
    }

    .slide-up {
        opacity: 0;
        transform: translateY(20px);
        transition: opacity 0.5s ease, transform 0.5s ease;
    }
</style>

<script>
    const testimonials = [
        {
            text: `"Sistem ini sangat membantu proses persiapan akreditasi kami, semua dokumen menjadi terorganisir dengan baik."`,
            author: "Ketua Program Studi",
            role: "Jurusan Teknologi Informasi"
        },
        {
            text: `"Tampilan antarmuka yang ramah pengguna membuat navigasi menjadi sangat mudah bagi seluruh tim."`,
            author: "Staf Administrasi",
            role: "Prodi Sistem Informasi Bisnis"
        },
        {
            text: `"Saya sangat terkesan dengan kecepatan dan kemudahan akses terhadap data. Sangat direkomendasikan!"`,
            author: "Dosen",
            role: "Prodi Teknik Informatika"
        }
    ];

    let index = 0;
    const textEl = document.getElementById("testimonialText");
    const authorEl = document.getElementById("testimonialAuthor");
    const roleEl = document.getElementById("testimonialRole");
    const dots = document.querySelectorAll(".dot");

    function updateTestimonial() {
        textEl.classList.add("slide-up");
        authorEl.classList.add("slide-up");
        roleEl.classList.add("slide-up");

        setTimeout(() => {
            const current = testimonials[index];
            textEl.textContent = current.text;
            authorEl.textContent = current.author;
            roleEl.textContent = current.role;

            dots.forEach(dot => dot.classList.remove("active"));
            dots[index].classList.add("active");

            textEl.classList.remove("slide-up");
            authorEl.classList.remove("slide-up");
            roleEl.classList.remove("slide-up");
        }, 400);
    }

    setInterval(() => {
        index = (index + 1) % testimonials.length;
        updateTestimonial();
    }, 5000);

    dots.forEach(dot => {
        dot.addEventListener("click", () => {
            index = parseInt(dot.getAttribute("data-index"));
            updateTestimonial();
        });
    });

    AOS.init({
        duration: 800, // durasi animasi dalam ms
        easing: 'ease-in-out',
        once: false, // animasi cuma sekali muncul
    });
</script>
</div>
