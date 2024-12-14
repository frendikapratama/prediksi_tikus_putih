<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\WeatherForecast;
use Carbon\Carbon;

class WeatherForecastSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $weatherConditions = ['Sunny', 'Rainy', 'Cloudy', 'Stormy']; // Example conditions
        $data = [];

        // Generate data for the last 12 months
        for ($i = 11; $i >= 0; $i--) {
            $startOfMonth = Carbon::now()->subMonths($i)->startOfMonth();
            $endOfMonth = Carbon::now()->subMonths($i)->endOfMonth();

            for ($date = $startOfMonth; $date->lte($endOfMonth); $date->addDay()) {
                $data[] = [
                    'city' => 'Bandung',
                    'date' => $date->format('Y-m-d'),
                    'temperature' => rand(1800, 3200) / 100, // Random temperature between 18.00 and 32.00 °C
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        // Insert data into the database
        WeatherForecast::insert($data);
    }
}
