<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bimbingan extends Model
{
    use HasFactory;
    protected $table = 'bimbingan';
    protected $fillable = [
        'mahasiswa_id',
        'dosen_id',
        'judul_ta',
        'semester',
        'fakultas',
        'tanggal_mulai',
        'tanggal_akhir',
        'status'
    ];

    public function dosen()
    {
        return $this->belongsTo(Dosen::class);
    }

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }

    public function sesi()
    {
        return $this->hasMany(Sesi::class);
    }
}
