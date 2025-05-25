<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Akreditasi</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        body {
            background-color: #f5f5f5;
        }
        .login-card {
            max-width: 450px;
            margin: 80px auto;
            padding: 40px 30px;
            border-radius: 10px;
            background-color: #fff;
            box-shadow: 0 8px 16px rgba(0,0,0,0.1);
        }
        .form-control {
            border-radius: 30px;
            padding-left: 45px;
            height: 50px;
        }
        .form-icon {
            position: absolute;
            top: 12px;
            left: 20px;
            color: #aaa;
        }
        .btn-login {
            border-radius: 30px;
            height: 50px;
            background-color: #0c2d48;
            color: #fff;
            font-weight: 500;
        }
        .btn-login:hover {
            background-color: #093043;
        }
        .info-box {
            border-radius: 10px;
            background: #f7f1e3;
            padding: 15px;
            font-size: 14px;
            margin-top: 20px;
            text-align: center;
        }
        .error-text {
            font-size: 13px;
            color: red;
            text-align: left;
            margin-top: 5px;
            margin-left: 10px;
        }
    </style>
</head>
<body>

<div class="login-card text-center">
    <div class="mb-3">
        <img src="{{ asset('logo.png') }}" alt="Logo" style="height: 50px;">
    </div>
    <h4 class="fw-bold mb-2">Selamat Datang!</h4>
    <p class="text-muted mb-4">
        Anda telah memasuki portal resmi Sistem Akreditasi.<br>
        Di sini, Anda dapat memantau, mengelola, dan melaporkan seluruh proses akreditasi dengan mudah.
    </p>

    <form id="form-login" method="POST" action="{{ route('login') }}">
        @csrf
        <div class="mb-3 position-relative">
            <i class="fa fa-user form-icon"></i>
            <input type="text" name="username" class="form-control" placeholder="Username">
            <small id="error-username" class="error-text"></small>
        </div>
        <div class="mb-4 position-relative">
            <i class="fa fa-lock form-icon"></i>
            <input type="password" name="password" class="form-control" placeholder="Password">
            <small id="error-password" class="error-text"></small>
        </div>
        <button type="submit" class="btn btn-login w-100">Login</button>
    </form>

    <div class="info-box mt-4">
        Jika belum memiliki akun hubungi admin dengan nomor dibawah ini<br>
        <strong>081359345579</strong>
    </div>
</div>

<!-- jQuery, jQuery Validation, Bootstrap -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function () {
        $('#form-login').validate({
            rules: {
                username: { required: true, minlength: 4, maxlength: 20 },
                password: { required: true, minlength: 5, maxlength: 20 }
            },
            submitHandler: function (form) {
                $.ajax({
                    url: form.action,
                    type: form.method,
                    data: $(form).serialize(),
                    success: function (response) {
                        if (response.status) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: response.message,
                            }).then(() => {
                                window.location = response.redirect;
                            });
                        } else {
                            $('.error-text').text('');
                            $.each(response.msgField, function (field, message) {
                                $('#error-' + field).text(message[0]);
                            });
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal',
                                text: response.message,
                            });
                        }
                    }
                });
                return false;
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.mb-3, .mb-4').append(error);
            },
            highlight: function (element) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element) {
                $(element).removeClass('is-invalid');
            }
        });
    });
</script>

</body>
</html>
