<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratMasuk extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_agenda',
        'no_surat',
        'tanggal_surat',
        'tanggal_terima',
        'asal_surat',
        'perihal',
        'file'
    ];
}
