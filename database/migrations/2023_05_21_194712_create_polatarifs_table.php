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
        Schema::create('polatarifs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_klinik', 255);
            $table->string('klinik_tujuan')->nullable();
            $table->integer('no_antrian')->nullable();
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
