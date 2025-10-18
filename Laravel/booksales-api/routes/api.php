<?php

// routes/api.php

use App\Http\Controllers\AuthorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController; // Import Controller
use App\Http\Controllers\GenreController;
use Illuminate\Container\Attributes\Auth;


Route::get('/books', [BookController::class, 'index']);

Route::post('/books', [BookController::class, 'store']);

Route::get('/genres', [GenreController::class, 'index']);

Route::post('/genres', [GenreController::class, 'store']);

Route::get('/authors', [AuthorController::class, 'index']);

Route::post('/authors', [AuthorController::class, 'store']);
