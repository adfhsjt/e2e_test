<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LombaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('lomba')->delete();

        $lombaData = [
            // Lomba yang sudah expired (tanggal daftar terakhir sudah lewat)
            [
                'judul' => 'National UI/UX Design Competition 2025',
                'tempat' => 'Institut Teknologi Bandung, Bandung',
                'tanggal_daftar' => '2025-01-01',
                'tanggal_daftar_terakhir' => '2025-01-20', // ❌ Expired
                'url' => 'https://uiux.itb.ac.id',
                'tingkat' => 'nasional',
                'is_individu' => true,
                'is_active' => false, // Tidak aktif karena expired
                'file_poster' => 'poster_uiux_2025.jpg',
                'is_akademik' => true,
            ],
            [
                'judul' => 'International Cybersecurity Challenge 2025',
                'tempat' => 'Online Platform',
                'tanggal_daftar' => '2025-02-01',
                'tanggal_daftar_terakhir' => '2025-02-15', // ❌ Expired
                'url' => 'https://cybersec2025.org',
                'tingkat' => 'internasional',
                'is_individu' => false,
                'is_active' => false, // Tidak aktif karena expired
                'file_poster' => 'poster_cybersec_2025.png',
                'is_akademik' => true,
            ],
            [
                'judul' => 'App Development Championship',
                'tempat' => 'Universitas Indonesia, Jakarta',
                'tanggal_daftar' => '2025-03-01',
                'tanggal_daftar_terakhir' => '2025-03-20', // ❌ Expired
                'url' => 'https://appdev.ui.ac.id',
                'tingkat' => 'nasional',
                'is_individu' => false,
                'is_active' => false, // Tidak aktif karena expired
                'file_poster' => 'poster_appdev_2025.jpg',
                'is_akademik' => true,
            ],

            // Lomba yang masih aktif (tanggal daftar terakhir belum lewat)
            [
                'judul' => 'Big Data Analytics Competition 2025',
                'tempat' => 'Institut Teknologi Sepuluh Nopember, Surabaya',
                'tanggal_daftar' => '2025-06-01',
                'tanggal_daftar_terakhir' => '2025-06-20', // ✅ Masih aktif
                'url' => 'https://bigdata.its.ac.id',
                'tingkat' => 'nasional',
                'is_individu' => true,
                'is_active' => true,
                'file_poster' => 'poster_bigdata_2025.jpg',
                'is_akademik' => true,
            ],
            [
                'judul' => 'International Business Plan Competition',
                'tempat' => 'Singapore Management University',
                'tanggal_daftar' => '2025-06-05',
                'tanggal_daftar_terakhir' => '2025-06-25', // ✅ Masih aktif
                'url' => 'https://bizplan.smu.edu.sg',
                'tingkat' => 'internasional',
                'is_individu' => false,
                'is_active' => true,
                'file_poster' => 'poster_bizplan_2025.png',
                'is_akademik' => true,
            ],
            [
                'judul' => 'Regional Web Development Contest',
                'tempat' => 'Universitas Gadjah Mada, Yogyakarta',
                'tanggal_daftar' => '2025-06-10',
                'tanggal_daftar_terakhir' => '2025-07-10', // ✅ Masih aktif
                'url' => 'https://webdev.ugm.ac.id',
                'tingkat' => 'regional',
                'is_individu' => true,
                'is_active' => true,
                'file_poster' => 'poster_webdev_2025.jpg',
                'is_akademik' => true,
            ],
            [
                'judul' => 'Provincial Art & Design Competition',
                'tempat' => 'Bandung Creative Hub',
                'tanggal_daftar' => '2025-06-15',
                'tanggal_daftar_terakhir' => '2025-07-15', // ✅ Masih aktif
                'url' => null,
                'tingkat' => 'provinsi',
                'is_individu' => true,
                'is_active' => true,
                'file_poster' => null,
                'is_akademik' => false,
            ],
            [
                'judul' => 'Machine Learning Olympics 2025',
                'tempat' => 'Massachusetts Institute of Technology, USA',
                'tanggal_daftar' => '2025-07-01',
                'tanggal_daftar_terakhir' => '2025-08-01', // ✅ Masih aktif
                'url' => 'https://mlo.mit.edu',
                'tingkat' => 'internasional',
                'is_individu' => false,
                'is_active' => true,
                'file_poster' => 'poster_ml_olympics_2025.png',
                'is_akademik' => true,
            ],
            [
                'judul' => 'Startup Pitch Competition Jateng',
                'tempat' => 'Semarang Innovation Center',
                'tanggal_daftar' => '2025-08-01',
                'tanggal_daftar_terakhir' => '2025-08-20', // ✅ Masih aktif
                'url' => 'https://startup.jatengprov.go.id',
                'tingkat' => 'regional',
                'is_individu' => false,
                'is_active' => true,
                'file_poster' => 'poster_startup_jateng_2025.jpg',
                'is_akademik' => false,
            ],
            [
                'judul' => 'International Programming Contest',
                'tempat' => 'Online Platform - ACM ICPC',
                'tanggal_daftar' => '2025-09-01',
                'tanggal_daftar_terakhir' => '2025-09-15', // ✅ Masih aktif
                'url' => 'https://icpc.global',
                'tingkat' => 'internasional',
                'is_individu' => false,
                'is_active' => true,
                'file_poster' => 'poster_icpc_2025.png',
                'is_akademik' => true,
            ],
        ];

        foreach ($lombaData as $lomba) {
            DB::table('lomba')->insert(array_merge($lomba, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }
}
