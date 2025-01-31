@extends('layout.main')

@section('title', 'ADMIN | Dashboard')

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
                    <a href="{{ route('buatakun.show')}}" class="nav-link">Buat Akun Karyawan</a>
                    <a href="/admin/kelolaakun" class="nav-link">Kelola Akun Karyawan</a>
                    <a href="/admin/editstock" class="nav-link">Edit Stok Barang</a>
                </nav>
            </div>

            <!-- Main Content -->
            <div class="col-md-10">
                <!-- Top Bar -->
                <div class="row top-bar py-3 px-4 align-items-center">
                    <div class="col-md-6">
                        <h4>Dashboard Admin</h4>
                    </div>
                    <div class="col-md-6 text-end">
                        <input type="text" class="form-control d-inline-block w-50" placeholder="Search...">
                    </div>
                </div>

                <!-- Main Dashboard Content -->
                <div class="row mt-4 px-4">
                    <!-- Buat Akun Baru -->
                    <div class="col-12 mb-4 d-flex justify-content-end">
                        <div class="box" style="max-width: 300px;">
                            <nav class="nav flex-column">
                                <a href="buatakun.html" class="nav-link">Buat Akun Karyawan</a>
                            </nav>
                        </div>
                    </div>

                    <!-- 4 Presisi Boxes -->
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <div class="box text-center">
                                <h5>Jumlah Barang Elektronik</h5>
                                <p>Deskripsi</p>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="box text-center">
                                <h5>Jumlah Barang Logistik</h5>
                                <p>Deskripsi</p>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="box text-center">
                                <h5>Jumlah Barang Perkakas</h5>
                                <p>Deskripsi</p>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="box text-center">
                                <h5>Jumlah Barang Komponen</h5>
                                <p>Deskripsi</p>
                            </div>
                        </div>
                    </div>

                    <!-- List Pengadaan -->
                    <div class="col-12 mb-4">
                        <div class="box">
                            <h5>List Pengadaan</h5>
                            <table class="table mt-3">
                                <thead>
                                    <tr>
                                        <th>Nama Barang</th>
                                        <th>Jumlah</th>
                                        <th>Kondisi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Barang 1</td>
                                        <td>10</td>
                                        <td>Baik</td>
                                    </tr>
                                    <tr>
                                        <td>Barang 2</td>
                                        <td>5</td>
                                        <td>Rusak</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- List Karyawan -->
                    <div class="col-12">
                        <div class="box">
                            <h5>List Karyawan</h5>
                            <table class="table mt-3">
                                <thead>
                                    <tr>
                                        <th>Nama Karyawan</th>
                                        <th>Aktivitas Terakhir</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Karyawan 1</td>
                                        <td>Login 5 menit lalu</td>
                                    </tr>
                                    <tr>
                                        <td>Karyawan 2</td>
                                        <td>Menambahkan barang</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
