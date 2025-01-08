<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalDosen extends Model
{
    use HasFactory;
    protected $table = 'jadwal_dosen';
    protected $fillable = ['id_data_dosen', 'id_data_jadwal'];

    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'id_data_dosen', 'id');
    }

    public function data_jadwal()
    {
        return $this->belongsTo(Jadwal::class, 'id_data_jadwal', 'id');
    }
}
