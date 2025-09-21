<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ColorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('colors')->insert([
            [
                'id' => 1,
                'product_id' => 2,
                'color' => 'blue',
                'hex_code' => '#252736',
                'created_at' => '2025-09-07 11:15:36',
                'updated_at' => '2025-09-07 11:15:36',
            ],
            [
                'id' => 2,
                'product_id' => 2,
                'color' => 'yelow',
                'hex_code' => '#ead19c',
                'created_at' => '2025-09-07 11:15:36',
                'updated_at' => '2025-09-07 11:15:36',
            ],
            [
                'id' => 3,
                'product_id' => 2,
                'color' => 'white',
                'hex_code' => '#cbccd1',
                'created_at' => '2025-09-07 11:15:36',
                'updated_at' => '2025-09-07 11:15:36',
            ],
            [
                'id' => 4,
                'product_id' => 2,
                'color' => 'red',
                'hex_code' => '#572f36',
                'created_at' => '2025-09-07 11:15:36',
                'updated_at' => '2025-09-07 11:15:36',
            ],
        ]);
    }
}
