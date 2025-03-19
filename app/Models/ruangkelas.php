<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ruangkelas extends Model
{
    protected $fillable = [
        'guru_id',
        'siswa_id',
        'kelas_id'

    ];

    public function guru(): BelongsTo
    {
        return $this->belongsTo(guru::class);
    }

    public function siswa(): BelongsTo
    {
        return $this->belongsTo(siswa::class);
    }

    public function kelas(): BelongsTo
    {
        return $this->belongsTo(kelas::class);
    }



}