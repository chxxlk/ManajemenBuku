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
        Schema::create('buku', function (Blueprint $table) {
            $table->string('id_buku')->primary();
            $table->string('judul');
            $table->string('id_genre');
            $table->string('pengarang');
            $table->string('deskripsi')->nullable();
            $table->string('tahun_terbit');
            $table->timestamps();

            $table->foreign('id_genre')->references('id_genre')->on('genre')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buku');
    }
};
