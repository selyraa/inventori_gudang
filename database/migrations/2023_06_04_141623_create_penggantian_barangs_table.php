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
        Schema::create('penggantian_barangs', function (Blueprint $table) {
            $table->string('idPenggantianBarang', 6)->primary();
            $table->string('idDetailRetur', 6);
            $table->integer('jumlahPenggantian');
            $table->integer('selisihRetur');
            $table->integer('penguranganProfit');
            $table->string('keterangan', 255);
            $table->date('tglPenggantian');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penggantian_barangs');
    }
};
