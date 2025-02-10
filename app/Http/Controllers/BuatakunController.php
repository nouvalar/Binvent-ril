<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; // Tambahkan ini
use Illuminate\Support\Facades\Validator; // Tambahkan ini

class BuatakunController extends Controller
{
    //Menampilkan form dan daftar akun
    public function showUser()
    {
        $users = User::all(); // Ambil semua akun dari database
        return view('admin.buatakun', compact('users')); // Pastikan nama view benar
    }
    public function store(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'role' => 'required|in:admin,staff',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Simpan ke database
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Harus di-hash
            'role' => $request->role,
        ]);

        return redirect()->route('buatakun.show')->with('success', 'Akun berhasil dibuat!');
    }
}

