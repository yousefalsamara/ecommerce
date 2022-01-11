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
    return view('welcome');
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth','isAdmin']], function () {

    Route::get('/dashboard', function () {
        return view('layouts/admin');
    });
    Route::get('category','Admin\CategoruController@index');
    Route::post('store_category','Admin\CategoruController@store');
    Route::get('edit_category/{id}','Admin\CategoruController@edit')->name('editCategory');
    Route::put('updateCategory/{id}','Admin\CategoruController@update')->name('updateCategory');
    Route::get('deleteCategory/{id}','Admin\CategoruController@destroy')->name('deleteCategory');
    Route::resource('product','Admin\ProductController');

});
Route::get('create_category','Admin\CategoruController@create');