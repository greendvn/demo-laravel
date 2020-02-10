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

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('admin',function (){
    return view('admin.dashboard');
})->name('admin')->middleware('checkLogin');

Route::get('login','LoginController@showFromLogin');
Route::get('logout','LoginController@logout')->name('logout');
Route::post('login','LoginController@login')->name('login');
Route::get('/admin/create','UserController@create')->name('users.create');
Route::post('/admin/create','UserController@store')->name('users.store');

Route::middleware('checkLogin')->prefix('admin')->group(function (){
    Route::prefix('/users')->group(function (){
        Route::get('/','UserController@index')->name('users.index');
        Route::get('/edit/{id}','UserController@edit')->name('users.edit');
        Route::post('/edit/{id}','UserController@update')->name('users.update');
        Route::get('/delete/{id}','UserController@destroy')->name('users.delete');


    });
    Route::prefix('categories')->group(function (){
        Route::get('/create','CategoryController@create')->name('categories.create');
        Route::post('/create','CategoryController@store')->name('categories.store');
        Route::get('/','CategoryController@index')->name('categories.index');
        Route::get('/search','CategoryController@search')->name('categories.search');
        Route::get('/{id}/delete','CategoryController@destroy')->name('categories.delete');
        Route::get('/{id}/edit','CategoryController@edit')->name('categories.edit');
        Route::post('/{id}/edit','CategoryController@update')->name('categories.update');

    });
    Route::prefix('products')->group(function (){
        Route::get('/create','ProductController@create')->name('products.create');
        Route::post('/create','ProductController@store')->name('products.store');
        Route::get('/','ProductController@index')->name('products.index');
        Route::get('/search','ProductController@search')->name('products.search');
        Route::get('/{id}/delete','ProductController@destroy')->name('products.delete');
        Route::get('/{id}/edit','ProductController@edit')->name('products.edit');
        Route::post('/{id}/edit','ProductController@update')->name('products.update');

    });
});

Route::prefix('shop')->group(function () {
    Route::get('/', 'ShopController@index')->name('shop.index');
    Route::get('/category', 'ShopController@category')->name('shop.category');
    Route::get('/category/{categoryId}', 'ShopController@filterCategory')->name('shop.filterCategory');
    Route::get('/cart', 'ShopController@cart')->name('shop.cart');
    Route::get('/cart/{id}', 'ShopController@addToCart')->name('shop.addToCart');
    Route::get('/delete-cart/{id}', 'ShopController@removeProductIntoCart')->name('shop.deleteProductIntoCart');
    Route::post('/update-cart/{id}', 'ShopController@updateProductIntoCart')->name('shop.updateProductIntoCart');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
