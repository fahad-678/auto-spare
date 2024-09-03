<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $categories = [
            'Electronics', 'Clothing'
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category,
                'image' => $faker->imageUrl(640, 480, 'products', true)
            ]);
        }
    }
}
