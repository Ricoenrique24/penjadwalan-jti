<?php

namespace Database\Seeders;

use App\Models\Dosen;
use App\Models\Teknisi;
use App\Models\User;
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

        User::create([
            'name' => 'Admin',
            'email' => 'admin@jti.polije.ac.id',
            'status' => 'admin',
            'password' => Hash::make('jtiadmin123'),
        ]);

        $dosen = Dosen::all();

        foreach ($dosen as $key => $value) {
            User::upsert([
                'name' =>  $value->nama_dosen,
                'email' => $value->nip . '@polije.ac.id',
                'nip' => $value->nip,
                'status' => 'dosen',
                'password' => Hash::make('jtipolije'),
            ], ['nip'], ['email']);
        }

        $teknisi = Teknisi::all();

        foreach ($teknisi as $key => $value) {
            User::upsert([
                'name' =>  $value->nama_teknisi,
                'email' => $value->nik . '@polije.ac.id',
                'nip' => $value->nik,
                'status' => 'teknisi',
                'password' => Hash::make('jtipolije'),
            ], ['nip'], ['email']);
        }
    }
}
