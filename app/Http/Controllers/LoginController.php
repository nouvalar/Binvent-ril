<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\BuatAkun;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    // Menampilkan form login
    public function showLoginForm()
    {
        return view('login');
    }

    // Proses login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Cek apakah model Buatakun bisa diakses
        if (!class_exists(User::class)) {
            dd("Model Buatakun tidak ditemukan");
        }

        // Cek apakah email ada di tabel buatakuns
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            dd("User tidak ditemukan di buatakuns", $request->email);
        }

        // Validasi password
        if (!Hash::check($request->password, $user->password)) {
            dd("Password salah", $request->password);
        }

        // Jika lolos semua, lakukan login
        Auth::login($user);
        session()->put('user_role', $user->role);

        return ($user->role == 'admin') ? redirect('admin/dashboardadmin') : redirect('staff/dashboardstaff');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('pesan', 'Logout berhasil!');
    }
}
