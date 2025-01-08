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
        Schema::create('jadwal_teknisi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_data_teknisi')->references('id')->on('data_teknisi')->onDelete('cascade');
            $table->foreignId('id_data_jadwal')->references('id')->on('data_jadwal')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_teknisis');
    }
};
