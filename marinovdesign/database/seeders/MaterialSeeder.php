<?php

namespace Database\Seeders;

use App\Models\Material;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $materials = ['copper', 'brass'];

        foreach ($materials as $material) {
            Material::create([
                'name' => $material,
                'display_name' => $material
            ]);
        }
    }
}
