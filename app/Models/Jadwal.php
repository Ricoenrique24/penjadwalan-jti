<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    // Nama tabel yang digunakan oleh model ini
    protected $table = 'data_jadwal';

    // Kolom-kolom yang dapat diisi secara massal
    protected $fillable = [
        'id_matkul',
        'hari',
        'id_jam',
        'tahun_ajaran',
        'semester',
        'id_ruangan',
        'id_kelas'
    ];

    // Menyesuaikan jika nama kolom primary key bukan 'id'
    protected $primaryKey = 'id';

    // Jika primary key bukan tipe integer
    public $incrementing = true;
    protected $keyType = 'int';

    // Jika tidak menggunakan timestamps
    // public $timestamps = true;

    public function dosens()
    {
        return $this->hasMany(JadwalDosen::class, 'id_data_jadwal');
    }

    public function teknisis()
    {
        return $this->hasMany(JadwalTeknisi::class, 'id_data_jadwal');
    }

    public function matkul()
    {
        return $this->belongsTo(Matkul::class, 'id_matkul');
    }

    public function ruangan()
    {
        return $this->belongsTo(Ruangan::class, 'id_ruangan');
    }
    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }
    public function jam()
    {
        return $this->belongsTo(Jam::class, 'id_jam');
    }
}
