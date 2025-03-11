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

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_barang' => 'required',
            'kategori' => 'required',
            'jumlah' => 'required|numeric',
            'status' => 'required'
        ]);

        $barang = Databarang::findOrFail($id);
        $oldNama = $barang->nama_barang;
        
        $barang->update([
            'nama_barang' => $request->nama_barang,
            'kategori' => $request->kategori,
            'jumlah' => $request->jumlah,
            'status' => $request->status
        ]);

        return redirect()->route('admin.listbarang')->with('success', "Barang '$oldNama' berhasil diperbarui!");
    }

    public function destroy($id)
    {
        $barang = Databarang::findOrFail($id);
        $nama = $barang->nama_barang;
        $barang->delete();

        return redirect()->route('admin.listbarang')->with('success', "Barang '$nama' berhasil dihapus!");
    }

    public function generatePDF(Request $request)
    {
        $kategori = $request->input('kategori');

        // Query awal
        $query = Databarang::query();

        // Filter jika ada kategori yang dipilih
        if ($kategori && $kategori !== 'Semua Barang') {
            $query->where('kategori', $kategori);
            $judul = "Laporan List Barang - Kategori $kategori";
        } else {
            $judul = "Laporan List Barang - Semua Kategori";
        }

        // Ambil data setelah filter
        $databarang = $query->get();
        
        // Hitung jumlah barang berdasarkan kategori yang difilter
        if ($kategori && $kategori !== 'Semua Barang') {
            $jumlahElektronik = ($kategori == 'Elektronik') ? $databarang->sum('jumlah') : 0;
            $jumlahPerkakas = ($kategori == 'Perkakas') ? $databarang->sum('jumlah') : 0;
            $jumlahKomponen = ($kategori == 'Komponen') ? $databarang->sum('jumlah') : 0;
            $jumlahLogistik = ($kategori == 'Logistik') ? $databarang->sum('jumlah') : 0;
        } else {
            // Jika semua kategori, hitung seperti biasa
            $jumlahElektronik = Databarang::where('kategori', 'Elektronik')->sum('jumlah');
            $jumlahPerkakas = Databarang::where('kategori', 'Perkakas')->sum('jumlah');
            $jumlahKomponen = Databarang::where('kategori', 'Komponen')->sum('jumlah');
            $jumlahLogistik = Databarang::where('kategori', 'Logistik')->sum('jumlah');
        }

        $pdf = app('dompdf.wrapper');
        $pdf->loadView('admin.pdf.listbarang', compact(
            'databarang',
            'jumlahElektronik',
            'jumlahPerkakas',
            'jumlahKomponen',
            'jumlahLogistik',
            'kategori',
            'judul'
        ));

        $filename = $kategori && $kategori !== 'Semua Barang' 
            ? 'list-barang-' . strtolower($kategori) . '-' . date('Y-m-d') . '.pdf'
            : 'list-barang-' . date('Y-m-d') . '.pdf';

        return $pdf->download($filename);
    }
}
