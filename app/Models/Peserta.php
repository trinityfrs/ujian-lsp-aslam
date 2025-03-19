<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    protected $fillable = ['nama', 'no_sertif', 'tema_pelatihan'];
}
