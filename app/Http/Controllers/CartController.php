<?php

namespace App\Http\Controllers;

use App\Http\Requests\Cart\CheckoutCartRequest;
use App\Http\Requests\Cart\StoreCartRequest;
use App\Mail\ProductEnquiryMail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Session::flush();

        $cart = $request->session()->get('cart', []);

        if (empty($cart) && $request->ajax()) {
            $cart = json_decode($request->input('cart'), true);
        }

        $products = [];
        if (!empty($cart)) {
            $productIds = array_column($cart, 'id');
            $products = Product::whereIn('id', $productIds)->get()->keyBy('id');
        }

        return view('pages.cart.index', [
            'cart' => $cart,
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCartRequest $request)
    {
        $validatedData = $request->validated();

        $request->session()->put('cart', $validatedData['cart']);

        return response()->json([
            'status' => 'success',
            'message' => 'Product added to cart successfully.',
            'cart' => $request->session()->get('cart')
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) {}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function checkout(CheckoutCartRequest $request)
    {
        $validatedData = $request->validated();
        // dd($validatedData);
        $products = [];
        foreach ($validatedData['product_id'] as $index => $productId) {
            $product = Product::findOrFail($productId);
            $products[] = [
                'name' => $product->name,
                'part_number' => $product->part_number,
                'oem' => $product->oem,
                'price' => $product->formattedPrice(),
                'brand' => $product->brand?->name,
                'quantity' => $validatedData['quantity'][$index] ?? 'N/A',
                'url' => route('products.show', ['product' => $productId])
            ];
        }

        Mail::to('fake1236565@gmail.com')->send(new ProductEnquiryMail(
            $validatedData['username'],
            $validatedData['email'],
            $validatedData['phone'],
            $validatedData['country'],
            $validatedData['company_name'],
            $validatedData['description'],
            $products
        ));

        return redirect()->back()->with('success', 'Enquiry submitted successfully');
    }
}
