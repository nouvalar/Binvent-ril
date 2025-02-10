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
                        <li class="list-divider"></li>
                        <li class="sidebar-item">
                            <a class="sidebar-link sidebar-link" href="authentication-login1.html" aria-expanded="false">
                                <i data-feather="log-out" class="feather-icon"></i>
                                <span class="hide-menu">Logout</span>
                            </a>
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
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Buat Akun Staff</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="index.html" class="text-muted">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item text-muted active" aria-current="page">Kelola Akun Staff
                                    </li>
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
            <!-- Alert -->
            <!-- ============================================================== -->
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('buatakun.store') }}" method="POST">
                                    @csrf
                                    <div class="form-body">
                                        <label>Nama dan Email</label>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <input type="text" name="name" class="form-control"
                                                        value="{{ old('name') }}" placeholder="Nama">
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <input type="email" name="email" class="form-control"
                                                        value="{{ old('email') }}" placeholder="Masukkan Email">
                                                </div>
                                            </div>
                                        </div>

                                        <label>NIP dan Role</label>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <input type="password" name="password" class="form-control"
                                                        placeholder="Masukkan NIP">
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <select name="role" id="statusBarang" class="form-control">
                                                        <option value="" disabled selected>Pilih Role</option>
                                                        <option value="admin">Admin</option>
                                                        <option value="staff">Staff</option>
                                                    </select>
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
