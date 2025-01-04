<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KoorMatkul extends Model
{
    use HasFactory;

    protected $table = 'koor_matkuls';
    protected $fillable = ['id_matkul', 'id_dosen'];


    function matkul()
    {
        return $this->belongsTo(Matkul::class, 'id_matkul');
    }

    function dosen()
    {
        return $this->belongsTo(Dosen::class, 'id_dosen');
    }
}
