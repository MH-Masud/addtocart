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
Route::get('/','CartController@index');
Route::get('/product','CartController@product')->name('product');
Route::post('/addcart','CartController@addcart')->name('addcart');
