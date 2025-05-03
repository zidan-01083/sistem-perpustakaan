<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class PengembalianBuku extends Model
{
    use HasFactory;

    protected $table = 'pengembalian_bukus';

    // Kolom yang boleh diisi secara mass assignment
    protected $fillable = [
        'book_id', 
        'user_id', 
        'peminjaman_id', 
        'tanggal_dikembalikan', 
        'denda_keterlambatan'
    ];

    // Relasi dengan model Book
    public function book()
    {
        return $this->belongsTo(Books::class, 'book_id');  
    }

    // Relasi dengan model User
    public function user()
    {
        return $this->belongsTo(Users::class, 'user_id');
    }


    public function peminjaman()
    {
        return $this->belongsTo(PeminjamanBuku::class, 'peminjaman_id');
    }
    public function getTanggalDikembalikanAttribute($value)
    {
        return Carbon::parse($value);  
    }
}