<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // Nama tabel yang digunakan oleh model ini
    protected $table = 'users';

    // Kolom-kolom yang dapat diisi secara massal
    protected $fillable = [
        'id',
        'name',
        'email',
        'status',
        'password',
    ];

    // Menyesuaikan jika nama kolom primary key bukan 'id'
    protected $primaryKey = 'id';

    // Jika primary key bukan tipe integer
    public $incrementing = true;
    protected $keyType = 'int';

    // Jika tidak menggunakan timestamps
    // public $timestamps = true;

    // Mengatur password untuk disimpan dalam bentuk hashed
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Type casting untuk kolom tertentu
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
