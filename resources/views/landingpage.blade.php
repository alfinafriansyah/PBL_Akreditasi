<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{url('img/jti.png')}}">
    <link rel="icon" type="image/png" href="img/jti.png">
    <title>
        Sistem Informasi Akreditasi
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

        html {
            scroll-behavior: smooth;
        }
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
            border: medium solid #ffffff;
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
@include('componentLanding.about')
@include('componentLanding.informasiwebsite')

@include('componentLanding.tahapan')
    <!-- -------- END CTA -------- -->
@include('componentLanding.trywithus')
@include('componentLanding.footer')

{{--script ini untuk memberikan efek slide saat user ke card ini --}}

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
