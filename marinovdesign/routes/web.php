<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudController;
use App\Http\Controllers\CustomOrderController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::redirect('/', 'dashboard');

Route::get('/dashboard', function () {
    return view('dashboard.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/custom-orders', [CustomOrderController::class, 'index'])->name('custom-orders.index');
Route::get('/custom-orders', [CustomOrderController::class, 'index']);
Route::get('/custom-orders', [CustomOrderController::class, 'index'])->name('custom-orders.index');
Route::get('/custom-orders/create', [CustomOrderController::class, 'create'])->name('custom-orders.create');
Route::post('/custom-orders', [CustomOrderController::class, 'store'])->name('custom-orders.store');
Route::get('/custom-orders/{id}', [CustomOrderController::class, 'show'])->name('custom-orders.show');
Route::get('/custom-orders/{id}/edit', [CustomOrderController::class, 'edit'])->name('custom-orders.edit');
Route::put('/custom-orders/{id}', [CustomOrderController::class, 'update'])->name('custom-orders.update');
Route::delete('/custom-orders/{id}', [CustomOrderController::class, 'destroy'])->name('custom-orders.destroy');
Route::put('custom-orders/{customOrder}/toggle-completed', 'CustomOrderController@toggleCompleted')->name('custom-orders.toggle-completed');
require __DIR__ . '/auth.php';
