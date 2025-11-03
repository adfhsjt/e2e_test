<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periode extends Model
{
    use HasFactory;

    protected $table = 'periode';

    protected $fillable = [
        'kode',
        'nama',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    // Scope untuk periode aktif
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Method untuk set periode aktif (hanya 1 yang aktif)
    public static function setActive($periodeId)
    {
        // Nonaktifkan semua periode
        static::query()->update(['is_active' => false]);

        // Aktifkan periode yang dipilih
        static::find($periodeId)->update(['is_active' => true]);
    }

    // Get periode aktif saat ini
    public static function getCurrentActive()
    {
        return static::where('is_active', true)->first();
    }

    public function prestasi()
    {
        return $this->hasMany(Prestasi::class); // atau sesuaikan nama modelnya
    }
}
