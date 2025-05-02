<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Books;

class BookSeeders extends Seeder
{
    public function run()
    {
        Books::create([
            'nama_buku' => '7 Dosa Besar Soeharto',
            'deskripsi_buku' => 'A complete guide to learn Laravel framework.',
            'pengarang' => 'John Doe',
            'judul_buku' => 'Soeharto',
            'genre_buku' => 'Programming',
            'ketersediaan_buku' => true,
        ]);
    }
}
