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

Route::group(['middleware' => 'web'], function () {
    Route::resources([
        '/' => 'MainController',
        'cart' => 'CartController'
    ]);
   
    Auth::routes();
    
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/products/{filter}/{id}', 'ProductController@index')->name('product');
    Route::get('/product-detail/{id}', 'ProductDetailController@index')->name('productDetail');
    Route::get('/checkout', 'CheckoutController@index')->name('checkout');
});

