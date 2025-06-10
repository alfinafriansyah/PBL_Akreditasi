<div class="container-fluid min-vh-100 d-flex align-items-center" style="background-color: #ffffff;">
    <div class="row w-100 align-items-center">
        <!-- Left Section -->
        <div class="col-md-6 p-5">
            <h1 class="display-4 fw-bold">
                Sistem Informasi<br>
                Akreditasi <span class="highlight" id="typing-text"></span>.
            </h1>
            <p class="lead text-secondary mt-4">
                Sistem informasi untuk  mendukung sistem akreditasi Politeknik Negeri Malang
            </p>
            <div class="mt-4">
                <a href="{{route('login')}}" class="btn btn-lg me-3 text-light btn-animated" style="background-color: #083c91;">Login</a>
                <a href="#more-info" class="btn btn-link btn-animated" style="color: #083c91;">Learn more &rarr;</a>
            </div>
        </div>

        <!-- Right Section -->
        <div class="col-md-6 d-none d-md-block position-relative d-flex justify-content-center">
            <svg viewBox="0 0 500 500" xmlns="http://www.w3.org/2000/svg" class="svg-blob scale-up">
                <defs>
                    <clipPath id="blobClip">
                        <path d="M423,299Q428,348,394,388Q360,428,308.5,438.5Q257,449,208,434Q159,419,128.5,384.5Q98,350,66.5,311Q35,272,42.5,222.5Q50,173,88,144.5Q126,116,162,91.5Q198,67,245.5,47.5Q293,28,322,73.5Q351,119,387,151Q423,183,420,216.5Q417,250,423,299Z"/>
                    </clipPath>
                </defs>
                <image href="{{ asset('img/background.png') }}" width="100%" height="100%" preserveAspectRatio="xMidYMid slice" clip-path="url(#blobClip)" />
            </svg>
        </div>
    </div>

    <style>
        .btn-animated {
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.6s ease-out;
        }

        .btn-animated.active {
            opacity: 1;
            transform: translateY(0);
        }
        .highlight {
            color: #083c91;
            border-right: 2px solid #083c91; /* buat efek cursor */
            white-space: nowrap;
            overflow: hidden;
        }
        .svg-blob {
            width: 100%; /* Ukuran normal */
            height: auto;
            max-width: none;
        }

        @media (max-width: 768px) {
            .svg-blob {
                width: 100%;
            }
        }

        .highlight {
            color: #083c91;
            position: relative;
            z-index: 1;
        }

        .highlight::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 100%;
            height: 6px;
            background-color: #000000;
            z-index: -1;
            border-radius: 2px;
        }
    </style>
</div>
<script>

    window.addEventListener('DOMContentLoaded', () => {
        document.querySelectorAll('.btn-animated').forEach((btn, i) => {
            setTimeout(() => {
                btn.classList.add('active');
            }, i * 200); // animasi stagger tiap tombol 200ms delay
        });
    });

    const words = ["Polinema", "JTI"];
    const typingSpeed = 300;
    const deletingSpeed = 200;
    const delayAfterTyping = 1500;
    const delayAfterDeleting = 500;

    let wordIndex = 0;
    let charIndex = 0;
    let isDeleting = false;
    const el = document.getElementById("typing-text");

    function type() {
        const currentWord = words[wordIndex];

        if (!isDeleting) {
            el.textContent = currentWord.slice(0, charIndex + 1);
            charIndex++;

            if (charIndex === currentWord.length) {
                isDeleting = true;
                setTimeout(type, delayAfterTyping);
            } else {
                setTimeout(type, typingSpeed);
            }
        } else {
            el.textContent = currentWord.slice(0, charIndex - 1);
            charIndex--;

            if (charIndex === 0) {
                isDeleting = false;
                wordIndex = (wordIndex + 1) % words.length; // pindah kata berikutnya, loop
                setTimeout(type, delayAfterDeleting);
            } else {
                setTimeout(type, deletingSpeed);
            }
        }
    }

    type();
</script>
