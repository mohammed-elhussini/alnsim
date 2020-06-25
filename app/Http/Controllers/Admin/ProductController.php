<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$products = product::all();
        $products = product::latest()->get();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = category::all();
        return view('admin.products.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {

        $this->validate(request(), [
            'title' => 'required',
            'description' => 'required',
            'photo' => 'required',
        ]);

        if (request()->hasFile('photo')) {
            $photoFile = request()->file('photo');
            $ext = $photoFile->extension();
            $fileName = Str::random(5) . '.' . $ext;
            $folder = "uploads/";
            $path = $folder . $fileName;
            $photoFile->move($folder, $fileName);
        }

        $newProduct = new Product;
        $newProduct->title = request('title');
        $newProduct->content = request('description');
        $newProduct->views = 0;
        $newProduct->featured = request('featured')?:0;;
        $newProduct->pending = request('pending')?:0;;
        $newProduct->user_id = Auth::id();
        $newProduct->thumbnail = $path;
        $newProduct->save();

        // Attache categories
        $newProduct->categories()->sync(request('cats'));

        //return redirect('dashboard/products/'.$newProduct->title)->with('success', 'successfully added');
        return redirect(route('products.show', $newProduct))->with('success', 'successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //return $product;
        //$product=Product::findOrFail($id);

        $cats = category::withCount('products')->get();
        //return $cats;
        //$product->load('categories');
        //dd($product->catProducts);
        return view('admin.products.show', compact('product','cats'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = product::findOrFail($id);
        $cats = category::all();
        $product->load('categories');
        return view('admin.products.edit', compact('product','cats'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {

        $product = Product::findOrFail($id);
        $this->validate(request(), [
            'name' => 'required',
            'description' => 'required',
            'photo' => request()->file('photo')?'required|image':'',
        ]);

        // Upload photo
        if (request()->hasFile('photo')) {
            $photoFile = request()->file('photo');
            $ext = $photoFile->extension();
            $fileName = Str::random(5) . '.' . $ext;
            $folder = "uploads/";
            $path = $folder . $fileName;
            $photoFile->move($folder, $fileName);
            $product->thumbnail = $path;
        }

        $product->title = request('name');
        $product->content = request('description');
        $product->featured = request('featured')?:0;;
        $product->pending = request('pending')?:0;;
        $product->save();
        $product->categories()->sync(request('cats'));
        // redirect to show page
        return redirect('dashboard/products/' . $product->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //$product = Product::findOrFail($id);
        if (is_file($product->thumbnail)) unlink($product->thumbnail);
        Product::destroy($product->id);
        return redirect('dashboard/products');
    }
}
