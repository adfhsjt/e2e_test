<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BidangPrestasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('bidang_prestasi')->insert([
            [
                'bidang_id' => 1,
                'prestasi_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'bidang_id' => 2,
                'prestasi_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'bidang_id' => 3,
                'prestasi_id' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'bidang_id' => 4,
                'prestasi_id' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'bidang_id' => 5,
                'prestasi_id' => 5,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
