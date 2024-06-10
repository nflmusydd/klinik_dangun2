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
        Schema::create('konsultasis', function (Blueprint $table) {
            $table->id();
            $table->string('id_antrian')->nullable;
            $table->string('nama_dokter')->nullable;
            $table->string('nama_konsultasi')->nullable;
            $table->date('tanggal')->nullable;
            $table->time('waktu')->nullable;
            $table->integer('harga')->nullable;
            $table->string('ruangan')->nullable;
            $table->string('status')->nullable;
            $table->string('nama_user')->nullable;
            $table->integer('id_user')->nullable;

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('konsultasis');
    }
};
