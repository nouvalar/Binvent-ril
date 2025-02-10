<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataBarang extends Model
{
    use HasFactory;

    protected $table = 'databarang';

    protected $fillable = [
        'nama_barang',
        'kategori',
        'status',
        'jumlah',
    ];
}
