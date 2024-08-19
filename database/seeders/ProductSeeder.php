<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        
        $brands = Brand::all();
        $categories = Category::all();

        for ($i = 0; $i < 20; $i++) {
            Product::create([
                'name' => $faker->words(3, true),
                'description' => $faker->sentence(),
                'price' => $faker->randomFloat(2, 10, 1000),
                'discount' => $faker->randomFloat(2, 0, 50),
                'image' => $faker->imageUrl(640, 480, 'products', true),
                'category_id' => $categories->random()->id,
                'brand_id' => $brands->random()->id,
                'stock' => $faker->numberBetween(0, 100),
                'status' => $faker->randomElement(['AVAILABLE', 'UNAVAILABLE']),
            ]);
        }
    }
}
