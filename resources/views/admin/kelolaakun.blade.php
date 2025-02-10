@extends('layout.main')

@section('content')
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>

    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        <header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-md">
                <div class="navbar-header" data-logobg="skin6">
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
                        <i class="ti-menu ti-close"></i>
                    </a>
                    <div class="navbar-brand">
                        <a href="/admin/dashboardadmin">
                            <b class="logo-icon">
                                <img src="{{ asset('back/assets/images/logo-binayasa-warna.png') }}" alt="homepage"
                                    class="dark-logo" />
                            </b>
                        </a>
                    </div>
                </div>
                <div class="navbar-collapse collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav float-left mr-auto ml-3 pl-1"></ul>
                    <ul class="navbar-nav float-right">
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0)">
                                <img src="{{ asset('back/assets/images/users/profile-pic.jpg') }}" alt="user"
                                    class="rounded-circle" width="40">
                                <span class="ml-2 d-none d-lg-inline-block"><span>Hello,</span>
                                    <span class="text-dark">{{ Auth::user()->name }}</span></span>
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

        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h4 class="page-title text-dark font-weight-medium mb-1">Akun Staff</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="/admin/dashboardadmin"
                                            class="text-muted">Dashboard</a></li>
                                    <li class="breadcrumb-item text-muted active" aria-current="page">Kelola Akun Staff
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="default_order" class="table table-striped table-bordered display no-wrap"
                                        style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Nama</th>
                                                <th>Email</th>
                                                <th>Role</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($users->isEmpty())
                                                <tr>
                                                    <td colspan="4" class="text-center">Belum ada data karyawan terbaru
                                                    </td>
                                                </tr>
                                            @else
                                                @foreach ($users as $user)
                                                    <tr>
                                                        <td>{{ $user->name }}</td>
                                                        <td>{{ $user->email }}</td>
                                                        <td>{{ $user->role }}</td>
                                                        <td>
                                                            <button type="button" class="btn btn-warning edit-btn"
                                                                data-id="{{ $user->id }}"
                                                                data-name="{{ $user->name }}"
                                                                data-email="{{ $user->email }}"
                                                                data-role="{{ $user->role }}" data-toggle="modal"
                                                                data-target="#editAkunModal">
                                                                Edit
                                                            </button>

                                                            <form action="{{ route('admin.delete', $user->id) }}"
                                                                method="POST" style="display:inline;">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger btn-sm"
                                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus akun ini?')">Delete</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Alert Edit Akun -->
        <div id="updateSuccessAlert" class="alert alert-success alert-dismissible fade show d-none" role="alert">
            Akun berhasil diperbaiki!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <!-- Modal Edit Akun -->
        <div class="modal fade" id="editAkunModal" tabindex="-1" role="dialog" aria-labelledby="editAkunLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form id="editAkunForm" method="POST" action="{{ route('admin.update', $user->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="modal-header">
                            <h5 class="modal-title" id="editAkunLabel">Edit Akun</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- Hidden Input untuk ID -->
                            <input type="hidden" id="edit-id" name="id">

                            <div class="form-group">
                                <label for="edit-name">Nama</label>
                                <input type="text" class="form-control" id="edit-name" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="edit-email">Email</label>
                                <input type="email" class="form-control" id="edit-email" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="edit-role">Role</label>
                                <select class="form-control" id="edit-role" name="role">
                                    <option value="admin">Admin</option>
                                    <option value="staff">Staff</option>
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
    </div>

    <script>
        $(document).ready(function() {
            $('.edit-btn').click(function() {
                var id = $(this).data('id');
                var name = $(this).data('name');
                var email = $(this).data('email');
                var role = $(this).data('role');

                $('#edit-id').val(id);
                $('#edit-name').val(name);
                $('#edit-email').val(email);
                $('#edit-role').val(role);

                var formAction = "/admin/update/" + id;
                console.log("Form action set to:", formAction); // Debugging

                $('#editAkunForm').attr('action', formAction);
            });
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
