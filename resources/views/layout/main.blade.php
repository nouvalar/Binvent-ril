<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <!-- Bootstrap CSS -->
    <link rel="icon" href="{{ asset('assets/img/logojg.png') }}" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
        }

        .subtitle {
            font-size: 20px;
            font-weight: bold;
        }

        .sidebar {
            background-color: #022859;
            color: white;
            height: 100vh;
        }

        .sidebar .nav-link {
            color: #adb5bd;
        }

        .sidebar .nav-link.active {
            color: white;
            background-color: #022859;
        }

        .top-bar {
            background-color: #ffffff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .box {
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            background-color: white;
            padding: 20px;
        }

        .table th {
            background-color: rgba(169, 169, 169, 0.5);
            /* Warna abu pudar */
            color: #333;
            /* Warna teks di header */
            font-weight: bold;
        }

        .table tbody tr td {
            background-color: rgba(169, 169, 169, 0.1);
            /* Warna abu muda pudar untuk isi tabel */
        }
    </style>
</head>

<body>

    <!-- Main Content -->
    <div class="content">
        @yield('contents')
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Bootstrap JS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</body>

</html>
