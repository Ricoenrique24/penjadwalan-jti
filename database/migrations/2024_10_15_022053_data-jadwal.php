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
        Schema::create('data-jadwal', function (Blueprint $table) {
            $table->id();
            $table->String('hari');
            $table->string('jam');
            $table->string('matkul');
            $table->integer('semester');
            $table->string('ruangan');
            $table->string('dosen');
            $table->string('teknisi');
            $table->string('kelas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data-jadwal');
    }
};
