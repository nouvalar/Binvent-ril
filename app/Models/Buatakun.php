<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buatakun extends Model
{
    use HasFactory;

    protected $table = 'buatakuns'; // Pastikan ini sesuai dengan tabel di database

    protected $fillable = ['name', 'email', 'password', 'role'];

    protected $hidden = ['password'];

    protected $casts = [
        'password' => 'hashed',
    ];
}
