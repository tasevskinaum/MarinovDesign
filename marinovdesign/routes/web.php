<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomOrderController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TypeController;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::middleware(['super.admin.or.admin'])->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard.dashboard');
        })->name('dashboard');

        Route::resource('materials', MaterialController::class)->except(['show', 'create']);
        Route::resource('categories', CategoryController::class)->except(['show', 'create']);
        Route::resource('faqs', FaqController::class)->except(['show']);
        Route::resource('types', TypeController::class)->except(['show', 'create']);
        Route::resource('maintenances', MaintenanceController::class);
        Route::resource('products', ProductController::class);

        Route::get('custom-orders', [CustomOrderController::class, 'index'])->name('custom.orders.index');
    });

    Route::middleware(['super.admin'])->group(function () {
        Route::resource('admins', AdminController::class);
    });
});

require __DIR__ . '/auth.php';
