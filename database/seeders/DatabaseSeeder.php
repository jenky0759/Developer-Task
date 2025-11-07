<?php

namespace Database\Seeders;

use App\Models\Category;
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
        Category::create([
            'name' => 'Gold'
        ]);

        Category::create([
            'name' => 'Silver'
        ]);

        Category::create([
            'name' => 'Bronze'
        ]);

    }
}
