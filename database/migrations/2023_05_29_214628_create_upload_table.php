<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->string('FKTP')->nullable();
            $table->string('file_path_FKTP')->nullable();
            $table->string('KTP')->nullable();
            $table->string('file_path_KTP')->nullable();
            $table->string('BPJS')->nullable();
            $table->string('file_path_BPJS')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('files');
    }
};