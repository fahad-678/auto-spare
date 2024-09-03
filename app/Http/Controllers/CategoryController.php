<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if (request()->ajax()) {
            $categories = Category::all();
            return response()->json($categories);
        }
        
        $query = Category::query();

        $searchTerm = $request->category_search;
        if ($searchTerm) {
            $query->where(function ($q) use ($searchTerm) {
                $q->where('name', 'LIKE', "%{$searchTerm}%");
            });
        }

        $categories = $query->orderBy('created_at', 'desc')->paginate(12);

        return view('pages.category.list')->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $validatedData = $request->validated();
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
            $validatedData['image'] = $imagePath;
        }

        Category::create($validatedData);

        return redirect()->route('category.index')->with('success', 'category Added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        if (request()->ajax()) {
            return response()->json($category);
        }

        return view('pages.category.show', compact('category'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('pages.category.edit')->with('category', $category);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $validatedData = $request->validated();
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
            $validatedData['image'] = $imagePath;
        }
        $category->update($validatedData);

        return redirect()->route('category.index')->with('success', 'Category Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if ($category->image) {
            Storage::disk('public')->delete($category->image);
        }
        $category->delete();
        return redirect()->route('category.index')->with('success', 'Category deleted successfully.');
    }

    public function autocomplete(Request $request)
    {
        $query = $request->get('query');
        $categories = Category::where('name', 'LIKE', "%{$query}%")
            ->take(5)
            ->get();

        $output = '';
        foreach ($categories as $category) {
            $output .= '<div class="autocomplete-item p-2 border-bottom">' . $category->name . '</div>';
        }

        return $output;
    }
}
