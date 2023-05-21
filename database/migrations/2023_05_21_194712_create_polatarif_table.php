<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('polatarif', function (Blueprint $table) {
            $table->increments('id_pola'); 
            $table->string('nama_klinik', 255);
            $table->string('nama_pola', 255);
            $table->integer('biaya');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('polatarif');
    }
};
