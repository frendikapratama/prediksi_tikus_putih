<?php

namespace Database\Seeders;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tikus;
class TikusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */public function run(): void
        {
            $data = [];

            for ($i = 11; $i >= 0; $i--) {
                $periode = Carbon::now()->subMonths($i)->format('Y-m');

                $data[] = [
                    'jenis_id' => rand(1, 3),
                    'kategori_size_id' => rand(1, 3),
                    'total_jantan' => rand(5, 20),
                    'total_betina' => rand(10, 30),
                    'periode' => $periode,
                ];
            }

            // Debug: Print data to check

            Tikus::insert($data);
        }

}
