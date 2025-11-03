<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IPKMahasiswaSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('ipk_mahasiswa')->delete();

        $ipkData = [];

        $mahasiswaSemester2 = [1, 2, 3, 4, 5, 11, 13, 16, 18, 20];
        foreach ($mahasiswaSemester2 as $mahasiswaId) {
            $ipkData[] = [
                'mahasiswa_id' => $mahasiswaId,
                'periode_id' => 4, // 2025-1 (Ganjil 2024/2025)
                'ipk' => $this->generateRandomIPS(3.2, 3.9),
                'created_at' => now()->subMonths(6),
                'updated_at' => now()->subMonths(6),
            ];

            $ipkData[] = [
                'mahasiswa_id' => $mahasiswaId,
                'periode_id' => 5, // 2025-2 (Genap 2024/2025)
                'ipk' => $this->generateRandomIPS(3.4, 3.9),
                'created_at' => now()->subMonths(1),
                'updated_at' => now()->subMonths(1),
            ];
        }

        $mahasiswaSemester4 = [6, 7, 8, 12, 15, 17];
        foreach ($mahasiswaSemester4 as $mahasiswaId) {
            $periods = [2, 3, 4, 5]; // 2023-2, 2024-1, 2025-1, 2025-2

            foreach ($periods as $index => $periodeId) {
                $ipkData[] = [
                    'mahasiswa_id' => $mahasiswaId,
                    'periode_id' => $periodeId,
                    'ipk' => $this->generateRandomIPS(3.2, 3.9),
                    'created_at' => now()->subMonths(18 - ($index * 6)),
                    'updated_at' => now()->subMonths(18 - ($index * 6)),
                ];
            }
        }

        $mahasiswaSemester6 = [9, 10, 14, 19];
        foreach ($mahasiswaSemester6 as $mahasiswaId) {
            $periods = [1, 2, 3, 4, 5, 6]; 

            foreach ($periods as $index => $periodeId) {
                if ($periodeId <= 5) { 
                    $ipkData[] = [
                        'mahasiswa_id' => $mahasiswaId,
                        'periode_id' => $periodeId,
                        'ipk' => $this->generateRandomIPS(3.3, 3.9),
                        'created_at' => now()->subMonths(30 - ($index * 6)),
                        'updated_at' => now()->subMonths(30 - ($index * 6)),
                    ];
                }
            }
        }

        foreach ($ipkData as $ipk) {
            DB::table('ipk_mahasiswa')->insert($ipk);
        }
    }

    private function generateRandomIPS($min, $max)
    {
        return round(mt_rand($min * 100, $max * 100) / 100, 2);
    }
}
