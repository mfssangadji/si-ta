<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Dosen extends Authenticatable
{
    use HasFactory;
    protected $table = 'dosen';
    protected $fillable = [
        'nip',
        'password',
        'nama_lengkap',
        'foto',
        'no_telp',
        'status',
    ];

    public function bimbingan()
    {
        return $this->hasMany(Bimbingan::class);
    }
}