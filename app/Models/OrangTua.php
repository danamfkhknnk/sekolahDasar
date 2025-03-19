<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrangTua extends Model
{
    protected $fillable = [
        'nama',
    ];

    
    public function siswa(){
        return $this->hasOne(Siswa::class);
    }
}