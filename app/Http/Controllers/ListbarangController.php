<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Databarang;
use App\Models\User;

class ListbarangController extends Controller
{
    public function index(Request $request)
    {
        $kategori = $request->input('kategori');

        // Query awal
        $query = Databarang::query();

        // Filter jika ada kategori yang dipilih
        if ($kategori && $kategori !== 'Semua Barang') {
            $query->where('kategori', $kategori);
        }

        // Ambil data setelah filter
        $databarang = $query->get();

        // Hitung jumlah barang berdasarkan kategori
        $jumlahElektronik = Databarang::where('kategori', 'Elektronik')->sum('jumlah');
        $jumlahPerkakas = Databarang::where('kategori', 'Perkakas')->sum('jumlah');
        $jumlahKomponen = Databarang::where('kategori', 'Komponen')->sum('jumlah');
        $jumlahLogistik = Databarang::where('kategori', 'Logistik')->sum('jumlah');

        return view('admin.listbarang', compact(
            'databarang',
            'kategori',
            'jumlahElektronik',
            'jumlahPerkakas',
            'jumlahKomponen',
            'jumlahLogistik'
        ));
    }

    public function dashboard()
    {
        $data = [
            'jumlahElektronik' => DataBarang::where('kategori', 'Elektronik')->count(),
            'jumlahPerkakas' => DataBarang::where('kategori', 'Perkakas')->count(),
            'jumlahKomponen' => DataBarang::where('kategori', 'Komponen')->count(),
            'jumlahLogistik' => DataBarang::where('kategori', 'Logistik')->count(),
            'databarang' => DataBarang::all(),
            'users' => User::where('role', 'staff')->get()
        ];

        return view('admin.dashboardadmin', $data);
    }
}
