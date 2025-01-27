<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
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
        $sub_categories_query = SubCategory::query();

        if ($request->filled('category_id')) {
            $categoryId = $request->category_id;
            $query->where('category_id', $categoryId);
            $sub_categories_query->where('category_id', $categoryId)->orWhere('is_universal', 1);
        }

        if ($request->filled('sub_category_id')) {
            $query->where('sub_category_id', $request->sub_category_id);
        }

        if ($request->filled('brand_id')) {
            $query->where('brand_id', $request->brand_id);
        }

        $searchTerm = $request->filled('nav_search') ? $request->nav_search : $request->product_search;

        if ($searchTerm) {
            $query->where(function ($q) use ($searchTerm) {
                $q->where('name', 'LIKE', "%{$searchTerm}%");
            });
        }

        $products = $query->orderBy('created_at', 'desc')->paginate(12);
        $sub_categories = $sub_categories_query->get();

        return view('pages.product.list', compact('products', 'sub_categories'));
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

        $product = Product::create($validatedData);

        foreach ($validatedData['images'] as $image) {
            $imagePath = $image->store('products', 'public');
            $product->images()->create(['image_path' => $imagePath]);
        }

        return redirect()->route('products.index')->with('success', 'Product Added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $product->load(['subCategory', 'category']);
        return view('pages.product.show')->with('product', $product);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $product->load(['subCategory', 'images']);
        return view('pages.product.edit')->with('product', $product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $validatedData = $request->validated();
        $imageIds = array_map('intval', $validatedData['imageIds'] ?? []);

        $imagesToDelete = $product->images()->whereNotIn('id', $imageIds)->get();

        foreach ($imagesToDelete as $image) {
            if (Storage::disk('public')->exists($image->image_path)) {
                Storage::disk('public')->delete($image->image_path);
            }

            $image->delete();
        }

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $originalName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
                $uploadedId = (int) $originalName;

                if (!in_array($uploadedId, $imageIds)) {
                    $imagePath = $image->store('products', 'public');
                    $product->images()->create(['image_path' => $imagePath]);
                }
            }
        }

        $product->update($validatedData);

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
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

    public function search(Request $request)
    {
        $query = $request->get('query');
        $page = $request->get('page', 1);

        $perPage = 5;

        $products = Product::where('name', 'LIKE', "%{$query}%")
            ->orWhere('oem', 'LIKE', "%{$query}%")
            ->orWhere('part_number', 'LIKE', "%{$query}%")
            ->select('id', 'name')
            ->skip(($page - 1) * $perPage)
            ->take($perPage)
            ->get();

        $output = [];

        foreach ($products as $product) {
            $output[] = [
                'id' => $product->id,
                'text' => $product->name,
            ];
        }

        return response()->json([
            'items' => $output,
            'pagination' => [
                'more' => $products->count() == $perPage
            ]
        ]);
    }
}
