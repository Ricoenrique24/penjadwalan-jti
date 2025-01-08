<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalTeknisi extends Model
{
    use HasFactory;
    protected $table = 'jadwal_teknisi';
    protected $fillable = ['id_data_teknisi', 'id_data_jadwal'];

    public function teknisi()
    {
        return $this->belongsTo(Teknisi::class, 'id_data_teknisi', 'id');
    }

    public function data_jadwal()
    {
        return $this->belongsTo(Jadwal::class, 'id_data_jadwal', 'id');
    }
}
