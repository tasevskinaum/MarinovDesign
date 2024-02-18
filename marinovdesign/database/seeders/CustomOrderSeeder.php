<?php

namespace Database\Seeders;

use App\Models\CustomOrder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CustomOrder::create([
            'name' => fake()->name(),
            'email' => fake()->email(),
            'message' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Repellendus facere perferendis ullam eos est voluptatum quae a, mollitia quos delectus esse dolorem excepturi, ut reprehenderit? Tempora nesciunt eos voluptate laboriosam.',
            'image' => 'https://ik.imagekit.io/lztd93pns/MarinovDesign/customorder.jpg?updatedAt=1708273680899'
        ]);
    }
}
