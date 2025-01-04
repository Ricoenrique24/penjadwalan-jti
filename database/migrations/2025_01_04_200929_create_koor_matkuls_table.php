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
        Schema::create('koor_matkuls', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_matkul');
            $table->foreign('id_matkul')->references('id')->on('data_matkul')->onDelete('cascade');
            $table->unsignedBigInteger('id_dosen');
            $table->foreign('id_dosen')->references('id')->on('data_dosen')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('koor_matkuls');
    }
};
