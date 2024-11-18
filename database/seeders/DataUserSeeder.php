<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DataUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Dr. Budi Santoso',
                'email' => 'budi.santoso@univ.ac.id',
                'status' => 'dosen',
                'password' => Hash::make('password123'), // Password di-hash
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Prof. Siti Aminah',
                'email' => 'siti.aminah@univ.ac.id',
                'status' => 'dosen',
                'password' => Hash::make('securePass456'), // Password di-hash
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Joko Prasetyo',
                'email' => 'joko.prasetyo@univ.ac.id',
                'status' => 'teknisi',
                'password' => Hash::make('pass789'), // Password di-hash
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Rina Setiawan',
                'email' => 'rina.setiawan@univ.ac.id',
                'status' => 'teknisi',
                'password' => Hash::make('pass1234'), // Password di-hash
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Admin Jurusan',
                'email' => 'admin@jti.polije.ac.id',
                'status' => 'admin',
                'password' => Hash::make('jtiadmin123'), // Password di-hash
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
