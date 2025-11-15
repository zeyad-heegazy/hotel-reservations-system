<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestController;

Route::prefix('guests')->group(function () {
    Route::get('/', [GuestController::class, 'index'])->name('guests.index');
    Route::get('/create', [GuestController::class, 'create'])->name('guests.create');
    Route::post('/', [GuestController::class, 'store'])->name('guests.store');

    Route::get('/{id}', [GuestController::class, 'show'])->name('guests.show');
    Route::get('/{id}/edit', [GuestController::class, 'edit'])->name('guests.edit');
    Route::patch('/{id}', [GuestController::class, 'update'])->name('guests.update');
    Route::delete('/{id}', [GuestController::class, 'destroy'])->name('guests.destroy');
});
