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
        'deskripsi_singkat',
        'deadline',
        'foto',
        'status',
        'link_pendaftaran',
        'jenis',
        'wilayah',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function komentar()
    {
        return $this->hasMany(Komentar::class);
    }
}
