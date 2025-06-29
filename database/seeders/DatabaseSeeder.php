<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\DataBarang;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Create sample users
        User::create([
            'name' => 'Admin',
            'email' => 'admin@binvent.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Staff',
            'email' => 'staff@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'staff',
        ]);

        // // Create sample data barang
        // DataBarang::create([
        //     'nama_barang' => 'Laptop Dell Inspiron',
        //     'kategori' => 'elektronik',
        //     'status' => 'tersedia',
        //     'jumlah' => 5,
        // ]);

        // DataBarang::create([
        //     'nama_barang' => 'Screwdriver Set',
        //     'kategori' => 'perkakas',
        //     'status' => 'tersedia',
        //     'jumlah' => 10,
        // ]);

        // DataBarang::create([
        //     'nama_barang' => 'Resistor 1K Ohm',
        //     'kategori' => 'komponen',
        //     'status' => 'tersedia',
        //     'jumlah' => 100,
        // ]);
    }
}
