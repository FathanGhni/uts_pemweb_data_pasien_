<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasienController;

//route get for pasiens
Route::get('/', [PasienController::class, 'index']);

//route resource for pasiens
Route::resource('pasiens', PasienController::class);
