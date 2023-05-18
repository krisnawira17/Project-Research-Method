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

#Home
Route::get('/', function () {
    return view('Home');
});

#Forum
Route::get('/forum', function () {
    return view('Forum');
})->name('Forum');

#Marketplace

#Sign In
Route::get('/sign-in', function () {
    return view('SignIn');
})->name('SignIn');


#Sign Up
Route::get('/sign-up', function () {
    return view('SignUp');
})->name('SignUp');

#Cart
