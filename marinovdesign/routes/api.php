<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\FaqController;
use App\Http\Controllers\API\TypeController;
use App\Http\Controllers\Api\CustomOrderController;

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

Route::get('all-images', [CustomOrderController::class, 'getAllImages']);
