<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class KelolaAkunController extends Controller
{
    /**
     * Menampilkan daftar akun staff.
     */
    public function index()
    {
        $users = User::where('role', 'staff')->get();
        return view('admin.kelolaakun', compact('users'));
    }

    /**
     * Memperbarui data akun yang diedit.
     */
    public function update(Request $request, $id)
    {
        $akun = User::where('id', $id)->firstOrFail();

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
        $akun = User::findOrFail($id);
        $akun->delete();

        return redirect()->route('admin.kelolaakun')->with('success', 'Akun berhasil dihapus');
    }
}
