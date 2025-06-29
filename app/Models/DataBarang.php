<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class DataBarang extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';
    protected $collection = 'databarang';

    protected $fillable = [
        'nama_barang',
        'kategori',
        'status',
        'jumlah',
    ];
}
