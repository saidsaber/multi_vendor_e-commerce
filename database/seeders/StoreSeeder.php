<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('stores')->insert([
            ['id' => 1, 'user_id' => 2, 'name' => 'Clothes store', 'description' => 'Clothes store', 'logo' => 'images/stores/gZAchbpakBkBgGCZWOocE9hF2UNcXu4xJuTlzYrf.jpg', 'isActive' => 1, 'created_at' => '2025-09-07 10:36:19', 'updated_at' => '2025-09-07 10:36:26'],
            ['id' => 2, 'user_id' => 5, 'name' => 'Smart Phones', 'description' => 'smart phone', 'logo' => 'images/stores/JMOAdyCDWLVoELv0ZD2EugICG0sbVIFwKVp4RxuC.webp', 'isActive' => 1, 'created_at' => '2025-09-07 12:07:22', 'updated_at' => '2025-09-07 12:07:44'],
            ['id' => 3, 'user_id' => 6, 'name' => 'Computer & Laptop', 'description' => 'Computer & Laptop', 'logo' => 'images/stores/oO6s7WGcCFJlTEzDu6kkigjeqCJYsHF9uFDMokLE.png', 'isActive' => 1, 'created_at' => '2025-09-07 12:51:35', 'updated_at' => '2025-09-07 12:51:52'],
            ['id' => 4, 'user_id' => 8, 'name' => 'Health and beauty', 'description' => 'HealthAndBeauty', 'logo' => 'images/stores/5nnDb3GmzPYAp889rIujc6tN9f6lM2DgTSe7YBiP.jpg', 'isActive' => 1, 'created_at' => '2025-09-08 21:18:09', 'updated_at' => '2025-09-08 21:18:33']

        ]);
    }
}
