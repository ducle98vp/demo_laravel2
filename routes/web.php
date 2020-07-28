<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    
    return redirect()->route('categories.index');
});
Route::get('/category/list','CategoryController@index')->name('categories.index');
Route::get('/category/detail/{title}/{id}','CategoryController@detail');
Route::post('/category/store','CategoryController@store');
Route::get('/category/update/{id}','CategoryController@update')->name('categories.edit');
Route::post('/category/update/{id}','CategoryController@edit');
Route::get('/product/delete/{id}','CategoryController@delete');


