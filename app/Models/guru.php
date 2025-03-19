<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Guru extends Model
{
    protected $fillable = [
        'nama_lengkap',
        'nuptk',
        'jk',
        'mapel',
        'tempatlahir',
        'tanggallahir',
        'alamat',
        'fotoguru',
    ];

    protected $casts = [
        'tanggallahir' => 'date',   
    ];

    public function ruangkelas(){
        return $this->hasMany(ruangkelas::class);
    }

    public function kelas(){
        return $this->hasMany(Kelas::class);
    }

}