<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrestasiNote extends Model
{
    use HasFactory;

    protected $table = 'prestasi_notes';

    protected $fillable = ['prestasi_id', 'dosen_id', 'status', 'note'];

    public function prestasi()
    {
        return $this->belongsTo(Prestasi::class);
    }

    public function dosen()
    {
        return $this->belongsTo(Dosen::class);
    }
    public function mahasiswaNotes()
    {
        return $this->hasMany(MahasiswaPrestasiNote::class, 'prestasi_notes_id');
    }
}
