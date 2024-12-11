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
            $table->integer('total_reproduction');  // Total reproduksi bulan ini
            $table->integer('total_deaths');  // Total kematian bulan ini
            $table->date('periode');  // Bulan dan tahun (misalnya: 2024-12-01)
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
