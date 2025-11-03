<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DosenSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('dosen')->delete();

        $names = [
            'Adriano Reginald, M.T.', // admin - ID 1
            'Seraphina Calista, S.Kom., M.Kom.',
            'Maximilian Pradipta, S.T., M.T.',
            'Evangeline Adhisty, S.Kom., M.Sc.',
            'Theodorus Mahardika, S.T., M.Eng.',
            'Anastasia Sekaringtyas, S.Kom., M.Kom.',
            'Bramantio Satriawan, S.T., M.T.',
            'Gabriella Vallerie, S.Kom., M.Sc.',
            'Alessandro Brahmantyo, S.T., M.Eng.',
            'Serenity Adeline, S.Kom., M.Kom.',
        ];

        $nidnStart = 1001000001;

        foreach ($names as $index => $name) {
            $nidn = (string) ($nidnStart + $index);

            $nameParts = explode(' ', $name);
            $firstName = '';

            foreach ($nameParts as $part) {
                if (!str_contains($part, '.') && !str_contains($part, ',')) {
                    $firstName = strtolower($part);
                    break;
                }
            }

            $email = $firstName . '@achieveup.ac.id';
            $role = $index === 0 ? 'admin' : 'dosen pembimbing'; // ID 1 = admin

            DB::table('dosen')->insert([
                'nidn' => $nidn,
                'username' => $firstName,
                'nama' => $name,
                'email' => $email,
                'password' => Hash::make('dosen123'),
                'foto' => null,
                'role' => $role,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
