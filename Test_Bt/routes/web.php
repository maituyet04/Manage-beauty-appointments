<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;


Route::get('/', [BookController::class, 'index']);

// Route khác (nếu cần)
Route::get('/books', [BookController::class, 'index']);
