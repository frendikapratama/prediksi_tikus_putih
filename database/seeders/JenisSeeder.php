<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Jenis;

class JenisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Jenis::insert([
            ['name' => 'Jenis A'],
            ['name' => 'Jenis B'],
            ['name' => 'Jenis C'],
        ]);
    }
}
