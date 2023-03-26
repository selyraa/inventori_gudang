<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->string('idUser', 6)->primary();
            $table->string('nama', 100);
            $table->integer('umur', false);
            $table->string('alamat', 100);
            $table->string('username', 10);
            $table->string('password', 500);
            $table->string('noTelp', 13);
            // $table->enum('userLevel', ['Admin', 'Petugas']);
            $table->tinyInteger('role')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
