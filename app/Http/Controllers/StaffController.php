<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Databarang;

class StaffController extends Controller
{
    public function dashboardstaff()
    {
        $data = [
            'jumlahElektronik' => DataBarang::where('kategori', 'Elektronik')->count(),
            'jumlahPerkakas' => DataBarang::where('kategori', 'Perkakas')->count(),
            'jumlahKomponen' => DataBarang::where('kategori', 'Komponen')->count(),
            'jumlahLogistik' => DataBarang::where('kategori', 'Logistik')->count(),
            'databarang' => DataBarang::all(),
        ];

        return view('staff.dashboardstaff', $data);
    }

    public function listBarangElektronik()
    {
        $data = [
            'databarang' => DataBarang::where('kategori', 'Elektronik')->get(),
        ];

        return view('staff.listbarang-elektronik', $data);
    }

    public function listBarangKomponen()
    {
        $data = [
            'databarang' => DataBarang::where('kategori', 'komponen')->get(),
        ];

        return view('staff.listbarang-komponen', $data);
    }

    public function listBarangLogistik()
    {
        $data = [
            'databarang' => DataBarang::where('kategori', 'logistik')->get(),
        ];

        return view('staff.listbarang-logistik', $data);
    }

    public function listBarangPerkakas()
    {
        $data = [
            'databarang' => DataBarang::where('kategori', 'perkakas')->get(),
        ];

        return view('staff.listbarang-perkakas', $data);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('pesan', 'Logout berhasil!');
    }
}
