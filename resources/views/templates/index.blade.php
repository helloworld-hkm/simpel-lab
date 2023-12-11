<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>SIMPEL-LAB | {{ $title }} </title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('assets/img/logos.png') }}" rel="icon">
    <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <!-- Template Main CSS File -->



    <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: May 30 2023 with Bootstrap v5.3.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="index.html" class="  d-flex align-items-center">
                <!-- Gambar untuk perangkat yang lebih besar -->
                <img src="{{ asset('assets/img/logo2x.png') }}" class="d-none d-sm-block" width="200"
                    alt="Logo for larger devices">

                <!-- Gambar untuk perangkat yang lebih kecil -->
                <img src="{{ asset('assets/img/logos.png') }}" class="d-block d-sm-none "
                    style="max-width: 100%;" alt="Logo for smaller devices">

            </a>
            <i class="bi bi-list toggle-sidebar-btn "></i>
        </div><!-- End Logo -->


        @include('templates.partials.topbar')


    </header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
    @include('templates.partials.sidebar')

    <main id="main" class="main">

        @yield('content')




    </main><!-- End #main -->
    @stack('modal-action')
    <!-- ======= Footer ======= -->
    @include('templates.partials.footer')

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->


    {{-- additional js --}}

    @include('templates.partials.js')

    <script>
        $(document).ready(function() {
            // Setelah 3 detik, pesan alert dengan class 'myAlert' akan dihapus
            setTimeout(function() {
                $(".alert").hide();
            }, 5500); // 3000 milidetik (3 detik)
        });
        function formatTanggal(tanggal) {
            // formater tanggal
            var tanggalPemeliharaan = tanggal
                    var tanggalObj = new Date(tanggalPemeliharaan);
                    var options = {
                        day: 'numeric',
                        month: 'long',
                        year: 'numeric',
                        hour: '2-digit',
                        minute: '2-digit',
                        second: '2-digit'
                    };
                    var tglFormatted = tanggalObj.toLocaleString('id-ID', options).replace(
                        /\b(\d)\b/g, '0$1');
                    return tglFormatted
        }
    </script>
      @stack('additional-js')
</body>

</html>
