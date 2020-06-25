<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class ShowProductController extends Controller
{
    public function showProduct($id){
        $product = Product::find($id);
        //$product->load('user');
//        dd($product,$product->categories);
        return view('website.single-pro', compact('product'));
    }
}
