<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name', 
        'email', 
        'password', 
        'email_verified_at',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
    // Relasi dengan tabel roles
    public function role()
    {
        return $this->hasOne(Role::class);
    }

    // Relasi dengan tabel peminjaman_buku
    public function PeminjamanBuku()
    {
        return $this->hasMany(PeminjamanBuku::class);
    }
}