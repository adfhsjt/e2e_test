<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekomendasiLomba extends Model
{
    use HasFactory;

    protected $table = 'rekomendasi_lomba';

    protected $fillable = [
        'lomba_id',
    ];

    // Relasi ke lomba
    public function lomba()
    {
        return $this->belongsTo(Lomba::class, 'lomba_id');
    }

    // Relasi ke mahasiswa_rekomendasi
    public function mahasiswaRekomendasi()
    {
        return $this->hasMany(MahasiswaRekomendasi::class, 'rekomendasi_lomba_id');
    }

    // Relasi ke dosen_pembimbing_rekomendasi
    public function dosenPembimbingRekomendasi()
    {
        return $this->hasMany(DosenPembimbingRekomendasi::class, 'rekomendasi_lomba_id');
    }

    
}
