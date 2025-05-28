<!--
=========================================================
* Argon Dashboard 3 - v2.1.0
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard
* Copyright 2024 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('argon/assets/img/apple-icon.png')}}">
    <link rel="icon" type="image/png" href="{{asset('argon/assets/img/favicon.png')}}">
    <title>
        {{ config('app.name') }}
    </title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet"/>

    {{--icon source --}}
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    {{--Bootstrap 5 source --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    {{--css argon source --}}
    <link id="pagestyle" href="{{asset('argon/assets/css/argon-dashboard.min.css?v=2.1.0')}}" rel="stylesheet"/>
    {{-- DataTables --}}
    <link href="{{ asset('argon/vendor/datatables/dataTables.bootstrap5.css')}}" rel="stylesheet">
    {{-- SweetAlert2 --}}
    <link rel="stylesheet" href="{{ asset('argon/vendor/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
@stack('css')

<body class="g-sidenav-show" style="background-color: #F9F7F8;">
<!-- Extra details for Live View on GitHub Pages -->
<!-- Google Tag Manager (noscript) -->
<noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6" height="0" width="0"
            style="display:none;visibility:hidden"></iframe>
</noscript>

{{--Sidebar--}}
@include('admin.AdminLayouts.sidebar')
{{--/Sidebar--}}
<main class="main-content position-relative border-radius-lg ">
    {{--    Header --}}
    @include('layouts.header')
    @include('layouts.breadcrumb')
    {{--    /Header --}}
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            @yield('content')
        </section>
    </div>
    <span>
        @include('layouts.footer')
    </span>


</main>
<!--   Core JS Files   -->
<script src="{{ asset('argon/assets/js/jquery.min.js')}}"></script>
<script src="{{asset('argon/assets/js/core/popper.min.js')}}"></script>
<script src="{{asset('argon/assets/js/plugins/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('argon/assets/js/plugins/smooth-scrollbar.min.js')}}"></script>
<script src="{{asset('argon/assets/js/plugins/chartjs.min.js')}}"></script>
<script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
</script>
<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{asset('argon/assets/js/argon-dashboard.min.js?v=2.1.0')}}"></script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015"
        integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ=="
        data-cf-beacon='{"rayId":"941a5f7f28b48336","serverTiming":{"name":{"cfExtPri":true,"cfL4":true,"cfSpeedBrain":true,"cfCacheStatus":true}},"version":"2025.4.0-1-g37f21b1","token":"1b7cbb72744b40c580f8633c6b62637e"}'
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('argon/vendor/datatables/dataTables.js')}}"></script>
<script src="{{ asset('argon/vendor/datatables/dataTables.bootstrap5.js')}}"></script>
{{-- jQuery Validation --}}
<script src="{{ asset('argon/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('argon/vendor/jquery-validation/additional-methods.min.js') }}"></script>
{{-- SweetAlert2 --}}
<script src="{{ asset('argon/vendor/sweetalert2/sweetalert2.min.js') }}"></script>
{{-- TinyMCE --}}
<script src="{{ asset('argon/vendor/tinymce/js/tinymce/tinymce.min.js') }}"></script>
@stack('js')
</body>

</html>
