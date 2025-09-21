<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('adress')->insert([
            [
                'id' => 1,
                'user_id' => 3,
                'city' => 'cairo',
                'street' => 'test',
                'adress' => 'Address Details test',
                'phone' => '01234567897',
                'created_at' => '2025-09-07 16:53:25',
                'updated_at' => '2025-09-07 16:53:25',
            ],
            [
                'id' => 2,
                'user_id' => 7,
                'city' => 'cairo',
                'street' => 'test',
                'adress' => 'Address Details test test',
                'phone' => '01234567897',
                'created_at' => '2025-09-08 14:29:48',
                'updated_at' => '2025-09-08 14:29:48',
            ],
        ]);
    }
}
