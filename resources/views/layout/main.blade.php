<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Dashboard Admin">
    <meta name="author" content="Admin">

    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('back/assets/images/logo-bulet.png') }}">
    <title>Dashboard Admin</title>

    <!-- Custom CSS -->
    <link href="{{ asset('back/dist/css/style.min.css') }}" rel="stylesheet">
    <link href="{{ asset('back/dist/css/style2.css') }}?v={{ time() }}" rel="stylesheet">
    
    <!-- Stack untuk CSS tambahan -->
    @stack('css')

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

    <!-- Core Scripts -->
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

    <!-- Inisialisasi Chartist hanya jika elemen tersedia -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let chartElement = document.querySelector(".ct-chart");
            if (chartElement) {
                new Chartist.Line(".ct-chart", {
                    labels: [1, 2, 3, 4],
                    series: [
                        [12, 9, 7, 8]
                    ]
                });
            } else {
                console.warn("Chartist: Elemen chart tidak ditemukan.");
            }
        });
    </script>
</body>

</html>
