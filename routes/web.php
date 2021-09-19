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


Auth::routes();

Route::group(['middleware'=>'admin','auth'] ,function(){
    Route::get('/product/create', 'AdminController@createProduct')->name('createProduct');
    Route::post('/product/store', 'AdminController@storeProduct')->name('storeProduct');
    Route::get('/admin/home', 'AdminController@showAllProduct')->name('home');
    Route::get('/product/{id}', 'AdminController@showProduct')->name('showProduct');
    Route::get('/product/edit/{id}', 'AdminController@editProduct')->name('editProduct');
    Route::patch('/product/update/{id}', 'AdminController@updateProduct')->name('updateProduct');
    Route::delete('/product/delete/{id}', 'AdminController@deleteProduct')->name('deleteProduct');
});

Route::group(['middleware'=>'user','auth'] ,function(){
    Route::get('/home', 'HomeController@home')->name('userHome');
    Route::get('/faktur/product/{id}', 'HomeController@addFaktur')->name('addFaktur');
    Route::post('/faktur/product/store/{id}', 'HomeController@storeFaktur')->name('storeFaktur');
    Route::get('/faktur', 'HomeController@showFaktur')->name('showFaktur');
    Route::get('/faktur/edit/{id}', 'HomeController@editFaktur')->name('editFaktur');
    Route::patch('/faktur/update/{id}', 'HomeController@updateFaktur')->name('updateFaktur');
    Route::delete('/faktur/delete/{id}', 'HomeController@deleteFaktur')->name('deleteFaktur');
    Route::get('/faktur/print', 'HomeController@printFaktur')->name('printFaktur');
    // Route::get('/product/create', function(){
    //     return view('userHome');
    // });
    // Route::post('/product/store', function(){
    //     return view('userHome');
    // });
    // Route::get('/admin/home', function(){
    //     return view('userHome');
    // });
    // Route::get('/product/{id}', function(){
    //     return view('userHome');
    // });
    // Route::get('/product/edit/{id}', function(){
    //     return view('userHome');
    // });
    // Route::patch('/product/update/{id}', function(){
    //     return view('userHome');
    // });
    // Route::delete('/product/delete/{id}', function(){
    //     return view('userHome');
    // });
});