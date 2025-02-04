@extends('layout.main')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-2 sidebar p-3">
                <img src="{{ asset('assets/img/logo.png') }}" alt="Logo Perusahaan" style="width: 150px;">
                <div>
                    <div class="subtitle">Selamat Datang di Binvent</div>
                </div>
                <p></p>
                <nav class="nav flex-column">
                    <a href="/admin/dashboardadmin" class="nav-link active">Dashboard</a>
                    <a href="/admin/buatakun" class="nav-link">Buat Akun Karyawan</a>
                    <a href="/admin/kelolaakun" class="nav-link">Kelola Akun Karyawan</a>
                    <a href="/admin/editstock" class="nav-link">Edit Stok Barang</a>
                </nav>
            </div>

            <!-- Main Content -->
            <div class="col-md-10">
                <!-- Top Bar -->
                <div class="row top-bar py-3 px-4 align-items-center">
                    <div class="col-md-6">
                        <h4>Buat Akun Karyawan</h4>
                    </div>
                </div>

                <!-- Form Akun Karyawan -->
                <div class="row mt-4 px-4">
                    <div class="col-12 mb-4">
                        <div class="box">
                            <h5>Buat Akun Karyawan Baru</h5>

                            @if (session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form id="formBuatAkun" method="POST" action="{{ route('buatakun.store') }}">
                                @csrf <!-- Laravel CSRF Token -->
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama Karyawan</label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                </div>
                                <div class="mb-3">
                                    <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                                    <input type="password" class="form-control" id="password_confirmation"
                                        name="password_confirmation" required>
                                </div>

                                <div class="mb-3">
                                    <label for="role" class="form-label">Role</label>
                                    <select class="form-select" id="role" name="role" required>
                                        <option value="admin">Admin</option>
                                        <option value="staff">Staff</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Buat Akun</button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Tabel Daftar Akun -->
                <div class="row mt-4 px-4">
                    <div class="col-12">
                        <h5>Daftar Akun Karyawan</h5>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($users) && count($users) > 0)
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->role }}</td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="3">Tidak ada data akun karyawan.</td>
                                    </tr>
                                @endif

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
