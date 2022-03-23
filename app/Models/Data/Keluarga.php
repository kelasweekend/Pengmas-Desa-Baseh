<?php

namespace App\Models\Data;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keluarga extends Model
{
    use HasFactory;

    protected $fillable = [
        'desa_wisma',
        'rt',
        'rw',
        'desa',
        'kecamatan',
        // 
        'nama_kepala_keluarga',
        'jumlah_anggota_keluarga',
        'pria',
        'wanita',
        'jumlah_kk',
        'balita',
        'pus',
        'wus',
        'ibu_menyusui',
        'lansia',
        // 
        'buta',
        'ibu_hamil',
        'kebutuhan_khusus',
        // 
        'makanan_pokok',
        'jamban_keluarga',
        'sumber_air',
        'pembuangan_sampah',
        'pembuangan_limbah',
        'stiker_p4k',
        'kegiatan_usaha_kesehatan',
    ];

    public function kartu_keluarga()
    {
        return $this->hasMany(Kartu_keluarga::class);
    }
    public function komoditi()
    {
        return $this->hasMany(Komoditi::class);
    }
}
