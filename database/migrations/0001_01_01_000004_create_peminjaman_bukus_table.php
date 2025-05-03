<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeminjamanBukusTable extends Migration
{
    public function up()
    {
        Schema::create('peminjaman_bukus', function (Blueprint $table) {
            $table->id('id_peminjaman');  // ID peminjaman (primary key)
            $table->foreignId('book_id')->constrained('books');  
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('denda_id')->constrained('dendas'); 
            $table->date('tanggal_peminjaman');  // Tanggal peminjaman
            $table->date('tanggal_pengembalian');  // Tanggal pengembalian
            $table->decimal('denda_keterlambatan', 8, 2)->default(0);  // Denda keterlambatan (default = 0)
            $table->timestamps();  // Kolom created_at dan updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('peminjaman_bukus');
    }
}