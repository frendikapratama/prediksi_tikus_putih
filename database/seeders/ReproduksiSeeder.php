<?php

namespace Database\Seeders;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Reproduksi;
class ReproduksiSeeder extends Seeder
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
                    'total_reproduksi' => rand(5, 20),
                    'total_mati' => rand(10, 30),
                    'periode' => $periode,
                ];
            }

            // Debug: Print data to check

            Reproduksi::insert($data);
        }

}
