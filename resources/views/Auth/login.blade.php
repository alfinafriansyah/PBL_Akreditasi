<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - Sistem Akreditasi</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Google Font: Poppins -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

  <style>
    body {
      background-color: #f5f5f5;
      font-family: 'Poppins', sans-serif;
    }

    .login-wrapper {
      max-width: 500px;
      margin: 70px auto;
      padding: 50px 35px 40px;
      background: #fff;
      border-radius: 15px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
      text-align: center;
    }

    .header-logo {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 14px;
      margin-bottom: 18px;
    }

    .header-logo img {
      height: 45px;
    }

    .header-logo h4 {
      margin: 0;
      font-weight: 700;
      font-size: 24px;
    }

    .login-wrapper p {
      font-size: 13px;
      color: #333;
      line-height: 1.5;
      margin-bottom: 30px;
    }

    .form-control {
      border-radius: 30px;
      height: 48px;
      padding-left: 20px;
      font-size: 14px;
    }

    .form-group {
      margin-bottom: 20px;
    }

    .btn-login {
      background-color: #0c2d48;
      color: white;
      border-radius: 30px;
      font-weight: 500;
      height: 48px;
      font-size: 15px;
      margin-top: 30px;
    }

    .btn-login:hover {
      background-color: #27548A;
      color: #f7f1e3;
    }

    .info-box {
      background-color: #f7f1e3;
      border-radius: 10px;
      padding: 15px;
      margin-top: 35px;
      font-size: 13px;
      color: #333;
      line-height: 1.4;
      margin-top: 10px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }
    /* Header logo styling */
    .header-logo {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 12px;
        margin-bottom: 20px;
    }

    /* Ukuran logo */
    .logo-img {
        width: 50px;
        height: auto;
    }

    /* Typing effect container */
    .typing-text {
        font-size: 1.5rem;
        font-weight: 700;
        color: #0c2d48;
        white-space: nowrap;
        overflow: hidden;
        border-right: 2px solid;
    }

    /* Blink cursor */
    .typing-text::after {
        content: '';
        display: inline-block;
        width: 5px;
        height: 1em;
        background-color: #0c2d48;
        animation: blink 0.8s infinite;
        vertical-align: middle;
        margin-left: 5px;
    }

    @keyframes blink {
        0%, 100% { opacity: 1; }
        50% { opacity: 0; }
    }

    /* Slide up untuk seluruh wrapper */
    .login-wrapper {
        opacity: 0;
        transform: translateY(30px);
        animation: slideUp 0.8s ease-out forwards;
    }

    @keyframes slideUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

  </style>
</head>
<body>

  <div class="login-wrapper">
    <div class="header-logo">
      <img src="{{ asset('img/jti.png') }}" alt="Logo">
      <h4>Selamat Datang!</h4>
    </div>

    <p>
      Anda telah memasuki portal resmi Sistem Akreditasi.<br>
      Di sini, Anda dapat memantau, mengelola, dan melaporkan seluruh proses akreditasi dengan mudah.
    </p>

    <form action="{{ route('login') }}" method="POST">
      @csrf
      <div class="form-group">
        <input type="text" name="username" class="form-control" placeholder="Username">
      </div>
      <div class="form-group">
        <input type="password" name="password" class="form-control" placeholder="Password">
      </div>
      <button type="submit" class="btn btn-login w-100">Login</button>
        <div class="mt-3">
            <a href="{{ url('/') }}" class="text-decoration-none" style="font-size: 13px; color: #0c2d48;">
                &larr; Kembali ke halaman utama
            </a>
        </div>
    </form>

    <div class="info-box mt-4">
      Jika belum memiliki akun hubungi admin dengan nomor dibawah ini<br>
      <strong>081359345579</strong>
    </div>
  </div>

  <!-- jQuery dan SweetAlert -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">

<script>
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $(document).ready(function () {
    $("form").validate({
      rules: {
        username: {
          required: true,
          minlength: 3
        },
        password: {
          required: true,
          minlength: 4
        }
      },
      submitHandler: function (form) {
        $.ajax({
          url: $(form).attr('action'),
          method: $(form).attr('method'),
          data: $(form).serialize(),
          success: function (response) {
            if (response.status) {
              Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: response.message
              }).then(() => {
                window.location.href = response.redirect;
              });
            } else {
              Swal.fire({
                icon: 'error',
                title: 'Login Gagal',
                text: response.message
              });
            }
          },
          error: function () {
            Swal.fire({
              icon: 'error',
              title: 'Kesalahan',
              text: 'Terjadi kesalahan saat login.'
            });
          }
        });
        return false;
      },
      errorPlacement: function (error, element) {
        error.addClass('text-danger mt-1 small d-block');
        error.insertAfter(element);
      },
      highlight: function (element) {
        $(element).addClass('is-invalid');
      },
      unhighlight: function (element) {
        $(element).removeClass('is-invalid');
      }
    });
  });

  document.addEventListener("DOMContentLoaded", function () {
      const text = "Selamat Datang!";
      const target = document.getElementById("welcomeText");
      let index = 0;

      function type() {
          if (index < text.length) {
              target.textContent += text.charAt(index);
              index++;
              setTimeout(type, 100);
          }
      }

      target.textContent = "";
      type();
  });
</script>
</div>
  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</div>

</body>
</html>
