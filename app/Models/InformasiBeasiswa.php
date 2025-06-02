<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformasiBeasiswa extends Model
{
    /** @use HasFactory<\Database\Factories\InformasiBeasiswaFactory> */
    use HasFactory;

    protected $fillable = [
        'judul',
        'deskripsi',
        'deadline',
        'foto',
        'link pendaftaran'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
