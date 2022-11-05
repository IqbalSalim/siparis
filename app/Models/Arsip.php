<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arsip extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_1',
        'nama_2',
        'judul_akta',
        'no_akta',
        'tanggal_akta',
        'jenis',
        'file_cover',
        'file_isi',
    ];
}
