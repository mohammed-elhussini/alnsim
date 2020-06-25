<?php

namespace App\Providers;

use App\Http\View\Composers\CategoriesListComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class CaTegoriesListServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        view::composer('website.partials.sidebar-proCats',
            CategoriesListComposer::class
        );
    }
}
