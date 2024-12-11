<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reproduksi extends Model
{
    use HasFactory;
    protected $table = 'reproduksi';
    protected $fillable = ['total_reproduksi','total_mati','periode'];
}
