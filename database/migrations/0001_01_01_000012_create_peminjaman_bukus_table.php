<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeminjamanBukusTable extends Migration
{
    public function up()
    {
        Schema::create('peminjaman_bukus', function (Blueprint $table) {
            $table->id();  // ID peminjaman (primary key)
            $table->foreignId('book_id')->constrained('books');  
            $table->foreignId('user_id')->constrained('users'); 
            $table->date('tanggal_peminjaman');  // Tanggal peminjaman
            $table->date('tanggal_pengembalian');  // Tanggal pengembalian
            $table->timestamps();  // Kolom created_at dan updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('peminjaman_bukus');
    }
}