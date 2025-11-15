<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HotelController;

Route::prefix('hotels')->group(function () {
    Route::get('/', [HotelController::class, 'index'])->name('hotels.index');
    Route::get('/create', [HotelController::class, 'create'])->name('hotels.create');
    Route::post('/', [HotelController::class, 'store'])->name('hotels.store');

    Route::get('/{id}', [HotelController::class, 'show'])->name('hotels.show');
    Route::get('/{id}/edit', [HotelController::class, 'edit'])->name('hotels.edit');
    Route::patch('/{id}', [HotelController::class, 'update'])->name('hotels.update');
    Route::delete('/{id}', [HotelController::class, 'destroy'])->name('hotels.destroy');
});
