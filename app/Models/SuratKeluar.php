<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratKeluar extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_agenda',
        'no_surat',
        'tanggal_surat',
        'tujuan_surat',
        'perihal',
        'file'
    ];
}
