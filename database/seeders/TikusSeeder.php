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
            ['jenis_id' => 1, 'kategori_size_id' => 1, 'total_jantan' => 5,  'total_betina' =>30 ,'created_at' => now()],
            ['jenis_id' => 2, 'kategori_size_id' => 2, 'total_jantan' => 10, 'total_betina' =>20 , 'created_at' => now()],
            ['jenis_id' => 3, 'kategori_size_id' => 3, 'total_jantan' => 15, 'total_betina' =>10 , 'created_at' => now()],
        ]);
    }
}
