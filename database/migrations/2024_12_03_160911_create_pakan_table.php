<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePakanTable extends Migration
{
    public function up()
    {
        Schema::create('pakan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jenis_id')->constrained('jenis')->onDelete('cascade');
            $table->foreignId('kategori_size_id')->constrained('kategori_size')->onDelete('cascade');
            $table->decimal('banyak_pakan_per_tikus', 8, 2);
            $table->integer('jumlah_pemberian_pakan'); // Jumlah pemberian
            $table->string('periode',7);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pakan');
    }
}
