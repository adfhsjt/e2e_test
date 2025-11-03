<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    use HasFactory;

    protected $table = 'prestasi';
    protected $guarded = [];

    public function mahasiswas()
    {
        return $this->belongsToMany(Mahasiswa::class, 'prestasi_mahasiswa', 'prestasi_id', 'mahasiswa_id');
    }

    public function dosens()
    {
        return $this->belongsToMany(Dosen::class, 'pembimbing_prestasi', 'prestasi_id', 'dosen_id');
    }

    public function bidangs()
    {
        return $this->belongsToMany(Bidang::class, 'bidang_prestasi', 'prestasi_id', 'bidang_id');
    }

    public function notes()
    {
        return $this->hasMany(PrestasiNote::class, 'prestasi_id');
    }
}
