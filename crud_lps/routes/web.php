<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\ProductController;

// Route::get('/', function () {
//     return view('welcome');
// });

// //route resource for products
// Route::resource('/products', \App\Http\Controllers\ProductController::class);

// Route::get('/', [ProductController::class, 'index']);

Route::get('/', [PasienController::class, 'index']);

// //route resource for products
// Route::resource('products', ProductController::class);

//route resource for pasiens
Route::resource('pasiens', PasienController::class);