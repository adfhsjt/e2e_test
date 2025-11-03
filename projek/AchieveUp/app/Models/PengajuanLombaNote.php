<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanLombaNote extends Model
{
    use HasFactory;

    protected $table = 'pengajuan_lomba_notes';

    protected $fillable = [
        'pengajuan_lomba_mahasiswa_id',
        'is_accepted',
    ];

    // Relasi ke PengajuanLombaMahasiswa
    public function pengajuanLombaMahasiswa()
    {
        return $this->belongsTo(PengajuanLombaMahasiswa::class, 'pengajuan_lomba_mahasiswa_id');
    }
}