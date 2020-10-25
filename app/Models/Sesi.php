<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sesi extends Model
{
    use HasFactory;
    protected $table = 'sesi';
    protected $fillable = [
        'bimbingan_id',
        'dosen_id',
        'mahasiswa_id',
        'sesi_konsultasi',
        'status',
    ];

    public function bimbingan()
    {
        return $this->belongsTo(Bimbingan::class);
    }

    public function konsultasi()
    {
        return $this->hasMany(Konsultasi::class);
    }
}
