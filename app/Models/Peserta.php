<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Peserta extends Model
{
    protected $fillable = ['nama', 'no_sertif', 'tema_pelatihan', 'setting_id'];

    public function setting(): BelongsTo
    {
        return $this->belongsTo(Setting::class);
    }
}
