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
        Schema::create('dokters', function (Blueprint $table) {
            $table->id();
            $table->string('nama_dokter')->nullable();
            $table->string('no_telp_dokter')->nullable();
            $table->string('tanggal_lahir_dokter')->nullable();
            $table->string('alamat_dokter')->nullable();
            $table->string('spesialisasi')->nullable();
            $table->string('ruangan')->nullable();
            $table->string('foto_dokter')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dokters');
    }
};
