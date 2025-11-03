<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanLombaMahasiswa extends Model
{
    use HasFactory;

    protected $table = 'pengajuan_lomba_mahasiswa';

    protected $fillable = [
        'lomba_id',
        'mahasiswa_id',
        'status',
        'notes',
        'admin_id',
    ];

    public function lomba()
    {
        return $this->belongsTo(Lomba::class, 'lomba_id');
    }

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id');
    }

    public function admin()
    {
        return $this->belongsTo(Dosen::class, 'admin_id');
    }
}
