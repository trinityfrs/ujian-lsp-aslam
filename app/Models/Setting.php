<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'ceo',
        'nama_pengajar',
        'instansi_pengajar',
        'tempat',
        'tanggal_sertifikat',
        'ttd_pimpinan',
        'ttd_pengaja'
    ];
}
