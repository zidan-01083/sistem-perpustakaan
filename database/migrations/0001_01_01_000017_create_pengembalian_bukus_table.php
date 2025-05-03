<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengembalianBukusTable extends Migration
{
    public function up()
    {
        Schema::create('pengembalian_bukus', function (Blueprint $table) {
            $table->id();  
            $table->foreignId('book_id')->constrained('books');  
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('peminjaman_id')->constrained('peminjaman_bukus'); 
            $table->date('tanggal_dikembalikan');  // Tanggal dikembalikannya buku 
            $table->decimal('denda_keterlambatan', 8, 2)->default(0);
            $table->timestamps();  
        });
    }

    public function down()
    {
        Schema::dropIfExists('pengembalian_bukus');
    }
}
