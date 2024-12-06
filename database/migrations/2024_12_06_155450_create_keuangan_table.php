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
        Schema::create('keuangan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jenis_id')->constrained('jenis')->onDelete('cascade'); // Relasi ke jenis
            $table->foreignId('kategori_size_id')->constrained('kategori_size')->onDelete('cascade'); // Relasi ke kategori ukuran
            $table->integer('biaya_pakan'); // Biaya pakan
            $table->integer('biaya_lainnya'); // Biaya lainnya
            $table->integer('harga_pertikus'); // Harga jual per tikus
            $table->integer('pendapatan_bulanan'); // Pendapatan per bulan
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keuangan');
    }
};
