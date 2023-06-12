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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('alamat')->nullable();
            $table->date('lahir')->nullable();
            $table->string('hp')->nullable();
            $table->string('klinik_tujuan')->nullable();
            $table->string('tanggal_reservasi')->nullable();
            $table->integer('biaya')->nullable();
            $table->integer('no_antrian')->nullable();
            $table->integer('role')->default('0');
            $table->string('jalur')->nullable();
            $table->string('ktp')->nullable();
            $table->string('file_path_ktp')->nullable();
            $table->string('bpjs')->nullable();
            $table->string('file_path_bpjs')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
