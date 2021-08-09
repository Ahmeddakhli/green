<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use   App\Http\Controllers\site\UserProductController;
use   App\Http\Controllers\site\SearchController;

use App\Models\Product;
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
Route::resource('siteproducts', UserproductController::class);
Route::resource('searchs', SearchController::class);

Route::get('/', function () {
    $products=Product::orderByDesc('id')->paginate(12);
    $categores=Product::all()->unique("country");

    return view('welcome',['products'=>$products,'categores'=>$categores]);
})->name('/');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
