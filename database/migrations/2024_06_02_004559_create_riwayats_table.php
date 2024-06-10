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
        Schema::create('riwayats', function (Blueprint $table) {
            $table->id();
            $table->integer('id_pasien')->nullable;
            $table->string('id_antrian')->nullable;
            $table->string('nama_pasien')->nullable;
            $table->string('nama_konsultasi')->nullable;
            $table->string('nama_dokter')->nullable;
            $table->date('tanggal')->nullable;
            $table->time('waktu')->nullable;
            $table->string('ruang')->nullable;
            $table->string('status_booking')->nullable;

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayats');
    }
};
