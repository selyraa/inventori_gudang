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
        Schema::create('retur_barangs', function (Blueprint $table) {
            $table->string('idRetur', 6)->primary();
            $table->string('idTransaksiMasuk', 6);
            $table->string('idUser', 6);
            $table->date('tglRetur');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('retur_barangs');
    }
};
