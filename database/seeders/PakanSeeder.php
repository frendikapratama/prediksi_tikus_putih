<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class PakanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currentDate = Carbon::now();

        // Generate data for 12 months backward
        for ($i = 0; $i < 12; $i++) {
            $date = $currentDate->copy()->subMonths($i);

            DB::table('pakan')->insert([
                'jenis_id' => rand(1, 3), // Replace with actual range of jenis_id
                'kategori_size_id' => rand(1, 3), // Replace with actual range of kategori_size_id
                'banyak_pakan_per_tikus' => rand(10, 50) / 10, // Random decimal between 1.0 and 5.0
                'jumlah_pemberian_pakan' => rand(1, 10), // Random integer between 1 and 10
                'periode' => $date->format('Y-m'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
