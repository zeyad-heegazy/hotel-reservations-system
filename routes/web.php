<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

Route::get('/', fn() => redirect('/login'));

require __DIR__ . '/auth.php';

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    require __DIR__ . '/hotels.php';
    require __DIR__ . '/rooms.php';
    require __DIR__ . '/guests.php';
    require __DIR__ . '/reservations.php';
});
