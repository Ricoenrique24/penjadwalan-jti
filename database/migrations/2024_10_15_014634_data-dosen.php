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
        Schema::create('data-dosen', function (Blueprint $table) {
            $table->id();
            $table->string('kd-dosen')->unique();
            $table->string('nip');
            $table->string('nama-dosen');
            $table->string('jenis-kelamin');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data-dosen');
    }
};
