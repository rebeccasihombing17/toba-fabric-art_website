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
//Register View
Route::get('/register','App\Http\Controllers\UserController@create');
Route::post('/register','App\Http\Controllers\UserController@store')->name('register');

//Login View
Route::get('/login','App\Http\Controllers\SessionsController@create');
Route::post('/login','App\Http\Controllers\SessionsController@store')->name('login');
Route::get('/logout','App\Http\Controllers\SessionsController@destroy');

//Dashboard View
Route::get('/', 'App\Http\Controllers\ProductController@indexview')->name('dashboard')->withoutMiddleware('auth');
Route::get('/seller', 'App\Http\Controllers\ProductController@indexviewseller')->name('seller')->withoutMiddleware('auth');
Route::get('/AboutWe', function () {
    return view('AboutWe');

});
Route::get('/CallUs', function () {
    return view('CallUs');

});
Route::get('/Syarat', function () {
    return view('Syarat');

});

//Management Product View + Add Product View
    Route::middleware(['auth'])->group(function () {
        Route::get('/ManagementProduct', 'App\Http\Controllers\ProductController@index2view')->name('managementproduct');

        Route::get('/productdetail/{code_product}', 'App\Http\Controllers\ProductController@showview')->name('productdetail');

        Route::get('/addproduct', 'App\Http\Controllers\ProductController@createview');

        Route::post('/addproduct', 'App\Http\Controllers\ProductController@storeview')->name('addproduct');

        Route::delete('/removeProduct/{code_product}', 'App\Http\Controllers\ProductController@destroyview')->name('delete');
        

//Payment View
        // Rute untuk menampilkan halaman Payment
        Route::get('/Payment/{code_product}', 'App\Http\Controllers\PaymentController@index');
        // Rute untuk menambahkan pembayaran
        Route::post('/Payment/{code_product}', 'App\Http\Controllers\PaymentController@addPayment')->name('paymentadd');
        // Rute untuk menampilkan halaman PaymentDETAIL
        Route::get('/Paymentsee/{payment_id}', 'App\Http\Controllers\PaymentController@index2')->name('see');
                // Rute untuk menampilkan halaman Histori PaymentDETAIL
        Route::get('/Paymenths', 'App\Http\Controllers\PaymentController@index3')->name('history');
        
//Payment Confir View
        Route::get('/Paymentconfir', 'App\Http\Controllers\PaymentController@index4')->name('confirmation');
        Route::post('/confpay/{payment_id}', 'App\Http\Controllers\PaymentController@confirPayment');
    });

//Wishlist View
    Route::middleware(['auth'])->group(function () {
        Route::get('/wishlist', 'App\Http\Controllers\WishlistsController@indexview')->name('wishlist');
        Route::post('/addwish/{products}', 'App\Http\Controllers\WishlistsController@addToWishlist')->name('postwish');
        Route::delete('/remove-wishlist/{wishcode}', 'App\Http\Controllers\WishlistsController@removeFromWishlist')->name('removeWish');
    });

//Edit Product List
Route::middleware(['auth'])->group(function () {
    // Rute untuk menampilkan halaman Edit Product
    Route::get('/editproduct/{code_product}', 'App\Http\Controllers\ProductController@editview')->name('editproduct');
    // Rute untuk mengupdate data produk
    Route::put('/update/{code_product}', 'App\Http\Controllers\ProductController@updateview')->name('updateproduct');
});