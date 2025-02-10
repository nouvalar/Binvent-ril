<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buatakun;

class KelolaAkunController extends Controller
{
    /**
     * Menampilkan daftar akun staff.
     */
    public function index()
    {
        $buatakuns = Buatakun::all(); // Mengambil semua data dari tabel buatakuns
        return view('admin.kelolaakun', compact('buatakuns'));
    }

    /**
     * Memperbarui data akun yang diedit.
     */
    public function update(Request $request, $id)
    {
        $akun = Buatakun::where('id', $id)->firstOrFail();

        $akun->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role
        ]);

        return redirect()->route('admin.kelolaakun')->with('success', 'Akun berhasil diperbarui');
    }

    /**
     * Menghapus akun.
     */
    public function destroy($id)
    {
        $akun = Buatakun::findOrFail($id);
        $akun->delete();

        return redirect()->route('admin.kelolaakun')->with('success', 'Akun berhasil dihapus');
    }
}
