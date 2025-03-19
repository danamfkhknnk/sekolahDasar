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

    ];

    public function kelas(){
        return $this->hasMany(Kelas::class);
    }

}