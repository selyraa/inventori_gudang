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
        Schema::create('detail_keluars', function (Blueprint $table) {
            $table->string('idDetailKeluar', 6)->primary();
            $table->string('idTransaksiKeluar', 6);
            $table->string('idDetailBarang', 6);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_keluars');
    }
};
