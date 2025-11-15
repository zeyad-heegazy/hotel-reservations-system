<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LogsController;

Route::prefix('logs')->group(function () {
    Route::get('/', [LogsController::class, 'index'])->name('logs.index');
});
