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

            <div class="col-md-10">
                <!-- Top Bar -->
                <div class="row top-bar py-3 px-4 align-items-center">
                    <div class="col-md-6">
                        <h4>Edit Stok Barang</h4>
                    </div>
                </div>

                <div class="row mt-4 px-4">
                    <div class="col-12 mb-4">
                        <div class="box">
                            <form action="/edit-stok-barang" method="POST">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama Barang</label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>
                                <div class="mb-3">
                                    <label for="Kategori" class="form-label">Kategori</label>
                                    <select class="form-select" id="Kategori" name="Kategori" required>
                                        <option value="elektronik">Elektronik</option>
                                        <option value="logistik">Logistik</option>
                                        <option value="perkakas">Perkakas</option>
                                        <option value="komponen">Komponen</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="jumlah" class="form-label">Jumlah (satuan)</label>
                                    <input type="text" class="form-control" id="jumlah" name="jumlah" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Tambah Stok</button>
                            </form>

                            <!-- Box untuk Daftar Barang -->
                            <div class="col-12 mb-4">
                                <div class="box">
                                    <h2>List barang</h2>
                                    <table class="table mt-3">
                                        <thead>
                                            <tr>
                                                <th>Nama Barang</th>
                                                <th>Kategori</th>
                                                <th>Jumlah</th>
                                            </tr>
                                        </thead>
                                        <!-- Bootstrap JS -->
                                        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
