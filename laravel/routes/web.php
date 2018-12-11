<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvi+er within a group which
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
Route::get('/add-to-cart/{id}','PageController@AddtoCart')->name('users.add');
Route::get('/delete-cart/{id}','PageController@DelCart')->name('users.delcart');
Route::get('dat-hang',[
    'as' => 'dathang',
    'uses'=>'PageController@getCheckout']);
Route::post('dat-hang',[
    'as' => 'dathang',
    'uses'=>'PageController@postCheckout']);
Route::get('/dang-nhap','PageController@Login')->name('users.login');
Route::post('/dang-nhap', 'PageController@postLogin')->name('users.postlogin');
Route::get('/dang-ky','PageController@SignUp')->name('users.signup');
Route::post('/dang-ki', 'PageController@Store')->name('users.store');
Route::get('/dang-xuat','PageController@Logout')->name('users.logout');
Route::get('/search','PageController@Search')->name('users.search');
Route::get('/admin', 'AdminController@index')->name('admins.index');
Route::get('/admin/create','AdminController@create')->name('admins.create');
Route::get('/admin/{id}','AdminController@show')->name('admins.show');
Route::delete('/admin/{id}','AdminController@destroy')->name('admins.destroy');
Route::post('/admin', 'AdminController@store')->name('admins.store');
Route::get('/admin/{id}/edit','AdminController@edit')->name('admins.edit');
Route::put('admin/{id}/updated', 'AdminController@update')->name('admins.update');

