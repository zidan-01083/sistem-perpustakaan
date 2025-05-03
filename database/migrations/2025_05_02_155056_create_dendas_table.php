<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('dendaas', function (Blueprint $table) {
        $table->id();
        $table->decimal('jumlah_denda', 8, 2)->default(0);  // Jumlah denda
        $table->text('komentar')->nullable();  // Komentar untuk denda
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('dendas');
}
};
