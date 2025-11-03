<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lomba extends Model
{
    use HasFactory;

    protected $table = 'lomba';

    protected $fillable = [
        'judul',
        'tempat',
        'tanggal_daftar',
        'tanggal_daftar_terakhir',
        'url',
        'tingkat',
        'is_individu',
        'is_active',
        'file_poster',
        'is_akademik',
    ];

    protected $casts = [
        'is_individu' => 'boolean',
        'is_active' => 'boolean',
        'is_akademik' => 'boolean',
        'tanggal_daftar' => 'date',
        'tanggal_daftar_terakhir' => 'date',
    ];

    public function bidang()
    {
        return $this->belongsToMany(Bidang::class, 'bidang_lomba', 'lomba_id', 'bidang_id');
    }
}
