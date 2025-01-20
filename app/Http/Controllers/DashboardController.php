<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('created_at', 'desc')->paginate(8);
        $hotItems = Category::where('hot_item', 1)->orderBy('created_at', 'desc')->get();
        return view('pages/dashboard.index')->with(['categories' => $categories, 'hotItems' => $hotItems]);
    }

    public function globalSearch(Request $request)
    {
        $query = $request->get('query');
        $page = $request->get('page', 1);

        $perPage = 5;

        $categories = Category::where('name', 'LIKE', "%{$query}%")
            ->select('id', 'name')
            ->skip(($page - 1) * $perPage)
            ->take($perPage)
            ->get();


        $products = Product::where('name', 'LIKE', "%{$query}%")
            ->orWhere('oem', 'LIKE', "%{$query}%")
            ->orWhere('part_number', 'LIKE', "%{$query}%")
            ->select('id', 'name')
            ->skip(($page - 1) * $perPage)
            ->take($perPage)
            ->get();

        $result = [];
        $totalCategories = $categories->count() == $perPage;
        $totalProducts = $products->count()  == $perPage;

        foreach ($categories as $category) {
            $result[] = [
                'id' => $category->id,
                'text' => $category->name,
                'type' => 'category',
            ];
        }
        foreach ($products as $product) {
            $result[] = [
                'id' => $product->id,
                'text' => $product->name,
                'type' => 'products',
            ];
        }

        return response()->json([
            'items' => $result,
            'pagination' => [
                'more' => $totalCategories || $totalProducts
            ]
        ]);
    }
    public function aboutUs()
    {
        return view('pages/dashboard.about-us');
    }

    public function contactUs()
    {
        return view('pages/dashboard.contact-us');
    }
}
