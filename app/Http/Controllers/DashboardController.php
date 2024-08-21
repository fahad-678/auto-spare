<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->paginate(8);
        $hotItems = Product::where('hot_item', 1)->orderBy('created_at', 'desc')->get();
        return view('pages/dashboard.index')->with(['products' => $products, 'hotItems' => $hotItems]);
    }

    public function aboutUs(){
        return view('pages/dashboard.about-us');
    }

    public function contactUs(){
        return view('pages/dashboard.contact-us');
    }
}
