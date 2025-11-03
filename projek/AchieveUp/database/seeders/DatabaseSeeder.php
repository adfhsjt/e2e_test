<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            ProgramStudiSeeder::class,
            PeriodeSeeder::class,
            BidangSeeder::class,

            DosenSeeder::class,
            MahasiswaSeeder::class,
            ProfileMahasiswaSeeder::class,
            IPKMahasiswaSeeder::class,

            LombaSeeder::class,
            BidangLombaSeeder::class,
            PengajuanLombaMhsSeeder::class,

            PrestasiSeeder::class,
        ]);
    }
}
