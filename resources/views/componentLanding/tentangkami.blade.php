<!-- Bagian Testimoni Tetap -->
<div class="py-7 position-relative" style="background-color: #F5EEDC; height: 700px" >
    <section class="py-5" id="testimoni">
        <div class="container">
            <h2 class="text-center mb-5 fw-bold">Apa Kata Mereka?</h2>
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6">
                    <div class="card testimonial-card text-center p-4 mx-auto">
                        <div class="testimonial-avatar mx-auto mb-3">
                            <i class="bi bi-chat-quote-fill"></i>
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
    .testimonial-text {
        transition: transform 0.6s ease, opacity 0.6s ease;
    }

    .slide-up {
        transform: translateY(-20px);
        opacity: 0;
    }

    .card img {
        object-fit: cover;
    }

    @media (max-width: 576px) {
        .card img {
            width: 80px;
            height: 80px;
        }
    }

    .team-card {
        max-width: 220px;
        width: 100%;
        border: none;
        border-radius: 1rem;
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.05);
        transition: transform 0.2s ease, box-shadow 0.2s ease;
        cursor: pointer;
    }

    .team-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 0.8rem 1.2rem rgba(0, 0, 0, 0.1);
    }

    .team-img {
        width: 120px;
        height: 120px;
        object-fit: cover;
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

    .slide-up {
        opacity: 0;
        transform: translateY(20px);
        transition: opacity 0.5s ease, transform 0.5s ease;
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
        margin-top: 1rem;
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
            role: "Prodi Sisten Informasi Bisnis"
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

    // Pagination click event
    dots.forEach(dot => {
        dot.addEventListener("click", () => {
            index = parseInt(dot.getAttribute("data-index"));
            updateTestimonial();
        });
    });
</script>
