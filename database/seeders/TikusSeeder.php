<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tikus;
class TikusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tikus::insert([
            ['jenis_id' => 1, 'kategori_size_id' => 1, 'banyak' => 5],
            ['jenis_id' => 2, 'kategori_size_id' => 2, 'banyak' => 10],
            ['jenis_id' => 3, 'kategori_size_id' => 3, 'banyak' => 15],
        ]);
    }
}
