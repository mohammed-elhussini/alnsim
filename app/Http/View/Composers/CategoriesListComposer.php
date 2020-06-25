<?php

namespace App\Http\View\Composers;

use App\Models\Category;
use App\Models\Product;
use App\Repositories\UserRepository;
use Illuminate\View\View;

class CategoriesListComposer
{


    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('categories', Category::withCount('products')->get());
    }
}
