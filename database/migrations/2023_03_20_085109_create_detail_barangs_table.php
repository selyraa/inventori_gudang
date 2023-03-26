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
        Schema::create('detail_barangs', function (Blueprint $table) {
            $table->string('idDetailBarang', 6)->primary();
            $table->string('idBarang', 6);
            $table->string('idTransaksiMasuk', 6);
            $table->date('tglProduksi');
            $table->date('tglExp');
            $table->integer('hargaBeli', false);
            $table->integer('hargaJual', false);
            $table->integer('stok', false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_barangs');
    }
};
