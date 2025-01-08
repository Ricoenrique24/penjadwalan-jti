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
        Schema::create('data_matkul', function (Blueprint $table) {
            $table->id();
            $table->string('kd_matkul')->unique();
            $table->string('nama_matkul');
            $table->integer('sks_teori')->nullable();
            $table->integer('sks_praktikum')->nullable();
            $table->integer('semester');
            $table->foreignId('id_jenis_matkul')->nullable()->references('id')->on('jenis_matkul')->nullOnDelete();
            $table->foreignId('id_koor_matkul')->nullable()->references('id')->on('data_dosen')->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_matkul');
    }
};
