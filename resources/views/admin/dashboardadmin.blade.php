@extends('layout.main')

@section('title', 'ADMIN | Dashboard')

@section('content')

    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- navbar.html -->
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        <header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-md">
                <div class="navbar-header" data-logobg="skin6">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
                        <i class="ti-menu ti-close"></i>
                    </a>
                    <!-- Logo -->
                    <div class="navbar-brand">
                        <a href="/admin/dashboardadmin">
                            <b class="logo-icon">
                                <img src="{{ asset('back/assets/images/logo-binayasa-warna.png') }}" alt="homepage"
                                    class="dark-logo" />
                                <img src="{{ asset('back/assets/images/logo-binayasa-warna.png') }}" alt="homepage"
                                    class="light-logo" />
                            </b>
                        </a>
                    </div>
                    <!-- Toggle which is visible on mobile only -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
                        data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <i class="ti-more"></i>
                    </a>
                </div>
                <div class="navbar-collapse collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav float-left mr-auto ml-3 pl-1">
                    </ul>
                </div>
            </nav>
        </header>

        <!-- sidebar.html -->
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <div class="scroll-sidebar" data-sidebarbg="skin6">
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item">
                            <a class="sidebar-link sidebar-link" href="/admin/dashboardadmin" aria-expanded="false">
                                <i data-feather="home" class="feather-icon"></i>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        <li class="list-divider"></li>
                        <li class="nav-small-cap"><span class="hide-menu">Aplikasi</span></li>
                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                                <i data-feather="package" class="feather-icon"></i>
                                <span class="hide-menu">Logistik</span>
                            </a>
                            <ul aria-expanded="false" class="collapse first-level base-level-line">
                                <li class="sidebar-item">
                                    <a class="sidebar-link" href="/admin/listbarang" aria-expanded="false">
                                        <span class="hide-menu">List Barang</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="/admin/inputbarang" class="sidebar-link">
                                        <span class="hide-menu">Input Barang</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                                <i data-feather="user" class="feather-icon"></i>
                                <span class="hide-menu">Kelola Akun Staff</span>
                            </a>
                            <ul aria-expanded="false" class="collapse first-level base-level-line">
                                <li class="sidebar-item">
                                    <a href="/admin/kelolaakun" class="sidebar-link">
                                        <span class="hide-menu">Akun Staff</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="/admin/buatakun" class="sidebar-link">
                                        <span class="hide-menu">Buat Akun Staff</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="list-divider"></li>
                        @if (session('pesan'))
                            <script>
                                alert("{{ session('pesan') }}");
                            </script>
                        @endif
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link" onclick="confirmLogout(event);">
                                <i data-feather="log-out" class="feather-icon"></i>
                                <span class="hide-menu">Logout</span>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- ============================================================== -->
        <!-- Main wrapper - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
            data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
            <!-- ============================================================== -->
            <!-- Page wrapper  -->
            <!-- ============================================================== -->
            <div class="page-wrapper">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="page-breadcrumb">
                    <div class="row">
                        <div class="col-7 align-self-center">
                            <h3 id="greeting" class="page-title text-truncate text-dark font-weight-medium mb-1">Selamat
                                Datang, {{ Auth::user()->name }}</h3>
                            <div class="d-flex align-items-center">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb m-0 p-0">
                                        <li class="breadcrumb-item"><a href="/admin/dashboardadmin">Dashboard</a></li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <!-- *************************************************************** -->
                    <!-- Start First Cards -->
                    <!-- *************************************************************** -->
                    <div class="card-group">
                        <!-- Elektronik -->
                        <div class="card border-right">
                            <div class="card-body">
                                <div class="d-flex d-lg-flex d-md-block align-items-center">
                                    <div>
                                        <div class="d-inline-flex align-items-center">
                                            <h2 class="text-dark mb-1 font-weight-medium">
                                                {{ number_format($jumlahElektronik) }}</h2>
                                        </div>
                                        <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Jumlah
                                            Elektronik</h6>
                                    </div>
                                    <div class="ml-auto mt-md-3 mt-lg-0">
                                        <span class="opacity-7 text-muted"><i data-feather="monitor"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Perkakas -->
                        <div class="card border-right">
                            <div class="card-body">
                                <div class="d-flex d-lg-flex d-md-block align-items-center">
                                    <div>
                                        <h2 class="text-dark mb-1 w-100 text-truncate font-weight-medium">
                                            {{ number_format($jumlahPerkakas) }}</h2>
                                        <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Jumlah Perkakas
                                        </h6>
                                    </div>
                                    <div class="ml-auto mt-md-3 mt-lg-0">
                                        <span class="opacity-7 text-muted"><i data-feather="tool"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Komponen -->
                        <div class="card border-right">
                            <div class="card-body">
                                <div class="d-flex d-lg-flex d-md-block align-items-center">
                                    <div>
                                        <div class="d-inline-flex align-items-center">
                                            <h2 class="text-dark mb-1 font-weight-medium">
                                                {{ number_format($jumlahKomponen) }}</h2>
                                        </div>
                                        <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Jumlah Komponen
                                        </h6>
                                    </div>
                                    <div class="ml-auto mt-md-3 mt-lg-0">
                                        <span class="opacity-7 text-muted"><i data-feather="cpu"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Logistik -->
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex d-lg-flex d-md-block align-items-center">
                                    <div>
                                        <h2 class="text-dark mb-1 font-weight-medium">{{ number_format($jumlahLogistik) }}
                                        </h2>
                                        <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Jumlah Logistik
                                        </h6>
                                    </div>
                                    <div class="ml-auto mt-md-3 mt-lg-0">
                                        <span class="opacity-7 text-muted"><i data-feather="package"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-4">
                                        <h4 class="card-title">Barang Yang Baru Ditambahkan</h4>
                                        <div class="ml-auto">
                                            <div class="dropdown sub-dropdown">
                                                <a href="/admin/listbarang" class="btn btn-link font-weight-bold">
                                                    Lihat Selengkapnya
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table no-wrap v-middle mb-0">
                                            <thead>
                                                <tr class="border-0">
                                                    <th class="border-0 font-16 font-weight-bolder text-dark">Nama Barang
                                                    </th>
                                                    <th class="border-0 font-16 font-weight-bolder text-dark">Kategori
                                                        Barang</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($databarang as $item)
                                                    <tr>
                                                        <td class="border-top-0 px-2 py-4 font-14 text-secondary">
                                                            {{ $item->nama_barang }}</td>
                                                        <td class="border-top-0 px-2 py-4 font-14 text-secondary">
                                                            {{ $item->kategori }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-4">
                                        <h4 class="card-title">Akun Yang Baru Dibuat</h4>
                                        <div class="ml-auto">
                                            <div class="dropdown sub-dropdown">
                                                <a href="/admin/kelolaakun" class="btn btn-link font-weight-bold">
                                                    Lihat Selengkapnya
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table no-wrap v-middle mb-0">
                                            <thead>
                                                <tr class="border-0">
                                                    <th class="border-0 font-16 font-weight-bolder text-dark">Nama Staff
                                                    </th>
                                                    <th class="border-0 font-16 font-weight-bolder text-dark">Email</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($users as $staff)
                                                    <tr>
                                                        <td class="border-top-0 px-2 py-4 font-14 text-secondary">
                                                            {{ $staff->name }}
                                                        </td>
                                                        <td class="border-top-0 px-2 py-4 font-14 text-secondary">
                                                            {{ $staff->email }}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            if (typeof feather !== "undefined") {
                feather.replace();
            } else {
                console.error("Feather Icons gagal dimuat.");
            }
        });
    </script>

    <script>
        function confirmLogout(event) {
            event.preventDefault();
            if (confirm("Apakah Anda yakin ingin logout?")) {
                document.getElementById('logout-form').submit();
            }
        }
    </script>
