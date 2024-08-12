<?php

namespace App\Http\Controllers;

use App\Models\Product;

class DashboardController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->paginate(8);
        return view('pages/dashboard.index')->with('products', $products);
    }

    public function aboutUs(){
        return view('pages/dashboard.about-us');
    }

    public function contactUs(){
        return view('pages/dashboard.contact-us');
    }
}
