<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keuangan extends Model
{
    use HasFactory;
    protected $table = 'keuangan';
    protected $fillable = [
        'jenis_id', 
        'kategori_size_id', 
        'biaya_pakan', 
        'biaya_lainnya', 
        'harga_pertikus', 
        'pendapatan_bulanan'
    ];

    public function jenis()
    {
        return $this->belongsTo(Jenis::class);
    }

    public function kategoriSize()
    {
        return $this->belongsTo(KategoriSize::class);
    }
}
