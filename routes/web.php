<?php

use App\Http\Controllers\InventoryController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Default home route
Route::get('/', function () {
    return view('welcome');
});

// Dashboard route (auth required)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile routes (auth required)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Inventory Routes (CRUD operations)
Route::resource('inventory', InventoryController::class);

require __DIR__.'/auth.php';
