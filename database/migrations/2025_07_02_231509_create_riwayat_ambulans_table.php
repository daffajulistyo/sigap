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
        Schema::create('riwayat_ambulans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ambulans_id')->constrained();
            $table->string('tujuan');
            $table->text('keperluan');
            $table->dateTime('waktu_berangkat');
            $table->dateTime('waktu_kembali')->nullable();
            $table->integer('km_berangkat');
            $table->integer('km_kembali')->nullable();
            $table->text('catatan')->nullable();
            $table->enum('status_perjalanan', ['berjalan', 'selesai'])->default('berjalan');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat_ambulans');
    }
};
