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
use App\Dish;
use App\User;
use App\Order;
use App\Cart;

Route::resource('dish', 'DishController');
Route::resource('order', 'OrderController');
Route::resource('cart', 'CartController');

Route::get('/', function () {
    $users=User::all();
    return view('dish/index')->with('users', $users);
});

Route::get('/ER', function(){
    return view('documents.ER');
});

Route::get('/peerReview', function(){
    return view('documents.peerReview');
});

Route::get('/description', function(){
    return view('documents.description');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
