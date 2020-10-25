<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Mahasiswa extends Authenticatable
{
    use HasFactory;
    
    protected $table = 'mahasiswa';
    protected $fillable = [
        'npm',
        'password',
        'nama_lengkap',
        'foto',
        'no_telp',
        'status',
    ];

    public function mahasiswa()
    {
        return $this->hasMany(Bimbingan::class);
    }
}
