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
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password123'), // Pastikan menggunakan Hash untuk menyimpan password
            'remember_token' => Str::random(10),
        ]);

        // Menambahkan data pengguna kedua
        users::create([
            'name' => 'Jane Smith',
            'email' => 'jane.smith@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password456'), // Pastikan menggunakan Hash untuk menyimpan password
            'remember_token' => Str::random(10),
        ]);
    }
}
