<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DosenPembimbingRekomendasi extends Model
{
    use HasFactory;

    protected $table = 'dosen_pembimbing_rekomendasi';

    protected $fillable = [
        'rekomendasi_lomba_id',
        'dosen_id',
        'is_accepted',
        'note',
    ];

    // Relasi ke rekomendasi lomba
    public function rekomendasiLomba()
    {
        return $this->belongsTo(RekomendasiLomba::class, 'rekomendasi_lomba_id');
    }

    // Relasi ke dosen
    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'dosen_id');
    }
}
