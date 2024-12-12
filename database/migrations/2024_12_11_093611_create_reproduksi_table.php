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
        Schema::create('reproduksi', function (Blueprint $table) {
            $table->id();  // Kolom ID unik
            $table->foreignId('jenis_id')->constrained('jenis')->onDelete('cascade');
            $table->foreignId('kategori_size_id')->constrained('kategori_size')->onDelete('cascade');
            $table->integer('total_reproduksi');  // Total reproduksi bulan ini
            $table->integer('total_mati');  // Total kematian bulan ini
            $table->string('periode',7);
            $table->timestamps();  
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reproduksi');
    }
};
