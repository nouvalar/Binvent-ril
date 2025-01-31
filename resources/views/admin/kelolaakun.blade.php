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
            <!-- Konten Halaman -->
            <div class="col-md-10">
                <!-- Top Bar -->
                <div class="row top-bar py-3 px-4 align-items-center">
                    <div class="col-md-6">
                        <h4>Kelola Akun Karyawan</h4>
                    </div>
                    <div class="col-md-6 text-end">
                        <input type="text" class="form-control d-inline-block w-50" placeholder="Search...">
                    </div>
                </div>

                <!-- Form Akun Karyawan -->
                <div class="row mt-4 px-4">
                    <div class="col-12 mb-4">
                        <div class="box">
                            <h5>Edit Akun Karyawan</h5>

                            <!-- Form Edit Akun Karyawan -->
                            <form action="{{ route('update-akun-karyawan', $user->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama Karyawan</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="Masukkan Nama Karyawan" required>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="Masukkan Email" required>
                                </div>
                                <div class="mb-3">
                                    <label for="role" class="form-label">Role</label>
                                    <select class="form-select" id="role" name="role" required>
                                        <option value="admin">Admin</option>
                                        <option value="user">Staff</option>
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary">Edit Akun</button>
                            </form>

                            <!--Form Hapus-->
                            <form action="{{ route('hapus-akun-karyawan', $user->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus Akun</button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Box untuk Daftar Karyawan -->
                <div class="col-12 mb-4">
                    <div class="box">
                        <h2>List Karyawan</h2>
                        <table class="table mt-3">
                            <thead>
                                <tr>
                                    <th>Nama Karyawan</th>
                                    <th>Aktivitas Terakhir</th>
                                    <th class="aksi">Aksi</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        loadUsers(); // Ambil data karyawan saat halaman dimuat
                    });

                    async function loadUsers() {
                        try {
                            let response = await fetch("http://127.0.0.1:8000/api/users");
                            let users = await response.json();

                            let tableBody = document.getElementById("userTableBody");
                            tableBody.innerHTML = ""; // Bersihkan isi tabel sebelum ditambahkan ulang

                            users.forEach(user => {
                                let row = `<tr>
                                    <td>${user.name}</td>
                                    <td>${user.email}</td>
                                    <td>${user.role}</td>
                                    <td>${user.last_active}</td>
                                    <td>
                                        <button onclick="editUser(${user.id}, '${user.name}', '${user.email}', '${user.role}')">Edit</button>
                                        <button onclick="deleteUser(${user.id})">Hapus</button>
                                    </td>
                                </tr>`;
                                tableBody.innerHTML += row;
                            });
                        } catch (error) {
                            console.error("Error fetching users:", error);
                        }
                    }

                    async function deleteUser(id) {
                        if (!confirm("Yakin ingin menghapus akun ini?")) return;

                        try {
                            let response = await fetch(`http://127.0.0.1:8000/api/users/${id}`, {
                                method: "DELETE",
                                headers: {
                                    "Content-Type": "application/json"
                                }
                            });

                            let result = await response.json();
                            alert(result.message);
                            loadUsers(); // Refresh daftar user setelah menghapus
                        } catch (error) {
                            console.error("Error deleting user:", error);
                        }
                    }

                    function editUser(id, name, email, role) {
                        document.getElementById("editId").value = id;
                        document.getElementById("editName").value = name;
                        document.getElementById("editEmail").value = email;
                        document.getElementById("editRole").value = role;
                    }

                    async function updateUser() {
                        let id = document.getElementById("editId").value;
                        let name = document.getElementById("editName").value;
                        let email = document.getElementById("editEmail").value;
                        let role = document.getElementById("editRole").value;

                        try {
                            let response = await fetch(`http://127.0.0.1:8000/api/users/${id}`, {
                                method: "PUT",
                                headers: {
                                    "Content-Type": "application/json"
                                },
                                body: JSON.stringify({
                                    name,
                                    email,
                                    role
                                })
                            });

                            let result = await response.json();
                            alert(result.message);
                            loadUsers(); // Refresh daftar user setelah edit
                        } catch (error) {
                            console.error("Error updating user:", error);
                        }
                    }
                </script>
