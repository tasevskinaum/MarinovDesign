<?php

use App\Http\Controllers\API\CustomOrderController ;
use App\Http\Controllers\API\FaqController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\CustomOrder;

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
Route::post('/custom-orders', [CustomOrderController::class, 'index'])->name('customOrders.index');
