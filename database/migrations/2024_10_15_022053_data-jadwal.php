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
            $table->bigInteger('id_dosen');
            $table->bigInteger('id_teknisi');
            $table->bigInteger('id_matkul');
            $table->String('hari');
            $table->string('jam');
            $table->string('matkul');
            $table->string('tahun_ajaran');
            $table->integer('semester');
            $table->string('ruangan');
            $table->string('dosen');
            $table->string('teknisi');
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
