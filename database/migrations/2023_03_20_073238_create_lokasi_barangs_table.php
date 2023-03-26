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
        Schema::create('lokasi_barangs', function (Blueprint $table) {
            $table->string('idRak', 6)->primary();
            $table->string('idKategori', 6);
            $table->string('keterangan', 100)->nullable();
            // $table->foreign('idKategori', 6)->references('idKategori')->on('kategori_barangs');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lokasi_barangs');
    }
};
