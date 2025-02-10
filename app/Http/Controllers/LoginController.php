<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Session;

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
        // Validasi input login
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Cek kredensial login
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user(); // Ambil data pengguna yang berhasil login
            Session::put('user_role', $user->role); // Simpan role pengguna dalam session

            // Redirect berdasarkan role
            return ($user->role == 'admin') ? redirect('admin/dashboardadmin') : redirect('staff/dashboardstaff');
        }

        // Jika login gagal
        return redirect()->back()
            ->withErrors(['email' => 'Email dan password yang dimasukkan tidak sesuai.'])
            ->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('pesan', 'Logout berhasil!');
    }
}
