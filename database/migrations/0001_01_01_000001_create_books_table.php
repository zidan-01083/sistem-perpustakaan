<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();  // ID untuk setiap buku
            $table->string('nama_buku');  // Nama buku
            $table->text('deskripsi_buku');  // Deskripsi buku
            $table->string('pengarang');  // Pengarang buku
            $table->string('judul_buku');  // Judul buku
            $table->string('genre_buku');  // Genre buku
            $table->boolean('ketersediaan_buku')->default(true);  // Status ketersediaan buku (default = tersedia)
            $table->timestamps();  // Kolom created_at dan updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('books');
    }
}