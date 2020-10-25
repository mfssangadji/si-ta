<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konsultasi extends Model
{
    use HasFactory;
    protected $table = 'konsultasi';
    protected $fillable = [
        'sesi_id',
        'deskripsi',
        'lampiran',
        'msg_status',
    ];

    public function sesi()
    {
        return $this->belongsTo(Sesi::class);
    }
}
