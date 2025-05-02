<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeminjamanBuku extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_buku', 'id_user', 'tanggal_peminjaman', 'tanggal_pengembalian', 'denda_keterlambatan',
    ];

    // Relasi dengan tabel books
    public function book()
    {
        return $this->belongsTo(Books::class, 'id_buku');
    }

    // Relasi dengan tabel users
    public function user()
    {
        return $this->belongsTo(Users::class, 'id_user');
    }
}
