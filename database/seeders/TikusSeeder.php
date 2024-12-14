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
     */public function run(): void{
        $data = [];
    
        // Loop untuk 12 bulan ke belakang
        for ($i = 11; $i >= 0; $i--) {
            // Periode bulan (format Y-m)
            $periode = Carbon::now()->subMonths($i)->format('Y-m');
            
            // Loop untuk setiap jenis (1 jenis memiliki 3 kategori_size dalam satu bulan)
            for ($jenis_id = 1; $jenis_id <= 3; $jenis_id++) {
                // Untuk setiap jenis, tambahkan 3 kategori_size
                for ($kategori_size_id = 1; $kategori_size_id <= 3; $kategori_size_id++) {
                    $data[] = [
                        'jenis_id' => $jenis_id,  // Jenis ID (1, 2, atau 3)
                        'kategori_size_id' => $kategori_size_id,  // Kategori size ID (1, 2, atau 3)
                        'total_jantan' => rand(5, 20),  // Total jantan acak antara 5 dan 20
                        'total_betina' => rand(10, 30),  // Total betina acak antara 10 dan 30
                        'periode' => $periode,  // Periode bulan yang diambil
                    ];
                }
            }
        }
    
        // Insert data ke dalam database
        Tikus::insert($data);
    }
}
