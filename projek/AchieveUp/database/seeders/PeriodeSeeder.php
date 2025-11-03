<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class PeriodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('periode')->delete();

        $data = [];
        $currentDate = Carbon::now();
        $currentYear = $currentDate->year;
        $currentMonth = $currentDate->month;

        for ($year = 2023; $year <= 2025; $year++) {
            $kodeGenap = $year . '-2';
            $namaGenap = 'Semester Genap ' . ($year - 1) . '/' . $year;

            $isGenapActive = ($year == $currentYear && $currentMonth >= 1 && $currentMonth <= 6);

            $kodeGanjil = ($year + 1) . '-1';
            $namaGanjil = 'Semester Ganjil ' . $year . '/' . ($year + 1);

            $isGanjilActive = ($year == $currentYear && $currentMonth >= 7 && $currentMonth <= 12);

            $data[] = [
                'kode' => $kodeGenap,
                'nama' => $namaGenap,
                'is_active' => $isGenapActive,
                'created_at' => now(),
                'updated_at' => now(),
            ];

            $data[] = [
                'kode' => $kodeGanjil,
                'nama' => $namaGanjil,
                'is_active' => $isGanjilActive,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('periode')->insert($data);
    }
}
