<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Product::query();
    
        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }
    
        if ($request->filled('brand_id')) {
            $query->where('brand_id', $request->brand_id);
        }
    
        $searchTerm = $request->filled('nav_search') ? $request->nav_search : $request->product_search;
    
        if ($searchTerm) {
            $query->where(function($q) use ($searchTerm) {
                $q->where('name', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('description', 'LIKE', "%{$searchTerm}%");
            });
        }
    
        $products = $query->orderBy('created_at', 'desc')->paginate(12);
        $categories = Category::all();
        $brands = Brand::all();
    
        return view('pages.product.list', compact('products', 'categories', 'brands'));
    }
        
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        // dd(Auth::user()->permissions()->get())
        return view('pages.product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $validatedData = $request->validated();
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
            $validatedData['image'] = $imagePath;
        }

        Product::create($validatedData);

        return redirect()->route('products.index')->with('success', 'Product Added successfully.');;
    }

    /**
 * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('pages.product.show')->with('product', $product);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('pages.product.edit')->with('product', $product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $validatedData = $request->validated();
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
            $validatedData['image'] = $imagePath;
        }
        // dd($validatedData);
        $product->update($validatedData);
        // dd($product);
        return redirect()->route('products.index')->with('success', 'Product Updated successfully.');;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
    
    public function autocomplete(Request $request)
    {
        $query = $request->get('query');
        $products = Product::where('name', 'LIKE', "%{$query}%")
                        ->orWhere('description', 'LIKE', "%{$query}%")
                        ->take(5)
                        ->get();

        $output = '';
        foreach ($products as $product) {
            $output .= '<div class="autocomplete-item p-2 border-bottom">'.$product->name.'</div>';
        }

        return $output;
    }
}
