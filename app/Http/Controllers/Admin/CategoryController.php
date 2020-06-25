<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use SebastianBergmann\CodeCoverage\TestFixture\C;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = category::all();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Category $category)
    {
        $this->validate(request(), [
            'name' => 'required',
        ]);

        $newCategory = new Category;

       if(request()->hasFile('image')){
           $photoFile = request()->file('image');
           $ext = $photoFile->extension();
           $fileName = Str::random(5) . '.' . $ext;
           $folder = "uploads/";
           $path = $folder . $fileName;
           $photoFile->move($folder, $fileName);
           $newCategory->thumbnail = $path;
       }
        $newCategory->title = request('name');
        $newCategory->content = request('description');

        $newCategory->save();

        return redirect(route('categories.show', $newCategory->id))->with('success', 'successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //return view(route('categories.show',compact('category')));
        return view('admin.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Category $category)
    {
        $this->validate(request(), [
            'name' => 'required',
        ]);

        // Upload photo
        if (request()->hasFile('image')) {
            $photoFile = request()->file('image');
            $ext = $photoFile->extension();
            $fileName = Str::random(5) . '.' . $ext;
            $folder = "uploads/";
            $path = $folder . $fileName;
            $photoFile->move($folder, $fileName);
            $category->thumbnail = $path;
        }

        $category->title = request('name');
        $category->content = request('description');
        $category->save();

        //return $category;
        // redirect to show page
        return redirect('dashboard/categories/'.$category->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
