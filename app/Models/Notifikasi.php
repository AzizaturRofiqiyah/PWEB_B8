<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notifikasi extends Model
{
    /** @use HasFactory<\Database\Factories\NotifikasiFactory> */
    use HasFactory;

    protected $fillable =[
        'judul',
        'isi',
        'isreaded',
        'link',
        'tipe',
        'user_id'
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
