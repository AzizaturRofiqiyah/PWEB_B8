<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    /** @use HasFactory<\Database\Factories\KomentarFactory> */
    use HasFactory;

    protected $fillable = [
        'komentar',
    ];

    public function beasiswa()
    {
        return $this->belongsTo(InformasiBeasiswa::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function balas()
    {
        return $this->hasOne(Komentar::class);
    }
}
