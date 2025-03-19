<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Kelas extends Model
{
    protected $fillable = [
        'nama',
        'guru_id',
        'siswa_id'
    ];

    public function guru(): BelongsTo
    {
        return $this->belongsTo(guru::class);
    }

    public function siswa(): BelongsTo
    {
        return $this->belongsTo(Siswa::class);
    }
}