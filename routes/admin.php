<?php

use Illuminate\Support\Facades\Route;
use   App\Http\Controllers\admin\users\UserController;
use   App\Http\Controllers\admin\products\ProductController;
use   App\Http\Controllers\admin\orders\OrderController;
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
Route::resource('users', UserController::class);
Route::resource('products', ProductController::class);
Route::resource('orders', OrderController::class);

Route::get('/admin', function () {


    return view('admin.index');
})->middleware('auth');