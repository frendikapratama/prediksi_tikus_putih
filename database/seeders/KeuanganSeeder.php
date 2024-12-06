<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KeuanganSeeder extends Seeder
{
    public function run()
    {
        DB::table('keuangan')->insert([
            [
                'jenis_id' => 1, // Sesuaikan dengan data di tabel 'jenis'
                'kategori_size_id' => 1, // Sesuaikan dengan data di tabel 'kategori_size'
                'biaya_pakan' => 50000,
                'biaya_lainnya' => 20000,
                'harga_pertikus' => 100000,
                'pendapatan_bulanan' => 5000000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jenis_id' => 2,
                'kategori_size_id' => 2,
                'biaya_pakan' => 70000,
                'biaya_lainnya' => 25000,
                'harga_pertikus' => 150000,
                'pendapatan_bulanan' => 8000000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jenis_id' => 1,
                'kategori_size_id' => 3,
                'biaya_pakan' => 60000,
                'biaya_lainnya' => 15000,
                'harga_pertikus' => 120000,
                'pendapatan_bulanan' => 6000000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
