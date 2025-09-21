<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'id' => 1,
                'name' => 'said saber',
                'email' => 'admin@admin.com',
                'role' => 'admin',
                'password' => '$2y$12$t5G1Vc/Qbubx6jgOSJ4nSulwRaH6JnLrlKQ.3bmYV473Mlh6aU6NC',
                'created_at' => '2025-09-07 10:13:24',
                'updated_at' => '2025-09-07 10:13:24',
            ],
            [
                'id' => 2,
                'name' => 'said saber',
                'email' => 'vendor@vendor.com',
                'role' => 'vendor',
                'password' => '$2y$12$5JsFvfapz0/tINhFmasoken80frXLXttvkgW57fRGqKKpaYQRleOq',
                'created_at' => '2025-09-07 10:13:25',
                'updated_at' => '2025-09-07 10:36:26',
            ],
            [
                'id' => 3,
                'name' => 'said saber',
                'email' => 'customer@customer.com',
                'role' => 'web',
                'password' => '$2y$12$9y8O9TRYYU4KI9KzcBenmOU.VsAOwjLZGbiRra7VpGlu1ut67S0va',
                'created_at' => '2025-09-07 10:13:25',
                'updated_at' => '2025-09-07 16:53:45',
            ],
            [
                'id' => 5,
                'name' => 'mobilevendor',
                'email' => 'mobilevendor@vendor.com',
                'role' => 'vendor',
                'password' => '$2y$12$J79Cx4u11sDaksWOJq9Pr.NglxBp1CJUpRMV3NrMfsun8KhiRK4Yi',
                'created_at' => '2025-09-07 12:06:39',
                'updated_at' => '2025-09-07 12:07:44',
            ],
            [
                'id' => 6,
                'name' => 'computervendor',
                'email' => 'computervendor@vendor.com',
                'role' => 'vendor',
                'password' => '$2y$12$Qrg.ZT5RVu9ZZgqqIC1nxuxHOxQDzuW0vkfYm9XpzdTTBofGbQcb2',
                'created_at' => '2025-09-07 12:51:05',
                'updated_at' => '2025-09-07 12:51:52',
            ],
            [
                'id' => 7,
                'name' => 'Sa3id Saber',
                'email' => 'saidsaber606@gmail.com',
                'role' => 'web',
                'password' => '$2y$12$dAYK/cxBs27qiH2LeNipEOOV1qacTaLuyCTdk3Iu.pDttipBfwWvq',
                'created_at' => '2025-09-08 14:19:14',
                'updated_at' => '2025-09-08 14:30:34',
            ],
            [
                'id' => 8,
                'name' => 'healthvendor',
                'email' => 'healthvendor@gmail.com',
                'role' => 'vendor',
                'password' => '$2y$12$luZWh2b1b/zAjLw3ZwKwyeCUGZm7/zE2MrTAI.jQ3jI0HRd/X87gi',
                'created_at' => '2025-09-08 21:17:00',
                'updated_at' => '2025-09-08 21:18:33',
            ],
        ]);
    }
}
