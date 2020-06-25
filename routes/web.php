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

Route::get('/', 'HomeController@homePage');
Route::get('/show-product/{id}', 'ShowProductController@showProduct');
Route::get('/category/{id}','CategoryController@Category')->name('category');

Route::get('/login', 'UserController@getLogin')->name('login');
Route::post('/login', 'UserController@postLogin');

Route::get('/sign', 'UserController@getSign')->name('sign');
Route::post('/sign', 'UserController@postSign');

Route::get('/logout', 'UserController@logout')->name('logout');
