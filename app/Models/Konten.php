<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konten extends Model
{
    /** @use HasFactory<\Database\Factories\KontenFactory> */
    use HasFactory;

    protected $fillable = [
        'judul',
        'deskripsi',
        'foto',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // public function komentars()
    // {
    // return $this->hasMany(Komentar::class);
    // }
}
