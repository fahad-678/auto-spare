<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('created_at', 'desc')->paginate(8);
        $hotItems = Category::where('hot_item', 1)->orderBy('created_at', 'desc')->get();
        return view('pages/dashboard.index')->with(['categories' => $categories, 'hotItems' => $hotItems]);
    }

    public function aboutUs(){
        return view('pages/dashboard.about-us');
    }

    public function contactUs(){
        return view('pages/dashboard.contact-us');
    }
}
