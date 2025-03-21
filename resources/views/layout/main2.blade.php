<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/img/logo-bulet.png') }}">
    <title>Dashboard Staff</title>

    <!-- Custom CSS -->
    <link href="{{ asset('back/assets/extra-libs/c3/c3.min.css') }}" rel="stylesheet">
    <link href="{{ asset('back/assets/libs/chartist/dist/chartist.min.css') }}" rel="stylesheet">
    <link href="{{ asset('back/assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="{{ asset('back/dist/css/style.min.css') }}" rel="stylesheet">
    
    <style>
        .dark-logo,
        .light-logo {
            width: 150px;
            height: auto;
        }
    </style>

</head>

<body>

    <!-- Main Content -->
    <div class="content">
        @yield('content')
    </div>
    
    <!-- jQuery harus di-load terlebih dahulu -->
    <script src="{{ asset('back/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('back/assets/libs/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('back/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Feather Icons -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js"></script>

    <!-- Sidebar dan UI Scripts -->
    <script src="{{ asset('back/dist/js/app-style-switcher.js') }}"></script>
    <script src="{{ asset('back/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="{{ asset('back/dist/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('back/dist/js/custom.min.js') }}"></script>

    <!-- Dashboard Charts -->
    <script src="{{ asset('back/assets/extra-libs/c3/d3.min.js') }}"></script>
    <script src="{{ asset('back/assets/extra-libs/c3/c3.min.js') }}"></script>
    <script src="{{ asset('back/assets/libs/chartist/dist/chartist.min.js') }}"></script>
    <script src="{{ asset('back/assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js') }}"></script>
    <script src="{{ asset('back/assets/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js') }}"></script>
    <script src="{{ asset('back/assets/extra-libs/jvector/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ asset('back/dist/js/pages/dashboards/dashboard1.min.js') }}"></script>

    <!-- Inisialisasi Feather Icons -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            feather.replace();
        });
    </script>
</body>

</html>
