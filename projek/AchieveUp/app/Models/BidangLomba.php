<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BidangLomba extends Model
{
    use HasFactory;

    protected $table = 'bidang_lomba';

    protected $fillable = [
        'bidang_id',
        'lomba_id',
    ];

    public function bidang()
    {
        return $this->belongsTo(Bidang::class);
    }

    public function lomba()
    {
        return $this->belongsTo(Lomba::class);
    }
}
