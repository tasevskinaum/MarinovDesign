<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'jewelry', 'display_name' => 'Jewelry'],
            ['name' => 'home_decor', 'display_name' => 'Home Decor']
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
