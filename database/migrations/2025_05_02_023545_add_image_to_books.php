<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImageToBooks extends Migration
{
    public function up()
    {
        Schema::table('books', function (Blueprint $table) {
            // Menambahkan kolom untuk gambar
            $table->string('image_name')->nullable();  // Nama file gambar
            $table->string('image_path')->nullable();  // Lokasi file gambar di server
            $table->string('mime_type')->nullable();  // Tipe MIME gambar
            $table->bigInteger('image_size')->nullable();  // Ukuran file gambar
        });
    }

    public function down()
    {
        Schema::table('books', function (Blueprint $table) {
            // Menghapus kolom yang ditambahkan
            $table->dropColumn(['image_name', 'image_path', 'mime_type', 'image_size']);
        });
    }
}
