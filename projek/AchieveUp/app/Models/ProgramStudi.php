<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProgramStudi extends Model
{
    use HasFactory;

    protected $table = 'program_studi';

    protected $fillable = [
        'kode',
        'nama',
    ];
    public function mahasiswa(): HasMany
    {
        return $this->hasMany(Mahasiswa::class, 'program_studi_id');
    }
    
}
