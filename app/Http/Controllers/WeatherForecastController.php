<?php

namespace App\Http\Controllers;

use App\Models\WeatherForecast;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\MonthlyWeatherAverage;
use Illuminate\Support\Facades\DB;

class WeatherForecastController extends Controller
{
    public function fetchWeatherData()
    {
        $city = 'Bandung';
        $url = "https://api.openweathermap.org/data/2.5/forecast?q={$city}&units=metric&appid=293d8a72fb1c2b7bfaf560d9fdaca72d";
    
        try {
            $response = Http::timeout(10)->get($url);

            if ($response->successful()) {
                $forecastData = $response->json();
                $savedWeather = [];
                foreach ($forecastData['list'] as $forecast) {
                    $weatherRecord = WeatherForecast::updateOrCreate(
                        [
                            'city' => $city,
                            'date' => date('Y-m-d', strtotime($forecast['dt_txt'])),
                        ],
                        [
                            'temperature' => $forecast['main']['temp'],
                        ]
                    );

                    $savedWeather[] = [
                        'city' => $weatherRecord->city,
                        'temperature' => $weatherRecord->temperature,
                        'date' => $weatherRecord->date
                    ];
                }

                return back();
            }

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    
    
   
    


    public function showWeatherPage()
    {
        $lastDate = WeatherForecast::orderBy('date', 'desc')->value('date');
        $canFetch = true;
        $timeRemaining = null;

        if ($lastDate) {
            $nextAvailableDate = Carbon::parse($lastDate)->addDays(1);
            $now = Carbon::now();

            if ($now->lessThan($nextAvailableDate)) {
                $canFetch = false;
                $timeRemaining = $now->diffInSeconds($nextAvailableDate);
            }
        }

        $weatherData = WeatherForecast::orderBy('date', 'desc')->paginate(10); // Use paginate() instead of get()
        return view('weather.index', compact('weatherData', 'canFetch', 'timeRemaining'));
    }

    public function calculateMonthlyAverages()
    {
        // Ambil semua data yang unik berdasarkan kota, tahun, dan bulan
        $groupedData = WeatherForecast::select(
            'city', 
            DB::raw('YEAR(date) as year'), 
            DB::raw('MONTH(date) as month')
        )
        ->groupBy('city', 'year', 'month')
        ->get();

        foreach ($groupedData as $group) {
            $monthlyData = WeatherForecast::where('city', $group->city)
                ->whereYear('date', $group->year)
                ->whereMonth('date', $group->month)
                ->get();

            if ($monthlyData->isNotEmpty()) {
                $averageTemperature = $monthlyData->avg('temperature');
                $weatherConditions = $monthlyData
                    ->groupBy('weather_condition')
                    ->map(function ($group) {
                        return $group->count();
                    })
                    ->sortDesc();
                $dominantWeatherCondition = $weatherConditions->keys()->first();
                MonthlyWeatherAverage::where([
                    'city' => $group->city,
                    'year' => $group->year,
                    'month' => $group->month
                ])->delete();
                MonthlyWeatherAverage::create([
                    'city' => $group->city,
                    'year' => $group->year,
                    'month' => $group->month,
                    'average_temperature' => round($averageTemperature, 2),
                ]);
            }
        }
        return redirect()->back()->with('success', 'Perhitungan rata-rata bulanan berhasil!');
    }

    public function index()
    {
        Carbon::setLocale('id');
        $monthlyAverages = MonthlyWeatherAverage::orderBy('year', 'desc')
            ->orderBy('month', 'desc')
            ->paginate(10);
        $monthlyAverages->transform(function ($item) {
            $carbonDate = Carbon::createFromDate($item->year, $item->month, 1);
            $item->formatted_month = $carbonDate->translatedFormat('F ');
            return $item;
        });
        if ($monthlyAverages->isEmpty()) {
            $this->calculateMonthlyAverages();
            $monthlyAverages = MonthlyWeatherAverage::orderBy('year', 'desc')
                ->orderBy('month', 'desc')
                ->paginate(10);
            $monthlyAverages->transform(function ($item) {
                $carbonDate = Carbon::createFromDate($item->year, $item->month, 1);
                $item->formatted_month = $carbonDate->translatedFormat('F ');
                return $item;
            });
        }
    
        return view('weather.bulanan', compact('monthlyAverages'));
    }
    public function recalculateMonthlyAverages()
    {
        MonthlyWeatherAverage::truncate();
        $this->calculateMonthlyAverages();
        return redirect()->back()->with('success', 'Perhitungan rata-rata bulanan berhasil diperbarui!');
    }
}
