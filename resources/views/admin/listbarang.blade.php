@extends('layout.main')

@push('css')
<link href="{{ asset('back/assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet">
<link href="{{ asset('back/assets/css/datatables-custom.css') }}" rel="stylesheet">
<meta name="csrf-token" content="{{ csrf_token() }}">
<style>
    .dataTables_wrapper .dataTables_paginate .paginate_button {
        padding: 0.5em 1em;
        margin: 0 0.2em;
        border: 1px solid #ddd;
        background: #fff;
        cursor: pointer;
    }
    .dataTables_wrapper .dataTables_paginate .paginate_button.current {
        background: #2962ff;
        color: white !important;
        border-color: #2962ff;
    }
    .dataTables_wrapper .dataTables_paginate .paginate_button.disabled {
        opacity: 0.5;
        cursor: not-allowed;
    }
    .dataTables_wrapper .dataTables_info {
        padding-top: 0.85em;
    }
    .dataTables_wrapper .dataTables_paginate {
        padding-top: 0.5em;
    }
    .table td, .table th {
        vertical-align: middle;
    }
</style>
@endpush

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
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">List Barang</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="index.html" class="text-muted">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item text-muted active" aria-current="page">List Barang</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="d-flex justify-content-end align-items-center">
                            <form method="GET" action="{{ route('admin.listbarang') }}" class="mr-3">
                                <div class="customize-input">
                                    <select name="kategori" class="custom-select form-control bg-white custom-radius custom-shadow border-0" onchange="this.form.submit()">
                                        <option value="Semua Barang" {{ request('kategori') == 'Semua Barang' ? 'selected' : '' }}>Semua Barang</option>
                                        <option value="Elektronik" {{ request('kategori') == 'Elektronik' ? 'selected' : '' }}>Elektronik</option>
                                        <option value="Perkakas" {{ request('kategori') == 'Perkakas' ? 'selected' : '' }}>Perkakas</option>
                                        <option value="Komponen" {{ request('kategori') == 'Komponen' ? 'selected' : '' }}>Komponen</option>
                                        <option value="Logistik" {{ request('kategori') == 'Logistik' ? 'selected' : '' }}>Logistik</option>
                                    </select>
                                </div>
                            </form>
                            <a href="{{ route('admin.listbarang.pdf', ['kategori' => request('kategori', 'Semua Barang')]) }}" class="btn btn-info">
                                <i data-feather="download" class="feather-icon"></i> Download PDF
                            </a>
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
                                @if(session('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ session('success') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
                                <div class="row">
                                    <!-- Elektronik -->
                                    <div class="col-md-6 col-lg-3 col-xlg-3">
                                        <div class="card card-hover">
                                            <div class="p-2 bg-primary text-center">
                                                <h1 class="font-light text-white">{{ number_format($jumlahElektronik) }}
                                                </h1>
                                                <h6 class="text-white">Jumlah Elektronik</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Perkakas -->
                                    <div class="col-md-6 col-lg-3 col-xlg-3">
                                        <div class="card card-hover">
                                            <div class="p-2 bg-cyan text-center">
                                                <h1 class="font-light text-white">{{ number_format($jumlahPerkakas) }}
                                                </h1>
                                                <h6 class="text-white">Jumlah Perkakas</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Komponen -->
                                    <div class="col-md-6 col-lg-3 col-xlg-3">
                                        <div class="card card-hover">
                                            <div class="p-2 bg-success text-center">
                                                <h1 class="font-light text-white">{{ number_format($jumlahKomponen) }}
                                                </h1>
                                                <h6 class="text-white">Jumlah Komponen</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Logistik -->
                                    <div class="col-md-6 col-lg-3 col-xlg-3">
                                        <div class="card card-hover">
                                            <div class="p-2 bg-danger text-center">
                                                <h1 class="font-light text-white">{{ number_format($jumlahLogistik) }}
                                                </h1>
                                                <h6 class="text-white">Jumlah Logistik</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Column -->
                            </div>
                            <div class="table-responsive">
                                <table id="zero_config" class="table table-striped table-bordered no-wrap">
                                    <thead>
                                        <tr>
                                            <th>Status</th>
                                            <th>Nama Barang</th>
                                            <th>Kategori Barang</th>
                                            <th>Jumlah Tersedia</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($databarang as $item)
                                            <tr>
                                                <td>
                                                    @if (trim($item->status) === 'Belum Digunakan')
                                                        <span class="badge badge-light-primary">Belum Digunakan</span>
                                                    @elseif (trim($item->status) === 'Sangat Baik')
                                                        <span class="badge badge-light-success">Sangat Baik</span>
                                                    @elseif (trim($item->status) === 'Baik')
                                                        <span class="badge badge-light-info">Baik</span>
                                                    @elseif (trim($item->status) === 'Rusak')
                                                        <span class="badge badge-light-danger">Rusak</span>
                                                    @else
                                                        <span class="badge badge-light-secondary">{{ $item->status ?? 'Unknown' }}</span>
                                                    @endif
                                                </td>
                                                <td>{{ $item->nama_barang }}</td>
                                                <td>{{ $item->kategori }}</td>
                                                <td>{{ $item->jumlah }}</td>
                                                <td>
                                                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editModal{{ $item->id }}">
                                                        Edit
                                                    </button>
                                                    <form action="{{ route('admin.deletebarang', $item->id) }}" method="POST" style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>

                                            <!-- Modal Edit -->
                                            <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $item->id }}" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="editModalLabel{{ $item->id }}">Edit Barang</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="{{ route('admin.updatebarang', $item->id) }}" method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label for="nama_barang">Nama Barang</label>
                                                                    <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="{{ $item->nama_barang }}" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="kategori">Kategori</label>
                                                                    <select class="form-control" id="kategori" name="kategori" required>
                                                                        <option value="Elektronik" {{ $item->kategori == 'Elektronik' ? 'selected' : '' }}>Elektronik</option>
                                                                        <option value="Perkakas" {{ $item->kategori == 'Perkakas' ? 'selected' : '' }}>Perkakas</option>
                                                                        <option value="Komponen" {{ $item->kategori == 'Komponen' ? 'selected' : '' }}>Komponen</option>
                                                                        <option value="Logistik" {{ $item->kategori == 'Logistik' ? 'selected' : '' }}>Logistik</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="jumlah">Jumlah</label>
                                                                    <input type="number" class="form-control" id="jumlah" name="jumlah" value="{{ $item->jumlah }}" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="status">Status</label>
                                                                    <select class="form-control" id="status" name="status" required>
                                                                        <option value="Belum Digunakan" {{ $item->status == 'Belum Digunakan' ? 'selected' : '' }}>Belum Digunakan</option>
                                                                        <option value="Sangat Baik" {{ $item->status == 'Sangat Baik' ? 'selected' : '' }}>Sangat Baik</option>
                                                                        <option value="Baik" {{ $item->status == 'Baik' ? 'selected' : '' }}>Baik</option>
                                                                        <option value="Rusak" {{ $item->status == 'Rusak' ? 'selected' : '' }}>Rusak</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Status</th>
                                            <th>Nama Barang</th>
                                            <th>Kategori Barang</th>
                                            <th>Jumlah Tersedia</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
<script src="{{ asset('back/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script>
    function confirmLogout(event) {
        event.preventDefault();
        if (confirm("Apakah Anda yakin ingin logout?")) {
            document.getElementById('logout-form').submit();
        }
    }
</script>
@endpush
