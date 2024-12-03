<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pakan extends Model
{
    use HasFactory;
    protected $table = 'pakan';
    protected $fillable = ['jenis_id', 'kategori_size_id','banyak_pakan_per_tikus', 'jumlah_pemberian_pakan', 'banyak_pakan_per_tikus'];

    public function jenis()
    {
        return $this->belongsTo(Jenis::class);
    }

    public function kategoriSize()
    {
        return $this->belongsTo(KategoriSize::class);
    }
}
