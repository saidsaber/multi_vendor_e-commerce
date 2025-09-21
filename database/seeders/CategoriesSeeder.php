<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'id' => 1,
                'name' => 'Fashion',
                'slug' => 'Fashion',
                'image' => 'categories/w4Fcl2yOYNo6g0A8Kxv5IQpCwjQxDJbT9DShN3l3.webp',
                'created_at' => '2025-09-07 10:22:40',
                'updated_at' => '2025-09-07 10:22:40',
            ],
            [
                'id' => 2,
                'name' => 'Mobile',
                'slug' => 'Mobile',
                'image' => 'categories/g7UqfvRc0NnRRolzBfzhUs9QfGEWlzQZ3sTK4fCN.webp',
                'created_at' => '2025-09-07 10:25:28',
                'updated_at' => '2025-09-07 10:25:28',
            ],
            [
                'id' => 3,
                'name' => 'computer',
                'slug' => 'computer',
                'image' => 'categories/cMzvBYCpaI4ghmLoTaIMmkdUb4QfKWRFsob0iHwz.jpg',
                'created_at' => '2025-09-07 10:26:32',
                'updated_at' => '2025-09-07 10:26:32',
            ],
            [
                'id' => 4,
                'name' => 'Home appliances',
                'slug' => 'Home appliances',
                'image' => 'categories/7j0vXW5vD5yckoD1bpNlISOGYVWHNVOpPpKn29mm.jpg',
                'created_at' => '2025-09-07 10:27:23',
                'updated_at' => '2025-09-07 10:27:23',
            ],
            [
                'id' => 5,
                'name' => 'Health and beauty',
                'slug' => 'Health and beauty',
                'image' => 'categories/XPYVuQvhCoQZHLwyFasYw3MQE95H1FdtRUdXENua.jpg',
                'created_at' => '2025-09-07 10:29:00',
                'updated_at' => '2025-09-07 10:29:00',
            ],
            [
                'id' => 6,
                'name' => 'Home and furniture',
                'slug' => 'Home and furniture',
                'image' => 'categories/jbU3EYrSdX7IaX3Mwm4UDx9cxDoDqpMiIZKsGU00.webp',
                'created_at' => '2025-09-07 10:30:22',
                'updated_at' => '2025-09-07 10:30:22',
            ],
            [
                'id' => 7,
                'name' => 'Gym',
                'slug' => 'Gym',
                'image' => 'categories/PWq7XwPtiItfsxhOSLHeoqAqOM5eGfUfX4q8isvF.webp',
                'created_at' => '2025-09-07 10:32:11',
                'updated_at' => '2025-09-07 10:32:11',
            ],
        ]);
    }
}
