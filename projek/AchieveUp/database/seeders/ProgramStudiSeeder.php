<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProgramStudiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('program_studi')->insert([
            [
                'kode' => 'D2-PPLS',
                'nama' => 'D2 Pengembangan Piranti Lunak Situs',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode' => 'D4-TI',
                'nama' => 'D4 Teknik Informatika',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode' => 'D4-SIB',
                'nama' => 'D4 Sistem Informasi Bisnis',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
