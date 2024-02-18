<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jewelryCategoryId = Category::where('name', 'jewelry')->get()->first()->id;
        $homeDecorCategoryId = Category::where('name', 'home_decor')->get()->first()->id;

        $jewelryTypes = [
            ['name' => 'earrings', 'display_name' => 'Earrings', 'category_id' => $jewelryCategoryId],
            ['name' => 'rings', 'display_name' => 'Rings', 'category_id' => $jewelryCategoryId],
            ['name' => 'necklaces', 'display_name' => 'Necklaces', 'category_id' => $jewelryCategoryId],
            ['name' => 'bracelets', 'display_name' => 'Bracelets', 'category_id' => $jewelryCategoryId],
            ['name' => 'sets', 'display_name' => 'Sets', 'category_id' => $jewelryCategoryId],
            ['name' => 'other', 'display_name' => 'Other', 'category_id' => $jewelryCategoryId]
        ];

        $homeDecorTypes = [
            ['name' => 'helmets', 'display_name' => 'Helmets', 'category_id' => $homeDecorCategoryId],
            ['name' => 'other', 'display_name' => 'Other', 'category_id' => $homeDecorCategoryId]
        ];

        $types = array_merge($jewelryTypes, $homeDecorTypes);

        foreach ($types as $type) {
            Type::create($type);
        }
    }
}
