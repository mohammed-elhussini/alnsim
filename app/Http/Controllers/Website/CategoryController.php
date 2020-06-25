<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function Category($id){
        //$category = Category::find($id);
        $category = Category::withCount('products')->where('id', $id)->get()->first();
        //return $category;
        $products = Product::with('categories')
            ->whereHas('categories', function (Builder $query) use ($id) {
                $query->where('category_id', $id);
            })
            ->latest()->get();

        return view('website.category-pro', compact('category', 'products'));
    }
}
