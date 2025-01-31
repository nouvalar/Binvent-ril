<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class DummyUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $userData = [   
            [
                'name'=>'Admin',
                'email'=>'admin@gmail.com',
                'role'=>'admin',
                'password'=>bcrypt(1234567)
            ],
            [
                'name'=>'Staff',
                'email'=>'staff@gmail.com',
                'role'=>'staff',
                'password'=>bcrypt(123456)
            ],
        ];
        foreach($userData as $key => $val) {
            User::create($val);
        }
    }
}
