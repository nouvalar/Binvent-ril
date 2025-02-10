@extends('layout.main2')

@section('title', 'STAFF | Dashboard')

@section('content')

    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-md">
                <div class="navbar-header" data-logobg="skin6">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                            class="ti-menu ti-close"></i></a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <div class="navbar-brand">
                        <!-- Logo icon -->
                        <a href="/staff/dashboardstaff">
                            <b class="logo-icon">
                                <!-- Dark Logo icon -->
                                <img src="{{ asset('back/assets/images/logo-binayasa-warna.png') }}" alt="homepage"
                                    class="dark-logo" />
                                <!-- Light Logo icon -->
                                <img src="{{ asset('back/assets/images/logo-binayasa-warna.png') }}" alt="homepage"
                                    class="light-logo" />
                            </b>
                            <!--End Logo icon -->
                        </a>
                    </div>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
                        data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto ml-3 pl-1">
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        <li class="nav-item d-none d-md-block">
                            <a class="nav-link" href="javascript:void(0)">
                                <form>
                                    <div class="customize-input">
                                        <input class="form-control custom-shadow custom-radius border-0 bg-white"
                                            type="search" placeholder="Search" aria-label="Search">
                                        <i class="form-control-icon" data-feather="search"></i>
                                    </div>
                                </form>
                            </a>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar" data-sidebarbg="skin6">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="/staff/dashboardstaff"
                                aria-expanded="false"><i data-feather="home" class="feather-icon"></i><span
                                    class="hide-menu">Dashboard</span></a></li>
                        <li class="list-divider"></li>
                        <li class="nav-small-cap"><span class="hide-menu">Aplikasi</span></li>
                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                                <i data-feather="package" class="feather-icon"></i>
                                <span class="hide-menu">Logistik</span>
                            </a>
                            <ul aria-expanded="false" class="collapse first-level base-level-line">
                                <li class="sidebar-item"> <a class="sidebar-link" href="/staff/listbarang-elektronik"
                                        aria-expanded="false"><span class="hide-menu">Elektronik
                                        </span></a>
                                </li>
                                <li class="sidebar-item"><a href="/staff/listbarang-perkakas" class="sidebar-link"><span
                                            class="hide-menu">Perkakas
                                        </span></a>
                                </li>
                                <li class="sidebar-item"><a href="/staff/listbarang-komponen" class="sidebar-link"><span
                                            class="hide-menu">Komponen
                                        </span></a>
                                </li>
                                <li class="sidebar-item"><a href="/staff/listbarang-logistik" class="sidebar-link"><span
                                            class="hide-menu">Logistik
                                        </span></a>
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
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
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
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">List Komponen</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="/staff/dashboardstaff"
                                            class="text-muted">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item text-muted active" aria-current="page">List Barang</li>
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
                <!-- basic table -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <!-- Column -->
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered no-wrap">
                                        <thead>
                                            <tr>
                                                <th>Status</th>
                                                <th>Nama Barang</th>
                                                <th>Kategori Barang</th>
                                                <th>Jumlah Tersedia</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($databarang as $item1)
                                                <tr>
                                                    <td>
                                                        @if (trim($item1->status) === 'In Progress')
                                                            <span class="badge badge-light-warning">In Progress</span>
                                                        @elseif (trim($item1->status) === 'Closed')
                                                            <span class="badge badge-light-danger">Closed</span>
                                                        @elseif (trim($item1->status) === 'Opened')
                                                            <span class="badge badge-light-success">Opened</span>
                                                        @else
                                                            <span
                                                                class="badge badge-light-secondary">{{ $item1->status ?? 'Unknown' }}</span>
                                                        @endif
                                                    </td>
                                                    <td>{{ $item1->nama_barang }}</td>
                                                    <td>{{ $item1->kategori }}</td>
                                                    <td>{{ $item1->jumlah }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Status</th>
                                                <th>Nama Barang</th>
                                                <th>Kategori Barang</th>
                                                <th>Jumlah Tersedia</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                    <ul class="pagination float-right">
                                        <li class="page-item disabled">
                                            <a class="page-link" href="#" tabindex="-1">Previous</a>
                                        </li>
                                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">2 <span
                                                    class="sr-only">(current)</span></a>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">Next</a>
                                        </li>
                                    </ul>
                                </div>
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
