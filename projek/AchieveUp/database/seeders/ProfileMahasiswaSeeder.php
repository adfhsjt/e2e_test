<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfileMahasiswaSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('profil_mahasiswa')->delete();

        $profilData = [
            [
                'mahasiswa_id' => 1,
                'semester' => 2, // Semester Genap 2024/2025
                'ips' => 3.75,
                'skor_toffle' => 520,
                'pengalaman_organisasi' => 2, // 2 organisasi
                'is_active' => true,
                'file_toefl' => 'toefl_certificate_1.pdf',
                'file_ska_organisasi' => 'ska_organisasi_1.pdf',
            ],
            [
                'mahasiswa_id' => 2,
                'semester' => 2,
                'ips' => 3.82,
                'skor_toffle' => 485,
                'pengalaman_organisasi' => 1,
                'is_active' => true,
                'file_toefl' => 'toefl_certificate_2.pdf',
                'file_ska_organisasi' => 'ska_organisasi_2.pdf',
            ],
            [
                'mahasiswa_id' => 3,
                'semester' => 2,
                'ips' => 3.65,
                'skor_toffle' => 0.5,
                'pengalaman_organisasi' => 3,
                'is_active' => true,
                'file_toefl' => null,
                'file_ska_organisasi' => 'ska_organisasi_3.pdf',
            ],
            [
                'mahasiswa_id' => 4,
                'semester' => 2,
                'ips' => 3.90,
                'skor_toffle' => 550,
                'pengalaman_organisasi' => 1,
                'is_active' => true,
                'file_toefl' => 'toefl_certificate_4.pdf',
                'file_ska_organisasi' => 'ska_organisasi_4.pdf',
            ],
            [
                'mahasiswa_id' => 5,
                'semester' => 2,
                'ips' => 3.55,
                'skor_toffle' => 475,
                'pengalaman_organisasi' => 0.5, // Tidak ikut organisasi
                'is_active' => true,
                'file_toefl' => 'toefl_certificate_5.pdf',
                'file_ska_organisasi' => null,
            ],

            // Mahasiswa Semester 4 (angkatan 2023)
            [
                'mahasiswa_id' => 6,
                'semester' => 4, // Semester Genap 2023/2024 (sudah lewat) → 2024/2025
                'ips' => 3.68,
                'skor_toffle' => 505,
                'pengalaman_organisasi' => 4,
                'is_active' => true,
                'file_toefl' => 'toefl_certificate_6.pdf',
                'file_ska_organisasi' => 'ska_organisasi_6.pdf',
            ],
            [
                'mahasiswa_id' => 7,
                'semester' => 4,
                'ips' => 3.77,
                'skor_toffle' => 530,
                'pengalaman_organisasi' => 2,
                'is_active' => true,
                'file_toefl' => 'toefl_certificate_7.pdf',
                'file_ska_organisasi' => 'ska_organisasi_7.pdf',
            ],
            [
                'mahasiswa_id' => 8,
                'semester' => 4,
                'ips' => 3.85,
                'skor_toffle' => 575,
                'pengalaman_organisasi' => 3,
                'is_active' => true,
                'file_toefl' => 'toefl_certificate_8.pdf',
                'file_ska_organisasi' => 'ska_organisasi_8.pdf',
            ],

            // Mahasiswa Semester 6 (angkatan 2022)
            [
                'mahasiswa_id' => 9,
                'semester' => 6,
                'ips' => 3.72,
                'skor_toffle' => 495,
                'pengalaman_organisasi' => 5,
                'is_active' => true,
                'file_toefl' => 'toefl_certificate_9.pdf',
                'file_ska_organisasi' => 'ska_organisasi_9.pdf',
            ],
            [
                'mahasiswa_id' => 10,
                'semester' => 6,
                'ips' => 3.88,
                'skor_toffle' => 580,
                'pengalaman_organisasi' => 2,
                'is_active' => true,
                'file_toefl' => 'toefl_certificate_10.pdf',
                'file_ska_organisasi' => 'ska_organisasi_10.pdf',
            ],

            // Mix semester lainnya
            [
                'mahasiswa_id' => 11,
                'semester' => 2,
                'ips' => 3.60,
                'skor_toffle' => 0.5,
                'pengalaman_organisasi' => 1,
                'is_active' => true,
                'file_toefl' => null,
                'file_ska_organisasi' => 'ska_organisasi_11.pdf',
            ],
            [
                'mahasiswa_id' => 12,
                'semester' => 4,
                'ips' => 3.73,
                'skor_toffle' => 510,
                'pengalaman_organisasi' => 2,
                'is_active' => true,
                'file_toefl' => 'toefl_certificate_12.pdf',
                'file_ska_organisasi' => 'ska_organisasi_12.pdf',
            ],
            [
                'mahasiswa_id' => 13,
                'semester' => 2,
                'ips' => 3.45,
                'skor_toffle' => 450,
                'pengalaman_organisasi' => 0.5,
                'is_active' => true,
                'file_toefl' => 'toefl_certificate_13.pdf',
                'file_ska_organisasi' => null,
            ],
            [
                'mahasiswa_id' => 14,
                'semester' => 6,
                'ips' => 3.91,
                'skor_toffle' => 590,
                'pengalaman_organisasi' => 4,
                'is_active' => true,
                'file_toefl' => 'toefl_certificate_14.pdf',
                'file_ska_organisasi' => 'ska_organisasi_14.pdf',
            ],
            [
                'mahasiswa_id' => 15,
                'semester' => 4,
                'ips' => 3.67,
                'skor_toffle' => 525,
                'pengalaman_organisasi' => 1,
                'is_active' => true,
                'file_toefl' => 'toefl_certificate_15.pdf',
                'file_ska_organisasi' => 'ska_organisasi_15.pdf',
            ],

            // Mahasiswa non-aktif (cuti/dropout)
            [
                'mahasiswa_id' => 16,
                'semester' => 2,
                'ips' => 2.95, // IPS rendah
                'skor_toffle' => 0.5,
                'pengalaman_organisasi' => 0.5,
                'is_active' => false, // Tidak aktif
                'file_toefl' => null,
                'file_ska_organisasi' => null,
            ],
            [
                'mahasiswa_id' => 17,
                'semester' => 4,
                'ips' => 3.78,
                'skor_toffle' => 515,
                'pengalaman_organisasi' => 3,
                'is_active' => true,
                'file_toefl' => 'toefl_certificate_17.pdf',
                'file_ska_organisasi' => 'ska_organisasi_17.pdf',
            ],
            [
                'mahasiswa_id' => 18,
                'semester' => 2,
                'ips' => 3.83,
                'skor_toffle' => 545,
                'pengalaman_organisasi' => 2,
                'is_active' => true,
                'file_toefl' => 'toefl_certificate_18.pdf',
                'file_ska_organisasi' => 'ska_organisasi_18.pdf',
            ],
            [
                'mahasiswa_id' => 19,
                'semester' => 6,
                'ips' => 3.69,
                'skor_toffle' => 500,
                'pengalaman_organisasi' => 1,
                'is_active' => true,
                'file_toefl' => 'toefl_certificate_19.pdf',
                'file_ska_organisasi' => 'ska_organisasi_19.pdf',
            ],
            [
                'mahasiswa_id' => 20,
                'semester' => 2,
                'ips' => 3.54,
                'skor_toffle' => 0.5,
                'pengalaman_organisasi' => 0.5,
                'is_active' => true,
                'file_toefl' => null,
                'file_ska_organisasi' => null,
            ],
        ];

        foreach ($profilData as $profil) {
            DB::table('profil_mahasiswa')->insert([
                'mahasiswa_id' => $profil['mahasiswa_id'],
                'semester' => $profil['semester'],
                'ips' => $profil['ips'],
                'skor_toffle' => $profil['skor_toffle'],
                'pengalaman_organisasi' => $profil['pengalaman_organisasi'],
                'is_active' => $profil['is_active'],
                'file_toefl' => $profil['file_toefl'],
                'file_ska_organisasi' => $profil['file_ska_organisasi'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
