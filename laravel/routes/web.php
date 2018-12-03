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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/index','PageController@index')->name('users.index');
Route::get('/loai-san-pham/{type}','PageController@loaisanpham')->name('users.category');
Route::get('/chi-tiet-san-pham/{id}','PageController@chitiet')->name('users.detail');
Route::get('/lien-he','PageController@lienhe')->name('users.contact');
Route::get('/gioi-thieu','PageController@gioithieu')->name('users.about');
Route::get('/add-to-cart/{id}','PageController@AddtoCart')->name('users.add');
