<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Buatakun extends Model
{
    use HasFactory;

    protected $table = 'buatakuns'; 

    protected $fillable = ['name', 'email', 'password', 'role'];

    protected $hidden = ['password'];

    // Mutator untuk otomatis hash password sebelum disimpan
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }
}
