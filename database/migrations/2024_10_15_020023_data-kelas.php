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
        Schema::create('data_kelas', function (Blueprint $table) {
            $table->id();
            $table->integer('semester');
            $table->char('golongan');
            $table->string('prodi');
            $table->integer('total_mhs');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data-kelas');
    }
};
