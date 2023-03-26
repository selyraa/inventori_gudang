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
        Schema::create('detail_masuks', function (Blueprint $table) {
            $table->string('idDetailMasuk', 6)->primary();
            $table->string('idTransaksiMasuk', 6);
            $table->string('idBarang', 6);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_masuks');
    }
};
