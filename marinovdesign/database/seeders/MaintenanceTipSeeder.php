<?php

namespace Database\Seeders;

use App\Models\Maintenance;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MaintenanceTipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Maintenance::create([
            'title' => 'Regular Dusting',
            'maintenance_tip' => 'Wipe with a soft, lint-free cloth to prevent buildup.'
        ]);
    }
}
