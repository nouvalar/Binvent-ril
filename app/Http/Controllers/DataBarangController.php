<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataBarang;

class DataBarangController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'kategori' => 'required|string',
            'status' => 'required|string',
            'jumlah' => 'required|integer|min:1|max:1000',
        ]);

        DataBarang::create([
            'nama_barang' => $request->nama_barang,
            'kategori' => $request->kategori,
            'status' => $request->status,
            'jumlah' => $request->jumlah,
        ]);

        return redirect()->route('admin.inputbarang')->with('success', 'Data barang berhasil disimpan!');
    }
}
