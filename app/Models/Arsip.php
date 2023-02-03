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

    public function scopeMultipleSearch($query, $search)
    {
        return $query->where('nama_1', 'like', '%' . $search . '%')
            ->orWhere('nama_2', 'like', '%' . $search . '%')
            ->orWhere('judul_akta', 'like', '%' . $search . '%')
            ->orWhere('no_akta', 'like', '%' . $search . '%');
    }
}
