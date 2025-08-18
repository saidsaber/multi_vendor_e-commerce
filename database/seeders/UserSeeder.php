<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'said saber',
            'email' => 'admin@admin.com',
            'password' => Hash::make(123456789), 
            'role' => 'admin'
        ]);
        User::create([
            'name' => 'said saber',
            'email' => 'vendor@vendor.com',
            'password' => Hash::make(123456789),
            'role' => 'vendor'
        ]);
        User::create([
            'name' => 'said saber',
            'email' => 'customer@customer.com',
            'password' => Hash::make(123456789),
            'role' => 'web'
        ]);
    }
}
