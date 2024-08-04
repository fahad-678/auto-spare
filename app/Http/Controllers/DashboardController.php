<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function index()
    {
        // addVendors(['amcharts', 'amcharts-maps', 'amcharts-stock']);

        return view('pages/dashboard.index');
    }

    public function aboutUs(){
        return view('pages/dashboard.about-us');
    }

    public function contactUs(){
        return view('pages/dashboard.contact-us');
    }
}
