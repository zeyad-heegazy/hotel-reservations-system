<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservationController;

Route::prefix('reservations')->group(function () {
    Route::get('/', [ReservationController::class, 'index'])->name('reservations.index');
    Route::get('/create', [ReservationController::class, 'create'])->name('reservations.create');
    Route::post('/', [ReservationController::class, 'store'])->name('reservations.store');

    Route::get('/{id}', [ReservationController::class, 'show'])->name('reservations.show');
    Route::patch('/{id}/cancel', [ReservationController::class, 'cancel'])->name('reservations.cancel');
    Route::delete('/{id}', [ReservationController::class, 'destroy'])->name('reservations.destroy');
});
