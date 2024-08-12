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
            'Electronics', 'Clothing', 'Books', 'Home & Garden', 'Sports & Outdoors',
            'Toys & Games', 'Beauty & Personal Care', 'Automotive', 'Health & Household',
            'Food & Grocery', 'Pet Supplies', 'Office Products', 'Arts & Crafts'
        ];
        
        foreach ($categories as $category) {
            Category::create(['name' => $category]);
        }

    }
}
