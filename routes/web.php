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
    
    return redirect()->route('home.index');
});
Route::group([
    'middleware' => 'auth',
    'prefix'=>'admin',
    'namespace'=>'admin'
], function () {
Route::get('/category/list','CategoryController@index')->name('categories.index');
Route::get('/category/detail/{title}/{id}','CategoryController@detail');
Route::post('/category/create','CategoryController@store')->name('category.store');
Route::get('/category/update/{id}','CategoryController@update')->name('categories.edit');
Route::post('/category/update/{id}','CategoryController@edit');
Route::get('/category/create', 'CategoryController@create')->name('categories.create');
Route::get('/category/delete/{id}','CategoryController@delete')->name('categories.delete');


Route::get('/product/list','ProductController@index')->name('products.index');
Route::get('/product/edit/{id}','ProductController@edit')->name('products.edit');
Route::post('/product/edit/{id}','ProductController@update');
Route::get('/product/delete/{id}','ProductController@delete')->name('products.delete');
Route::get('/product/create','ProductController@create')->name('products.create');
Route::post('/product/create','ProductController@store');
Route::get('user/edit','UserController@editUser')->name('user.edit');
Route::post('user/update','UserController@update')->name('user.update');

});
Route::get('/user/login','UserController@getLogin')->name('users.login');
Route::post('/user/login','UserController@postLogin')->name('user.postLogin');

Route::get('/user/signup','UserController@getSignup')->name('users.signup');
Route::post('/user/postSignup','UserController@postSignup')->name('users.postSignup');
Route::get('user/getLogout','UserController@getLogout')->name('user.logout');


Route::group([
    'prefix' => 'page',
    'namespace'=>'page'
], function () {
    Route::get('Home','HomeController@index')->name('home.index');
    
});

