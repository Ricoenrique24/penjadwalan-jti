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
        Schema::create('data-matkul', function (Blueprint $table) {
            $table->id();
            $table->string('kd-matkul')->unique();
            $table->string('nama-matkul');
            $table->integer('jumlah-sks');
            $table->integer('semester');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data-matkul');
    }
};
