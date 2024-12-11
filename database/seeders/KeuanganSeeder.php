<?php

namespace Database\Seeders;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Keuangan;
class KeuanganSeeder extends Seeder
{

    public function run(): void
    {
        $data = [];

        for ($i = 11; $i >= 0; $i--) {
            $periode = Carbon::now()->subMonths($i)->format('Y-m');

            $data[] = [
                'jenis_id' => rand(1, 3),
                'kategori_size_id' => rand(1, 3),
                'biaya_pakan' => rand(10000, 3000000),
                'biaya_lainnya' => rand(10000, 300000),
                'harga_pertikus' => rand(4000, 7000),
                'pendapatan_bulanan' => rand(100000, 300000),
                'periode' => $periode,
            ];
        }

        Keuangan::insert($data);
    }
}
