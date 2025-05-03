<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'password','email_verified_at'
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
