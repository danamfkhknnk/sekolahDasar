<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Siswa extends Model
{
    protected $fillable = [
        'nama_lengkap',
        'nisn',
        'jk',
        'tempatlahir',
        'tanggallahir',
        'alamat',
        'fotosiswa',
        'orang_tua_id'

    ];

    protected $casts = [
        'tanggallahir' => 'date',   
    ];

    
    public function kelas(){
        return $this->hasMany(Kelas::class);
    }

    public function ruangkelas(){
        return $this->hasMany(ruangkelas::class);
    }

    public function orang_tua(): BelongsTo
    {
        return $this->belongsTo(OrangTua::class);
    }

}