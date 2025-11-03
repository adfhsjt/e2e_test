<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MahasiswaPrestasiNote extends Model
{
    protected $table = 'mahasiswa_prestasi_notes';

    protected $fillable = [
        'mahasiswa_id',
        'prestasi_notes_id',
        'is_accepted',
    ];

    // Relasi ke Mahasiswa
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }

    // Relasi ke PrestasiNote
    public function prestasiNote()
    {
        return $this->belongsTo(PrestasiNote::class, 'prestasi_notes_id');
    }
}
