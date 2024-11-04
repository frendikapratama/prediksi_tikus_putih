<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tikus extends Model
{
    use HasFactory;
    protected $table = 'tikus';
    protected $fillable = ['jenis_id', 'kategori_size_id', 'banyak'];

    public function jenis()
    {
        return $this->belongsTo(Jenis::class);
    }

    public function kategoriSize()
    {
        return $this->belongsTo(KategoriSize::class);
    }
}
