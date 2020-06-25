<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/





Route::middleware('dashboardAuthLogin')->group(function () {
    Route::get('dashboard/login', 'LoginController@index');
    Route::post('dashboard/login', 'LoginController@authenticate');
});

Route::middleware('dashboardAuth')->group(function () {

    Route::get('/dashboard/', function () {
        return view('admin.index');
    })->name('dashboard');


    Route::resource('/dashboard/users', 'UserController');

    Route::resource('/dashboard/products', 'ProductController');
    Route::resource('/dashboard/categories', 'CategoryController');
    Route::get('dashboard/logout', 'LoginController@logout');

});
