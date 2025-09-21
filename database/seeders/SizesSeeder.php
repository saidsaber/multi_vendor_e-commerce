<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SizesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sizes')->insert([
            [
                'id' => 1,
                'product_id' => 1,
                'name' => 'M',
                'created_at' => '2025-09-07 10:50:59',
                'updated_at' => '2025-09-07 10:50:59',
            ],
            [
                'id' => 2,
                'product_id' => 1,
                'name' => 'XL',
                'created_at' => '2025-09-07 10:50:59',
                'updated_at' => '2025-09-07 10:50:59',
            ],
            [
                'id' => 3,
                'product_id' => 1,
                'name' => 'XXL',
                'created_at' => '2025-09-07 10:50:59',
                'updated_at' => '2025-09-07 10:50:59',
            ],
            [
                'id' => 4,
                'product_id' => 1,
                'name' => 'XXXL',
                'created_at' => '2025-09-07 10:50:59',
                'updated_at' => '2025-09-07 10:50:59',
            ],
            [
                'id' => 5,
                'product_id' => 2,
                'name' => 'M',
                'created_at' => '2025-09-07 11:15:36',
                'updated_at' => '2025-09-07 11:15:36',
            ],
            [
                'id' => 6,
                'product_id' => 2,
                'name' => 'L',
                'created_at' => '2025-09-07 11:15:36',
                'updated_at' => '2025-09-07 11:15:36',
            ],
            [
                'id' => 7,
                'product_id' => 2,
                'name' => 'XL',
                'created_at' => '2025-09-07 11:15:36',
                'updated_at' => '2025-09-07 11:15:36',
            ],
            [
                'id' => 8,
                'product_id' => 3,
                'name' => 'M',
                'created_at' => '2025-09-07 12:00:54',
                'updated_at' => '2025-09-07 12:00:54',
            ],
            [
                'id' => 9,
                'product_id' => 3,
                'name' => 'L',
                'created_at' => '2025-09-07 12:00:54',
                'updated_at' => '2025-09-07 12:00:54',
            ],
            [
                'id' => 10,
                'product_id' => 3,
                'name' => 'XL',
                'created_at' => '2025-09-07 12:00:54',
                'updated_at' => '2025-09-07 12:00:54',
            ],
            [
                'id' => 11,
                'product_id' => 3,
                'name' => 'XXL',
                'created_at' => '2025-09-07 12:00:54',
                'updated_at' => '2025-09-07 12:00:54',
            ],
            [
                'id' => 12,
                'product_id' => 22,
                'name' => '150cm  x 230cm H ',
                'created_at' => '2025-09-08 21:31:56',
                'updated_at' => '2025-09-08 21:31:56',
            ],
            [
                'id' => 13,
                'product_id' => 22,
                'name' => '150cm W x 270 cm H ',
                'created_at' => '2025-09-08 21:31:56',
                'updated_at' => '2025-09-08 21:31:56',
            ],
            [
                'id' => 14,
                'product_id' => 22,
                'name' => '150cm W x 250cm H ',
                'created_at' => '2025-09-08 21:31:56',
                'updated_at' => '2025-09-08 21:31:56',
            ],
            [
                'id' => 15,
                'product_id' => 22,
                'name' => '250cm W x 230 cm H',
                'created_at' => '2025-09-08 21:31:56',
                'updated_at' => '2025-09-08 21:31:56',
            ],
        ]);
    }
}
