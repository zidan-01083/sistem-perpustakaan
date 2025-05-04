<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Users;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // Menambahkan data pengguna pertama
        users::create([
            'name' => 'Admin1',
            'email' => 'Admin1@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('admin123'), // Pastikan menggunakan Hash untuk menyimpan password
            'remember_token' => Str::random(10),
            'role' => 'admin'
        ]);

    }
}
