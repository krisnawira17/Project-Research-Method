<?php

use App\Http\Controllers\ProductController;
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

#Home
Route::get('/', function () {
    return view('Home');
})->name('Home');

#Forum
Route::get('/forum', function () {
    return view('Forum');
})->name('Forum');

#Marketplace
Route::get('/marketplace',function(){
    return view('Marketplace');
})->name('Marketplace');
Route::get('/marketplace','App\Http\Controllers\ProductController@index')->name('Marketplace');

#Product Detail
Route::get('/productDetail/{id}', 'App\Http\Controllers\ProductController@show')->name('productDetail');



#Sell Product
Route::get('/sellProduct', function () {
    return view('SellProduct');
})->name('SellProduct');
Route::post('/sellProduct', 'App\Http\Controllers\ProductController@store')->name('listProduct');

#Sign In
Route::get('/sign-in', function () {
    return view('SignIn');
})->name('SignIn');
Route::post('/sign-in', 'App\Http\Controllers\LoginController@SignIn')->name('Login');

#Sign Up
Route::get('/sign-up', function () {
    return view('SignUp');
})->name('SignUp');
Route::post('/sign-up', 'App\Http\Controllers\AuthController@signup')->name('SignUp');

#Profile
Route::get('/profile', function () {
    return view('profile');
})->name('Profile');
Route::get('/profile', 'App\Http\Controllers\ProfileController@getProfile')->name('Profile');
Route::post('/profile/update', 'App\Http\Controllers\ProfileController@update')->name('profile.update');
Route::post('/profile', 'App\Http\Controllers\ProfileController@signout')->name('profile.signout');


#Cart
Route::get('/cart','App\Http\Controllers\CartController@index')->name('cart.index');
Route::post('/cart/add','App\Http\Controllers\CartController@addToCart')->name('cart.add');
Route::get('/cart/update-quantity/{cartId}/{action}', 'App\Http\Controllers\CartController@updateQuantity');
