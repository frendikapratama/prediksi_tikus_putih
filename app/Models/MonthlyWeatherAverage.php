<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonthlyWeatherAverage  extends Model
{
    protected $table = 'monthly_weather_averages';
    protected $fillable = [
        'city',
        'year',
        'month',
        'average_temperature',
        'total_records',
        'dominant_weather_condition'
    ];
}
