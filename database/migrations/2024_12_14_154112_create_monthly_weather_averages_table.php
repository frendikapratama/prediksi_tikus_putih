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
        Schema::create('monthly_weather_averages', function (Blueprint $table) {
            $table->id();
            $table->string('city');
            $table->integer('year');
            $table->integer('month');
            $table->decimal('average_temperature', 5, 2);
         
            $table->timestamps();

            // Unique constraint untuk mencegah duplikasi
            $table->unique(['city', 'year', 'month']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('monthly_weather_averages');
    }
};
