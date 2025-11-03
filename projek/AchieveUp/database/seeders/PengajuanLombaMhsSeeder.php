<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PengajuanLombaMhsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pengajuan_lomba_mahasiswa')->insert([
            [
                'lomba_id' => 8,
                'mahasiswa_id' => 3,
                'status' => 'pending',
                'notes' => null,
                'admin_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'lomba_id' => 9,
                'mahasiswa_id' => 4,
                'status' => 'approved',
                'notes' => null,
                'admin_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'lomba_id' => 10,
                'mahasiswa_id' => 3,
                'status' => 'rejected',
                'notes' => 'Dokumen tidak lengkap, harap lengkapi dan ajukan ulang',
                'admin_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
