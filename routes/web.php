<?php

use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\BrandController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\fontend\BlogController;
use App\Http\Controllers\fontend\HomeController;
use App\Http\Controllers\fontend\PagesController;
use App\Http\Controllers\fontend\ShopController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [HomeController::class, 'index']);
Route::get('/contact', [HomeController::class, 'indexContact']);
// Shop
Route::get('/shop-category', [ShopController::class, 'shopCategory']);
Route::get('/product-details/{product_id}', [ShopController::class, 'productDetails']);
Route::get('/product-checkout', [ShopController::class, 'productCheckout']);
Route::get('/confirmation', [ShopController::class, 'confirmation']);
Route::get('/shopping-cart', [ShopController::class, 'shoppingCart']);
//Blog
Route::get('/blog', [BlogController::class, 'blog']);
Route::get('/blog-details', [BlogController::class, 'blogDetails']);
//Pages
// Route::get('/login', [PagesController::class, 'login']);
// Route::get('/register', [PagesController::class, 'register']);
// Route::get('/tracking', [PagesController::class, 'tracking']);


Route::group(['prefix' => 'admin', 'namespace' => 'admin'], function() {	
	Route::get('login', [AuthController::class, 'getLogin'])->name('getLogin');
	Route::post('login', [AuthController::class, 'postLogin'])->name('postLogin');
	Route::get('logout', [AuthController::class, 'getLogout'])->name('getLogout');
});
Route::group(['middleware' => 'CheckAdminLogin','prefix' => 'admin'], function() {
	Route::get('/', [AuthController::class, 'index'])->name('welcome');
});

Route::group(['middleware' => 'CheckAdminLogin','prefix' => 'admin','namespace' => 'admin'], function() {
    //category
	Route::get('list-category', [CategoryController::class, 'index']);
    Route::get('add-category', [CategoryController::class, 'create']);
    Route::post('save-category', [CategoryController::class, 'store'])->name('postCategory');
    Route::get('edit-category/{category_id}', [CategoryController::class, 'edit']);
    Route::put('update-category/{category_id}', [CategoryController::class, 'update']);
    Route::delete('delete-category/{category_id}', [CategoryController::class, 'destroy']);
    Route::get('show-category/{category_id}', [CategoryController::class, 'show']);
    Route::get('hide-category/{category_id}', [CategoryController::class, 'hide']);

    //brand
    Route::get('/list-brand', [BrandController::class, 'index']);
    Route::get('/add-brand', [BrandController::class, 'create']);
    Route::post('/save-brand', [BrandController::class, 'store']);
    Route::get('/edit-brand/{brand_id}', [BrandController::class, 'edit']);
    Route::put('/update-brand/{brand_id}', [BrandController::class, 'update']);
    Route::delete('/delete-brand/{brand_id}', [BrandController::class, 'destroy']);
    Route::get('/show-brand/{brand_id}', [BrandController::class, 'show']);
    Route::get('/hide-brand/{brand_id}', [BrandController::class, 'hide']);

    //product
    Route::get('/list-product', [ProductController::class, 'index']);
    Route::get('/add-product', [ProductController::class, 'create']);
    Route::post('/save-product', [ProductController::class, 'store']);
    Route::get('/edit-product/{product_id}', [ProductController::class, 'edit']);
    Route::put('/update-product/{product_id}', [ProductController::class, 'update']);
    Route::delete('/delete-product/{product_id}', [ProductController::class, 'destroy']);
    Route::get('/show-product/{product_id}', [ProductController::class, 'show']);
    Route::get('/hide-product/{product_id}', [ProductController::class, 'hide']);
});