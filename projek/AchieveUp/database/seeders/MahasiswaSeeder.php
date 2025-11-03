<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class MahasiswaSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('mahasiswa')->delete();

        $modernNames = [
            'Reyhan Satriawan', 'Kiara Melinda', 'Arkan Pradipta', 'Zara Anastasia',
            'Daffa Mahardika', 'Naira Calista', 'Raffi Admandra', 'Kyla Seraphina',
            'Arkana Prasetyo', 'Ziva Celeste', 'Alvin Brahmantyo', 'Riska Adeline',
            'Bryan Theodorus', 'Luna Gabriella', 'Fajar Mahendra', 'Citra Adhisty',
            'Naufal Raditya', 'Aira Sekaringtyas', 'Radit Bramantio', 'Sari Vallerie',
        ];

        foreach ($modernNames as $index => $name) {
            $nim = '20230' . str_pad($index + 1, 4, '0', STR_PAD_LEFT);
            $firstName = strtolower(Str::before($name, ' '));
            $email = $firstName . '@student.achieveup.ac.id';

            $prodiIndex = ($index % 3) + 1;

            DB::table('mahasiswa')->insert([
                'nim' => $nim,
                'nama' => $name,
                'username' => $firstName,
                'email' => $email,
                'password' => Hash::make('mahasiswa123'),
                'foto' => null,
                'program_studi_id' => $prodiIndex,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
