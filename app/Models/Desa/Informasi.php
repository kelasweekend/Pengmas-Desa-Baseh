<?php

namespace App\Models\Desa;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Informasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug_url',
        'kategori',
        'body',
        'image',
        'lng',
        'lat'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
