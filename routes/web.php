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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth','isAdmin']], function () {

    Route::get('/dashboard', function () {
        return view('layouts/admin');
    });
    Route::get('category/admin','Admin\CategoruController@index');
    Route::post('store_category','Admin\CategoruController@store');
    Route::get('edit_category/{id}','Admin\CategoruController@edit')->name('editCategory');
    Route::put('updateCategory/{id}','Admin\CategoruController@update')->name('updateCategory');
    Route::get('deleteCategory/{id}','Admin\CategoruController@destroy')->name('deleteCategory');
    Route::resource('product','Admin\ProductController');
    Route::get('create_category','Admin\CategoruController@create');
    Route::get('order','Admin\OrderController@index');
    Route::get('admin/view-order/{id}','Admin\OrderController@show');
    Route::put('update-order/{id}','Admin\OrderController@updateorder');
    Route::get('order-history','Admin\OrderController@orderhistory');

    Route::get('users','Admin\DashboradController@users');
    Route::get('view-user/{id}','Admin\DashboradController@showuser');

});
//Route::get('create_category','Admin\CategoruController@create');
Route::get('front','website\FrontendController@index');
Route::get('category','website\FrontendController@indexcategory');
Route::get('category/{slug}','website\FrontendController@categoryproduct');
Route::get('category/{cate_slug}/{prod_slug}','website\FrontendController@productview');

Route::middleware(['auth'])->group(function (){

    Route::get('cart','website\CartController@viewcart');
    Route::get('checkout','website\CheckoutController@index');
    Route::post('place-order','website\CheckoutController@placeorder');
    Route::get('my-orders','website\UserController@index');
    Route::get('view-order/{id}','website\UserController@show');
    Route::get('wishlist','website\WishlistController@index');

    Route::post('proceed-to-pay','website\CheckoutController@razorpaycheck');

    Route::post('/add-rating','website\RatingController@add');




});
Route::post('add_to_cart','website\CartController@addproduct');
Route::post('delete-cart-item','website\CartController@deleteproduct');
Route::post('update-cart','website\CartController@updatecart');
Route::post('/add_to_wishlist','website\WishlistController@add');
Route::post('delete-wishlist-item','website\WishlistController@delete');
