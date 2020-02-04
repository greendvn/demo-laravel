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
Route::get('home',function (){
    return view('admin.dashboard');
})->name('home')->middleware('checkLogin');

Route::get('login','LoginController@showFromLogin');
Route::get('logout','LoginController@logout')->name('logout');
Route::post('login','LoginController@login')->name('login');
Route::get('/admin/create','UserController@create')->name('users.create');
Route::post('/admin/create','UserController@store')->name('users.store');

Route::middleware('checkLogin')->prefix('admin')->group(function (){
    Route::prefix('/users')->group(function (){
        Route::get('/','UserController@index')->name('users.index');


    });
    Route::prefix('categories')->group(function (){
        Route::get('/create','CategoryController@create')->name('categories.create');
        Route::post('/create','CategoryController@store')->name('categories.store');
        Route::get('/','CategoryController@index')->name('categories.index');
        Route::get('/{id}/delete','CategoryController@destroy')->name('categories.delete');
        Route::get('/{id}/edit','CategoryController@edit')->name('categories.edit');
        Route::post('/{id}/edit','CategoryController@update')->name('categories.update');

    });
    Route::prefix('products')->group(function (){
        Route::get('/create','ProductController@create')->name('products.create');
        Route::post('/create','ProductController@store')->name('products.store');
        Route::get('/','ProductController@index')->name('products.index');
        Route::get('/{id}/delete','ProductController@destroy')->name('products.delete');
        Route::get('/{id}/edit','ProductController@edit')->name('products.edit');
        Route::post('/{id}/edit','ProductController@update')->name('products.update');

    });
});
