<?php

use Illuminate\Support\Facades\Route;
use Vendor\Categories\App\Http\Controllers\CategoryController;

Route::prefix('categories')->group(function() {
    Route::resource('categories',CategoryController::class);
});