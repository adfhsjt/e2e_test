<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MahasiswaRekomendasi extends Model
{
    use HasFactory;

    protected $table = 'mahasiswa_rekomendasi';

    protected $fillable = [
        'rekomendasi_lomba_id',
        'mahasiswa_id',
        'is_accepted',
        'note',
    ];

    public function rekomendasiLomba()
    {
        return $this->belongsTo(RekomendasiLomba::class, 'rekomendasi_lomba_id');
    }

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id');
    }
}
