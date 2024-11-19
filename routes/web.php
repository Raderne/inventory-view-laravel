<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/suppliers', [SupplierController::class, "index"]);
Route::get('/suppliers/create', [SupplierController::class, "create"]);
Route::post('/suppliers', [SupplierController::class, "store"]);
Route::delete('/suppliers/{supplier}', [SupplierController::class, "destroy"]);

Route::get('/staff', function () {
    return view('staff.index');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
