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

        Route::group([
            'prefix' => 'new',
            'namespace'=>'admin',
        ], function () {
            Route::get('/create','NewController@create')->name('new.create');
            Route::post('/store','NewController@store')->name('new.store');
            Route::get('/list','NewController@index')->name('new.index');
            Route::get('/edit/{id}','NewController@edit')->name('new.edit');
            Route::post('/update/{id}','NewController@update')->name('new.update');
            Route::get('/delete/{id}','NewController@delete')->name('new.delete');
            Route::post('/destroy/{id}','NewController@destroy')->name('new.destroy');
        });
});


Route::get('/user/login','UserController@getLogin')->name('users.login');
Route::post('/user/login','UserController@postLogin')->name('user.postLogin');

Route::get('/user/signup','UserController@getSignup')->name('users.signup');
Route::post('/user/postSignup','UserController@postSignup')->name('users.postSignup');
Route::get('user/getLogout','UserController@getLogout')->name('user.logout');


Route::group([
    'prefix' => 'Page',
    'namespace'=>'page'
], function () {
    Route::get('Home','HomeController@index')->name('home.index');
    Route::get('Detail/{id}','DetailController@index')->name('detail.index');
    Route::get('Filter/category/{id}','FilterController@filter_categories')->name('filter.categories');
    Route::get('Filter/category/{id}/price/{price}','FilterController@filter_price')->name('filter.price');
    Route::get('Cart','CartController@index')->name('cart.index');
    Route::get('Cart/add/{id}','CartController@add')->name('cart.add');
    Route::get('Cart/delete/{id}','CartController@delete')->name('cart.delete');
    Route::get('Cart/update','CartController@update')->name('cart.update');
    
    
});

