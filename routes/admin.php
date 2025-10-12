<?php

use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;

Route::get('/', function () {
    return view('admin.dashboard');
})->name('dashboard');
Route::resource('categories', CategoryController::class)->except(['show']); // generates all routes except 'show'
Route::resource('products', ProductController::class)->except(['show']); // generates all routes except 'show'