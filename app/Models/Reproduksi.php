<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reproduksi extends Model
{
    use HasFactory;
    protected $table = 'reproduksi';
    protected $fillable = ['jenis_id', 'kategori_size_id','total_reproduksi','total_mati','periode'];

    public function jenis()
    {
        return $this->belongsTo(Jenis::class);
    }

    public function kategoriSize()
    {
        return $this->belongsTo(KategoriSize::class);
    }
}
