<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;

Route::prefix('rooms')->group(function () {
    Route::get('/', [RoomController::class, 'index'])->name('rooms.index');
    Route::get('/create', [RoomController::class, 'create'])->name('rooms.create');
    Route::post('/', [RoomController::class, 'store'])->name('rooms.store');

    Route::get('/{id}', [RoomController::class, 'show'])->name('rooms.show');
    Route::get('/{id}/edit', [RoomController::class, 'edit'])->name('rooms.edit');
    Route::patch('/{id}', [RoomController::class, 'update'])->name('rooms.update');
    Route::delete('/{id}', [RoomController::class, 'destroy'])->name('rooms.destroy');
});
