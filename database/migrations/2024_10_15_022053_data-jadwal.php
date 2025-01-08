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
        Schema::create('data_jadwal', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_matkul')->references('id')->on('data_matkul')->onDelete('cascade');
            $table->string('hari');
            $table->foreignId('id_jam')->references('id')->on('data_jam')->onDelete('cascade');
            $table->string('tahun_ajaran');
            $table->foreignId('id_ruangan')->references('id')->on('data_ruangan')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_jadwal');
    }
};
