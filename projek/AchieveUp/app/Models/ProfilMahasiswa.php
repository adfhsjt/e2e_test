<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilMahasiswa extends Model
{
    use HasFactory;

    protected $table = 'profil_mahasiswa';

     protected $fillable = [
        'mahasiswa_id',
        'pengalaman_organisasi',
        'skor_toffle',
        'semester',
        'is_active',
        'ips'
    ];

    protected $casts = [
        'pengalaman_organisasi' => 'double',
        'skor_toffle' => 'double',
        'semester' => 'integer',
        'is_active' => 'boolean',
        'ips' => 'double',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id');
    }

    public function getStatusAttribute()
    {
        return $this->is_active ? 'Aktif' : 'Tidak Aktif';
    }

    public function getIpsFormattedAttribute()
    {
        return number_format($this->ips, 3);
    }

    public function scopeAktif($query)
    {
        return $query->where('is_active', true);
    }

}
