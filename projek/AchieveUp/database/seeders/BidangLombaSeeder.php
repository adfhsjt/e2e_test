<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BidangLombaSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('bidang_lomba')->delete();

        $mappings = [
            ['bidang_id' => 1, 'lomba_id' => 1], 
            ['bidang_id' => 2, 'lomba_id' => 2], 
            ['bidang_id' => 3, 'lomba_id' => 3], 
            ['bidang_id' => 4, 'lomba_id' => 4], 
            ['bidang_id' => 5, 'lomba_id' => 5], 
            ['bidang_id' => 3, 'lomba_id' => 6], 
            ['bidang_id' => 1, 'lomba_id' => 7], 
            ['bidang_id' => 4, 'lomba_id' => 8], 
            ['bidang_id' => 5, 'lomba_id' => 9],
            ['bidang_id' => 3, 'lomba_id' => 10],
        ];

        foreach ($mappings as $mapping) {
            DB::table('bidang_lomba')->insert([
                'bidang_id' => $mapping['bidang_id'],
                'lomba_id' => $mapping['lomba_id'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
