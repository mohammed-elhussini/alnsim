<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function homePage()
    {
        $products = Product::with('categories')->latest()->take(5)->get();
        return view('website.index', compact('products'));
    }
}
