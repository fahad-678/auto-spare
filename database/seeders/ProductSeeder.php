<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
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
        $sub_categories = SubCategory::all();

        for ($i = 0; $i < 5; $i++) {
            Product::create([
                'name' => $faker->words(3, true),
                'price' => $faker->randomFloat(2, 10, 1000),
                'image' => $faker->imageUrl(640, 480, 'products', true),
                'sub_category_id' => $sub_categories->random()->id,
                'brand_id' => $brands->random()->id,
                'status' => $faker->randomElement(['AVAILABLE', 'UNAVAILABLE']),
            ]);
        }
    }
}
