<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class PeminjamanBuku extends Model
{
    use HasFactory;

    protected $table = 'peminjaman_bukus';

    // Kolom yang boleh diisi secara mass assignment
    protected $fillable = [
        'book_id', 
        'user_id', 
        'tanggal_peminjaman', 
        'tanggal_pengembalian', 
        'denda_keterlambatan'
    ];

    // Relasi dengan model Book
    public function book()
    {
        return $this->belongsTo(Books::class, 'book_id');  // Periksa jika menggunakan book_id
    }

    // Relasi dengan model User
    public function user()
    {
        return $this->belongsTo(Users::class, 'user_id');
    }

    public function getTanggalPeminjamanAttribute($value)
    {
        return Carbon::parse($value);  // Mengonversi string menjadi objek Carbon
    }
    public function getTanggalPengembalianAttribute($value)
    {
        return Carbon::parse($value);  // Mengonversi string menjadi objek Carbon
    }
}





