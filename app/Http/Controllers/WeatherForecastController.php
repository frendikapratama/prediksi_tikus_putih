<?php

namespace App\Http\Controllers;

use App\Models\WeatherForecast;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Carbon\Carbon;

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
                            'weather_condition' => $forecast['weather'][0]['description'],
                        ]
                    );

                    $savedWeather[] = [
                        'city' => $weatherRecord->city,
                        'temperature' => $weatherRecord->temperature,
                        'date' => $weatherRecord->date
                    ];
                }

                // return response()->json([
                //     'message' => 'Weather data fetched and saved successfully!',
                //     'weather' => $savedWeather
                // ]);

                return back();
            }

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    
    
    // public function showWeatherPage()
    // {
    //     $weatherData = WeatherForecast::all(); // Ambil semua data cuaca dari database
    //     return view('weather.index', compact('weatherData'));
    // }
    
    


    public function showWeatherPage()
    {
        // Ambil tanggal terakhir dari data cuaca di database
        $lastDate = WeatherForecast::orderBy('date', 'desc')->value('date');

        // Hitung waktu hingga tombol dapat digunakan kembali
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

}
