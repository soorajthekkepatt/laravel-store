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

Auth::routes();

// -----------------User Routes--------------------
Route::prefix('home')->group(function ()
{
Route::get('/', 'HomeController@index')->name('home');
Route::get('/logout','HomeController@logout');
Route::get('/productdetails/{id}','HomeController@productinfo');
Route::get('/mycart','HomeController@showcart');
});

//-------------Admin Routes-----------------

Route::prefix('admin')->group(function () {
	Route::get('/','AdminController@index');
    Route::get('/home','AdminController@home');
    Route::get('/products','AdminController@Allproducts');
    Route::get('/productadd','AdminController@AddProducts');
    Route::post('/addproduct','AdminController@AddNewProduct'); 
    Route::get('/delete/{id}','AdminController@deleteProduct');
    Route::get('/edit/{id}','AdminController@editproduct');
    Route::post('/edit/{id}/updateproduct','AdminController@updateProduct');
    Route::get('/salesreport','AdminController@salesReport');
    Route::get('/users','AdminController@users');
    Route::get('/deleteuser/{id}','AdminController@deleteuser');
});
// -------------Cart Routes-----------------
Route::post('/addtocart','ProductController@addtocart');
Route::get('/getcartproducts/{id}','ProductController@getcartproducts');
Route::get('/salesreport','ProductController@salesReport');


