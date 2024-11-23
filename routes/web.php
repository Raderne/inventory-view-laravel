<?php

use App\Http\Controllers\InventoryLogController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProductController::class, 'index']);
Route::get('/', [ProductController::class, 'create']);

Route::get('/staff', function () {
    return view('staff.index');
});

Route::middleware('auth')->group(function () {
    Route::post('/products/create', [ProductController::class, 'store']);
    Route::get('/products/{product}', [ProductController::class, 'show']);
    Route::get('/products/{product}/edit', [ProductController::class, 'edit']);
    Route::POST('/products/{product}', [ProductController::class, 'update']);
    Route::delete('/products/{product}', [ProductController::class, 'destroy']);

    Route::get('/suppliers', [SupplierController::class, "index"]);
    Route::get('/suppliers/create', [SupplierController::class, "create"]);
    Route::post('/suppliers', [SupplierController::class, "store"]);
    Route::delete('/suppliers/{supplier}', [SupplierController::class, "destroy"]);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/history', [InventoryLogController::class, 'index']);
});

require __DIR__ . '/auth.php';
