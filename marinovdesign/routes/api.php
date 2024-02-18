<?php

use App\Http\Controllers\API\CustomOrderController;
use App\Http\Controllers\API\FaqController;
use App\Http\Controllers\API\HomeDecorController;
use App\Http\Controllers\API\JewelryController;
use App\Http\Controllers\API\TypeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('faqs', [FaqController::class, 'index'])->name('api.faqs.all');

Route::get('get-types/{category}', [TypeController::class, 'getTypesForCategory']);

Route::get('jewelry', [JewelryController::class, 'getTypes']);

Route::get('home-decor', [HomeDecorController::class, 'getTypes']);

// PRODUCTS API
Route::get('/products', [App\Http\Controllers\API\ProductController::class, 'allProducts'])->name('api.allproducts');

Route::get('/products/{type}', [App\Http\Controllers\API\ProductController::class, 'productsByType'])->name('api.products.bytype');

// Custom Orders
Route::post('custom-orders', [CustomOrderController::class, 'store']);
