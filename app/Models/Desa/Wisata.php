<?php

namespace App\Models\Desa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wisata extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'slug_wisata',
        'deskripsi',
        'tiket',
        'alamat',
        'maps',
        'image',
        'lat', 'lng'
    ];
}
