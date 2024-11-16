<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matkul extends Model
{
    use HasFactory;

    // Nama tabel yang digunakan oleh model ini
    protected $table = 'data_matkul';

    // Kolom-kolom yang dapat diisi secara massal
    protected $fillable = [
        'kd_matkul',
        'nama_matkul',
        'jumlah_matkul',
        'semester',
    ];

    // Menyesuaikan jika nama kolom primary key bukan 'id'
    protected $primaryKey = 'id';

    // Jika primary key bukan tipe integer
    public $incrementing = true;
    protected $keyType = 'int';

    // Jika tidak menggunakan timestamps
    // public $timestamps = true;
}
