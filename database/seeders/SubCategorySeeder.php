<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::all();
        
        foreach ($categories as $category) {
            SubCategory::create([
                'name' => 'Subcategory 1 for ' . $category->name,
                'category_id' => $category->id,
            ]);
            SubCategory::create([
                'name' => 'Subcategory 2 for ' . $category->name,
                'category_id' => $category->id,
            ]);
        }
    }
}
