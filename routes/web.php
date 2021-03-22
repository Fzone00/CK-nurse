<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
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
Route::get('/settings', 'SettingController@index')->name('settings.index');
Route::post('/settings', 'SettingController@store')->name('settings.store');
Route::resource('home/products', 'ProductController');
Route::resource('home/settings', 'SettingController');
Route::resource('home/orders', 'OrderController');

Route::get('/cart', 'CartController@index')->name('cart.index');
Route::post('/cart', 'CartController@store')->name('cart.store');
Route::delete('/cart/delete', 'CartController@delete');

Route::get('/change-password','SettingController@change_password')->name('change_password');
Route::post('/update-password','SettingController@update_password')->name('update_password');	