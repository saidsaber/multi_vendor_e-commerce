<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(StoreSeeder::class);
        $this->call(CategoriesSeeder::class);
        $this->call(ProductSeeder::class); 
        $this->call(ColorsSeeder::class);
        $this->call(SizesSeeder::class);
        $this->call(ProductDetailSeeder::class); 
        $this->call(ImageSeeder::class); //wait
        $this->call(AddressSeeder::class);
    }
}
