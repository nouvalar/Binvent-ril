@extends('layout.main')

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
                    <ul class="navbar-nav float-right">
                        <!-- User Profile -->
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0)">
                                <img src="{{ asset('back/assets/images/users/profile-pic.jpg') }}" alt="user"
                                    class="rounded-circle" width="40">
                                <span class="ml-2 d-none d-lg-inline-block"><span>Hello,</span> <span
                                        class="text-dark">{{ Auth::user()->name }}</span></span>
                            </a>
                        </li>
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
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Form Input Barang</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="index.html" class="text-muted">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item text-muted active" aria-current="page">Logistik</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Input Barang</h4>

                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif

                                <form action="{{ route('databarang.store') }}" method="POST">
                                    @csrf
                                    <div class="form-body">
                                        <label>Nama Barang</label>
                                        <div class="row">
                                            <div class="col-md-7">
                                                <div class="form-group">
                                                    <input type="text" name="nama_barang" class="form-control"
                                                        required>
                                                </div>
                                            </div>
                                        </div>
                                        <label>Kategori Barang</label>
                                        <div class="row">
                                            <div class="col-md-7">
                                                <div class="form-group">
                                                    <select name="kategori" class="form-control" required>
                                                        <option value="" disabled selected>Pilih Kategori</option>
                                                        <option value="elektronik">Elektronik</option>
                                                        <option value="Perkakas">Perkakas</option>
                                                        <option value="Komponen">Komponen</option>
                                                        <option value="logistik">Logistik</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <label>Status Barang</label>
                                        <div class="row">
                                            <div class="col-md-7">
                                                <div class="form-group">
                                                    <select name="status" class="form-control" required>
                                                        <option value="" disabled selected>Pilih Status</option>
                                                        <option value="Belum Digunakan">Belum Digunakan</option>
                                                        <option value="Sangat Baik">Sangat Baik</option>
                                                        <option value="Baik">Baik</option>
                                                        <option value="Rusak">Rusak</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <label>Jumlah Barang</label>
                                        <div class="row">
                                            <div class="col-md-7">
                                                <div class="form-group">
                                                    <input type="number" name="jumlah" class="form-control"
                                                        min="1" max="1000" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-info">Submit</button>
                                            <button type="reset" class="btn btn-dark">Reset</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function confirmLogout(event) {
            event.preventDefault();
            if (confirm("Apakah Anda yakin ingin logout?")) {
                document.getElementById('logout-form').submit();
            }
        }
    </script>
