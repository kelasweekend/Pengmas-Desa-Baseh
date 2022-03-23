<?php

namespace App\Models\Data;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komoditi extends Model
{
    use HasFactory;

    protected $fillable = [
        'komoditi_peternakan',
        'volume_peternakan',
        // perikanan
        'komoditi_perikanan',
        'volume_perikanan',
        // warung
        'komoditi_warung',
        'volume_warung',
        // toga
        'komoditi_toga',
        'volume_toga',
        // lumbung hidup
        'komoditi_lumbung',
        'volume_lumbung',
        // tanaman
        'komoditi_tanaman',
        'volume_tanaman',
        // pangan
        'komoditi_pangan',
        'volume_pangan',
        // sandang
        'komoditi_sandang',
        'volume_sandang',
        // jasa
        'komoditi_jasa',
        'volume_jasa',
        // lainnya
        'komoditi_lainnya',
        'volume_lainnya',
    ];

    public function keluarga()
    {
        return $this->belongsTo(Keluarga::class);
    }
}
