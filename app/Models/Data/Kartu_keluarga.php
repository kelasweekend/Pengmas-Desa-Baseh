<?php

namespace App\Models\Data;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kartu_keluarga extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomor_kk',
        'nama_lengkap',
        'status_keluarga',
        'status_perkawinan',
        'kelamin',
        'ttl',
        'pendidikan',
        'pekerjaan',
    ];

    public function keluarga()
    {
        return $this->belongsTo(Keluarga::class);
    }
}
