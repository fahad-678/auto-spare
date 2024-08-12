<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');

        $products = Product::where('name', 'like', "%$query%")->get();
        $brands = Brand::where('name', 'like', "%$query%")->get();
        $categories = Category::where('name', 'like', "%$query%")->get();

        return response()->json([
            'products' => $products,
            'brands' => $brands,
            'categories' => $categories,
        ]);
    }
}
