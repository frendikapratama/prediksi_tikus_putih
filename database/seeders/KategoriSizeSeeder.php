<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\KategoriSize;

class KategoriSizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        KategoriSize::insert([
            ['name' => 'Small'],
            ['name' => 'Medium'],
            ['name' => 'Large'],
        ]);
    }
}
