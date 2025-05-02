<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_buku', 'deskripsi_buku', 'pengarang', 'judul_buku', 'genre_buku', 'ketersediaan_buku','image_name','image_path'
    ];

    // Relasi dengan tabel peminjaman_buku
    public function peminjamanBuku()
    {
        return $this->hasMany(PeminjamanBuku::class);
    }
}